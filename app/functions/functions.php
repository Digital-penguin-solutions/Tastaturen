<?php
//all functions for Metsense.com

//check if functions is included in page to acses them
if(!isset($functions_included)){

    

    $functions_included = true;

    //include connect page
    include "db_connect.php";


    function session_start_custom(){
        global $session_started;
        if(!$session_started){
            session_start();
            $session_started = true;
        }
    }

    // secures a string, protects against SQL injections and other attacks
    function secure_str($data){
        $con = connect();
        //$data = stripslashes($data);
        $data = trim($data);
        $data = addslashes($data);
        $data = mysqli_real_escape_string($con, $data);
        $data = strip_tags($data);

        return $data;
    }

    //read slider images
    function read_slider_images($con, $index){

        global $slider_images_array;

        if(isset($_POST[$index])) {

            $images = $_POST[$index];

            for ($i = 0; $i < sizeof($images); $i++){

                $data     = $images[$i];
                $split    = explode("@)(@#!#!#", $data); // splits the data string into image_data, filename and image_id

                $data     = $split[0]; // image data is one the first index
                $filename = $split[1];
                $image_id = $split[2];

                if ($data) {

                    $data = preg_replace('/^data:image\/(png|jpg|jpeg);base64,/', '', $data);
                    $data = mysqli_real_escape_string($con, base64_decode($data));

                    $info = array($data, $filename, $image_id);
                    $slider_images_array[] = $info;
                }
                else {
                }
            }
        }
        else {
            //echo "not found";
        }

    }

    function read_image_id($con, $index){

        if(isset($_POST[$index])) {

            $data  = $_POST[$index];

            $split = explode("@)(@#!#!#", $data); // splits the data string into image_data, filename and image_id

            $id  = $split[2]; 
            $id = secure_str($id);

            return $id;

        }
        else {
            //echo "not found single <br>";
        }

    }

    //read other images
    function read_image($con, $index){

        $result;
        global $images_array;

        if(isset($_POST[$index])) {

            $data  = $_POST[$index];

            $split = explode("@)(@#!#!#", $data); // splits the data string into image_data, filename and image_id

            $data  = $split[0]; // image data is one the first index

            if ($data) {

                $data = preg_replace('/^data:image\/(png|jpg|jpeg);base64,/', '', $data);
                $data = mysqli_real_escape_string($con, base64_decode($data));
                //$image = file_put_contents($image_data);


                $result = $data;

                $info           = array($data, $index);
                $images_array[] = $info;
            }
            else {
                $result = "empty";
            }
        }
        else {
            //echo "not found single <br>";
        }

    }

    // Return only the products that are to be shown on the homepage
    function get_all_visible_products($con, $type) {
        if($type==""){
            $query  = "SELECT type, price, product_id, name, short_description, main_image FROM product WHERE `show` = '1'";
            $select = mysqli_query($con, $query) or die (mysqli_error($con));
        }
        else {
            $query  = "SELECT type, price, product_id, name, short_description, main_image FROM product WHERE `show` = '1' AND type = '$type'";
            $select = mysqli_query($con, $query) or die (mysqli_error($con));
        }

        $array  = array();

        while($data = mysqli_fetch_array($select)){

            $array[] = $data;
        }


        return $array;

    }

    //get all products from database
    function get_all_products($con, $type) {

        if($type==""){
            $query  = "SELECT * FROM product";
            $select = mysqli_query($con, $query) or die (mysqli_error($con));
        }
        else {
            $query  = "SELECT * FROM product WHERE type = '$type'";
            $select = mysqli_query($con, $query) or die (mysqli_error($con));
        }

        $array  = array();

        while($data = mysqli_fetch_array($select)){

            $array[] = $data;
        }


        return $array;
    }

    //Get all products from database by id
    function get_product_by_id($con, $id){

        $id = secure_str($id);
        $query = "SELECT * FROM product WHERE product_id = '$id'";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));
        $data = mysqli_fetch_array($select);

        return $data;
    }

    //get long description by id from database
    function get_product_long_by_id($con, $id){

        $id = secure_str($id);
        $query = "SELECT long_description FROM product WHERE product_id = '$id'";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));
        $data = mysqli_fetch_array($select);

        $long = $data['long_description'];

        return $long;
    }

    // the tech table is stored as a large string with '#!' seperating each row and '%!' seperating each part of a row
    function get_tech_table_by_id($con, $id){
        $id = secure_str($id);
        $query = "SELECT * FROM tech_table_row WHERE product_id = '$id' ORDER BY tech_table_row_id";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));

        $array = array();


        while ($data = mysqli_fetch_array($select)) {
            $left      = $data["left_content"];
            $right     = $data["right_content"];

            $array_tmp = array($left, $right);

            $array[]   = $array_tmp;
        }

        return $array;
    }

    //get visabel products that are visibel by id
    function get_product_visibility_by_id($con, $id){
        $id    = secure_str($id);
        $data = get_product_by_id($con, $id);

        return $data['show'];
    }

    //get product by name from database
    function get_product_id_by_name($con, $name){

        $id     = secure_str($name);
        $query  = "SELECT product_id FROM product WHERE name = '$name'"; $select = mysqli_query($con, $query) or die (mysqli_error($con)); $data   = mysqli_fetch_array($select);
        $id     = $data['product_id'];

        return $id;

    }

    // gets all slider images
    function get_product_images_by_id($con, $id){

        $id     = secure_str($id);
        $query  = "SELECT * FROM product_image WHERE product_id = '$id'";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));

        $array  = array();

        while ($data = mysqli_fetch_array($select)) {
            $array[] = $data;
        }

        return $array;

    }

    function get_product_brochure_by_id($con, $id){
        $id     = secure_str($id);
        $query  = "SELECT brochure FROM product WHERE product_id = '$id'";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));

        $data = mysqli_fetch_array($select);

        $brochure = $data['brochure'];

        return $brochure;
    }

    //get name of produkt by id from database
    function get_product_name_by_id($con, $id){
        $id     = secure_str($id);
        $query  = "SELECT name FROM product WHERE product_id = '$id'";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));
        $data   = mysqli_fetch_array($select);

        $name = $data['name'];
        return $name;
    }

    //get short description by id from database
    function get_product_short_by_id($con, $id){
        $id          = secure_str($id);
        $query       = "SELECT short_description FROM product WHERE product_id = '$id'";
        $select      = mysqli_query($con, $query) or die (mysqli_error($con));
        $data        = mysqli_fetch_array($select);

        $description = $data['short_description'];
        return $description;
    }

    //get price from database by id
    function get_product_price_by_id($con, $id){
        $id     = secure_str($id);
        $query  = "SELECT price FROM product WHERE product_id = '$id'";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));
        $data   = mysqli_fetch_array($select);

        $price = $data['price'];
        return $price;
    }

    //get key featuers by id from database
    function get_key_features_by_id($con, $id){
        $id     = secure_str($id);
        $query  = "SELECT * FROM key_feature WHERE product_id = '$id' ORDER BY key_feature_id";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));
        $array  = array();

        while ($data = mysqli_fetch_array($select)) {
            $array[] = $data["content"];
        }

        return $array;
    }

    //Echo all products in the index slider
    function echo_products_index($products){
        $i      = 0;
        $firs   = 'i_products_sliders_bg_1';
        $second = 'i_products_sliders_bg_2';
        $third  = 'i_products_sliders_bg_3';

        foreach($products as $product){
            $name  = $product['name'];
            $short = $product['short_description'];
            $price = $product['price'];
            $image = $product['main_image'];
            $id    = $product['product_id'];

            $i++;

            if ($i % 3 == 1){
                $j = $firs;
            }
            elseif ($i % 3 == 2){
                $j = $second;
            }
            else{
                $j = $third;
            }
            ?>
            <!--products that is used in slider-->
            <div class="i_products_sliders col-md-4 col-xs-6 <?php echo $j?>">
                <a href="product?id=<?php echo $id; ?>" class="i_products_sliders_item">
                    <!--<img src="data:image/jpeg;base64,<?php //A_uecho base64_encode($image) ?>" alt="Huvudbild"/>-->
                    <img src="functions/load_product_image?id=<?php echo $id; ?>" alt="Huvudbild"/>

                    <h1><?php echo $name;?></h1>
                    <p class="short"><?php echo $short;?> </p>
                    <p class="price"><?php echo $price;?></p>
                </a>
            </div>
            <?php
        }
    }

    //logout from admin page
    function logout(){
        session_start();
        session_destroy();
    }

    //compress images
    function compress($source, $destination, $quality) {
        $info = getimagesize($source);

        if ($info['mime']     == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        }
        elseif ($info['mime'] == 'image/gif'){
            $image = imagecreatefromgif($source);
        }
        elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
        }
        imagejpeg($image, $destination, $quality);
        return $destination;
    }

    //
    function return_bytes($val) {
        $val = trim($val);
        $last = strtolower($val[strlen($val)-1]);
        switch($last) {
            // The 'G' modifier is available since PHP 5.1.0
        case 'g':$val *= 1024;
        case 'm':$val *= 1024;
        case 'k':$val *= 1024;
        }

        return $val;
    }

    //debugging website in console
    function debug_to_console( $data ) {

        if ( is_array( $data ) )
            $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

        echo $output;
    }

    function get_media_by_id($con, $id){
        $id = secure_str($id);
        $query = "SELECT * FROM media WHERE media_id = '$id'";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));
        $data = mysqli_fetch_array($select);

        return $data;

    }
    function get_all_media_posts_small($con){
        $query  = "SELECT youtube_id, type, size, media_id, header_image, title FROM media";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));

        $array  = array();

        while($data = mysqli_fetch_array($select)){

            $array[] = $data;
        }


        return $array;
    }

    function echo_admin_media($posts){
        $count = 0;
        foreach ($posts as $post) {
            $title        = $post['title'];
            $header_image = $post['header_image'];
            $media_id     = $post['media_id'];
            $type         = $post['type'];
            $yt_id        = $post['youtube_id'];
            //$show         = $product['show'];

            //if($show == 1){
                //$toggle_button_value = "Hide product";
                //$toggle_color        = "red";
            //}
            //else {
                //$toggle_button_value = "Set visible";
                //$toggle_color        = "green";
            //}

            if($count % 2 == 0) {
                $offset = 1;
            }
            else {
                $offset = 2;
            }
            ?>
            <div class = "col-md-4 col-md-offset-<?php echo $offset ?> admin_product">
                <h1><a href = "product?p=<?php echo $title?>"><?php echo $title ?></a></h1>
                <?php 
                if($type == "image"){
                    ?>
                        <img class = "center_horizontally_css" src="data:image/jpeg;base64,<?php echo base64_encode( $header_image ); ?>" alt="No image selected"/>
                <?php
                }
                else {
                    echo_youtube_thumbnail($yt_id);
                }

                ?>
                <!--- EDIT BUTTON-->
                <a href = "add_media?media_id=<?php echo $media_id?>"
                   class = "product_button product_edit_button">
                    <p class = "center_vertically_css">Edit</p>
                </a>

                <!--- TOGGLE SHOW BUTTON-->
               <!-- <a href = "functions/toggle_product?product_id=<?php //echo $product_id?>"
                   class = "product_button <?php //echo $toggle_color?> product_show_button">
                    <p class = "center_vertically_css"><?php //echo $toggle_button_value?></p>
                </a>
               -->

                <!--- DELETE BUTTON-->
                <a href = "functions/delete_media?id=<?php echo $media_id?>"
                   class = "product_button product_delete_button">
                    <p class = "center_vertically_css">Delete</p>
                </a>

            </div>
            <?php
            $count++;
        }


    }
    function echo_admin_products($products){
        $count = 0;
        foreach ($products as $product) {
            $name       = $product['name'];
            $main_image = $product['main_image'];
            $product_id = $product['product_id'];
            $show       = $product['show'];

            if($show == 1){
                $toggle_button_value = "Hide product";
                $toggle_color        = "red";
            }
            else {
                $toggle_button_value = "Set visible";
                $toggle_color        = "green";
            }

            if($count % 2 == 0) {
                $offset = 1;
            }
            else {
                $offset = 2;
            }
            ?>
            <div class = "col-md-4 col-md-offset-<?php echo $offset ?> admin_product">
                <h1><a href = "product?p=<?php echo $name?>"><?php echo $name ?></a></h1>
                <img class = "center_horizontally_css" src="data:image/jpeg;base64,<?php echo base64_encode( $main_image ); ?>" alt="Product main image"/>

                <!--- EDIT BUTTON-->
                <a href = "add_product?product_id=<?php echo $product_id?>"
                   class = "product_button product_edit_button">
                    <p class = "center_vertically_css">Edit</p>
                </a>

                <!--- TOGGLE SHOW BUTTON-->
                <a href = "functions/toggle_product?product_id=<?php echo $product_id?>"
                   class = "product_button <?php echo $toggle_color?> product_show_button">
                    <p class = "center_vertically_css"><?php echo $toggle_button_value?></p>
                </a>

                <!--- DELETE BUTTON-->
                <a href = "functions/delete_product?id=<?php echo $product_id?>"
                   class = "product_button product_delete_button">
                    <p class = "center_vertically_css">Delete</p>
                </a>

            </div>
            <?php
            $count++;
        }

    }


    function get_field_by_name($con, $name){
        $name   = secure_str($name);
        $query  = "SELECT * FROM text_field WHERE name = '$name'";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));
        $data   = mysqli_fetch_array($select);

        return $data;
    }

    function create_field($name){
        global $con;
        $name = secure_str($name);
        $value = "Click to edit";
        //$new_value = secure_str($new_value);
        $query = "INSERT INTO text_field (name, value) VALUES ('$name', '$value')";
        mysqli_query($con, $query) or die (mysqli_error($con));
    }

    function update_field($name, $new_value){
        global $con;
        $name = secure_str($name);
        $new_value = secure_str($new_value);
        $query = "UPDATE text_field SET value = '$new_value' WHERE name = '$name'";
        mysqli_query($con, $query) or die (mysqli_error($con));
    }

    function print_field($name){
        global $con;
        $field = get_field_by_name($con, $name);

        
        if($field != null){ // if field already exists
            $value = $field['value'];
            echo "<span>".$value . "</span>";
        }
        else {
            create_field($name);
            echo "<span> Click to edit </span>";
        }
?>
    
<?php 
        if(isset($_SESSION['admin'])){
?>
        <script>
            var script = document.currentScript;
            var parent = script.parentNode;
            var name   = '<?php echo $name; ?>';
            $(parent).attr("name", name);
            $(parent).click(function(){
                show_edit_view(this);
            });

        </script>
<?php

        }
?>

<?php

    }

    function echo_youtube_thumbnail($yt_id){
        $thumbnail_url = "https://img.youtube.com/vi/" . $yt_id . "/0.jpg";
        $thumbnail_image = file_get_contents($thumbnail_url);
?>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($thumbnail_image) ?>" alt="Youtube video"/>

<?php
    }


    function get_stored_image_by_name($con, $name){
        $name   = secure_str($name);
        $query  = "SELECT * FROM stored_image WHERE name = '$name'";
        $select = mysqli_query($con, $query) or die (mysqli_error($con));
        $data   = mysqli_fetch_array($select);

        return $data;
    }

    function update_stored_image($con, $name, $data){
        $name = secure_str($name);
        $query = "UPDATE stored_image SET data = '$data' WHERE name = '$name'";
        mysqli_query($con, $query) or die (mysqli_error($con));
    }

    function echo_stored_image_data($con, $name, $classes){

        $img = get_stored_image_by_name($con, $name);
        if($img != null){
            $data = $img['data'];
        }
        else {
            $data = "";
            create_stored_image($con, $name);

        }
        //echo "data:image/jpeg;base64," . base64_encode($data);
        ?>

        <img onclick="open_input('<?php echo $name?>')" class = "<?php echo $classes; ?>" src = "functions/load_stored_image.php?name=<?php echo $name;?>" alt = "No image selected">

        <!--<img onclick="open_input('<?php //echo $name?>')" class = "<?php echo $classes; ?>"src="data:image/jpeg;base64,<?php //echo base64_encode($data) ?>" alt="No image selected"/>-->
        <?php
        if(isset($_SESSION['admin'])){
?>
            <input image_id = "<?php echo $name; ?>" name = "stored_image" class = "stored_image_input" type = "file" onchange="compress_image_single(event)" >
    <?php
        }
    }

    function create_stored_image($con, $name){
        $name = secure_str($name);
        //$new_value = secure_str($new_value);
        $query = "INSERT INTO stored_image (name) VALUES ('$name')";
        mysqli_query($con, $query) or die (mysqli_error($con));
    }

    

}
?>
