
/**
 * loading user messages to 'holder' div
 */
$('#messages').click(function () {
    $('#holder').html('');
    $('#holder').show("blind");
    $.ajax({
        url: "/workspace/admin/messages/users",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
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
});

/**
 *
 */
$('#telemetry').click(function () {
    $('#holder').html('');
    $('#holder').show("blind");
    $.ajax({
        url: "/workspace/admin/data/telemetry",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
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
});

/**
 * upload selector actions
 */
$('#upload').change(function () {
    $('#dataselect option:selected').each(function(){
        this.selected=false;
    });
    var select = $('#upload').val();
    switch (select) {
        case '1':
            $.ajax({
                url: "/workspace/publications/articles/journals/create-ajax",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#holder').hide();
                    $('#holder').html(response);
                    $('#holder').show("blind");
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
            break;
        case '2':
            $.ajax({
                url: "/workspace/publications/articles/conferences/create-ajax",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#holder').hide();
                    $('#holder').html(response);
                    $('#holder').show("blind");
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
                }
            });
            break;
        case '3':
            $.ajax({
                url: "/workspace/publications/articles/collections/create-ajax",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#holder').hide();
                    $('#holder').html(response);
                    $('#holder').show("blind");
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
            break;
        /*case '4':
            $('#holder').hide();
            var info = '<br><br>' +
                '<div class="alert alert-warning" role="alert">' +
                'Функция отключена в данной версии' +
                '</div>' +
                '<br>';
            $('#holder').html(info);
            $('#holder').show("blind");
            break;*/
        case '4':
            $.ajax({
                url: "/workspace/publications/monograph/create-ajax",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#holder').hide();
                    $('#holder').html(response);
                    $('#holder').show("blind");
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
            break;
        case '5':
            $.ajax({
                url: "/workspace/publications/dissertations/create-ajax",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#holder').hide();
                    $('#holder').html(response);
                    $('#holder').show("blind");
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
            break;
    }
});

/**
 * loading saved data forms - selector - #dataselect
 */

$('#dataselect').change(function () {
    $('#upload option:selected').each(function(){
        this.selected=false;
    });
    var select = $('#dataselect').val();
    switch (select) {
        case '1':
            $.ajax({
                url: "/workspace/admin/orgdata",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#holder').hide();
                    $('#holder').html(response);
                    $('#holder').show("blind");
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
            break;
        case '2':
            $.ajax({
                url: "/workspace/admin/orgdata/departments",
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
            break;
        case '3':
            $.ajax({
                url: "/workspace/admin/positions",
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
            break;
        case '4':
            $.ajax({
                url: "/workspace/admin/users",
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
            break;
        case '5':
            $.ajax({
                url: "/workspace/admin/data/languages",
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
            break;
        case '6':
            $.ajax({
                url: "/workspace/admin/data/magazines",
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
            break;
    }
});

/**
 * clear workspace
 */
$('#clearup').click(function () {
    $('#dataselect option:selected').each(function(){
        this.selected=false;
    });
    $('#upload option:selected').each(function(){
        this.selected=false;
    });
    $('#holder').html('');
    $('#holder').show("blind");
});


/*$('#backtouserlist').click(function () {
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
