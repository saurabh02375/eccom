function reply_review(review_id, property_id) {



    var loginForm = $('#reply_form').closest("form");
    var loginFormData = new FormData(loginForm[0]);
    loginFormData.append('review_id', review_id);
    loginFormData.append('property_id', btoa(property_id));
    var url = "/review-reply/" + review_id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: 'POST',
        data: loginFormData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $(".loader-wrapper").show();
        },
        success: function (response) {

            $(".loader-wrapper").css("display", "none");
            if (response.success == true) {
                show_message("Reply has been given successfully", 'success');
                setTimeout(function () {
                    location.reload();
                }, 1500);
            }
            else {
                $('span[id*="_error' + id + '"]').each(function () {
                    var id = $(this).attr('id');
                    if (id in response.errors) {
                        $("#" + id).html(response.errors[id]);
                    } else {
                        $("#" + id).html('');
                    }
                });
                $('span[id*="_error' + id + '"]').each(function () {
                    var id = $(this).attr('id');
                    if (id in response.errors) {
                        $('html, body').animate({
                            scrollTop: $("#" + id).parent().offset()
                                .top -
                                50
                        }, 200);
                        return false;
                    }
                });
            }
        }
    });
}
