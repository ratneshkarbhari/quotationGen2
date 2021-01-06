<main class="page-content" id="add-new-invoice">

    <div class="container" style="width: 90%;">

        <a style="margin: 2% 0;" href="<?php echo site_url(); ?>" class="btn">BACK TO DASHBOARD</a>
        <h4 class="page-title">Create New Quotation</h4>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>
    
        <form action="<?php echo site_url('create-invoice-and-download'); ?>" method="post" id="invoice-create-form" enctype="multipart/form-data">

            <div class="">
                <label for="payee_name">Payee Business Name</label>
                <input type="text" name="payee_name" id="payee_name" required>
            </div>

           

            <div class="">
                <label for="invoice_code">Quotation Code</label>
                <input type="text" value="<?php echo date('d-m-y').'-'.$new_latest_inv_id; ?>" name="invoice_code" id="invoice_code" readonly>
            </div>


            <div class="row">
                <div class="col l6 m12 s12" style="margin: 0; padding: 0;">
                    <label for="payee_email">Payee Email</label>
                    <input type="email" name="payee_email" id="payee_email" required>
                </div>
                <div class="col l6 m12 s12" style="margin: 0; padding: 0;">
                    <label for="payee_mobile_number">Payee Contact Number</label>
                    <input type="text" name="payee_mobile_number" id="payee_mobile_number" required>
                </div>
                <div class="col l12 m12 s12" style="margin: 0; padding: 0;">
                    <label for="payee_address">Payee Address</label>
                    <textarea name="payee_address" id="payee_address" class="materialize-textarea"></textarea>
                </div>
            </div>

            <div id="invoice-items">

                <div class="invoice-item row">

                    <div style="padding: 1% 0.5%;" class="invoice-field col l3 m12 s12">
                        <label>Item</label>
                        <select name="items[]" class="browser-default cost-changer" item-type="item-id" item-pos="0" id="item-0">
                            <?php foreach($items as $item): ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="padding: 1% 0.5%;" class="invoice-field col l1 m12 s12">
                        <label>Size</label>
                        <select name="sizes[]" item-type="item-size" class="browser-default cost-changer" item-pos="0" id="size-0">
                            <?php $j=0; for($i=22;$i<=42;$i++): if($i%2==0): ?>
                            <option value="<?php echo $j; ?>"><?php echo $i; ?></option>
                            <?php $j++; endif; endfor; ?>
                        </select>
                    </div>
                    <div style="padding: 1% 0.5%;" class="invoice-field col l1 m12 s12">
                        <label for="prod-cost-0">Prod. Cost</label>
                        <input type="text" name="prod-costs[]" value="<?php echo $first_uni_item['prod_cost']; ?>"  item-pos="0" readonly id="prod-cost-0">
                    </div>
                    
                    <div style="padding: 1% 0.5%;" class="invoice-field col l1 m12 s12">
                        <label for="cloth-reqd-0">Cloth Reqd.</label>
                        <input type="text" name="cloth-reqd[]" value="<?php echo $first_uni_item['cloth_reqd']; ?>" readonly id="cloth-reqd-0">
                    </div>
                    <div style="padding: 1% 0.5%;" class="invoice-field col l2 m12 s12">
                        <label for="cloth-cost-0">Cloth Cost</label>
                        <input type="number" name="cloth-cost[]" class="cost-changer"  item-type="cloth-cost" item-pos="0" min="30.00" value="30.00" id="cloth-cost-0">
                    </div>
                    <div style="padding: 1% 0.5%;" class="invoice-field col l1 m12 s12">
                        <label for="qty-0">Qty.</label>
                        <input type="number" min="1" name="qty[]" item-type="item-qty" class="cost-changer" item-pos="0" id="qty-0" value="1" >
                    </div>
                    <div style="padding: 1% 0.5%;" class="invoice-field col l3 m12 s12">
                        <label for="total-prod-cost-0">Total Prod. Cost</label>
                        <input type="text" name="total-prod-cost[]"  item-pos="0" class="total-prod-costs" id="total-prod-cost-0" value="<?php $totalProdCost=0.00; $totalProdCost= $first_uni_item['prod_cost']+($first_uni_item['cloth_reqd']*30); echo $totalProdCost+=(0.25*$totalProdCost); ?>" readonly>                
                    </div>
                    
                
                </div>

            </div>
            <center>
            <button type="button" class="btn" id="add-item">+</button>
            </center>

            <div class="row" style="margin: 3% 0;">
            
                <div class="col l6 m6 s12 center" style="margin: 2% 0;">
                                
                    <button type="button" id="calculate-grand-total-prod-cost-trigger" class="btn">Calculate Grand total Prod Cost:</button>
                
                </div>
                <div class="col l6 m6 s12 right" style="margin: 2% 0;">
                    <!-- <label for="grand-total-prod-cost">Rs.</label> -->
                    <input type="text" name="grand-total-prod-cost" id="grand-total-prod-cost" value="0.00" readonly>
                
                </div>

                <div class="col l6 m6 s12 center" style="margin: 4% 0 0 0;">
                                
                    <button type="button" id="calculate-final-price-with-gst-margin" class="btn">Calculate Final Price with GST:</button>
                            
                </div>
                <div class="col l6 m6 s12 right" style="margin: 2% 0;">
                    <!-- <label for="grand-total-prod-cost">Rs.</label> -->
                    <input type="text" name="final-price-with-gst-margin" id="final-price-with-gst-margin" value="0.00" readonly>
                
                </div>





            </div>

            <center>
        <button style="margin: 5% 0;" type="submit" class="btn"  id="create_download_invoice">CREATE AND DOWNLOAD INVOICE</button>
        </center>            

        
        </form>

                


    </div>

</main>

<script>


    // Add new invoice item
    let currenLatesttInvoiceItemPos = 1;
    $("form#invoice-create-form").on('click',"button#add-item",function(){
        $("div#invoice-items").append('<div class="invoice-item row"> <div style="padding: 1% 0.5%;" class="invoice-field col l3 m12 s12"> <label>Item</label> <select item-type="item-id" name="items[]" class="browser-default cost-changer" item-pos="'+currenLatesttInvoiceItemPos+'" id="item-'+currenLatesttInvoiceItemPos+'"> <?php foreach($items as $item): ?> <option value="<?php echo $item['id']; ?>"><?php echo $item['title']; ?></option> <?php endforeach; ?> </select> </div><div style="padding: 1% 0.5%;" class="invoice-field col l1 m12 s12"> <label>Size</label> <select name="sizes[]" item-type="item-size" class="browser-default size-select cost-changer" item-pos="'+currenLatesttInvoiceItemPos+'" id="size-'+currenLatesttInvoiceItemPos+'"> <?php $j=0; for($i=22;$i<=42;$i++): if($i%2==0): ?> <option value="<?php echo $j; ?>"><?php echo $i; ?></option> <?php $j++; endif; endfor; ?> </select> </div><div style="padding: 1% 0.5%;" class="invoice-field col l1 m12 s12"> <label for="prod-cost-'+currenLatesttInvoiceItemPos+'">Prod. Cost</label> <input type="text" name="prod-costs[]" value="<?php echo $first_uni_item['prod_cost']; ?>" item-pos="'+currenLatesttInvoiceItemPos+'" readonly id="prod-cost-'+currenLatesttInvoiceItemPos+'"> </div><div style="padding: 1% 0.5%;" class="invoice-field col l1 m12 s12"> <label for="cloth-reqd-'+currenLatesttInvoiceItemPos+'">Cloth Reqd.</label> <input type="text" name="cloth-reqd[]" value="<?php echo $first_uni_item['cloth_reqd']; ?>" readonly id="cloth-reqd-'+currenLatesttInvoiceItemPos+'"> </div><div style="padding: 1% 0.5%;" class="invoice-field col l2 m12 s12"> <label for="cloth-cost-'+currenLatesttInvoiceItemPos+'">Cloth Cost</label> <input type="text" name="cloth-cost[]" item-type="cloth-cost" item-pos="'+currenLatesttInvoiceItemPos+'" class="cost-changer"  value="30.00" id="cloth-cost-'+currenLatesttInvoiceItemPos+'"> </div><div style="padding: 1% 0.5%;" class="invoice-field col l1 m12 s12"> <label for="qty-'+currenLatesttInvoiceItemPos+'">Qty.</label> <input type="number" min="1" name="qty[]" class="cost-changer" item-pos="'+currenLatesttInvoiceItemPos+'" item-type="item-qty" id="qty-'+currenLatesttInvoiceItemPos+'" value="1" > </div><div style="padding: 1% 0.5%;" class="invoice-field col l3 m12 s12"> <label for="total-prod-cost-'+currenLatesttInvoiceItemPos+'">Total Prod. Cost</label> <input type="text" name="total-prod-cost[]" item-pos="'+currenLatesttInvoiceItemPos+'" id="total-prod-cost-'+currenLatesttInvoiceItemPos+'" value="<?php $totalProdCost=0.00; $totalProdCost= $first_uni_item['prod_cost']+($first_uni_item['cloth_reqd']*30); echo $totalProdCost+=(0.25*$totalProdCost); ?>" class="total-prod-costs" readonly> </div></div>');

        currenLatesttInvoiceItemPos++;
    });

    function roundKaro(value, precision) {
        var aPrecision = Math.pow(10, precision);
        return Math.round(value*aPrecision)/aPrecision;
    }

    /* Pulling item data and calculating total production cost with cloth and prod cost.*/
    $("div#invoice-items").on('change','.invoice-item .cost-changer',function (e) { 
        e.preventDefault();
        let itemPos = $(this).attr('item-pos');
        let itemId = $("select#item-"+itemPos).val();
        let itemSize = $("select#size-"+itemPos).val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('fetch-costs-and-cloth-reqd'); ?>",
            data: {
                item_id : itemId,
                item_size : itemSize
            },
            success: function (response) {
                let parsedResponse = JSON.parse(response);
                let prodCost = parseFloat(parsedResponse.production_cost);
                $("input#prod-cost-"+itemPos).val(prodCost);
                let clothReqd = parseFloat(parsedResponse.cloth_reqd);
                $("input#cloth-reqd-"+itemPos).val(clothReqd);
                let itemQty = parseInt($("input#qty-"+itemPos).val());
                let clothCost = parseFloat($("input#cloth-cost-"+itemPos).val());
                let totalProdCostCal = (prodCost+(clothReqd*clothCost))*itemQty;
                totalProdCostCal = totalProdCostCal+(0.25*totalProdCostCal);
                totalProdCostCal = roundKaro(totalProdCostCal,2);
                $("input#total-prod-cost-"+itemPos).val(totalProdCostCal);
            }
        });
    });

    // Caclulating grand total
    $("button#calculate-grand-total-prod-cost-trigger").click(function (e) { 
        e.preventDefault();
        let allTotalProdCosts = document.getElementsByClassName('total-prod-costs');
        let grandProdTotal = 0.00;
        for (let index = 0; index < allTotalProdCosts.length; index++) {
            let prodCost = allTotalProdCosts[index].value;
            grandProdTotal = parseFloat(grandProdTotal)+parseFloat(prodCost);
        }

        $("input#grand-total-prod-cost").val(grandProdTotal);
    });

    // Calculating final price with GSt and margin
    $("button#calculate-final-price-with-gst-margin").click(function(){
        let grandTotalProdCost = $("input#grand-total-prod-cost").val();
        let grandTotalPriceWithGstMargin = parseFloat(grandTotalProdCost) + parseFloat(grandTotalProdCost)*0.05;
        grandTotalPriceWithGstMargin = roundKaro(grandTotalPriceWithGstMargin,2);
        $("input#final-price-with-gst-margin").val(grandTotalPriceWithGstMargin);
    });

</script>