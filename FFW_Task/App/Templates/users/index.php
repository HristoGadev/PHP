<?php /** @var \App\Data\UserDTO [] $data */
?>
<head>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

</head>

<style>
    #myInput {
        background-image: url(); /* Add a search icon to input */
        background-position: 10px 12px; /* Position the search icon */
        background-repeat: no-repeat; /* Do not repeat the icon image */
        width: 100%; /* Full-width */
        font-size: 16px; /* Increase font-size */
        padding: 12px 20px 12px 40px; /* Add some padding */
        border: 1px solid #ddd; /* Add a grey border */
        margin-bottom: 12px; /* Add some space below the input */
    }

    #myUL {
        /* Remove default list styling */
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #myUL li a {
        border: 1px solid #ddd; /* Add a border to all links */
        margin-top: -1px; /* Prevent double borders */
        background-color: #f6f6f6; /* Grey background color */
        padding: 12px; /* Add some padding */
        text-decoration: none; /* Remove default text underline */
        font-size: 18px; /* Increase the font-size */
        color: black; /* Add a black text color */
        display: block; /* Make it into a block element to fill the whole list */
    }

    #myUL li a:hover:not(.header) {
        background-color: #eee; /* Add a hover effect to all links, except for headers */
    }

    body {
        background-color: #A89465;
        font-family: 'Calibri';
    }

    main table {
        width: 100%;
        border: 1px solid #FEAE00;
        border-spacing: 0px;
    }

    main th, td {
        width: 25%;
        padding: 15px;
        text-align: left;
    }

    main td {
        vertical-align: bottom;
    }

    main th {
        background-color: #feae00;
        color: white;
    }

    main table img {
        width: 100px;
        height: auto;
    }

    main tr:nth-child(odd) {
        background-color: beige;
    }

    .topnav {
        background-color: #333;
        overflow: hidden;
    }

    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a.logo {
        padding: 0px;
        padding-top: 4px;
    }

    .topnav a.right {
        float: right;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #FEAE00;
        color: white;
    }

    h3 {
        color: white;
    }

</style>
<nav>

    <div class="topnav">
        <a class="left">Users Galeries</a>
        <a class="right"> <?php if (isset($_SESSION['id'])) {
                echo $_SESSION['name'];
            }
            ?></a>
    </div>
</nav>
<?php foreach ($data as $user): ?>
    <form method="POST">
        <ul id="myUL">
            <li><a><?= $user->getUsername() ?></a></li>
        </ul>
        <button type="submit" name="gallery" value="<?= $user->getUsername() ?>">Go to gallery</button>
        <button type="submit" name="profile" value="<?= $user->getUsername() ?>">Go to profile</button>

    </form>

<?php endforeach; ?>


<div class="container signin"> <?php if (!isset($_SESSION['id'])) {
        echo ' <p>Already have an account? <a href="login.php">Login</a>.</p>';
        echo ' <p>If you don`t have an account? <a href="register.php">Register</a>.</p>';
    }
    ?>

</div>

