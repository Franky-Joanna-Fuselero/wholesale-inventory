<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <style>
        body {
            margin: 0; 
            font-family: Arial, sans-serif; 
            background: #003B71; /* dark blue background */
            color: #fff;
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh;
        }
        .login-container {
            background: #fff;
            color: #003B71;
            padding: 2rem;
            border-radius: 8px;
            width: 320px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        .login-container h2 {
            margin-bottom: 1rem;
            color: #003B71;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 0.25rem;
            font-weight: bold;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        button {
            width: 100%;
            background-color: #FFD100; /* yellow button */
            border: none;
            padding: 0.75rem;
            border-radius: 4px;
            color: #003B71;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #e6c900;
        }
        .error {
            background-color: #f8d7da;
            color: #842029;
            padding: 0.5rem;
            border-radius: 4px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        @if($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
