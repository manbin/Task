<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .overlay {
            position: fixed;
            top: 20vh;
            left: calc(50% - 300px);
            background: white;
            border: 1px solid black;
            height: 300px;
            width: 600px;
        }
    </style>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="/Task/resources/js/app.js"></script>
</head>
<body>



<div class="flex-center">
    <div class="content">
        <div class="title m-b-md">
            Tasks
        </div>
        <div class="create">
            <input type="text" id="name" placeholder="name">
            <textarea id="description"></textarea>
            <select id="status">
                <option value="0">0</option>
                <option value="1">1</option>
            </select>
            <button onclick="createTask()">create</button>
        </div>
        <div class="tasks">

        </div>
    </div>
</div>

<div style="display: none" class="overlay" id="edit">
    <input style="display: block" type="text" id="edit_name" placeholder="name">
    <textarea style="display: block" id="edit_description"></textarea>
    <select id="edit_status">
    </select>
    <button id="edit_close" onclick="closeOverlay()">Close</button>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        loadTasks();
    });
</script>
