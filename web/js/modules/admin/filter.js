/**
 *
 */
$(document).ready(function(){
    $("#searchinput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#syntable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
