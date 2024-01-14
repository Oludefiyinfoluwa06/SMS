<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Student</title>
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
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            box-shadow: 0 0 10px #ccc;
        }

        nav a {
            color: #fff;
            background: #ccc;
            text-transform: uppercase;
            text-decoration: none;
            padding: 7px 10px;
            border-radius: 5px;
        }

        .student-profile {
            max-width: 400px;
            margin: 20px auto;
            box-shadow: 0 0 10px #ccc;
            padding: 20px;
            border-radius: 10px;
        }

        .student-profile h1 {
            text-align: center;
        }

        .student-profile .profile {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #ccc;
        }

        .profile p:first-child {
            font-weight: 600;
        }

        .buttons {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 1rem;
            margin-top: 20px;
        }

        .buttons button {
            width: 100%;
            padding: 7px;
            border: none;
            outline: none;
            background: #ccc;
            border-radius: 7px;
        }

        .buttons button a {
            color: #fff;
            text-decoration: none;
        }

        .buttons form {
            width: 100%;
        }

        .buttons form button {
            width: 100%;
            color: #fff;
            cursor: pointer;
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

    <div class="student-profile">
        <h1>{{$student->lastname}} {{$student->firstname}}</h1>
        <div class="profile">
            <p>Student ID</p>
            <p>{{$student->student_id}}</p>
        </div>
        <div class="profile">
            <p>Email</p>
            <p>{{$student->email}}</p>
        </div>
        <div class="profile">
            <p>Phone</p>
            <p>{{$student->phone}}</p>
        </div>
        <div class="profile">
            <p>Entry Year</p>
            <p>{{$student->entry_year}}</p>
        </div>
        <div class="profile">
            <p>Date of Birth</p>
            <p>{{$student->dob}}</p>
        </div>
        <div class="profile">
            <p>Gender</p>
            <p>{{$student->gender}}</p>
        </div>
        <div class="profile">
            <p>Nationality</p>
            <p>{{$student->nationality}}</p>
        </div>

        <div class="buttons">
            <button><a href="/edit_profile/{{$student->id}}">Edit Student Profile</a></button>
            <form action="{{route("delete_student", ['studentId' => $student->id])}}" method="POST">
                @csrf
                @method('delete')
                <button>Delete Student</button>
            </form>
        </div>
    </div>
</body>
</html>