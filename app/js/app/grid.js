
//$(document).ready(on_ready_grid);

function on_ready_grid(){

        var temp = "<div class='i_grid_item' style='width:{width}px; height: {height}px; background-color: {color}'><div class='cover'>Demo fit zone</div></div>";
        var colour = [
            "rgb(142, 68, 173)",
            "rgb(243, 156, 18)",
            "rgb(211, 84, 0)",
            "rgb(0, 106, 63)",
            "rgb(41, 128, 185)",
            "rgb(192, 57, 43)",
            "rgb(135, 0, 0)",
            "rgb(39, 174, 96)"
        ];
        var w = 1, h = 1, html = '', color = '', limitItem = 28;
        for (var i = 0; i < limitItem; ++i) {
            h = 1 + 3 * Math.random() << 0;
            w = 1 + 3 * Math.random() << 0;
            color = colour[colour.length * Math.random() << 0];
            html += temp.replace(/\{height\}/g, h*150).replace(/\{width\}/g, w*150).replace("{color}", color);
        }
        $(".i_media_container").html(html);
        $(function() {
        var wall = new Freewall(".i_media_container");
        wall.reset({
            selector: '.i_grid_item',
            animate: false,
            cellW: 160,
            cellH: 160,
            delay: 30,
            onResize: function() {
                wall.refresh($(window).width() - 30, $(window).height() - 30);
            }
        });
        // caculator width and height for IE7;
        wall.fitZone($(window).width() - 30 , $(window).height() - 30);
    });
    //var wall = new Freewall(".i_media_container");

    //wall.fitHeight();
}
