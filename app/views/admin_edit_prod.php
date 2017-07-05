<?php
if (isset($_SESSION['admin'])) {?>
    <section class="container-fluid admin_edit hidden-xs- hidden-sm">
        <div class="row-fluid admin_edit">
            <div class="col-md-12 admin_edit_container">
                <h3>Redigera produkten</h3>
                <div class="admin_edit_btn">
                    <button onclick="location.href="">Redigera denna produkt</button>
                </div>
            </div>
        </div>
    </section>
<?php } ?>