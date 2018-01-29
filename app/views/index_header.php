<!--slider container-->
<div class="i_header_slider">
    <div class="i_slider_1 col-xs-12">
        <div class="i_slider_1_container">
            <div class = "all_slider_container no_list desktop_only">

                <div class = "slider_page col-xs-12">
                    <div class="i_slider_2_container">
                        <div class="i_slider_background_dark col-xs-12">
                        </div>
                        <div class="i_slider_2_text col-xs-12">
                            <div class="i_slider_2_text_container col-xs-10 col-xs-offset-1">
                                <h1><?php print_field("i_slider_1_header"); ?> </h1>
                                <p><?php print_field("i_slider_1_text"); ?> </p>
                                <div class="i_slider_2_btn ">
                                    <button class = "slide-in-delay-3 slide-in slide-in-left"
                                            onclick="location.href='product_details?t=hem'">Läs mer</button>
                                </div>
                            </div>
                        </div>
                        <div class="i_slider_2_img">
                            <?php echo_stored_image_data($con, 'i_slider_1_bg', ""); ?>
                        </div>
                    </div>
                </div>

                <!-- Slider 2 -->
                <div class = "slider_page col-xs-12 hidden-xs hidden-sm">
                    <div class="i_slider_2_container">
                        <div class="i_slider_background_dark col-xs-12">
                        </div>
                        <div class="i_slider_2_text col-xs-12">
                            <div class="i_slider_2_text_container col-xs-10 col-xs-offset-1">
                                <h1><?php print_field("i_slider_2_header"); ?> </h1>
                                <p><?php print_field("i_slider_2_text"); ?> </p>
                                <div class="i_slider_2_btn ">
                                    <button class = "slide-in-delay-3 slide-in slide-in-left"
                                            onclick="location.href='product_details?t=hem'">Läs mer</button>
                                </div>
                            </div>
                        </div>
                        <div class="i_slider_2_img">
                            <!--<img class = "section_background" src_desktop_only="img/Index_slider/Slider_2.jpg" alt="orgel för kykobruk">-->
                            <?php echo_stored_image_data($con, 'i_slider_2_bg', ""); ?>
                        </div>
                    </div>
                </div>

                <!-- Slider 3-->
                <div class = "slider_page col-md-12 hidden-xs hidden-sm">
                    <div class="i_slider_3_container">
                        <div class="i_slider_3_video">

                            <div id="organvideo" class="i_slider_3_video_player"></div>

                            <div class="i_slider_3_video_btn">
                                <i class="fa fa-youtube-play" id="video-trigger" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider 4-->
                <div class = "slider_page col-xs-12 hidden-xs hidden-sm">
                    <div class="i_slider_4_container">
                        <div class="i_slider_background_dark col-xs-12">
                        </div>
                        <div class="i_slider_4_text col-xs-12">
                            <div class="i_slider_4_text_container col-xs-12">
                                <h1><?php print_field("i_slider_4_header"); ?> </h1>
                                <p><?php print_field("i_slider_4_text"); ?> </p>
                                <div class="i_slider_4_btn">
                                    <button onclick="location.href='product_details?t=kyrka'">Läs mer</button>
                                </div>
                            </div>
                        </div>
                        <div class="i_slider_4_img">
                            <!--<img class = "section_background" src_desktop_only="img/Index_slider/Slider_4.jpg" alt="orgel för kykobruk">-->
                            <?php echo_stored_image_data($con, 'i_slider_4_bg', "section_background"); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>