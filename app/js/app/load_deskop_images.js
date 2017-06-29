$(document).ready(on_ready_load_images);

function on_ready_load_images(){
    var load_elements = $("[src_desktop_only]");

    for(var i = 0; i < load_elements.length; i++){
        var element = load_elements[i];
        if(isDesktop()){
            var path = $(element).attr("src_desktop_only");
            $(element).attr("src", path);
        }
        
    }
    //console.log(load_elements.length);
}

function isDesktop(){
    // if this div is visible, the user is on desktop
    return ($("#desktop_check").css('display') != "none");
}