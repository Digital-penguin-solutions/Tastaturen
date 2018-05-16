<section style="overflow-y:hidden" class="container-fluid p_slider" role="complementary">
    <div class="row-fluid p_slider_container">
        <div class="p_slider_container all_slider_container no_list">
            <?php foreach ($slider_images as $image) { ?>
                <div class="p_slider_img_container slider_page col-xs-12">
                    <img class="p_slider_image col-xs-12"
                         src="data:image/jpeg;base64,<?php echo base64_encode($image['data']); ?>" alt=""/>
                </div>
            <?php } ?>
        </div>
    </div>
</section>