<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheets/login.css">
    <style>
        body{
            height: 100vh;
        }
    </style>

</head>

<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Sign in</h2>
            <form id="login-form">
                <div class="form-group">
                    <input type="text" id="username" name="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit">Login</button>
            </form>
            <div class="error-message" id="login-error"></div>
        </div>
    </div>
    <script src="javascripts/login.js"></script>
</body>
</html>
