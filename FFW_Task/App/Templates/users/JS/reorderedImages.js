function reorderImg() {
    $(document).ready(function () {
        $('.reorder_link').on('click', function () {
            $("ul.reorder-photos-list").sortable({tolerance: 'pointer'});
            $('.reorder_link').html('save reordering');
            $('.reorder_link').attr("id", "saveReorder");
            $('#reorderHelper').slideDown('slow');
            $('.image_link').attr("href", "javascript:void(0);");
            $('.image_link').css("cursor", "move");

            $("#saveReorder").click(function (e) {
                if (!$("#saveReorder i").length) {
                    $(this).html('').prepend('<img src="images/refresh-animated.gif"/>');
                    $("ul.reorder-photos-list").sortable('destroy');
                    $("#reorderHelper").html("Reordering Photos - This could take a moment. Please don't navigate away from this page.").removeClass('light_box').addClass('notice notice_error');

                    var h = [];
                    $("ul.reorder-photos-list li").each(function () {
                        h.push($(this).attr('id').substr(9));
                    });

                    $.ajax({
                        type: "POST",
                        url: "z.php",
                        data: {ids: " " + h + ""},
                        success: function () {
                            window.location.reload();
                        }
                    });
                    return false;
                }
                e.preventDefault();
            });
        });
    });
}