                <div class="panel-body ">
                    <h4 class="float-left text-left">my Listing</h4>
                    <h4 class="float-right text-right"><a href="#">View All</a></h4>
                    <div class="list_border clearfix"></div>
                    <div class="row">
                        <?php
                        $color = array('green_box', 'red_box', 'blue_box', 'orange_box', 'green_box', 'red_box', 'blue_box', 'orange_box', 'green_box', 'red_box', 'blue_box', 'orange_box');
                        for ($a = 1; $a <= 6; $a++) {
                            ?>
                            @include('layouts.application_panel_partials.listingviewBox_panel') 
                        <?php } ?>
                    </div>
                </div>