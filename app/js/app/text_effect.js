

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

        $(".text-effect").appear();

        //setTimeout(function() {start_effect(text); }, 500);
        //$("body").on('appear', ".text-effect", function(event, $ef) {
        $(document.body).on('appear', ".text-effect", function(event, $ef) {
            console.log("appear123");
            if(!$(this).hasClass("text-effect-done")){
                $(this).addClass("text-effect-done");
                var obj = this;
                setTimeout(function(){start_effect(obj);}, 100)
            }
        });

        $(text).on("mouseenter", function(){
            //start_effect(text);
        });
    }
	$.force_appear();
	setTimeout(function()
	{
		$.force_appear();
	}, 500);
}

function start_effect(element) {
    
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
    var effect_duration = 220;

    if(i >= letters.length){
        /*
        setTimeout(function(){
            for (var k = 0; k < letters.length; k++) {
                var letter = letters[k];
                console.log(k);
                $(letter).velocity({
                    color: "#FFFFFF"
                },{
                    duration: effect_duration
                });
            }
        }, 1000);
        console.log("stop");
        */
        return;
    }

    var letter = letters[i];
    
    $(letter).velocity({
        translateZ:0,
        rotateX: "3deg",
        rotateZ: "3deg",
        rotateY: "3deg",
        opacity: 1
        //color: "#"

    },{
        duration: effect_duration,
        complete: function(){
            $(letter).velocity({
                //translateZ:0,
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

    setTimeout(function(){effect_letter(letters, i); }, effect_duration/3);
}
