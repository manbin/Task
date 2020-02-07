function loadTasks() {
    $.ajax({
        type: 'GET',
        url: 'api/tasks',
        success: function (result) {
            var parsed = result;
            let output = '<table><tr><th>id</th><th>name</th><th>description</th><th>status</th><th>action</th></tr>';
            for(let i = 0; i < parsed.length; i++){
                output += '<tr><td>'+parsed[i].id+'</td><td>'+parsed[i].name+'</td><td>'+parsed[i].description+'</td><td>'
                    +parsed[i].status+'</td><td><button onclick="openEdit('+parsed[i].id+')">edit</button><button onclick="deleteTask('+parsed[i].id+')">delete</button></td></tr>';
            }
            output += '</table>';
            $('.tasks').html(output);
        }
    })
}
function deleteTask(id){
    $.ajax({
        type: 'DELETE',
        url: 'api/tasks/'+id,
        success: function (result) {
            loadTasks();
        }
    })
}
function createTask(){
    var name = $('#name').val();
    var description = $('#description').val();
    var status = $('#status').val();
    $.ajax({
        type: 'POST',
        url: 'api/tasks',
        data: {
            name: name,
            description: description,
            status: status,
        },
        success: function (result) {
            loadTasks();
        }
    })
}
function openEdit(id){
    $.ajax({
        type: 'GET',
        url: 'api/tasks/'+id,
        success: function (result) {
            $('#edit_name').val(result.name);
            $('#edit_description').val(result.description);
            if(parseInt(result.status) > 0){
                $('#edit_status').html(
                    '<option value="0">0</option><option value="1" selected>1</option>'
                );
            } else {
                $('#edit_status').html(
                    '<option value="0" selected>0</option><option value="1">1</option>'
                );
            }
            $('#edit_close').after('<button id="edit_save" onclick="saveEdit('+result.id+')">Save</button>');
            $('#edit').css('display', 'block');
        }
    })
}
function closeOverlay() {
    $('#edit').css('display', 'none');
    $('#edit_save').remove();
}
function saveEdit(id) {
    var name = $('#edit_name').val();
    var description = $('#edit_description').val();
    var status = $('#edit_status').val();
    $.ajax({
        type: 'PUT',
        url: 'api/tasks/'+id,
        data: {
            name: name,
            description: description,
            status: status,
        },
        success: function (result) {
            $('#edit').css('display', 'none');
            $('#edit_save').remove();
            loadTasks();
        }
    });
}

