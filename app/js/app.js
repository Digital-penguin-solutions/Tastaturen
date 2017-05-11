$(document).ready(on_ready);
$(document).ready(on_ready_product_scroller);

var sliding = false;

function on_ready_product_scroller () {

    console.log("kör0");
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

        if($(products[0]).css("left") == "0px" && left){
            dir = 0;
        }

        var num_showing = Math.round(100 / product_width);
        var last_left = Math.round(product_width * (num_showing-1));
        var last_product_left = Math.round(get_left_in_percentage(products[products.length-1]));

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
            }, 500, 'easeOutCirc',function(){
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


console.log("hello");

var sliding = false;

// page slider variables
var current_page = [];
var all_sliders = [];
var slider_speed = 0;

var selected_background = "#1c2d84";
var not_selected_background = "#AAAAAA";

var selected_color = "white";
var not_selected_color = "black";

var dot_selected_background = "white";
var dot_not_selected_background = "gray";

var border_selected_color = "gray";
var border_not_selected_color = "gray";

function on_ready () {
    init_sliders();

    // puts all the sliders to the first page
    for (var i = 0; i < all_sliders.length; i++) {
        slider_go_to_page(i, 0);
    }

    slider_speed = 600; // sets the slider speed to a value after the first initialisation has been done. This is so that the animations wont be shown when the page is loaded
    $("all_slider_container").show();
}

function slider_go_to_page(slider_number, page){
    if (!sliding) {
        sliding = true;
        var slider = all_sliders[slider_number];

        var no_content = false;

        if (slider.classList.contains("no_content")){
            no_content = true;
        }

        var list_container = $(".slider_list_container[slider_number='"+slider_number+"']");

        // counts the number of pages on this slider. Minus 2 cause of the two arrows
        var num_pages = $(slider).children().length - 2;
            if(num_pages > 0){

            // makes it cycle through the pages
            if(page >= num_pages){
                page = 0;
            }
            else if (page < 0){
                page = num_pages - 1;
            }


            // touches only the pages with the right slider_number

            var pages = $(".slider_page[slider_number='"+ slider_number +"']");


            // the page that is to be shown
            var new_page = pages[page];

            //new_page.style.visibility = "hidden";
            var background_image = new_page.getElementsByTagName("img")[0].src;
            //new_page.getElementsByClassName("background_image_container")[0].getElementsByTagName("img")[0].style.visibility = "hidden";
            new_page.parentNode.style.background = "url(" + background_image + ") no-repeat center center";
            new_page.parentNode.style.backgroundSize = "100% 100%";



            $(pages).fadeToggle(slider_speed, function() {
            });


            for (var i = 0; i < pages.length; i++)
            {

                var margin_left = (i * 100) - page * 100 + "%";
                $(pages[i]).animate({'left' : margin_left}, 0);

            }


            var fade_in_time = slider_speed / 2;

            if(no_content){
                fade_in_time = 0;
            }

            $(pages).fadeToggle(fade_in_time, function(){
                sliding = false;
            });
            var nth = ":nth-child("+(page+1)+")";
            //
            // if there is a list on this slider
            if (!$(slider).hasClass("no_list")) {

                var clicked = $(list_container).find(nth).not("p");

                // makes all the list objects except the clicked on go back to the original color
                jQuery(list_container).find(".slider_list_object").not(clicked).animate({backgroundColor : not_selected_background, color : not_selected_color}, slider_speed);


                jQuery(clicked).not("p").animate({backgroundColor : selected_background, color : selected_color}, slider_speed);
            }

            else if (!$(slider).hasClass("no_dots")) {
                var dots_container = $(".slider_dots_container[slider_number='"+ slider_number +"']");

                var clicked_dot = $(dots_container).find(nth);


                // makes all the not clicked dots go back to the original color
                //jQuery(dots_container).find(".slider_dot").not(clicked_dot).animate({backgroundColor : not_selected_background, color : not_selected_color}, slider_speed);
                jQuery(dots_container).find(".slider_dot").not(clicked_dot).animate({backgroundColor : dot_not_selected_background, borderColor : border_not_selected_color}, slider_speed);


                //jQuery(clicked_dot).animate({backgroundColor : selected_background, color : selected_color}, slider_speed);
                jQuery(clicked_dot).animate({backgroundColor : dot_selected_background, borderColor : border_selected_color}, slider_speed);
            }

            current_page[slider_number] = page;
        }
    }

}



function init_sliders(){

    var sliders = document.getElementsByClassName("all_slider_container");
    $(sliders).css("visibility", "visible");

    var page_width = $(window).width();
    slider_dot_width = "1.0"; // vw

    for (var i = 0; i < sliders.length; i++) {
        var slider = sliders[i];

        $(slider).attr("slider_number", i);

        current_page.push(0);
        all_sliders.push(slider);

        var pages = slider.getElementsByClassName("slider_page");

        var num_pages = pages.length;

        var slider_parent = $(slider).parent();

        if (!$(slider).hasClass("no_list")){
            var list_container = $("<div class = 'slider_list_container'>");

            $(list_container).attr("slider_number", i);

            var list_object_size = 100 / num_pages + "%";


            // adds the list container
            $(slider_parent).append(list_container);

        }

        // adds the dot container
        else if (!$(slider).hasClass("no_dots"))
        {
            var dots_container = $("<div class = 'slider_dots_container center_horizontally_css'>");

            var inner_dots_container = $("<div class = 'inner_dots_container full_height center_horizontally_css'>");

            $(dots_container).attr("slider_number", i);
            $(inner_dots_container).attr("slider_number", i);

            // the dots have two containers. One to center for the entire page and one to center within the first container. This is beacause the outercontianer has to fill the entire width to make sure no dots ever fall out
            $(dots_container).append(inner_dots_container);
            $(slider_parent).append(dots_container);
        }

        for (var n = 0; n < pages.length; n++) {
            var page = pages[n];

            // gives the elements an attribute so that they know which slider they belong to
            $(page).attr("slider_number", i);


            // sets the right position on each slider
            var left = 100 * n + "%";
            $(page).css("left", left);

            var button;

            // adds the list object to the list container as long as the slider does not have the "no_list"-class
            if (!$(slider).hasClass("no_list")){
                var list_object = document.createElement("div");
                list_object.className += "slider_list_object";

                $(list_object).css("width", list_object_size); // gives the object the proper size

                var page_id = page.id;


                // adds a description on the list object
                var list_object_text = $("<p class = 'list_object_text center_vertically_css'>");
                $(list_object_text).html(page_id);


                $(list_container).append(list_object);
                $(list_object).append(list_object_text);

                $(list_object_text).attr("slider_number", i);
                $(list_object).attr("slider_number", i);


                button = list_object;
            }

            if (!$(slider).hasClass("no_dots")){ // adds the dots

                var dot = $("<div class = 'slider_dot'>");

                var width = slider_dot_width;

                console.log(width);
                $(dot).css("width", width + "vw");
                $(dot).css("height", width + "vw");
                $(dot).css("margin-left", width*2 + "vw");

                // last dot
                if(n == pages.length-1){
                    $(dot).css("margin-right", width*2 + "vw");
                }

                $(inner_dots_container).append(dot);

                button = dot;
            }

            // adds a click listener to the object that will make the slider change to the objects page
            $(button).click(function (){

                var clicked_obj = this;
                var clicked_parent = this.parentNode;

                var index = Array.prototype.indexOf.call(clicked_parent.children, this);

                // the slider that owns this list
                var slider_number = $(clicked_parent).attr("slider_number");

                slider_go_to_page(slider_number, index);
            });
        }

        // decides weather to add arrows to naveigate between the pages
        if (!$(slider).hasClass("no_arrows")){

            var left_arrow = $("<img class = 'slider_arrow slider_arrow_left' src='img/left_d.svg'>");
            var right_arrow = $("<img class = 'slider_arrow slider_arrow_right' src='img/right_d.svg'>");
            $(left_arrow).attr("slider_number", i);
            $(right_arrow).attr("slider_number", i);

            $(slider).append(left_arrow);
            $(slider).append(right_arrow);

            $(left_arrow).click(function(){
                move(true, this);
            });

            $(right_arrow).click(function(){
                move(false, this);
            });

            function move(left, comp){

                var slider_num = $(comp).attr("slider_number");

                var new_page = current_page[slider_num]+1;

                if(left) {
                    new_page -= 2;
                }

                slider_go_to_page(slider_num, new_page);
            }

        }
        else{
            var left_arrow = $("<img class = '' src=''>");
            var right_arrow = $("<img class = '' src=''>");
            $(slider).append(left_arrow);
            $(slider).append(right_arrow);
        }
    }
}
