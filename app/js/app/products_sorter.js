
$(document).ready(on_ready_product_sorter);

var current_products = []; // The products that are to be shown
var current_prices = []; 
var current_names = [];

var church_products = []; 
var church_prices = [];
var church_names = [];

var home_products = []; 
var home_prices = [];
var home_names = [];

var products = []; // all products
var prices = [];
var names = [];

function on_ready_product_sorter(){

    var all_products = document.getElementsByClassName("pe_product");

    for(var i = 0; i < all_products.length; i++){
        var product = all_products[i];
        products.push($(product).clone());

        // get type
        var type = product.getElementsByClassName("pe_type")[0].innerHTML.trim();

        var price;
        var name;
        if(type == "hem"){
            home_products.push(product);

            price = getProductPrice(product);
            home_prices.push(price);

            name = getProductName(product);
            home_names.push(name);
        }
        else {
            church_products.push(product);

            price = getProductPrice(product);
            church_prices.push(price);

            name = getProductName(product);
            church_names.push(name);
        }

        prices.push(price);

        names.push(names);

    }

    current_products = products;
    current_names = names;
    current_prices = prices;


    //echoProducts([]);
}


//
//var A = [0.7, 0.1, 0.2, 0.6, 0.8, 2.1];
//var B = ['a', 'b', 'c', 'd', 'e', 'f'];



function changeType(element, type) {
    highlight(element);
    if(type == "hem"){
        current_products = home_products;
        current_prices = home_prices;
        current_names = home_names;
    }
    else if(type == "kyrka"){
        current_products = church_products;
        current_prices = church_prices;
        current_names = church_names;
    }
    else {
        current_products = products;
        current_prices = prices;
        current_names = names;
    }
    forceUpdate();
}

function echoProducts(temp_products){
    if(temp_products.length == 0){
        temp_products = current_products;
    }
    var container = document.getElementsByClassName("pe_prod_container")[0]; 
    $(".pe_product").remove();
    //console.log(container);
    //while (container.firstChild) {
    //container.removeChild(container.firstChild);
    //}

    for(var i = 0; i < products.length; i++){
        var price = $(temp_products[i]).find(".pe_price").html();
        $(container).append(temp_products[i]);
    }

}

function forceUpdate(){

    //var clicked = $(".pe_sort_buttons").find("[selected=true]");

    var buttons = document.getElementsByClassName("pe_sort_buttons")[0].children;

    var clicked = "";
    for(var i = 0; i < buttons.length; i++){
        
        var selected = buttons[i].getAttribute("chosen");

        if(selected == "true"){
            clicked = buttons[i];
        }

    }
    // if no button has been selected yet
    if(clicked == ""){
        echoProducts(current_products);
    }
    else {
        $(clicked).trigger("click");
    }
}

function sortByPrice(element){
    highlight(element);

    var temp_products = sortArrayByOther(current_products, current_prices);

    echoProducts(temp_products);

}
function sortByName(element){

    highlight(element);

    var temp_products = sortArrayByOther(current_products, current_names);

    echoProducts(temp_products);
}

function highlight(element){
    var parent = element.parentNode;
    var children = parent.children;

    $(children).attr("chosen", "false");
    $(element).attr("chosen", "true");

    $(children).css("background", "");
    $(element).css("background", "blue");

}

// the B array will be sorted by A
function sortArrayByOther(B, A){
    var all = [];

    for (var i = 0; i < B.length; i++) {
        all.push({ 'A': A[i], 'B': B[i] });
    }


    all.sort(function(a, b) {
        //console.log(a.A);
        //console.log(b.A);
        if (typeof a.A == "String"){
            return a.A > b.A;
        }
        else {
            return a.A - b.A;
        }
    });

    A = [];
    B = [];

    for (var i = 0; i < all.length; i++) {
        A.push(all[i].A);
        B.push(all[i].B);
    }    

    //console.log(A, B);
    return B;
}

function getProductPrice(product){

    var price = product.getElementsByClassName("pe_price")[0].innerHTML.trim(); price = price.replace(" ", "")*1.0;
    return price;

}

function getProductName(product){

    var name = product.getElementsByClassName("pe_name")[0].innerHTML.trim();
    return name;

}
