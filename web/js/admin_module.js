/**
 * upload selector actions
 */
$('#upload').change(function () {
    var select = $('#upload').val();
    switch (select) {
        case '1':
            $.ajax({
                url: "/workspace/units/articles/journals/ajaxcreate",
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
                url: "/workspace/articles/conferences/ajaxcreate",
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
                url: "/workspace/articles/collections/ajaxcreate",
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
        case '4':
            $('#holder').hide();
            var info = '<br><br>' +
                '<div class="alert alert-warning" role="alert">' +
                'Функция отключена в данной версии' +
                '</div>' +
                '<br>';
            $('#holder').html(info);
            $('#holder').show("blind");
            break;
        case '5':
            $.ajax({
                url: "/workspace/dissertations/ajaxcreate",
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
                url: "/workspace/articles/conferences/ajaxcreate",
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
 *
 */

/**
 * requests organisation data form from OrgDataController
 */
$('#organisation').on('click', function () {
    $.ajax({
        url: "/workspace/admin/orgdata",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
                //.show("blind");
        }
    });
});

/**
 * requests saved languages list from admin/languages controller
 */
$('#languages').click(function () {
    $.ajax({
        url: "/workspace/admin/data/languages",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
        }
    });
});

/**
 *
 */
$('#magazines').click(function () {
    $.ajax({
        url: "/workspace/admin/data/magazines",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#users').click(function () {
    $.ajax({
        url: "/workspace/admin/users",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#departments').click(function () {
    $.ajax({
        url: "/workspace/admin/orgdata/departments",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#positions').click(function () {
    $.ajax({
        url: "/workspace/admin/positions",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#clearup').click(function () {
    $('#holder').html('');
    $('#holder').show("blind");
});
