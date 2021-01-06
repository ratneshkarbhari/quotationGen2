<div class="fixed-action-btn">
  <a class="btn-floating btn-large yellow darken-2" href="<?php echo site_url('add-new-item'); ?>">
    <i class="large material-icons black">add</i>
  </a>
</div>
<main class="page-content" id="all-items">
    <div class="container">
    <a href="<?php echo site_url(); ?>" style="margin: 2% 0;" class="btn">BACK TO DASHBOARD</a>
        <h4 class="page-title"><?php echo $title; ?></h4>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <!-- <th>Labour Cost</th>
                    <th>Production Cost</th>
                    <th>Cloth Req.</th> -->
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($items as $item): ?>
                <tr>
                    <td><?php echo $item['title']; ?></td>
                    <!-- <td><?php echo $item['labour_cost']; ?></td>
                    <td
                    ><?php echo $item['production_cost']; ?></td>
                    <td><?php echo $item['cloth_reqd']; ?></td> -->
                    <td>
                        <form action="<?php echo site_url('delete-item-exe'); ?>" method="post">
                            <input value="<?php echo $item['id']; ?>" type="hidden" name="item_id">
                            <button type="submit" class="btn" style="background-color: red !important;"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>     
    
        </table>
    </div>
</main>