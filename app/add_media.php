<?php
//include "include_pages/loading.php";
$no_admin_info = "1";
include "partials/head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MetSense add product</title>
    <meta name="description" content="MetSense - A page to add new products to the webpage">
</head>

<?php
ini_set('memory_limit', '-1');
include "functions/functions.php";
session_start();

$con = connect();

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}

// if a product is to be added or changed
if (isset($_POST["add"]) && isset($_SESSION['admin'])){


    // if a media_id is already set, then a product is to be edited
    if (isset($_POST['media_id'])){
        $editing      = true;
        $media_id     = secure_str($_POST['media_id']);
    }
    else {
        $editing        = false;
    }

    $title              = secure_str($_POST["title"]);
    $content            = secure_str($_POST["content"]);
    $video_link         = secure_str($_POST["video_link"]);
    $type               = secure_str($_POST["type"]);
    //$brochure           = secure_str($_POST["brochure"]);
    //$key_features       = $_POST["key_feature"];
    //$tech_row_left      = $_POST["tech_row_left"];
    //$tech_row_right     = $_POST["tech_row_right"];
    //$show               = secure_str($_POST["show"]);


    $images_array        = array(); // array for all the single images

    read_image($con, "header_image");
    //read_image($con, "key_features_image");
    read_image($con, "second_image");




    if (!$editing) {
        // adds the product along with the constant values
        $query = "INSERT INTO media (title, content, video_link, type) VALUES ('$title', '$content', '$video_link', '$type')";

        mysqli_query($con, $query) or die (mysqli_error($con));

        // gets the ID of the inserted product
        $media_id = secure_str(mysqli_insert_id($con));
    }
    else { // query for updating constant values
        $query = "UPDATE media SET title = '$title', content='$content', video_link='$video_link', type = '$type' WHERE media_id = '$media_id'";

        mysqli_query($con, $query) or die (mysqli_error($con));

    }

    // UPLOAD OF SINGLE IMAGES

    if (count($images_array) > 0) { // makes sure it's not empty
        $images_query = "UPDATE product SET ";

        // the images that are to be uploaded are first put into the images array so that they can all be uploaded with the same query
        foreach ($images_array as $key => $info){
            $data = $info[0];
            $index = $info[1];

            $images_query .= $index . "='" . $data ."'";

            // if it's not the last element, a comma should be added so that the next value can be added
            if ($key != (count($images_array) - 1)){
                $images_query .= ",";
            }
        }

        $images_query .= " WHERE media_id = '$media_id'";
        mysqli_query($con, $images_query) or die (mysqli_error($con));
    }

}

if (isset($_SESSION['admin'])) {

// When a product is going to be viewed for editing
    if (isset($_GET["media_id"])){
        $media_id         = $_GET["media_id"];
        $product            = get_product_by_id($con, $media_id);
        $title              = $product['title'];
        $content            = $product['content'];
        $video_link         = $product['video_link'];
        $type               = $product['type'];
        $header_image       = $product['header_image'];
        $second_image       = $product['second_image'];
        //$type               = $product['type'];

        //$slider_images      = get_product_images_by_id($con, $media_id);
    }
    else {
        // if a new product is to be created, all the values should be empty
        $title              = "";
        $content            = "";
        $video_link         = "";
        $type               = "";
        //$type               = "";
    }
    ?>
    <body>
    <?php
    //include "include_pages/nav.php";
    ?>

    <section class = "admin_page">
        <div class = "container-fluid full_height">
            <div class = "row full_height">
                <div class = "col-md-8 col-md-offset-2">
                    <?php global $editing; ?>
                    <h1 class = "admin_header"> <? if($editing){echo "Edit";}else {echo "Add";}?> media post</h1>
                    <h2 class = "admin_header2"> All product images should to be square sized for best performance, like 1000x1000 px for example. </h2>
                    <h2 class = "admin_header2"> Slider images should be 1920 x 1080 p and in .jpg format</h2>
                    <h2 class = "admin_header2"> <br> If you are experiencing issues when trying to upload or edit a product, it may be because your webserver isn't allowing too many large images to be uploaded at once. If this is an issue, try adding only a few images first and then go back to edit the product and upload the rest</h2>
                    <form id = "form" class = "add_product_form" method = "post" action = "" enctype="multipart/form-data">
                        <input type = "hidden" name = "add">
                        <?php
                        if (isset($_GET["media_id"])){
                            ?>
                            <input type = "hidden" value = "<?php echo $_GET['media_id'] ?>" name = "media_id">
                            <?php
                        }
                        ?>

                        <h1>Rubrik</h1>
                        <input value = "<?php echo $title ?>" type = "text" name = "title">

                        <h1>Text</h1>
                        <textarea name = "content" class="short_description"><?php echo $content?></textarea>


                        <h1> Typ av inlägg </h1>
                        <select class = "select_type" onchange = "update_inputs(this)" name="type">
                            <option value = "image" <?php if($type == "image"){echo "selected";}?>>Bildinlägg</option>
                            <option value = "video"<?php if($type == "video"){echo "selected";}?>>Videoinlägg</option>
                        </select>



                        <div class = "video_post_only">
                            <h1>Länk till Youtube-video</h1>
                            <textarea name = "video_link" class="short_description"><?php echo $video_link?></textarea>
                        </div>

                        <div class = "image_post_only">
                            <h1> Huvudbild</h1>
                            <div class = "image_select_container">
                                <p class = "center_vertically_css"> <strong>New image: </strong> </p>
                                <input name = "header_image" class = "center_vertically_css" type = "file" onchange="compress_image(event)" >
                                <p class = "center_vertically_css">
                                    <strong> Current: </strong>
                                </p>
                                <img class = "center_vertically_css list_preview_image" src="data:image/jpeg;base64,<?php echo base64_encode( $header_image); ?>" alt="preview of the curent sensor"/>
                            </div>

                            <h1> Bild 2 </h1>
                            <div class = "image_select_container">
                                <p class = "center_vertically_css"> <strong>New image: </strong> </p>
                                <input name = "second_image" class = "center_vertically_css"  type = "file" onchange="compress_image(event)" >
                                <p class = "center_vertically_css">
                                    <strong> Current: </strong>
                                </p>
                                <img class = "center_vertically_css list_preview_image" src="data:image/jpeg;base64,<?php echo base64_encode( $second_image); ?>" alt="preview of the curent sensor"/>
                            </div>
                        </div>


                        <section class="col-md-4 col-md-offset-4">
                            <button id="js-trigger-overlay" onclick="send_form(this, 'add_media.php')" type="button">Save product</button>
                        </section>

                    </form>
                </div>
            </div>
        </div>
    </section>

    </body>
    <?php
}

else {header("Location: index.php");} ?>
</html>
