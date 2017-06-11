<div id = "i_load_container"> </div>
<section id="Media" class="container-fluid i_media">
    <div class="row-fluid i_media">
        <div class="col-xs-12 i_media_container grid_container">
            <div class = "grid_temp_holder">

            <?php
                $con = connect();
                $posts = get_all_media_posts_small($con);

                foreach($posts as $post){
                    $title        = $post['title'];

                    $header_image = $post['header_image'];
                    $size         = $post['size'];
                    $media_id     = $post['media_id'];

                    ?> 

                    <div size="<?php echo $size; ?>" class = "grid_item i_media_item"> 
                        <div media_id = "<?php echo $media_id; ?>" class = "i_media_inner">
                            <div class="grid_item_text">
                                <h1><?php echo $title; ?></h1>
                            </div>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($header_image) ?>" alt="Huvudbild"/>

                        </div>
                    </div>


                    <?php
                }

            ?>
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
