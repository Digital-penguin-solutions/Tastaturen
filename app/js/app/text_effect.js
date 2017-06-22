

$(document).ready(on_ready_text_effect);

//var effecting = [];
//var all_texts = [];

function on_ready_text_effect(){
    init_texts();
}

function init_texts(){
    var texts = document.getElementsByClassName("text-effect");
    $(texts).css("display", "block");

    for(var i = 0; i < texts.length; i++){
        var text = texts[i];
        var content = text.innerHTML;
        //all_texts[i] = text;
        //effecting[i] = false;

        // empties the text
        text.innerHTML = "";

        // refills the letters in individuals spans
        for(var n = 0; n < content.length; n++){
            $(text).append("<span>" + content[n] + "</span>");
        }

        //setTimeout(function() {start_effect(text); }, 500);
        $("body").on('appear', ".text-effect", function(event, $ef) {
            if(!$(this).hasClass("text-effect-done")){
                $(this).addClass("text-effect-done");
                start_effect(this);
            }
        });

        $(text).hover(function(){
            //start_effect(text);
        });
    }
}

function start_effect(element){
    
    var letters = $(element).find("span");

    effect_letter(letters, 0);
    //for(var i = 0; i < letters.length; i++){
        //var letter = letters[i];
        //console.log(letter);

        ////$(letter).rotate(100);
    //}
    //console.log(letters.length);

}

function effect_letter(letters, i ){

    //var text_index = all_texts.index

    if(i >= letters.length){
        return;
    }
    var effect_duration = 120;

    var letter = letters[i];
    
    $(letter).velocity({
        translateZ:0,
        rotateX: "5deg",
        rotateZ: "5deg",
        color: "#DDDDDD"

    },{
        duration: effect_duration,
        complete: function(){
            $(letter).velocity({
                translateZ:0,
                rotateX: 0,
                rotateY:0,
                rotateZ:0,
                color: "#FFFFFF"

            },{
                duration: effect_duration
            }
            );
        }
    });

    i = i + 1;

    setTimeout(function(){effect_letter(letters, i); }, effect_duration);
}