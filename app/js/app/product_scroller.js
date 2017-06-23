$(document).ready(on_ready_product_scroller);

var all_product_sliders = [];
var all_product_num = [];
var all_current_left = [];

var currently_sliding = false;

var product_width;

function on_ready_product_scroller () {
    init_product_slider();
    init_arrows();
}

function init_arrows(arrow_l, arrow_r, container){

    //$(container.parentNode).on("swipeleft",function(){
        //move(false, container);
        //console.log("asdddddddddd");
    //});

    //$(container.parentNode).on("swiperight",function(){
        //move(true, container);
    //});

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

        all_product_sliders[i] = container;
        //all_current_left[i] = 0;

        var left_arrow = container.getElementsByClassName("i_products_arrow_r");
        var right_arrow = container.getElementsByClassName("i_products_arrow_l");

        init_arrows(left_arrow, right_arrow, container);

        var products = container.getElementsByClassName("i_products_sliders");

        all_product_num[i] = products.length;

        if(products.length > 0){
            product_width = get_width_in_percentage(products[0]);
        }

        for(var n = 0; n < products.length; n++){
            var product = products[n];
            //var product_width = get_width_in_percentage(product);
            var left = product_width*n + "%";
            $(product).css("left", left);
        }
    }
}

function move(left, products_container){

    var products_container = products_container.getElementsByClassName("i_products_slider")[0];
    var i = all_product_sliders.indexOf(products_container);

    if(currently_sliding === false){
        currently_sliding = true;

        var dir = -1;

        if(left){
            dir = 1;
        }

        var products = products_container.getElementsByClassName("i_products_sliders");
        //console.log(products);

        // if you've gone all the way to the left
        //if($(products[0]).css("left") == "0px" && left){
            //dir = 0;
        //}


        var num_showing = Math.round(100 / product_width); // how many products that are visible at one time

        // if there are fewer products than what can be shown
        if(products.length <= num_showing){
            currently_sliding = false;
            return;
        }

        //var old_left = get_left_in_percentage(products_container);
        //var old_left_r = get_left_in_percentage(products_container);
        var old_left = all_current_left[i];

        // it will be "auto" at first. Minus the o because the function removes last character
        if(old_left == "aut" || old_left == undefined){ 
            $(products_container).css("left", "0%");
            old_left = 0;
        }

        old_left = Math.round(old_left*1000) / 1000;

        // rounds to three decimals
        var new_left = old_left*1.0 + (product_width)*dir;
        new_left = (Math.round(new_left*1000) / 1000);



        // gets the current left value of the container
        //var current_left_real = get_left_in_percentage(products_container);
        var current_left_real = all_current_left[i];
        var current_left = Math.round(current_left_real);
        if(isNaN(current_left)){
            current_left = 0;
        }


        $(products_container).animate({
            left: (new_left + "%")
        },900,'easeOutQuint', function(){
            currently_sliding = false;
        });
        // makes sure current_left isn't NaN
        //if(isNaN(current_left)){
            //current_left = 0;
        //}

        // the left value of the last product
        var last_product_left = (get_left_in_percentage(products[products.length-1]));
        var left_at_leftest = Math.round(-(last_product_left - product_width * (num_showing-1)));


        //console.log("current_left: " + current_left);
        //console.log("last_prodct_left: " + last_product_left);
        //console.log("left_at_leftest: " + left_at_leftest);
        //console.log("left: " + left);
        

        //if you have gone all the way to the right
        if(left_at_leftest == current_left && !left){

            var first_product = products[0];
            var first_clone = $(first_product).clone();

            $(first_product).remove();
            $(products_container).append(first_clone);
            $(first_clone).css("left", last_product_left*1.0 + 1.0*product_width + "%");
            //dir = 0;
        }

        // the left value of the first product 
        var first_product_left = (get_left_in_percentage(products[0]));
        var first_product_left_round = Math.round(first_product_left); 
        
        console.log("current_left: " + current_left);
        console.log("first_product_left_round: " + first_product_left_round);
        // if you gone all the way to the left
        if(current_left == -first_product_left_round && left){

            // makes a clone of the product that is to be moved
            var last_product = products[products.length -1];
            var last_clone = $(last_product).clone();

            
            // moves the last product to the left of the currently most leftest product
            $(last_product).remove();
            $(products_container).prepend(last_clone);
            $(last_clone).css("left", 1.0*first_product_left - 1.0*product_width + "%");

        }
        else {
            console.log("not left");
        }




        //var products_container = arrow.parentNode;
        //for(var n = 0; n < products.length; n++){
            //var product = products[n];

            //var old_left = get_left_in_percentage(product);

            //var new_left = (old_left - product_width*dir) + "%";

            //[>$(product).css("left", new_left);<]
            //$(product).animate({
                //left: new_left
            //}, 500, function(){
                //sliding = false;
            //});
        //}
        all_current_left[i] = new_left;
        //currently_sliding = false;
    }
    else {
        console.log("notready");
    }
}

function get_left_in_percentage(element){
    var left = $(element).clone().appendTo('body').wrap('<div class = "remove_me" style="display: none"></div>').css('left');
    left = left.substr(0, left.length-1); // remove the % symbol
    $(".remove_me").remove(); 
    return left;
}

function get_margin_left_in_percentage(element){
    var width = $(element).clone().appendTo('body').wrap('<div class = "remove_me" style="display: none"></div>').css('margin-left');
    width = width.substr(0, width.length-1); // remove the % symbol
    $(".remove_me").remove();
    return width;
}

function get_width_in_percentage(element){
    var width = $(element).clone().appendTo('body').wrap('<div class = "remove_me" style="display: none"></div>').css('width');
    width = width.substr(0, width.length-1); // remove the % symbol
    $(".remove_me").remove();
    return width;
}
