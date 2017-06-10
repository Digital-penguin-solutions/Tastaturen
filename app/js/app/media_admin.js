
$(document).ready(on_ready_admin_media);

function on_ready_admin_media(){
    var element = document.getElementsByClassName("select_type")[0];
    if(element != undefined){
        update_inputs(element);
    }
}

function update_inputs(element){
    console.log(element.value);
    var type = element.value;

    if(type == "image"){
        $(".image_post_only").show();
        $(".video_post_only").hide();
    }
    else {
        $(".image_post_only").hide();
        $(".video_post_only").show();

    }



}
