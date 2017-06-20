
$(document).ready(on_ready_admin);

function on_ready_admin() {
    $(".add_item").click(function(){
        var button = this;
        var container = $(this).parent();

        var new_feature = $(container).find(".template").first().clone().removeClass("template"); // clones a feature to add a new one

        $(new_feature).find("input").val('');

        $(container).append(new_feature);
        $(new_feature).insertBefore(button);

        update_remove_listener();
    });	

    update_remove_listener();
}

// when a new element is cloned, the listener is not cloned and therfor a listener has to be applied to all the new elements again
function update_remove_listener() {

    $(".remove_item").click(function(){
        var feature  = $(this).parent();
        var num_features = $(feature).parent().children().length - 2; // gets the amount of key_features in the list

        // removes the item from the list if it is not the last item in the list
        if (num_features > 1) {
            $(feature).remove();
        }
    });

    // this is an extra listener required only for the slider_images list
    $(".image_list_item .remove_item").click(function () {
        var image_id = $(this).attr("image_id");

        // image_id will only exists when it's an image that is already in the database
        if(image_id != undefined) {
            var input = "<input value = " + image_id + " type =  'hidden' name = 'removed_images[]'>";

            $("#form").append(input);
        }

    });

}

function send_form_stored_image(){
    send_form("","functions/update_stored_image.php", "form_stored_image");

}

function compress_image_single(e, name){

    compress_image(e, function(){
        setTimeout(function(){
            send_form("","functions/update_stored_image.php", "form_stored_image");
        }, 2000);
    });
}

// this is run everytime an image is selected in an inputtag. This will load the selected image into a temporary img-tag and the data will be fetch from the temporary img-tag when the form is sent
function compress_image(e, callback) { 
    e = e || window.event;
    var element = e.target || e.srcElement;
    var parent = element.parentNode;
    var name = element.name;
    var image = element.files[0];

    // if there is a file selected
    if (image != undefined) {
        var mime = image.type;

        var filename = get_filename_from_path(element.value);
        var image_id = $(element).attr("image_id"); // if an image that already exists is being viewed for editing, it will have an image_id attribute in order to keep track of the images
        // if no image_id exists, it will be none
        if(image_id == undefined) {
            image_id = "none";
        }

        // creates a temp holder for the uploaded image. This will be fetched later when the form is sent
        var tmp_image_holder = document.createElement("img");
        tmp_image_holder.className += "always_hidden";
        tmp_image_holder.className += " tmp_holder";

        tmp_image_holder.setAttribute("holder_name", name);
        tmp_image_holder.setAttribute("filename", filename);
        tmp_image_holder.setAttribute("image_id", image_id);

        // finds the old one and deletes it if there is one
        var old = $(parent).find(".tmp_holder[holder_name='" + name + "']").remove();
        $(parent).append(tmp_image_holder);


        var reader = new FileReader();


        reader.onload = function(event) {

            tmp_image_holder.src = event.target.result; // loads the uploaded image into a temp img
            tmp_image_holder.setAttribute("mime", mime);

            if(callback != "none"){
                callback();
            }

        };

        reader.readAsDataURL(image);
    }
    else { // if no file is selected, the old container gets deleted
        $("[holder_name='" + name + "']").remove();
    }
}


var maxWidth = 1500; // the max width for an image

// this will be run when the "save product"-button is pressed
function send_form(element, page, form){


    element.disabled = true;

    var form_data = new FormData(document.getElementById(form));


    //var brochure_path = $("#brochure").val();
    //var brochure_data;
    //console.log("brochure path: " + brochure_path);
    //console.log("brochure data: " + brochure_data);

    //var reader = new FileReader();

    //reader.onload = function(event) {
    //brochure_data = event.target.result;
    //};

    ////reader.readAsDataURL(brochure_path);

    //form_data.append("brochure", brochure_data);

    var tmp_holders = document.getElementsByClassName("tmp_holder");

    for (var i = 0; i < tmp_holders.length; i++) {
        var source_img_obj = tmp_holders[i];

        var name = source_img_obj.getAttribute("holder_name");
        var mime = source_img_obj.getAttribute("mime");

        var natW = source_img_obj.naturalWidth;
        var natH = source_img_obj.naturalHeight;

        // find radio of image
        var ratio = natH / natW;
        if (natW > maxWidth) {
            natW = maxWidth;
            natH = ratio * maxWidth;
        }
        var new_image_data = "";

        // compress for jpg
        if (mime != "image/png"){
            var quality = 0.7;

            var cvs = document.createElement('canvas');
            cvs.width = natW; 
            cvs.height = natH;

            var ctx = cvs.getContext("2d");
            ctx.drawImage(source_img_obj, 0, 0, natW, natH);

            //console.log("data: " +new_image_data);
            new_image_data = cvs.toDataURL(mime, quality);
            //console.log("data: " +new_image_data);
        }	
        else {
            //var new_image_data = compressPNG(source_img_obj, 0.1, "image/png");
            new_image_data = source_img_obj.src;
        }

        var filename = $(source_img_obj).attr("filename");
        var image_id = $(source_img_obj).attr("image_id");

        // adds information to the data of the image with a separator which will hopefully never occur in an image 
        new_image_data += "@)(@#!#!#" + filename + "@)(@#!#!#" + image_id;

        // only deletes the old one if it doesn't end with [] cause that means it's an array
        if (name.substring(name.length-2, name.length) != "[]"){

            form_data.delete(name); // deletes the old input
        }

        form_data.append(name, new_image_data); // adds the new input
    }

    var xhr = $.ajax({
        //url: 'add_product.php',
        url: page,
        type: 'POST',
        data: form_data,
        cache:false,
        contentType: false,
        processData: false
    });

    xhr.success(function(response) {
        console.log(response);
        //console.log("response");
        //$(document).scrollTop(0);

        // different action depending on what has been done
        console.log(page);
        var message = "";
        if(page == "add_product.php"){
            message = "Product has been edited or added";
            window.location.replace("admin?view=products&message=" + message);
        }
        else if(page == "add_media.php"){
            message = "Media post has been edited or added";
            window.location.replace("admin?view=media&message=" + message);
        }
        else {

            var rand = Math.floor(Math.random()*1000);
            var url = window.location.href;    
            if (url.indexOf('?') > -1){


                // removes the hashtag from url
                var hash = url.split("#");
                var first = hash[0];
                var second = hash[1];
                var second_split = second.split("?");
                var url = "?" + second_split[1];

                url += '&r='+ rand;
            }
            else 
            {
                var hash = url.split("#");
                var url = hash[0];

                url += '?r=' + rand;
            }
            console.log(url);
            window.location.replace(url);
            //window.location.replace("http://index");
            console.log(url);
        }
        //console.log("asdasd");
        //location.reload();
    });
}

function compressPNG(image, quality, output_format) {
    var org_width = image.naturalWidth;
    var org_height = image.naturalHeight;

    var small_canvas = document.createElement("canvas");
    small_canvas.width = org_width * quality;
    small_canvas.height= org_height * quality;

    var small_ctx = small_canvas.getContext("2d");
    small_ctx.drawImage(image, 0, 0, small_canvas.width, small_canvas.height);


    var small_image = document.createElement("img");
    small_image.src = small_canvas.toDataURL(output_format);

    var big_canvas = document.createElement("canvas"); 
    big_canvas.width = org_width;
    big_canvas.height = org_height;

    var big_ctx = big_canvas.getContext("2d");
    //console.log(typeof small_image);
    //console.log(typeof image);
    big_ctx.drawImage(small_image, 0, 0, big_canvas.width, big_canvas.height);

    var new_image_data = big_canvas.toDataURL(output_format);

    return new_image_data;
}


function get_filename_from_path(fullPath){
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
    }
    return filename;
}

function open_input(name){
    console.log("asdas");
    var input = $("[image_id="+name+"]");
    console.log(input);
    $(input).trigger('click');
}


