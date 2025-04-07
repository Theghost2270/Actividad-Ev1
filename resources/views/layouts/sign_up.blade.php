<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(14, 17, 19);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            width: 320px;
        }
        h1 {
            background-color:rgba(21, 25, 29, 0.74);
            color: white;
            padding: 10px;
            border-radius: 10px;
            font-size: 24px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
            background-color: #333;
            color: white;
        }
        .button {
            width: 100%;
            padding: 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #333;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            gap: 5px;
        }
        .form-group input {
            width: 48%;
        }
        .data-group {
            width: 94%;
        }
        .birthday-group {
            display: flex;
            justify-content: space-between;
            gap: 5px;
        }
        .birthday-group input {
            width: 30%;
        }
        .register-link a {
            color:rgb(152, 176, 199);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="{{ route('sign_up.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="lastname" placeholder="Lastname" required>
            </div>
            <div class="data-group">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input id="phone" name="phone" type="text" required autofocus />
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="birthday-group">
                <input type="text" name="day" placeholder="DD" required>
                <input type="text" name="month" placeholder="MM" required>
                <input type="text" name="year" placeholder="YYYY" required>
            </div>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit" class="button">Sign Up</button>
        </form>
        <div class="register-link">Already have an account? <a href="{{ route('log_in') }}">Log In</a></div>
    </div>
</body>
</html>
