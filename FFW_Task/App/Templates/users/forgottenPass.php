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
<style>body {
        background-color: #C2DDE9;
        font-family: 'Calibri';
    }</style>
<body>

<div class="container">
    <h2>Forgot password</h2>
    <p>You need to enter your username and we will send password by the email you register within.</p>
    <form class="form-inline" method="POST">

        <div class="form-group">
            <label>
                <input type="text"  class="form-control" name="username" placeholder="Username" required>
            </label>
        </div>
        <br/>
        <button type="submit" class="btn btn-success" name="forgot_pass">Send Password</button>
    </form>