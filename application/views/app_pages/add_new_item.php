<main class="page-content" id="add-new-item">
    <div class="container">

    


        <a style="margin: 2% 0;" href="<?php echo site_url(); ?>" class="btn">BACK TO DASHBOARD</a>

        <h4 class="page-title"><?php echo $title; ?></h4>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>
    
        <form action="<?php echo site_url('add-new-item-exe'); ?>" enctype="multipart/form-data" method="post">

            <div class="input-field col l12 s12 s12">
                            
                <label for="item_title">Title</label>
                <input type="text" name="item_title" id="item_title">

            </div>

            <?php for($i=22;$i<=42;$i++): if(($i%2)==0):  ?>


            <div class="card">

                <div class="card-content row">
                
                    

                    


                    <div class="input-field col l4 m6 s12">
                    
                        <label for="size<?php echo $i; ?>">Size</label>
                        <input type="text" name="sizes[]" value="<?php echo $i; ?>" id="size<?php echo $i; ?>" readonly>

                    </div>


                    <div class="input-field col l4 m6 s12">
                    
                        <label for="prod_cost<?php echo $i; ?>">Production Cost</label>
                        <input type="text" name="prod_costs[]" id="prod_cost<?php echo $i; ?>">

                    </div>    
                    <div class="input-field col l4 m6 s12">
                    
                        <label for="cloth_reqd<?php echo $i; ?>">Cloth Required</label>
                        <input type="text" name="cloth_reqds[]" id="cloth_reqd<?php echo $i; ?>">

                    </div>

                </div>
            
            </div>

            <?php endif; endfor; ?>

            <button type="submit" class="btn">Add New Item</button>
        
        </form>

    </div>
</main>