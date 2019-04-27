
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
