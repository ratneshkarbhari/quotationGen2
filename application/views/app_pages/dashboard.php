<main class="page-content" id="dashboard">

    <div class="container" style="width: 90%;">

        <h4 class="page-title">Welcome <?php echo $_SESSION['first_name']; ?></h4>

        <div class="row" style="margin-top: 5%;">

            <div class="col l2 m2 s12"></div>
            <div class="col l4 m4 s12">

                <div class="card">

                    <a href="<?php echo site_url('add-new-item') ?>">
                        <div class="card-content center black-text">

                            <i class="material-icons" style="font-size: 250%;">add</i><br>
                            <span class="card-text-button">Item</span>
                        
                        </div>
                    </a>
                </div>

            </div>
            <div class="col l4 m4 s12">

                <div class="card">

                    <a href="<?php echo site_url('create-new-invoice') ?>">
                        <div class="card-content center black-text">

                            <i class="material-icons" style="font-size: 250%;">add</i><br>
                            <span class="card-text-button">Quotation</span>
                        
                        </div>
                    </a>
                </div>

            </div>
            <div class="col l2 m2 s12"></div>

            </div>    
    
    </div>

</main>