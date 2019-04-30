<?php /** @var \App\Data\UserDTO $data */
 ?>
<head xmlns="http://www.w3.org/1999/html">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style>
    <?php include 'css/profile.css'?>
</style>
<body>
<header>
    <nav>
        <div class="topnav">
            <a href="index.php">Users info</a>
            <a class="right"><span class="glyphicon glyphicon-user"> User: <?= $_SESSION['targetName'] ?></span></a>
            <a class="right"> <?php if ($data->getUsername() === $_SESSION['targetName']) {
                    echo "Email: {$data->getEmail()}";
                } ?></a>
            <form method="POST">
                <a href="logout.php"> Log out</a>
            </form>
        </div>
    </nav>

    <?php if ($data->getUsername() === $_SESSION['targetName']) {
        echo '<div class="container" style="width:500px;"> 
            
        
        <h3 align="center">Insert pictures</h3>
        <br/>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="image" id="image"/>
            <br/>

            <div class="radio">
                <label><input type="radio" name="optradio" value="Private" checked>Private</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="optradio" value="Public">Public</label>
            </div>
            <div class="radio ">
                <label><input type="radio" name="optradio" value="Protected">Protected</label>
            </div>
            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info"/>
        </form>
        <br/>
        <br/>';

    } else {
        echo' <div class="container" style="width:500px;">';

        echo '<h3 > Hello,if you want to see mine pictures please go to users gallery :). Have a nice day!</h3>';
        echo '<button type="button" name="gallery" class="btn btn-primary"> Go to users galleries</button>';
        echo' </div>';
    }
    ?>
</header>
</body>

<script>
   <?php include 'js/checkImage.js'?>
</script>