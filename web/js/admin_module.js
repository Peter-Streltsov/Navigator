/**
 * requests organisation data form from OrgDataController
 */
$('#organisation').on('click', function () {
    $.ajax({
        url: "/control/admin/orgdata",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show("slow");
        }
    });
});

/**
 * requests saved languages list from admin/languages controller
 */
$('#languages').click(function () {
    $.ajax({
        url: "/control/admin/data/languages",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show(2000);
        }
    });
});

/**
 *
 */
$('#magazines').click(function () {
    $.ajax({
        url: "/control/admin/data/magazines",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show(2000);
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#users').click(function () {
    $.ajax({
        url: "/control/admin/users",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show(2000);
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#departments').click(function () {
    $.ajax({
        url: "/control/admin/orgdata/departments",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show(2000);
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#positions').click(function () {
    $.ajax({
        url: "/control/admin/positions",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show(2000);
        }
    });
});
