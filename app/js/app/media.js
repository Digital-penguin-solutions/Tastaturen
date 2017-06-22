$(document).ready(on_ready_admin_media);

function on_ready_admin_media(){
    var element = document.getElementsByClassName("select_type")[0];
    if(element != undefined){
        update_inputs(element);
    }

    $(".i_media_inner").click(function(){
        var id = $(this).attr("media_id");
        $("#i_load_container").load("views/media_event.php?media_id="+id,{}, function(){
            init_single_post();
        });
    });
}

function init_single_post(){

    $(".media_even").click(function(e){
        // if the click is outside the actual post
        if($(e.target).hasClass("media_even")){
            $("#i_load_container").html("");
        }
    } );

    $(".media_even_close").click(function(){
        $("#i_load_container").html("");
    } );
}

function update_inputs(element){
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
