<div style="display:none"class="edit" id = "editor">
    <form class="edit_container" action="functions/update_field.php" method="GET">
        <div class="edit_container_container col-xs-12">
            <h1>Edit</h1>
            <textarea disabled="disabled" class="edit_text_old" name="old_value" id="" cols="30" rows="10">Old text</textarea>
            <textarea class="edit_text_new" name="new_value" id="" cols="30" rows="10">New text</textarea>
            <input class = "edit_name" type = "hidden" name="name">
            <div class="btn_container">
                <input class="save" type = "submit" value = "Save">
                <button class="close" type = "button" onclick = 'close_edit_view()'> Cancel</button>
            </div>
        </div>
    </form>
</div>
