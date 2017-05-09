$(document).ready(on_ready_product_scroller);

var sliding = false;

function on_ready_product_scroller () {

    console.log("kör0");
    init_product_slider();
    init_arrows();

}

function init_arrows(arrow_l, arrow_r){
    $(arrow_l).click(function(){
        move(false);
    });

    $(arrow_r).click(function(){
        move(true);
    });

}
function init_product_slider(){
    var slider_containers = document.getElementsByClassName("product_slider_container");

    for(var i = 0; i < slider_containers.length; i++){
        var container = slider_containers[i];

        var left_arrow = container.getElementsByClassName("i_products_arrow_l");
        var right_arrow = container.getElementsByClassName("i_products_arrow_r");

        init_arrows(left_arrow, right_arrow);

        var products = container.getElementsByClassName("i_products_sliders");

        for(var n = 0; n < products.length; n++){
            var product = products[n];
            console.log(product);

            var product_width = get_width_in_percentage(product);
            console.log(product_width);


            var left = product_width*n + "%";
            console.log(left);
            $(product).css("left", left);
        }

    }
}

function move(right){
    if(!sliding){
        sliding = true;
        var dir = 1;

        if(right){
            dir = -1;
        }

        var arrow_tmp = document.getElementsByClassName("i_products_arrow_l")[0];
        var products_container = arrow_tmp.parentNode;

        var products = products_container.getElementsByClassName("i_products_sliders");

        var product_width = get_width_in_percentage(products[0]);

        for(var n = 0; n < products.length; n++){
            var product = products[n];

            var old_left = get_left_in_percentage(product);
            console.log(old_left);

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
    var left = $(element).clone().appendTo('body').wrap('<div style="display: none"></div>').css('left');
    left = left.substr(0, left.length-1); // remove the % symbol
    return left;
}

function get_width_in_percentage(element){
    var width = $(element).clone().appendTo('body').wrap('<div style="display: none"></div>').css('width');
    width = width.substr(0, width.length-1); // remove the % symbol
    return width;

}

