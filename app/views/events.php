<section id="event" class="container_fluid i_event">
    <div class="i_event row">
        <div class="i_event_container col-xs-12">
            <h1><?php print_field("i_event_header"); ?></h1>
            

            <?php 
                foreach($events as $event){
                    $header     = translate($event, 'header');
                    $date       = translate($event, 'date');
                    $info       = translate($event, 'info');
                    $image      = $event['main_image'];
?>

            <div class="i_event_event_container col-xs-12">

                <div class="i_event_img col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-0">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($image) ?>" alt="Huvudbild"/>
                </div>

                <div class="i_event_text i_event_img col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-0">
                    <h2 class="i_event_header"><?php echo $header; ?></h2>
                    <p class="i_event_date"><?php echo $date; ?></p>
                    <p class="i_event_info"><?php echo $info; ?></p>
                </div>

            </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>
