console.log("KKKKKKKKKKKKKKÖR");
function close_edit_view(){
    $("#editor").css("visibility", "hidden");
}
function show_edit_view(element){
    $("#editor").css("visibility", "visible");

    //var old = (element.textContent===undefined) ? element.innerText : element.textContent;
    var old = $(element).text();
    old = old.trim();
    var name = $(element).attr("name");

    $(".edit_name").val(name);

    $(".edit_text_new").val(old);
    $(".edit_text_old").val(old);
}

