function close_edit_view(){
    $("#editor").css("display", "none");
}
function show_edit_view(element){
    $("#editor").css("display", "block");

    var span = $(element).find("span");
    var old = $(span).text();
    old = old.trim();

    var name = $(element).attr("name");

    $(".edit_name").val(name);
    $(".edit_text_new").val(old);
    $(".edit_text_old").val(old);
}
