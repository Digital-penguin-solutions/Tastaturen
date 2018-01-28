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
    <title>Tastaturen add event</title>
    <meta name="description" content="Tastaturen - Add event">
</head>
<?php 

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}

// if a product is to be added or changed
if (isset($_POST["add"]) && isset($_SESSION['admin'])){


    // if a product_id is already set, then a product is to be edited
    if (isset($_POST['event_id'])){
        $editing        = true;
        $event_id       = secure_str($_POST['event_id']);
    }
    else {
        $editing        = false;
    }


    $header             = secure_str($_POST['header']);
    $header_dk          = secure_str($_POST['header_dk']);
    $date               = secure_str($_POST['date']);
    $date_dk            = secure_str($_POST['date_dk']);
    $info               = secure_str($_POST['info']);
    $info_dk            = secure_str($_POST['info_dk']);


    $images_array        = array(); // array for all the single images

    read_image($con, "main_image");
    //read_image($con, "key_features_image");


    if (!$editing) {
        // adds the product along with the constant values
        $query = "INSERT INTO event (header, header_dk, info, info_dk, date, date_dk) VALUES ('$header', '$header_dk', '$info', '$info_dk', '$date', '$date_dk')";

        mysqli_query($con, $query) or die (mysqli_error($con));

        // gets the ID of the inserted product
        $event_id = secure_str(mysqli_insert_id($con));
    }
    else { // query for updating constant values
        $query = "UPDATE event SET header = '$header', header_dk='$header_dk', info='$info', info_dk='$info_dk', date='$date', date_dk = '$date_dk' WHERE event_id = '$event_id'";

        mysqli_query($con, $query) or die (mysqli_error($con));

    }

    // UPLOAD OF SINGLE IMAGES
    if (count($images_array) > 0) { // makes sure it's not empty
        $images_query = "UPDATE event SET ";

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

        $images_query .= " WHERE event_id = '$event_id'";
        mysqli_query($con, $images_query) or die (mysqli_error($con));
    }

}

if (isset($_SESSION['admin'])) {

// When an event is going to be viewed for editing
    if (isset($_GET["event_id"])){
        $event_id           = $_GET["event_id"];
        $event              = get_event_by_id($con, $event_id);
        $header             = $event['header'];
        $date               = $event['date'];
        $info               = $event['info'];
        $header_dk          = $event['header_dk'];
        $date_dk            = $event['date_dk'];
        $info_dk            = $event['info_dk'];
        $main_image         = $event['main_image'];
    }
    else {
        // if a new product is to be created, all the values should be empty
        $header             = "";
        $date               = "";
        $info               = "";
        $header_dk          = "";
        $date_dk            = "";
        $info_dk            = "";
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
                    <h1 class = "admin_header">Add event</h1>
                    <form id = "form" class = "add_product_form" method = "post" action = "add_event.php" enctype="multipart/form-data">
                        <input type = "hidden" name = "add">
                        <?php
                        if (isset($_GET["event_id"])){
                            ?>
                            <input type = "hidden" value = "<?php echo $_GET['event_id'] ?>" name = "event_id">
                            <?php
                        }
                        ?>

                        <h1>Rubrik (Svenska)</h1>
                        <textarea name = "header" class="short_description"><?php echo $header?></textarea>

                        <h1>Rubrik (Danska)</h1>
                        <textarea name = "header_dk" class="short_description"><?php echo $header_dk?></textarea>

                        <h1>Beskrivning (Svenska)</h1>
                        <textarea name = "info" class="long_description"><?php echo $info?></textarea>

                        <h1>Beskrivning (Danska)</h1>
                        <textarea name = "info_dk" class="long_description"><?php echo $info_dk?></textarea>

                        <h1>Datum (Svenska)</h1>
                        <input value = "<?php echo $date ?>" type = "text" name = "date">

                        <h1>Datum (Danska)</h1>
                        <input value = "<?php echo $date_dk ?>" type = "text" name = "date_dk">

                        <h1>Bild</h1>
                        <div class = "image_select_container">
                            <p class = "center_vertically_css"> <strong>New image: </strong> </p>
                            <input name = "main_image" class = "center_vertically_css" type = "file" onchange="compress_image(event)" >

                            <p class = "center_vertically_css">
                                <strong> Current: </strong>
                            </p>
                            <img class = "center_vertically_css list_preview_image" src="data:image/jpeg;base64,<?php echo base64_encode( $main_image); ?>" alt="Current image"/>
                        </div>
                        <section class="col-md-12 admin_btn">
                            <button class="col-md-5" id="js-trigger-overlay" onclick="send_form(this, 'add_event.php', 'form')" type="button">Save product</button>
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
