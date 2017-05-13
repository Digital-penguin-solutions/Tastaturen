
$(document).ready(on_ready_product_sorter);

var products = [];
var prices = [];
var names = [];

function on_ready_product_sorter(){
    console.log("sorter ready");

    var all_products = document.getElementsByClassName("pe_product");

    for(var i = 0; i < all_products.length; i++){
        var product = all_products[i];
        products.push($(product).clone());
        var price = product.getElementsByClassName("pe_price")[0].innerHTML.trim();
        price = price.replace(" ", "")*1.0;

        prices.push(price);

        var name = product.getElementsByClassName("pe_name")[0].innerHTML.trim();
        name = name.replace(" ", "");

        names.push(name);
    }
    //prices = $(".pe_product .pe_price").html();
    //names = $(".pe_products .pe_name");
    console.log(all_products);
    console.log(prices);
    console.log(names);


    echoProducts([]);
}


//
//var A = [0.7, 0.1, 0.2, 0.6, 0.8, 2.1];
//var B = ['a', 'b', 'c', 'd', 'e', 'f'];


function echoProducts(temp_products){
    if(temp_products.length == 0){
        temp_products = products;
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

function sortByPrice(){
    var temp_products = sortArrayByOther(products, prices);
    
    echoProducts(temp_products);

}
function sortByName(){

    var temp_products = sortArrayByOther(products, names);
    
    echoProducts(temp_products);


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

    console.log(A, B);
    return B;
}
