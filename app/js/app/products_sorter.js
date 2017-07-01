$(document).ready(on_ready_product_sorter);

var products = []; // all products
var prices = [];
var names = [];

function on_ready_product_sorter(){

    var all_products = document.getElementsByClassName("pe_prod_prod");

    for(var i = 0; i < all_products.length; i++){
        var product = all_products[i];

        products.push($(product).clone());

        var price = getProductPrice(product);
        var name = getProductName(product);
        console.log(price);

        prices.push(price);
        names.push(names);
    }
    //echoProducts([]);
}

function echoProducts(temp_products){
    var container = document.getElementsByClassName("pe_prod_container2")[0]; 
    $(".pe_prod_prod").remove();
    console.log("removing");
    //console.log(container);
    //while (container.firstChild) {
    //container.removeChild(container.firstChild);
    //}

    for(var i = 0; i < temp_products.length; i++){
        //var price = $(temp_products[i]).find(".pe_price").html();
        console.log("1231231");
        $(container).append(temp_products[i]);

        console.log(products[i]);
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
        echoProducts(products);
    }
    else {
        $(clicked).trigger("click");
    }
}

//Sort all pruducts by price
function sortByPrice(element){
    highlight(element);

    var temp_products = sortArrayByOther(products, prices);

    echoProducts(temp_products);

}

//Sort all pruducts by name
function sortByName(element){

    highlight(element);

    var temp_products = sortArrayByOther(products, names);

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