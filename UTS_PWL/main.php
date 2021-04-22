        <!--Main-->
        <div class="col-9 p-3">
            <div class="ps-3">
                <?php
                $hal = isset($_REQUEST['hal']) ? $_REQUEST['hal'] : '';

                if (!empty($hal)) {
                    include_once $hal.'.php';
                } else {
                    include_once 'home.php';

                }
                ?>
            </div>
        </div>