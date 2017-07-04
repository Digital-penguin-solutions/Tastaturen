$(document).ready(on_ready_grid);

var items_per_part = 4;
var gap_size = 1;

function on_ready_grid(){
    init_grids();
}

function init_grids(){
    var grids = document.getElementsByClassName("grid_container");

    for(var i = 0; i < grids.length; i++){
        var grid = grids[i];
        var grid_temp_holder = grid.getElementsByClassName("grid_temp_holder")[0];
        var items = grid.getElementsByClassName("grid_item");

        if(isDesktop()){
            var big_items = $(grid_temp_holder).find(".grid_item[size=big]");
            var medium_items = $(grid_temp_holder).find(".grid_item[size=medium]");
            var small_items = $(grid_temp_holder).find(".grid_item[size=small]");


            $(items).css("marginLeft", gap_size + "%");
            $(items).css("marginTop", gap_size + "vh");


            var parts = [];

            for(var n = 0; n < 4; n++){
                var part = document.createElement('div');
                part.className = "grid_part";
                $(part).attr("filled", 0);
                parts[n] = part;
                $(grid).append(part);
            }

            var width = 100 - gap_size;
            var height = 100 - gap_size;
            $(big_items).css("width", width + "%");
            $(big_items).css("height", height + "%");

            for(var n = 0; n < big_items.length; n++){
                var item = big_items[n];
                var free_part = $(parts).filter("[filled=0]").first();
                free_part.append(item);
                free_part.attr("filled",4);
            }


            var width = 100 - gap_size;
            var height = 50 - gap_size;
            $(medium_items).css("width", width + "%");
            $(medium_items).css("height", height + "%");

            //var num_medium_prio = 3;

            for(var n = 0; n < medium_items.length; n++){
                var item = medium_items[n];

                var part_zero = $(parts).filter("[filled=0]").first();

                if(part_zero.length > 0){
                    $(part_zero).append(item);
                    $(part_zero).attr("filled" , 2);
                }
                else {
                    var part_two = $(parts).filter("[filled=2]").first();

                    if(part_two.length > 0){
                        $(part_two).append(item);
                        $(part_two).attr("filled" , 4);
                    }
                }
                //$(part + "[filled=0]").first().append(item);
            }

            var width = 50 - gap_size;
            var height = 50 - gap_size;
            $(small_items).css("width", width + "%");
            $(small_items).css("height", height + "%");

            for(var n = 0; n < small_items.length; n++){
                var item = small_items[n];

                //var free_part = $(part).not("[filled=4]").first();
                var free_part = $(parts).not("[filled=4]").first();
                var filled_value = $(free_part).attr("filled")*1.0;

                if(filled_value == 3 || filled_value == 4){

                    //$(item).css("position", "absolute");
                    //$(item).css("bottom", "0");
                }

                $(free_part).append(item);
                $(free_part).attr("filled", (filled_value+1));
            }


            var num_parts = Math.ceil(items.length / items_per_part);
            //for(var n = 0; n < num_parts; n++){
            //init_part(grid, items, n*);
            //}
            //init_part(grid, items, 0, 0);

            /*set_text_color(items);*/
            // a small delay to make sure all the images have loaded properly
            //setTimeout(function(){set_text_color(items);}, 300);
        }
        else {
            var part = document.createElement('div');
            part.className = "grid_part";
            $(grid).append(part);
            for(var n = 0; n < items.length; n++){
                $(part).append(items[i]);
                
            }
            
        }
        $(grid_temp_holder).remove();
    }
}

function set_text_color(items){
    for(var i = 0; i < items.length; i++){
        var item = items[i];
        var image = item.getElementsByTagName("img")[0];
        var h1= item.getElementsByTagName("h1")[0];
        var average = Math.round(getAverageRGB(image));
        //var col = 155-average;
        var col = average;

        if(col > 10) {
            col = 30;
        }
        else {
            col = 250;
        }

        col = "rgb(" + col +", "+col+", "+col+")";

        $(h1).css("color", col);
    }
}

function getAverageRGB(imgEl) {

    var blockSize = 5, // only visit every 5 pixels
        defaultRGB = {r:0,g:0,b:0}, // for non-supporting envs
        canvas = document.createElement('canvas'),
        context = canvas.getContext && canvas.getContext('2d'),
        data, width, height,
        i = -4,
        length,
        rgb = {r:0,g:0,b:0},
        count = 0;

    if (!context) {
        return defaultRGB;
    }

    height = canvas.height = imgEl.naturalHeight || imgEl.offsetHeight || imgEl.height;
    width = canvas.width = imgEl.naturalWidth || imgEl.offsetWidth || imgEl.width;

    context.drawImage(imgEl, 0, 0, width, height*0.3);

    try {
        data = context.getImageData(0, 0, width, height);
    } catch(e) {
        /* security error, img on diff domain */
        return defaultRGB;
    }

    length = data.data.length;

    while ( (i += blockSize * 4) < length ) {
        ++count;
        rgb.r += data.data[i];
        rgb.g += data.data[i+1];
        rgb.b += data.data[i+2];
    }

    // ~~ used to floor values
    rgb.r = ~~(rgb.r/count);
    rgb.g = ~~(rgb.g/count);
    rgb.b = ~~(rgb.b/count);

    var all = (rgb.r + rgb.g + rgb.b) / 3;

    return (rgb.r + rgb.g + rgb.b) / 3;
}

function init_part(container, items, start_index, part_order){
    //init_part(container, items, start_index + items_per_part, part_order+1);
}
