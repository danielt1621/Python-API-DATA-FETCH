<!--Log in handler-->
<?php
session_start(); //session start to keep the user's cookies

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    
    if ($password === '0000') { //passwod checking and handling //Should look for a way to encrypt this password
        $_SESSION['logged_in'] = true;
        header('Location: main.html');
        exit;
    } else {
        $error = 'Invalid password.'.'<br>'.'If forgot your password, contact your admin.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BS API Tool</title>
    <link rel="icon" type="image/png" href="assets/logo_small.JPG">
    <!--  CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            /*background-color: #f0f0f0;*/
            background-image: linear-gradient(to right, #27398F, #4557B3);
            color:  #003d82;
        }
        .login-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            /*box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);*/
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out forwards;
        }
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input {
            margin: 0.5rem 0;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            margin-top: 1rem;
            padding: 0.5rem;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #003d82;
        }
        img{
            margin: auto;
        }
        .copyright-notice {
    position: fixed;
    bottom: 0;
    left: 0;
    font-size: 12px;
    color: #ffffff;
    padding: 5px;
    background-color: #003d82;
    border-top: 1px solid #ddd;
    width: 100%;
    text-align: left;
}

    </style>
</head>
<body>
    <div class="login-container">
    <img src="assets/logo_big.JPG" alt="BS Logo" class="logo">
        <h1 style="color: #003d82;">API Tool</h1>
        <?php if (isset($error)): ?> <!--Error handling in case the user inputs a wrong password-->
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="password" name="password" placeholder="Enter password" required>
            <button type="submit">Login</button>
        </form>
    </div>



    <footer class="copyright-notice">
        &copy; BS API TOOL v1, Daniel Tsavalos
    </footer>
</body>
</html>