
$(document).ready(function () {

    // Initialize sortable
    $("#sortable").sortable();

    // Save order
    $('#submit').click(function () {
        let imageids_arr = [];
        // get image ids order
        $('#sortable li').each(function () {
            let id = $(this).attr('id');
            let split_id = id.split("_");
            imageids_arr.push(split_id[1]);
        });

        // AJAX request
        $.ajax({

            url: '/FFW_Task/reorder.php',
            type: 'POST',
            data: {imageids: imageids_arr},

            success: function (response) {
                alert('Save successfully.');
            }

        });
    });
});