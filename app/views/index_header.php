<header id="Intro" class="container-fluid i_header" role="banner">
    <div class="row-fluid i_header">
        <div class="col-xs-12 i_header_container all_slider_container no_list desktop_only">

            <!-- slider 1 -->
            <div class="i_head_slider col-xs-12 slider_page">
                <div class="i_head_slider_container">
                    <div class="i_head_slider_background_dark col-xs-12"></div>
                    <div class="i_head_slider_text col-xs-12">
                        <div class="i_slider_text_container col-xs-10 col-xs-offset-1">
                            <h1><?php print_field("i_slider_1_header"); ?> </h1>
                            <p><?php print_field("i_slider_1_text"); ?> </p>
                            <div class="i_slider_btn ">
                                <button class = "slide-in-delay-3 slide-in slide-in-left"
                                        onclick="location.href='product_details?t=hem'">Läs mer</button>
                            </div>
                        </div>
                    </div>
                    <div class="i_head_slider_img">
                        <?php echo_stored_image_data($con, 'i_slider_1_bg', ""); ?>
                    </div>
                </div>
            </div>

            <!-- slider 2 -->
            <div class="i_head_slider col-xs-12 slider_page hidden-xs hidden-sm">
                <div class="i_head_slider_container">
                    <div class="i_head_slider_background_dark col-xs-12"></div>
                    <div class="i_head_slider_text col-xs-12">
                        <div class="i_slider_text_container col-xs-10 col-xs-offset-1">
                            <h1><?php print_field("i_slider_2_header"); ?> </h1>
                            <p><?php print_field("i_slider_2_text"); ?> </p>
                            <div class="i_slider_2_btn ">
                                <button class = "slide-in-delay-3 slide-in slide-in-left"
                                        onclick="location.href='product_details?t=hem'">Läs mer</button>
                            </div>
                        </div>
                    </div>
                    <div class="i_head_slider_img">
                        <?php echo_stored_image_data($con, 'i_slider_2_bg', ""); ?>
                    </div>
                </div>
            </div>

            <!-- Slider 3-->
            <div class = "i_head_slider_3 slider_page col-xs-12 hidden-xs hidden-sm">
                <div class="i_head_slider_3_container">
                    <div class="i_head_slider_3_video">

                        <div id="organvideo" class="i_head_slider_3_video_player"></div>

                        <div class="i_head_slider_3_video_btn">
                            <i class="fa fa-youtube-play" id="video-trigger" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- slider 4 -->
            <div class="i_head_slider_4 col-xs-12 slider_page hidden-xs hidden-sm">
                <div class="i_head_slider_4_container">
                    <div class="i_head_slider_4_text col-xs-12">
                        <div class="i_slider_4_text_container col-xs-10 col-xs-offset-1">
                            <h1><?php print_field("i_slider_4_header"); ?> </h1>
                            <p><?php print_field("i_slider_4_text"); ?> </p>
                            <div class="i_slider_4_btn ">
                                <button class = "slide-in-delay-3 slide-in slide-in-left"
                                        onclick="location.href='product_details?t=hem'">Läs mer</button>
                            </div>
                        </div>
                    </div>
                    <div class="i_head_slider_4_img col-xs-12">
                        <?php echo_stored_image_data($con, 'i_slider_4_bg', ""); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>