function close_edit_view(){$("#editor").css("visibility","hidden")}function show_edit_view(e){$("#editor").css("visibility","visible");var t=$(e).find("span"),r=$(t).text();r=r.trim();var n=$(e).attr("name");$(".edit_name").val(n),$(".edit_text_new").val(r),$(".edit_text_old").val(r)}function on_ready_grid(){init_grids()}function init_grids(){for(var e=document.getElementsByClassName("grid_container"),t=0;t<e.length;t++){var r=e[t],n=r.getElementsByClassName("grid_temp_holder")[0],i=$(n).find(".grid_item[size=big]"),s=$(n).find(".grid_item[size=medium]"),o=$(n).find(".grid_item[size=small]");console.log(i.length),console.log(s.length),console.log(o.length);var a=n.getElementsByClassName("grid_item");$(a).css("marginLeft",gap_size+"%"),$(a).css("marginTop",gap_size+"vh");for(var l=[],d=0;d<4;d++){var c=document.createElement("div");c.className="grid_part",$(c).attr("filled",0),l[d]=c,$(r).append(c)}var _=100-gap_size,u=100-gap_size;$(i).css("width",_+"%"),$(i).css("height",u+"%");for(var d=0;d<i.length;d++){var g=i[d],p=$(l).filter("[filled=0]").first();p.append(g),p.attr("filled",4)}var _=100-gap_size,u=50-gap_size;$(s).css("width",_+"%"),$(s).css("height",u+"%");for(var d=0;d<s.length;d++){var g=s[d],m=$(l).filter("[filled=0]").first();if(m.length>0)$(m).append(g),$(m).attr("filled",2);else{var f=$(l).filter("[filled=2]").first();f.length>0&&($(f).append(g),$(f).attr("filled",4))}}var _=50-gap_size,u=50-gap_size;$(o).css("width",_+"%"),$(o).css("height",u+"%");for(var d=0;d<o.length;d++){var g=o[d],p=$(l).not("[filled=4]").first(),v=1*$(p).attr("filled");$(p).append(g),$(p).attr("filled",v+1)}Math.ceil(a.length/items_per_part);$(n).remove()}}function init_part(e,t,r,n){}function on_ready_admin_media(){var e=document.getElementsByClassName("select_type")[0];void 0!=e&&update_inputs(e),$(".i_media_inner").click(function(){var e=$(this).attr("media_id");$("#i_load_container").load("views/media_event.php?media_id="+e,{},function(){console.log("asdasd"),init_single_post()})})}function init_single_post(){$(".media_even").click(function(e){$(e.target).hasClass("media_even")&&$("#i_load_container").html("")}),$(".media_even_close").click(function(){$("#i_load_container").html("")})}function update_inputs(e){"image"==e.value?($(".image_post_only").show(),$(".video_post_only").hide()):($(".image_post_only").hide(),$(".video_post_only").show())}function on_ready_misc(){$("#admin_info_cross").click(function(){$(".admin_info_container").fadeOut()})}function on_ready_product_scroller(){init_product_slider(),init_arrows()}function init_arrows(e,t,r){$(e).click(function(){move(!1,r)}),$(t).click(function(){move(!0,r)})}function init_product_slider(){for(var e=document.getElementsByClassName("product_slider_container"),t=0;t<e.length;t++){var r=e[t];all_product_sliders[t]=r;init_arrows(r.getElementsByClassName("i_products_arrow_r"),r.getElementsByClassName("i_products_arrow_l"),r);var n=r.getElementsByClassName("i_products_sliders");product_width=get_width_in_percentage(n[0]);for(var i=0;i<n.length;i++){var s=n[i],o=product_width*i+"%";$(s).css("left",o)}}}function move(e,t){var t=t.getElementsByClassName("i_products_slider")[0],r=all_product_sliders.indexOf(t);if(!1===currently_sliding){currently_sliding=!0,console.timeEnd("1");var n=-1;e&&(n=1);var i=t.getElementsByClassName("i_products_sliders"),s=Math.round(100/product_width);i.length<s&&(n=0);var o=all_current_left[r];"aut"!=o&&void 0!=o||($(t).css("left","0%"),o=0),o=Math.round(1e3*o)/1e3;var a=1*o+product_width*n;a=Math.round(1e3*a)/1e3,console.timeEnd("7");var l=all_current_left[r],d=Math.round(l);console.timeEnd("8"),$(t).animate({left:a+"%"},900,"easeOutQuint",function(){currently_sliding=!1}),console.timeEnd("9");var c=get_left_in_percentage(i[i.length-1]);if(Math.round(-(c-product_width*(s-1)))==d&&!e){var _=i[0],u=$(_).clone();$(_).remove(),$(t).append(u),$(u).css("left",1*c+1*product_width+"%")}var g=get_left_in_percentage(i[0]);if(d==-Math.round(g)&&e){var p=i[i.length-1],m=$(p).clone();$(p).remove(),$(t).prepend(m),$(m).css("left",1*g-1*product_width+"%")}all_current_left[r]=a}else console.log("notready")}function get_left_in_percentage(e){var t=$(e).clone().appendTo("body").wrap('<div class = "remove_me" style="display: none"></div>').css("left");return t=t.substr(0,t.length-1),$(".remove_me").remove(),t}function get_margin_left_in_percentage(e){var t=$(e).clone().appendTo("body").wrap('<div class = "remove_me" style="display: none"></div>').css("margin-left");return t=t.substr(0,t.length-1),$(".remove_me").remove(),t}function get_width_in_percentage(e){var t=$(e).clone().appendTo("body").wrap('<div class = "remove_me" style="display: none"></div>').css("width");return t=t.substr(0,t.length-1),$(".remove_me").remove(),t}function on_ready_product_sorter(){for(var e=document.getElementsByClassName("pe_prod_prod"),t=0;t<e.length;t++){var r=e[t];products.push($(r).clone());var n=getProductPrice(r);getProductName(r);console.log(n),prices.push(n),names.push(names)}}function echoProducts(e){var t=document.getElementsByClassName("pe_prod_container2")[0];$(".pe_prod_prod").remove(),console.log("removing");for(var r=0;r<e.length;r++)console.log("1231231"),$(t).append(e[r]),console.log(products[r])}function forceUpdate(){for(var e=document.getElementsByClassName("pe_sort_buttons")[0].children,t="",r=0;r<e.length;r++){"true"==e[r].getAttribute("chosen")&&(t=e[r])}""==t?echoProducts(products):$(t).trigger("click")}function sortByPrice(e){highlight(e),echoProducts(sortArrayByOther(products,prices))}function sortByName(e){highlight(e),echoProducts(sortArrayByOther(products,names))}function highlight(e){var t=e.parentNode,r=t.children;$(r).attr("chosen","false"),$(e).attr("chosen","true"),$(r).css("background",""),$(e).css("background","blue")}function sortArrayByOther(e,t){for(var r=[],n=0;n<e.length;n++)r.push({A:t[n],B:e[n]});r.sort(function(e,t){return"String"==typeof e.A?e.A>t.A:e.A-t.A}),t=[],e=[];for(var n=0;n<r.length;n++)t.push(r[n].A),e.push(r[n].B);return e}function getProductPrice(e){var t=e.getElementsByClassName("pe_price")[0].innerHTML.trim();return t=1*t.replace(" ","")}function getProductName(e){return e.getElementsByClassName("pe_name")[0].innerHTML.trim()}function on_ready_slider(){init_sliders();for(var e=0;e<all_sliders.length;e++)slider_go_to_page(e,0);slider_speed=600,$(".all_slider_container").css("visibility","visible")}function slider_go_to_page(e,t){if(!(section_currently_sliding=!1)){section_currently_sliding=!0;var r=all_sliders[e],n=$(".slider_list_container[slider_number='"+e+"']");$(r).hasClass("no_auto_slide")||(clearInterval(intervals[e]),enable_autoslide(e));var i=$(r).children().length-2;if(i>0){t>=i?t=0:t<0&&(t=i-1);var s=$(".slider_page[slider_number='"+e+"']"),o=s[t],a=current_page[e],l=s[a];$(s).css("opacity","0"),$(l).css("opacity","1"),$(o).css("z-index","15"),$(l).css("z-index","10"),$(o).animate({opacity:1},slider_speed,function(){section_currently_sliding=!1});var d=":nth-child("+(t+1)+")";if($(r).hasClass("no_list")){if(!$(r).hasClass("no_dots")){var c=$(".slider_dots_container[slider_number='"+e+"']"),_=$(c).find(d);jQuery(c).find(".slider_dot").not(_).animate({backgroundColor:dot_not_selected_background,borderColor:border_not_selected_color},slider_speed),jQuery(_).animate({backgroundColor:dot_selected_background,borderColor:border_selected_color},slider_speed)}}else{var u=$(n).find(d).not("p");jQuery(n).find(".slider_list_object").not(u).animate({backgroundColor:not_selected_background,color:not_selected_color},slider_speed),jQuery(u).not("p").animate({backgroundColor:selected_background,color:selected_color},slider_speed)}current_page[e]=t}}}function move_section(e,t){var r=$(t).attr("slider_number"),n=current_page[r]+1;e&&(n-=2),slider_go_to_page(r,n)}function init_sliders(){var e=document.getElementsByClassName("all_slider_container");$(e).css("visibility","visible");$(window).width();slider_dot_width="1.0";for(var t=0;t<e.length;t++){var r=e[t];$(r).attr("slider_number",t),current_page.push(0),all_sliders.push(r);var n=r.getElementsByClassName("slider_page"),i=n.length,s=$(r).parent();if($(r).hasClass("no_auto_slide")||enable_autoslide(t),$(r).hasClass("no_list")){if(!$(r).hasClass("no_dots")){var o=$("<div class = 'slider_dots_container center_horizontally_css'>"),a=$("<div class = 'inner_dots_container full_height center_horizontally_css'>");$(o).attr("slider_number",t),$(a).attr("slider_number",t),$(o).append(a),$(s).append(o)}}else{var l=$("<div class = 'slider_list_container'>");$(l).attr("slider_number",t);var d=100/i+"%";$(s).append(l)}for(var c=0;c<n.length;c++){var _=n[c];$(_).attr("slider_number",t);var u;if(!$(r).hasClass("no_list")){var g=document.createElement("div");g.className+="slider_list_object",$(g).css("width",d);var p=_.id,m=$("<p class = 'list_object_text center_vertically_css'>");$(m).html(p),$(l).append(g),$(g).append(m),$(m).attr("slider_number",t),$(g).attr("slider_number",t),u=g}if(!$(r).hasClass("no_dots")){var f=$("<div class = 'slider_dot'>"),v=slider_dot_width;$(f).css("width",v+"vw"),$(f).css("height",v+"vw"),$(f).css("margin-left",2*v+"vw"),c==n.length-1&&$(f).css("margin-right",2*v+"vw"),$(a).append(f),u=f}$(u).click(function(){var e=this.parentNode,t=Array.prototype.indexOf.call(e.children,this);slider_go_to_page($(e).attr("slider_number"),t)})}if($(r).hasClass("no_arrows")){var h=$("<img class = '' src=''>"),y=$("<img class = '' src=''>");$(r).append(h),$(r).append(y)}else{var h=$("<img class = 'slider_arrow slider_arrow_left' src='img/Index_slider/left_arrow.svg'>"),y=$("<img class = 'slider_arrow slider_arrow_right' src='img/Index_slider/right_arrow.svg'>");$(h).attr("slider_number",t),$(y).attr("slider_number",t),$(r).append(h),$(r).append(y),$(h).click(function(){move_section(!0,this)}),$(y).click(function(){move_section(!1,this)})}}}function reenable_effects(e){}function enable_autoslide(e){var t=all_sliders[e],r=setInterval(function(){move_section(!1,t)},5e3);intervals[e]=r}function on_ready_text_effect(){init_texts()}function init_texts(){for(var e=document.getElementsByClassName("text-effect"),t=0;t<e.length;t++){var r=e[t],n=r.innerHTML;r.innerHTML="";for(var i=0;i<n.length;i++)$(r).append("<span>"+n[i]+"</span>");$("body").on("appear",".text-effect",function(e,t){$(this).hasClass("text-effect-done")||($(this).addClass("text-effect-done"),start_effect(this))}),$(r).hover(function(){})}}function start_effect(e){effect_letter($(e).find("span"),0)}function effect_letter(e,t){if(!(t>=e.length)){var r=e[t];$(r).velocity({translateZ:0,rotateX:"5deg",rotateZ:"5deg",color:"#DDDDDD"},{duration:120,complete:function(){$(r).velocity({translateZ:0,rotateX:0,rotateY:0,rotateZ:0,color:"#FFFFFF"},{duration:120})}}),t+=1,setTimeout(function(){effect_letter(e,t)},120)}}function onYouTubeIframeAPIReady(){$(document).ready(on_ready_video)}function on_ready_video(){var e;e=new YT.Player("organvideo",{videoId:"z8kBoDdQOgc",playerVars:{autoplay:1,controls:0,showinfo:0,modestbranding:1,loop:1,fs:0,cc_load_policy:0,iv_load_policy:3,autohide:1},events:{onReady:function(e){e.target.mute()},onStateChange:function(t){t.data===YT.PlayerState.ENDED&&e.playVideo()}}})}$(document).ready(on_ready_grid);var items_per_part=4,gap_size=1;window.addEventListener("load",function(){var e=document.getElementById("load");$(document.body.removeChild(e)).fadeOut("slow")}),$(document).ready(on_ready_admin_media),$(document).ready(on_ready_misc),$(document).ready(on_ready_product_scroller);var all_product_sliders=[],all_current_left=[],currently_sliding=!1,product_width;$(document).ready(on_ready_product_sorter);var products=[],prices=[],names=[];$(document).ready(on_ready_slider);var section_currently_sliding=!1,current_page=[],all_sliders=[],slider_speed=0,intervals=[],selected_background="#1c2d84",not_selected_background="#AAAAAA",selected_color="white",not_selected_color="black",dot_selected_background="white",dot_not_selected_background="gray",border_selected_color="gray",border_not_selected_color="gray";$(document).ready(on_ready_text_effect);