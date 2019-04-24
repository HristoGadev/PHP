<?php /** @var \App\Data\UserDTO $data */
 ?>
<head xmlns="http://www.w3.org/1999/html">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style>
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
        text-align: center;
    }
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
                <label><input type="radio" name="optradio" value="Private">Private</label>
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
        echo '<button type="submit" name="gallery" class="btn btn-primary"> Go to users galleries</button>';
        echo' </div>';
    }
    ?>
</header>
</body>

<script>
    $(document).ready(function () {
        $('#insert').click(function () {
            let image_name = $('#image').val();
            if (image_name == '') {
                alert("Please Select Image");
                return false;
            }
            else {
                let extension = $('#image').val().split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert('Invalid Image File');
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>