<?php
    include "../functions/functions.php";
    $con = connect();
    $media_id = $_GET['media_id'];
    $post = get_media_by_id($con, $media_id);
    $title = $post['title'];
    $header_image = $post['header_image'];
    $second_image = $post['second_image'];
    $content = $post['content'];
    $type = $post['type'];
    $video_link = $post['video_link'];

?> <div class="media_even"><div class="media_even_container"><img class="media_even_close" src="img/cross.svg" alt="close media tab"><div class="media_even_container_container"><h1><?php echo $title; ?></h1> <?php 
            if($type == "image"){
                ?> <img class="" src="data:image/jpeg;base64,<?php echo base64_encode( $header_image ); ?>" alt="No image selected"> <?php 
            }
            else {
            ?> <iframe src="<?php echo $video_link; ?>"></iframe> <?php
            }
            ?> <p> <?php echo $content; ?></p> <?php 
            if($type == "image"){
                ?> <img class="" src="data:image/jpeg;base64,<?php echo base64_encode( $second_image ); ?>" alt="No image selected"> <?php
            }
            ?> </div></div></div>