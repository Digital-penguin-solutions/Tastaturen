$(document).ready(on_ready_product_scroller);

var sliding = false;

function on_ready_product_scroller () {

    init_product_slider();
    init_arrows();

}

function init_arrows(arrow_l, arrow_r, container){
    $(arrow_l).click(function(){
        move(false, container);
    });

    $(arrow_r).click(function(){
        move(true, container);
    });

}
function init_product_slider(){
    var slider_containers = document.getElementsByClassName("product_slider_container");

    for(var i = 0; i < slider_containers.length; i++){
        var container = slider_containers[i];

        var left_arrow = container.getElementsByClassName("i_products_arrow_r");
        var right_arrow = container.getElementsByClassName("i_products_arrow_l");

        init_arrows(left_arrow, right_arrow, container);

        var products = container.getElementsByClassName("i_products_sliders");

        for(var n = 0; n < products.length; n++){
            var product = products[n];

            var product_width = get_width_in_percentage(product);


            var left = product_width*n + "%";
            $(product).css("left", left);
        }

    }
}

function move(left, products_container){
    if(!sliding){
        sliding = true;

        var dir = 1;

        if(left){
            dir = -1;
        }

        var products = products_container.getElementsByClassName("i_products_sliders");

        var product_width = get_width_in_percentage(products[0]);

        // if you've gone all the way to the right
        if($(products[0]).css("left") == "0px" && left){
            dir = 0;
        }

        var num_showing = Math.round(100 / product_width); // how many products that are visible at one time

        // if there are fewer products than what can be shown
        if(products.length < num_showing){
            dir = 0;
        }

        
        var last_left = Math.round(product_width * (num_showing-1)); 
        var last_product_left = Math.round(get_left_in_percentage(products[products.length-1]));

        // if you have gone all the way to the left
        if(last_product_left == last_left && !left){
            dir = 0;
        }

        //var products_container = arrow.parentNode;



        for(var n = 0; n < products.length; n++){
            var product = products[n];

            var old_left = get_left_in_percentage(product);

            var new_left = (old_left - product_width*dir) + "%";

            /*$(product).css("left", new_left);*/
            $(product).animate({
                left: new_left
            }, 500, function(){
                sliding = false;
            });

        }


    }


}

function get_left_in_percentage(element){
    var left = $(element).clone().appendTo('body').wrap('<div class = "remove_me" style="display: none"></div>').css('left');
    left = left.substr(0, left.length-1); // remove the % symbol
    $(".remove_me").remove();
    return left;
}

function get_width_in_percentage(element){
    var width = $(element).clone().appendTo('body').wrap('<div class = "remove_me" style="display: none"></div>').css('width');
    width = width.substr(0, width.length-1); // remove the % symbol
    $(".remove_me").remove();
    return width;

}

