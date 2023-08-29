<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .login-form h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        .login-form label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: lightcoral;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <form class="login-form" action="{{route('LoginController')}}" method="GET">
            @csrf
            <h1>Login</h1>        

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
