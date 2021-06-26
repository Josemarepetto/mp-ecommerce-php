$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                iniciarCheckoutPro(data);
            },
            error: function() {
                alert("Error");
            }
        });
    });

    function iniciarCheckoutPro(initPoint) {
        $(location).attr('href', initPoint);
    }
});