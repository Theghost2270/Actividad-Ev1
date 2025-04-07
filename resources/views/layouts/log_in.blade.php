<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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
            width: 300px;
        }
        h1 {
            background-color:rgba(21, 25, 29, 0.74);
            color: white;
            padding: 10px;
            border-radius: 10px;
            font-size: 24px;
        }
        input {
            width: 93%;
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
        .separator {
            margin: 20px 0;
            display: flex;
            align-items: center;
        }
        .separator::before,
        .separator::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid white;
        }
        .separator span {
            margin: 0 10px;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 26px;
            margin-bottom: 10px;
        }
        .social-icons img {
            width: 35px;
            height: 30px;
            cursor: pointer;
        }
        .register-link {
            margin-top: 10px;
            font-size: 14px;
        }
        .register-link a {
            color:rgb(152, 176, 199);
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Log In</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="email@gmail.com" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="button">Log in with email</button>
        </form>
        
        <div class="register-link">Don't have an account? <a href="{{ route('sign_up') }}">Sign Up</a></div>
    </div>
</body>
</html>
