

$(document).ready(on_ready_text_effect);

//var effecting = [];
//var all_texts = [];

function on_ready_text_effect(){
    init_texts();
}

function init_texts(){
    var texts = document.getElementsByClassName("text-effect");

    for(var i = 0; i < texts.length; i++){
        var text = texts[i];
        var content = text.innerHTML;
        //all_texts[i] = text;
        //effecting[i] = false;

        text.innerHTML = "";

        for(var n = 0; n < content.length; n++){
            $(text).append("<span>" + content[n] + "</span>");
        }

        setTimeout(function() {start_effect(text); }, 500);
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
    var effect_duration = 100;

    var letter = letters[i];
    
    $(letter).velocity({
        translateZ:0,
        //translateX: "200px",
        rotateX: "5deg",
        rotateZ: "5deg"

    },{
        duration: effect_duration,
        complete: function(){
            $(letter).velocity({
                translateZ:0,
                rotateX: 0,
                rotateY:0,
                rotateZ:0

            },{
                duration: effect_duration
            }
            
            );
        }
        
        
    });


    console.log("i " +i);
    i = i + 1;

    setTimeout(function(){effect_letter(letters, i); }, effect_duration);

    
}
