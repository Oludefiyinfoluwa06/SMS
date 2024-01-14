<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        form {
            max-width: 400px;
            box-shadow: 0 0 10px #ccc;
            border-radius: 10px;
            padding: 20px;
            margin: 40px auto;
            font-family: sans-serif;
        }

        legend {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        form .input-box {
            width: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            flex-direction: column;
        }

        .input-box input {
            width: 94%;
            padding: 3px 9px;
            margin: 10px 0;
        }

        form button {
            width: 100%;
            cursor: pointer;
            padding: 5px;
            text-transform: uppercase;
        }

        form p {
            text-align: center;
            font-size: 17px;
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
    <form action="" method="POST">
        @csrf
        <legend>Register</legend>
        <div class="input-box">
            <label for="name">Name</label>
            <input type="text" placeholder="Enter your name" name="name" id="name" />
            @error('name')
                <p style="width: 100%; background:#f8d7da; color: #721c24; text-align: left; padding: 7px;">{{$message}}</p>
            @enderror
        </div>
        <div class="input-box">
            <label for="email">Email</label>
            <input type="email" placeholder="Enter your email" name="email" id="email" />
            @error('email')
                <p style="width: 100%; background:#f8d7da; color: #721c24; text-align: left; padding: 7px;">{{$message}}</p>
            @enderror
        </div>
        <div class="input-box">
            <label for="password">Password</label>
            <input type="password" placeholder="Enter your password" name="password" id="password" />
            @error('password')
                <p style="width: 100%; background:#f8d7da; color: #721c24; text-align: left; padding: 7px;">{{$message}}</p>
            @enderror
        </div>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="/login">Login</a></p>
    </form>
</body>
</html>