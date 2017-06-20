<!--slider container-->
<div class="i_header_slider hidden-sm hidden-xs">
    <div class="i_slider_1 col-xs-12">
        <div class="i_slider_1_container">
            <div class = "all_slider_container no_list">

                <!-- Slider 1-->
                <div class = "slider_preshow slider_page col-md-12">

                    <!--Slider 1 -->
                    <div style="pointer-events:none" class="i_slider_1_text">
                        <h1 class = "text-effect fade-in fade-in-delay-2">Tastaturen</h1>
                    </div>

                    <div class="i_slider_1_left col-xs-6">
                        <div class="i_slider_1_left_img">
                            <?php echo_stored_image_data($con, 'i_slider_1_church', ""); ?>
                        </div>

                        <div class="i_slider_1_left_btn ">
                            <p><?php print_field("i_slider_1_kyrka_info"); ?> </p>
                            <button class = "slide-in-delay-3 slide-in slide-in-left"
                                    onclick="location.href='product_details?t=kyrka'">Kyrkobruk</button>
                        </div>
                    </div>

                    <div class="i_slider_1_right col-xs-6">

                        <div class="i_slider_1_right_img">
                            <?php echo_stored_image_data($con, 'i_slider_1_home', ""); ?>
                        </div>

                        <div class="i_slider_1_right_btn">
                            <p><?php print_field("i_slider_1_home_info"); ?> </p>
                            <button class = "slide-in-delay-3 slide-in"
                                    onclick="location.href='product_details?t=hem'">Hemmabruk</button>
                        </div>
                    </div>
                </div>

                <!-- Slider 2 -->
                <div class = "slider_page col-xs-12 hidden-xs hidden-sm">
                    <div class="i_slider_2_container">
                        <div class="i_slider_2_text col-xs-12">
                            <div class="i_slider_2_text_container col-xs-5 col-xs-offset-1">
                                <h1><?php print_field("i_slider_2_header"); ?> </h1>
                                <p><?php print_field("i_slider_2_text"); ?> </p>
                                <div class="i_slider_2_btn ">
                                    <button class = "slide-in-delay-3 slide-in slide-in-left"
                                            onclick="location.href='product?id=327'">Läs mer</button>
                                </div>
                            </div>
                        </div>
                        <div class="i_slider_2_img">
                            <img class = "section_background" src_desktop_only="img/Index_slider/Slider_2.jpg" alt="orgel för kykobruk">
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
                        <div class="i_slider_4_text col-xs-12">
                            <div class="i_slider_4_text_container col-xs-12">
                                <h1><?php print_field("i_slider_4_header"); ?> </h1>
                                <p><?php print_field("i_slider_4_text"); ?> </p>
                                <div class="i_slider_4_btn">
                                    <button onclick="location.href='product_details'">Läs mer</button>
                                </div>
                            </div>
                        </div>
                        <div class="i_slider_4_img">
                            <img class = "section_background" src_desktop_only="img/Index_slider/Slider_4.jpg" alt="orgel för kykobruk">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="i_xs_slider hidden-md hidden-lg">
    <div class="col-xs-12 i_xs_slider">

    </div>
</div>
