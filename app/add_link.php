<?php
//include "include_pages/loading.php";
$no_admin_info = "1";

ini_set('memory_limit', '-1');
include "functions/functions.php";
session_start();

$con = connect();

?>
<!DOCTYPE html>
<?php include "partials/head.php";?>
<html lang="swe">
<head>
    <title>MetSense add product</title>
    <meta name="description" content="Tastaturen - Add product">
</head>
<?php 
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}

// if a product is to be added or changed
if (isset($_POST["add"]) && isset($_SESSION['admin'])){


    // if a product_id is already set, then a product is to be edited
    if (isset($_POST['product_id'])){
        $editing        = true;
        $link_id     = secure_str($_POST['link_id']);
    }
    else {
        $editing        = false;
    }

    $name               = secure_str($_POST["name"]);
    $name_dk           = secure_str($_POST["name_dk"]);
    $href               = secure_str($_POST["href"]);
    //$order_number       = secure_str($_POST["order_number"]);


    if (!$editing) {
        // adds the product along with the constant values
        $query = "INSERT INTO link (name, name_dk, href) VALUES ('$name', '$name_dk', '$href')";

        mysqli_query($con, $query) or die (mysqli_error($con));

        // gets the ID of the inserted product
        $product_id = secure_str(mysqli_insert_id($con));
    }
    else { // query for updating constant values
        $query = "UPDATE link SET name = '$name', name_dk='$name_dk', href='$href' WHERE link_id = '$link_id'";

        mysqli_query($con, $query) or die (mysqli_error($con));
    }

}

if (isset($_SESSION['admin'])) {

// When a product is going to be viewed for editing
    if (isset($_GET["product_id"])){
        $link_id            = $_GET["link_id"];
        $link               = get_link_by_id($con, $product_id);
        $name               = $link['name'];
        $name_dk            = $link['name_dk'];
        $href               = $link['href'];
    }
    else {
        // if a new product is to be created, all the values should be empty
        $name               = "";
        $name_dk            = "";
        $href               = "";
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
                    <h1 class = "admin_header"> Add new product</h1>
                    <h2 class = "admin_header2"> All product images should to be square sized for best performance, like 1000x1000 px for example. </h2>
                    <h2 class = "admin_header2"> Slider images should be 1920 x 1080 p and in .jpg format</h2>
                    <h2 class = "admin_header2"> <br> If you are experiencing issues when trying to upload or edit a product, it may be because your webserver isn't allowing too many large images to be uploaded at once. If this is an issue, try adding only a few images first and then go back to edit the product and upload the rest</h2>
                    <form id = "form" class = "add_product_form" method = "post" action = "add_product.php" enctype="multipart/form-data">
                        <input type = "hidden" name = "add">
                        <?php
                        if (isset($_GET["product_id"])){
                            ?>
                            <input type = "hidden" value = "<?php echo $_GET['product_id'] ?>" name = "product_id">
                            <?php
                        }
                        ?>

                        <h1>Product namn</h1>
                        <input value = "<?php echo $name ?>" type = "text" name = "name">

                        <h1> Typ </h1>
                        <select name="type">
                            <option value = "hem" <?php if($type == "hem"){echo "selected";}?>>Hem</option>
                            <option value = "kyrka"<?php if($type == "kyrka"){echo "selected";}?>>Kyrka</option>
                        </select>

                        <h1>Kort beskrivning (Svenska)</h1>
                        <textarea name = "short_description" class="short_description"><?php echo $short?></textarea>

                        <h1>Kort beskrivning (Danska)</h1>
                        <textarea name = "short_description_dk" class="short_description"><?php echo $short_dk?></textarea>

                        <h1>Lång beskrivning (Svenska)</h1>
                        <textarea name = "long_description" class="long_description"><?php echo $long?></textarea>

                        <h1>Lång beskrivning (Danska)</h1>
                        <textarea name = "long_description_dk" class="long_description"><?php echo $long_dk?></textarea>

                        <h1> Broschyr</h1>
                        <input id = "brochure" name = "brochure" class = "center_horizontally_css" type = "file" >

                        
                        <h1> Lämna prisen nedan tomma ifall du vill att det ska stå "Kontakta oss för prisuppgifter" </h1>
                        <h1>Svenskt pris</h1>
                        <input value = "<?php echo $price ?>" type = "text" name = "price">

                        <h1>Danskt pris</h1>
                        <input value = "<?php echo $price_dk ?>" type = "text" name = "price_dk">

                        <h1>Ordningsnummer</h1>
                        <input value = "<?php if(isset($order_number)){echo $order_number;}else {echo "100";} ?>" type = "text" name = "order_number">

                        <div class = "admin_list_container admin_tech_list">
                            <h1>Bilder till bildspel</h1>

                            <!--- THIS FIRST ONE IS HIDDEN AND IS ONLY A TEMPLETE FOR CREATING A NEW ONE BUT IT HAS TO BE HERE  -->
                            <div class = "template admin_list_item image_list_item">
                                <p class = "center_vertically_css"> <strong>New image: </strong> </p>
                                <input class = "center_vertically_css" name = "slider_image[]" type = "file" onchange="compress_image(event)" >
                                <p class = "center_vertically_css">
                                    <strong> Current: </strong>  none
                                </p>
                                <img src = "img/cross.svg" class = "center_vertically_css remove_item" alt="Remove item">
                            </div>
                            <?php
                            // The ones that already exist for this product
                            foreach ($slider_images as $image) {

                                $image_id = $image['product_image_id'];
                                $image_name = $image['filename'];
                                ?>
                                <div class = "admin_list_item image_list_item">
                                    <p class = "center_vertically_css"> <strong>New image: </strong> </p>
                                    <input image_id = "<?php echo $image_id;  ?>" class = "center_vertically_css" name = "slider_image[]" type = "file" onchange="compress_image(event)" >
                                    <p class = "center_vertically_css">
                                        <strong> Current: </strong>
                                    </p>
                                    <img class = "center_vertically_css list_preview_image" src="data:image/jpeg;base64,<?php echo base64_encode( $image['data']); ?>" alt="image of the curent image"/>
                                    <img src = "img/cross.svg" image_id = "<?php echo $image_id; ?>" class = "center_vertically_css remove_item" alt="Remove item">
                                </div>
                                <?php
                            }
                            ?>
                            <div class = "add_item">Add new image</div>
                        </div>

                        <h1> Huvudbild</h1>
                        <div class = "image_select_container">
                            <p class = "center_vertically_css"> <strong>New image: </strong> </p>
                            <input name = "main_image" class = "center_vertically_css" type = "file" onchange="compress_image(event)" >
                            <p class = "center_vertically_css">
                                <strong> Current: </strong>
                            </p>
                            <img class = "center_vertically_css list_preview_image" src="data:image/jpeg;base64,<?php echo base64_encode( $main_image); ?>" alt="preview of the curent image"/>
                        </div>

                        <h1> Bild 2</h1>
                        <div class = "image_select_container">
                            <p class = "center_vertically_css"> <strong>New image: </strong> </p>
                            <input name = "about_image" class = "center_vertically_css"  type = "file" onchange="compress_image(event)" >
                            <p class = "center_vertically_css">
                                <strong> Current: </strong>
                            </p>
                            <img class = "center_vertically_css list_preview_image" src="data:image/jpeg;base64,<?php echo base64_encode( $about_image); ?>" alt="preview of the curent image"/>
                        </div>

                        <section class="col-md-12 admin_btn">
                            <button class="col-md-5" id="js-trigger-overlay" onclick="send_form(this, 'add_product.php', 'form')" type="button">Save product</button>
                            <a class="col-md-5 col-md-offset-2" href="admin.php">Cancel edit</a>
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
