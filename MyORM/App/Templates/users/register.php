<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="../views/libs/style.css" />
<h1>REGISTER USER</h1>

<form method="POST">
    <div>
        Username: <label>
            <input type="text" name="username">
        </label>
    </div>
    <div>
        Password: <label>
            <input type="text" required name="password">
        </label>
    </div>
    <div>
        Confirm password: <label>
            <input type="text" name="confirm_password">
        </label>
    </div>
    <div>
        First Name: <label>
            <input type="text" name="firstName">
        </label>
    </div>
    <div>
        Last Name: <label>
            <input type="text" name="lastName">
        </label>
    </div>
    <div>
        Date of birth: <label>
            <input type="text" name="bornOn">
        </label>
    </div>
    <div>
        <input type="submit" name="register" value="Register">
    </div>
</form>

