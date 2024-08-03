<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .index-login {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            width: 80%;
            max-width: 900px;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .index-login-signup, .index-login-login {
            width: 45%;
            display: none;
        }
        .index-login h4 {
            text-align: center;
            margin-bottom: 20px;
        }
        .index-login p {
            text-align: center;
            margin-bottom: 20px;
        }
        .index-login form {
            display: flex;
            flex-direction: column;
        }
        .index-login input {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
        .index-login button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
        }
        .index-login button:hover {
            background-color: #0056b3;
        }
        .toggle-buttons {
            text-align: center;
            margin-bottom: 20px;
        }
        .toggle-buttons button {
            margin: 0 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
        }
        .toggle-buttons button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <section class="index-login">
        <div class="toggle-buttons">
            <button onclick="showForm('signup')">Sign Up</button>
            <button onclick="showForm('login')">Login</button>
        </div>
        <div class="index-login-signup">
            <h4>SIGN UP</h4>
            <p>Don't have an account yet? Sign up here!</p>
            <form action="./includes/signup_inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username" required>
                <input type="password" name="pwd" placeholder="Password" required>
                <input type="password" name="pwdrepeat" placeholder="Repeat Password" required>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit" name="submit_signup">SIGN UP</button>
            </form>
        </div>
        <div class="index-login-login">
            <h4>LOGIN</h4>
            <p>Already have an account? Log in here!</p>
            <form action="./includes/login_inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username" required>
                <input type="password" name="pwd" placeholder="Password" required>
                <button type="submit" name="submit_login">LOGIN</button>
            </form>
        </div>
    </section>
    <script>
        function showForm(formType) {
            const signupForm = document.querySelector('.index-login-signup');
            const loginForm = document.querySelector('.index-login-login');
            if (formType === 'signup') {
                signupForm.style.display = 'block';
                loginForm.style.display = 'none';
            } else if (formType === 'login') {
                signupForm.style.display = 'none';
                loginForm.style.display = 'block';
            }
        }

        // Show the login form by default
        showForm('login');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


