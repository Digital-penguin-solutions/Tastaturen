$(document).ready(on_ready);

var fade_duration = 0;
var nav_menu_visible = true;
var button_open_color = "white";
var button_closed_color = "white";

var McButton = $("[data=hamburger-menu]");
var McBar1 = McButton.find("b:nth-child(1)");
var McBar2 = McButton.find("b:nth-child(2)");
var McBar3 = McButton.find("b:nth-child(3)");

var nav_in_animation = false;

//when the code is loaded and teh device in question is a mobil run functions
function on_ready () {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $(".nav_d").css("visibility", "visible");

        init_mc_button();

        init_nav_links();

        toggle_nav_menu();
        fade_duration = 500;
    }
}

// Toggel the meneu
function toggle_nav_menu(){
    nav_menu_visible = !nav_menu_visible;

    $(".nav_d").fadeToggle(fade_duration);

    // changes the color on the hamburger menu
    if (nav_menu_visible){
        jQuery(".McButton b").animate({"background-color" : button_open_color}, fade_duration);
    }
    else{
        jQuery(".McButton b").animate({"background-color" : button_closed_color}, fade_duration);
    }
}

//
function init_mc_button(){

    // hamburger menu
    var McButton = $("[data=hamburger-menu]");
    var McBar1 = McButton.find("b:nth-child(1)");
    var McBar2 = McButton.find("b:nth-child(2)");
    var McBar3 = McButton.find("b:nth-child(3)");

    $(McButton).click( function() {
        toggle_nav(false);
    });
}

//
function toggle_nav(override_animation){

    // hamburger menu
    var McButton = $("[data=hamburger-menu]");
    var McBar1 = McButton.find("b:nth-child(1)");
    var McBar2 = McButton.find("b:nth-child(2)");
    var McBar3 = McButton.find("b:nth-child(3)");

    if (!nav_in_animation || override_animation) {
        nav_in_animation = true;
        var speed_scale = 0.8;

        toggle_nav_menu();

        $(McButton).toggleClass("active");

        if (McButton.hasClass("active")) {
            McBar1.velocity({ top: "50%" }, {duration: 200 * speed_scale, easing: "swing"});
            McBar3.velocity({ top: "50%" }, {duration: 200 * speed_scale, easing: "swing"})
                .velocity({rotateZ:"90deg"}, {duration: 800 * speed_scale, delay: 200, easing: [500,20] });
            McButton.velocity({rotateZ:"135deg"}, {duration: 800 * speed_scale, delay: 200, easing: [500,20],
                complete: function()
                {
                    nav_in_animation = false; // when the animation is done
                }
            });
        } else {
            McButton.velocity("reverse");
            McBar3.velocity({rotateZ:"0deg"}, {duration: 800 * speed_scale, easing: [500,20] })
                .velocity({ top: "100%" }, {duration: 200 * speed_scale, easing: "swing"});

            McBar1.velocity("reverse", {delay: 800 * speed_scale,
                complete: function()
                {
                    nav_in_animation = false;// when the animation is done
                }
            });

        }
    }
}

//
function init_nav_links() {
    $(".nav_link").click(function(){
        toggle_nav(true);
    });
}