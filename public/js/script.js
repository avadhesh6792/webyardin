jQuery(document).ready(function () {
    jQuery('#users-table').DataTable();
    jQuery('#send-news-btn').on('click', function (e) {
        e.preventDefault();
        var title = jQuery('#title').val();
        var description = jQuery('#description').val();

        if (title == '' || description == '') {
            title == '' ?  jQuery('#title-error').show() : jQuery('#title-error').hide();
            description == '' ? jQuery('#description-error').show() : jQuery('#description-error').hide();
        } else {
            jQuery('#title-error').hide();
            jQuery('#description-error').hide();
            jQuery('#add-news-modal').modal('hide').on('hidden.bs.modal', function (e) {

                var data = {
                    title: title,
                    description: description
                };

                var jsonData = JSON.stringify(data);

                jQuery.ajax({
                    url: 'http://52.37.102.214/devyardin/yardin/webservice.php?action=send_news',
                    type: 'POST',
                    data: jsonData,
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function (response) {
                        //alert(response.title);
                        jQuery('#add-news-form').submit();
                    },
                    error: function (err) {
                        console.log(err);
                    }

                });

                //jQuery('#add-news-form').submit();
            });
        }

    });
});

