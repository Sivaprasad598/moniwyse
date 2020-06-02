
<?php if(!empty($categories))
{
    foreach($categories as $category){ 
        
    $transactions = $this->estimation_m->GetCategoryBasedEstimations($category['CategoryId']);    
        ?>

<div class="col-md-12">
            <div class="budget-planner bg-white px-3 px-md-9 py-5 pt-md-7 pb-md-6 pt-lg-3 pb-lg-10 pt-xxl-11 pb-xxl-16 mb-5">
                <button class="h2 bg-transparent border-0 font-weight-semi d-inline-block" data-toggle="collapse" href="#estimation<?php echo $category['CategoryId']; ?>" role="button" aria-expanded="false">
                    <?php echo $category['Name']; ?>
                </button>
                <div class="collapse show" id="estimation<?php echo $category['CategoryId']; ?>">
                    <div class="table-wrapper  ">
                        <table class="table budget-planner-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><h4 class="font-weight-medium">Estimated (
                                        <span class="est_currency_change est_USD_Currency_span" >$</span>
                                        <span class="est_currency_change est_GBP_Currency_span" style="display:none;">£</span>
                                        <span class="est_currency_change est_EUR_Currency_span" style="display:none;">€</span>
                                        <span class="est_currency_change est_NGN_Currency_span" style="display:none;">₦</span>
                                    )</h4></th>
                                    <th><h4 class="font-weight-medium">Renew Period</h4></th>

                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($transactions)) { foreach($transactions as $transaction) { ?>
                                <tr id="est_row<?php echo $transaction['Id']; ?>">
                                    <td>
                                        <div class="items pl-11">
                                            <div class="icon-wrap">
                                                <span class="<?php echo $transaction['Icon']; ?> p-2 text-white"></span>	
                                            </div>		
                                            <h6 class="items-name font-weight-medium"><?php echo $transaction['Name']; ?></h6>
                                        </div>
                                    </td>
                                    <td><span class="est_currency_change est_USD_Currency_span" ><?php echo $transaction['USD']; ?></span>
                                        <span class="est_currency_change est_GBP_Currency_span" style="display:none;"><?php echo $transaction['GBP']; ?></span>
                                        <span class="est_currency_change est_EUR_Currency_span" style="display:none;"><?php echo $transaction['EUR']; ?></span>
                                        <span class="est_currency_change est_NGN_Currency_span" style="display:none;"><?php echo $transaction['NGN']; ?></span>
                                    </td>
                                    <td>
                                    <!-- select-wrap  -->
                                        <div class="down-arrow-wrap">
                                            <select >
                                                <option value="30" <?php if($transaction['RenewDays'] == '30'){ echo 'selected="selected"'; } ?>>1 month</option>
                                                <option value="90" <?php if($transaction['RenewDays'] == '90'){ echo 'selected="selected"'; } ?>>3 months</option>
                                                <option value="180" <?php if($transaction['RenewDays'] == '180'){ echo 'selected="selected"'; } ?>>6 months</option>
                                                <option value="365" <?php if($transaction['RenewDays'] == '365'){ echo 'selected="selected"'; } ?>>1 year</option>
                                                
                                            </select>
                                            <span class="icon-drop"></span>
                                        </div>
                                    </td>

                                    <td>
                                    <div class="items pl-11  mr-10">
                                
                                    <a href="#" onclick="open_edit_estimation_modal(<?php echo $transaction['Id']; ?>);">edit</a>
                                    <a class="ml-5" href="#" onclick="delete_estimation(<?php echo $transaction['Id']; ?>)">delete</a>	
                                
                                
                                    </div>
                           
                                    </td>
                                </tr>
                            <?php }} ?>
                                
                            </tbody>
                        </table>
                        <a href="#" onclick="open_est_category_madal('<?php echo $category['CategoryId']; ?>','<?php echo $category['Type']; ?>')" class="add-more text-decoration-none font-weight-medium"><span class="icon-plus plus"></span> Add More</a>
                    </div>
                </div>
            </div>
        </div>

<?php        
    }
}else{
?>
<button class="budget-planner add-category font-weight-medium bg-transparent border-0 bg-white p-3 px-md-9  pt-md-4 pb-md-4 py-xxl-11   mb-5 text-center w-100">
    No Estimations Found
</button>

<?php } ?>