<div id = "i_load_container"> </div>
<div class="i_media_header">
    <h1><?php print_field("i_media_header"); ?></h1>
</div>
<section id="Media" class="container-fluid i_media">
    <div class="row-fluid">
        <div class="col-xs-12 i_media_container grid_container">
            <div class = "grid_temp_holder">

                <?php
                $con = connect();
                $posts = get_all_media_posts_small($con);

                foreach($posts as $post){
                    $title        = $post['title'];

                    $header_image = $post['header_image'];
                    $size         = $post['size'];
                    $type         = $post['type'];
                    $media_id     = $post['media_id'];
                    $yt_id        = $post['youtube_id'];
                    ?>

                    <div size="<?php echo $size; ?>" class = "grid_item i_media_item">
                        <div media_id = "<?php echo $media_id; ?>" class = "i_media_inner">
                            <div class="grid_item_text">
                                <h1><?php echo $title; ?></h1>
                            </div>
                            <?php
                            if($type == "image"){
                                ?>
                                <!--<img src="data:image/jpeg;base64,<?php //echo base64_encode($header_image) ?>" alt="Huvudbild"/>-->
                                <img src="functions/load_media_image?id=<?php echo $media_id; ?>" alt="Huvudbild"/>

                                <?php
                            }
                            else {
                                ?>
                                <i class="fa fa-youtube-play" id="video-trigger" aria-hidden="true"></i>
                                <?php
                                echo_youtube_thumbnail($yt_id);
                            }
                            ?>
                        </div>
                    </div>

                <?php } ?>
                <!--<div size = "big"    class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/3.jpg">
                </div>

                <div size = "small"  class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/2.jpg">
                </div>

                <div size = "small"  class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/3.jpg">
                </div>

                <div size = "medium" class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/4.jpg">
                </div>

                <div size = "medium" class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/1.jpg">
                </div>

                <div size = "small"  class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/5.jpg">
                </div>

                <div size = "small"  class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/2.jpg">
                </div>

                <div size = "small"  class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/3.jpg">
                </div>

                <div size = "small"  class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/4.jpg">
                </div>

                <div size = "small"  class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/5.jpg">
                </div>

                <div size = "small"  class = "grid_item i_media_item">
                    <div class="grid_item_text">
                        <h1>Fin media</h1>
                    </div>
                    <img src = "img/product/kyrka/Sliders/1.jpg">
                </div>
                -->

            </div>
        </div>
    </div>
</section>
