<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student Profile</title>
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

        form {
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 20px auto;
        }

        legend {
            font-size: 30px;
            text-align: center;
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            color: #fff;
            background: #ccc;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <nav>
        <label>Welcome, {{$username}}</label>
        <a href="{{route('logout')}}">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
    </nav>

    <form action="{{ route('edit_student', ['studentId' => $student->id]) }}" method="POST">
        @csrf
        @method("PATCH")
        <legend>Edit Student Profile</legend>
        
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="{{$student->lastname}}">
        @error('lastname')
            <p style="width: 100%; background:#f8d7da; color: #721c24; padding: 7px; text-align: left;">{{$message}}</p>
        @enderror

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" value="{{$student->firstname}}">
        @error('firstname')
            <p style="width: 100%; background:#f8d7da; color: #721c24; padding: 7px; text-align: left;">{{$message}}</p>
        @enderror

        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" value="{{$student->student_id}}">
        @error('student_id')
            <p style="width: 100%; background:#f8d7da; color: #721c24; padding: 7px; text-align: left;">{{$message}}</p>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{$student->email}}">
        @error('email')
            <p style="width: 100%; background:#f8d7da; color: #721c24; padding: 7px; text-align: left;">{{$message}}</p>
        @enderror

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="{{$student->phone}}">
        @error('phone')
            <p style="width: 100%; background:#f8d7da; color: #721c24; padding: 7px; text-align: left;">{{$message}}</p>
        @enderror

        <label for="entry_year">Entry Year:</label>
        <input type="text" id="entry_year" name="entry_year" value="{{$student->entry_year}}">
        @error('entry_year')
            <p style="width: 100%; background:#f8d7da; color: #721c24; padding: 7px; text-align: left;">{{$message}}</p>
        @enderror

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="{{$student->dob}}">
        @error('dob')
            <p style="width: 100%; background:#f8d7da; color: #721c24; padding: 7px; text-align: left;">{{$message}}</p>
        @enderror

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="{{$student->gender}}">{{$student->gender}}</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        @error('gender')
            <p style="width: 100%; background:#f8d7da; color: #721c24; padding: 7px; text-align: left;">{{$message}}</p>
        @enderror

        <label for="nationality">Nationality:</label>
        <input type="text" id="nationality" name="nationality" value="{{$student->nationality}}">
        @error('nationality')
            <p style="width: 100%; background:#f8d7da; color: #721c24; padding: 7px; text-align: left;">{{$message}}</p>
        @enderror
        <button type="submit">Submit</button>
    </form>
</body>
</html>