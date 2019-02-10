/*$('#back').click(function () {
    //alert('Pressed');
    "use strict";
    console.log('button pressed');
    $.ajax({
        url: "/workspace/admin/users/index",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show("slow");
        },
        error: function(jqxhr, status, errorMsg) {
            var message = '<br><br>' +
                '<div class="alert alert-danger" role="alert">' +
                '<h4 class="alert-heading">Загрузка формы не удалась</h4>' +
                '<p>' + status + '</p>' +
                '<hr>' +
                '<p class="mb-0">Ошибка</p>' + errorMsg +
                '</div>' +
                '<br>';
            $('#holder').hide();
            $('#holder').html(message);
            $('#holder').show("blind");
        }});
});*/