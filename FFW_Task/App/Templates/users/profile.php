<?php /** @var \App\Data\UserDTO $data */ ?>
<head xmlns="http://www.w3.org/1999/html">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
                <h3 class="mr-auto">Hello, <?= $data->getUsername()?></h3>
            </div>
                       <div class="toast-header">
                <h3 class="mr-auto"><?= $data->getEmail()?></h3>
            </div>
        </div>
    </div>
    <div class="container" style="width:500px;">
        <h3 align="center">Insert pictures</h3>
        <br />
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="image" id="image" />
            <br />

            <div class="radio">
                <label><input type="radio" name="optradio" value="Private" >Private</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="optradio" value="Public">Public</label>
            </div>
            <div class="radio ">
                <label><input type="radio" name="optradio" value="Protected" >Protected</label>
            </div>
            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
        </form>
        <br />
        <br />
        <table class="table table-bordered">
            <tr>
                <th>Image</th>
            </tr>
</header>
</body>


</form>
<script>
    $(document).ready(function(){
        $('#insert').click(function(){
            var image_name = $('#image').val();
            if(image_name == '')
            {
                alert("Please Select Image");
                return false;
            }
            else
            {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert('Invalid Image File');
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>