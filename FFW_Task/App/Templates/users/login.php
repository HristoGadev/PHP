<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        background-color: #C2DDE9;
        font-family: 'Calibri';
    }
    h4{
        text-align: center;
    }
</style>
<body>

<div class="container">
    <h2>Please login</h2>
    <p>If you want to see all pictures and users profiles ,you have to login or register!</p>
    <form class="form-inline" method="POST">


        <button type="submit" class="btn btn-success" name="login">Login</button>
        <button type="submit" class="btn btn-success" name="pass">Forgot Password</button>
    </form>
    <div class="container signin"> <?php if (!isset($_SESSION['id'])) {

        echo' <h4>If you don`t have an account? <a href="register.php">Register</a>.</h4>';
            echo ' <h4> If you want to see all galleries? <a href="index.php">Galleries</a>.</h4>';
        }
        ?>

    </div>