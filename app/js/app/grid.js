
$(document).ready(on_ready_grid);

var items_per_part = 4;
var gap_size = 3;

function on_ready_grid(){
    
    init_grids();

}


function init_grids(){
    var grids = document.getElementsByClassName("grid_container");


    for(var i = 0; i < grids.length; i++){
        var grid = grids[i];
        var grid_temp_holder = grid.getElementsByClassName("grid_temp_holder")[0];
        var big_items = $(grid_temp_holder).find(".grid_item[size=big]");
        var medium_items = $(grid_temp_holder).find(".grid_item[size=medium]");
        var small_items = $(grid_temp_holder).find(".grid_item[size=small]");
        console.log(big_items.length);
        console.log(medium_items.length);
        console.log(small_items.length);

        var items = grid_temp_holder.getElementsByClassName("grid_item");

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

        $(grid_temp_holder).remove();
    }
    
}

function init_part(container, items, start_index, part_order){
    

    
    //init_part(container, items, start_index + items_per_part, part_order+1);

    
}
