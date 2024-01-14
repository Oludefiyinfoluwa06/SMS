<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .message {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            text-align: center;
            background: #0dd85e;
            color: #fff;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            box-shadow: 0 0 10px #ccc;
        }

        nav a, .students .title a {
            color: #fff;
            background: #ccc;
            text-transform: uppercase;
            text-decoration: none;
            padding: 7px 10px;
            border-radius: 5px;
        }

        .students {
            padding: 30px;
        }

        .students .title {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    @if (session()->has('message'))
        <div class="message" x-data="{show: true}" x-init="setTimeout(() => show=false,3000)" x-show="show">
            <p>{{session()->get('message')}}</p>
        </div>
    @endif
    
    <nav>
        <label>Welcome, {{$username}}</label>
        <a href="{{route('logout')}}">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
    </nav>

    <div class="students">
        <div class="title">
            <h1>All Students</h1>
            <a href="/add_student">Add Student <i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>
        @if ($students->count() > 0)
            <table>
                <thead>
                    <th>Fullname</th>
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Entry year</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td><a href="/{{$student->id}}" style="color: blue; text-decoration: none;">{{$student->lastname}} {{$student->firstname}}</a></td>
                            <td>{{$student->student_id}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->entry_year}}</td>
                            <td>{{$student->dob}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->nationality}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No students are available</p>
        @endif
    </div>
</body>
</html>