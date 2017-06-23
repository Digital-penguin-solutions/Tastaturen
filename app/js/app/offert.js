$(document).ready(on_ready_offert);

function on_ready_offert(){
    init_add_to_cart();

    $(".offert_close").click(function(){
        close_offert();
    });

    $(".offert_send").click(function(){
        send_offert();
    });

    $(".offert_open").click(function(){
        open_offert();
    });

    $(document).click(function(e){
        if($(e.target).hasClass("offert")){
            close_offert();
        }
    });

}

function load_cart(){
    $(".offert_product").load("functions/echo_cart", function(){
        init_offert();
    });
}

function send_offert(){

    var email = $("#email").val();
    var name = $("#name").val();
    var phone = $("#phone").val();
    var sec  = "sueweuey";

    var xhr = $.ajax({
        url: 'functions/send_offert.php',
        type: 'GET',
        data: "email="+ email + "&name=" + name + "&phone=" + phone + "&sec=" + sec
    });

    xhr.success(function(response){
        //load_cart();
        //console.log(response);
        //setTimeout(function(){}, 1000);
        //open_offert();
        //load_cart(cart_size); // reload the cart when it's done
        //var button = document.getElementsByClassName("intro_button")[0];
        //button.innerHTML = "Added to cart";
        //button.style.backgroundColor = "#009600";
    });
}

function init_offert(){
    
    $(".cart_remove").click(function(){

        var id = $(this).attr("product_id");

        var xhr = $.ajax({
            url: 'functions/alter_cart.php',
            type: 'GET',
            data: "remove=&product_id=" + id
        });

        xhr.success(function(response){
            load_cart();
            //console.log(response);
            //setTimeout(function(){}, 1000);
            //open_offert();
            //load_cart(cart_size); // reload the cart when it's done
            //var button = document.getElementsByClassName("intro_button")[0];
            //button.innerHTML = "Added to cart";
            //button.style.backgroundColor = "#009600";
        });

    });
    
}

function open_offert(){
    $(".offert").css("display", "block");
    load_cart();
}

function close_offert(){
    $(".offert").css("display", "none");
}

function init_add_to_cart(){
    $(".send_offert").click(function(){

        var id = $(this).attr("product_id");

        var xhr = $.ajax({
            url: 'functions/alter_cart.php',
            type: 'GET',
            data: "add=&product_id=" + id
        });

        xhr.success(function(response){
            //setTimeout(function(){}, 1000);
            open_offert();
            //load_cart(cart_size); // reload the cart when it's done
            //var button = document.getElementsByClassName("intro_button")[0];
            //button.innerHTML = "Added to cart";
            //button.style.backgroundColor = "#009600";
        });

    });
}
