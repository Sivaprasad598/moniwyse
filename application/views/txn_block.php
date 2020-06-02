
<?php if(!empty($categories))
{

   // echo "<pre>"; print_r($categories); echo "</pre>";
    foreach($categories as $category){ 
        
    $transactions = $this->transaction_m->GetCategoryBasedTransactions($category['CategoryId'],$month);    
    // echo "<pre>"; print_r($categories); echo "</pre>";
        ?>

<div class="budget-planner bg-white px-3 px-md-9 py-5 pt-md-7 pb-md-6 pt-lg-3 pb-lg-10 pt-xxl-11 pb-xxl-16 mb-5">
    <button class="h2 bg-transparent border-0 font-weight-semi d-inline-block" data-toggle="collapse" href="#transaction<?php echo $category['CategoryId']; ?>" role="button" aria-expanded="false">
        <?php echo $category['Name']; ?>
    </button>
    <div class="collapse show" id="transaction<?php echo $category['CategoryId']; ?>">
        <div class="table-wrapper  ">
            <table class="table budget-planner-table">
                <thead>
                    <tr>
                        <th></th>
                        <th><h4 class="font-weight-medium">Estimated (
                            <span class="txn_currency_change txn_USD_Currency_span" >$</span>
                            <span class="txn_currency_change txn_GBP_Currency_span" style="display:none;">£</span>
                            <span class="txn_currency_change txn_EUR_Currency_span" style="display:none;">€</span>
                            <span class="txn_currency_change txn_NGN_Currency_span" style="display:none;">₦</span>
                            )</h4></th>
                        <th><h4 class="font-weight-medium">
                        <?php if($category['Type'] == 'Income') { echo "Actual"; }else{ echo "Spent"; } ?>
                         (
                            <span class="txn_currency_change txn_USD_Currency_span" >$</span>
                            <span class="txn_currency_change txn_GBP_Currency_span" style="display:none;">£</span>
                            <span class="txn_currency_change txn_EUR_Currency_span" style="display:none;">€</span>
                            <span class="txn_currency_change txn_NGN_Currency_span" style="display:none;">₦</span>
                            ) </h4></th>
                        <th><h4 class="font-weight-medium">Remaining (
                            <span class="txn_currency_change txn_USD_Currency_span" >$</span>
                            <span class="txn_currency_change txn_GBP_Currency_span" style="display:none;">£</span>
                            <span class="txn_currency_change txn_EUR_Currency_span" style="display:none;">€</span>
                            <span class="txn_currency_change txn_NGN_Currency_span" style="display:none;">₦</span>
                            ) </h4></th>

                    <!-- <th>
                    </th> -->
                    
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($transactions)) { foreach($transactions as $transaction) { ?>

                    <tr>
                        <td>
                            <div class="items pl-11">
                                <div class="icon-wrap">
                                    <span class="<?php echo $transaction['Icon']; ?> p-2 text-white"></span>	
                                </div>		
                                <h6 class="items-name font-weight-medium"><?php echo $transaction['Name']; ?></h6>
                            </div>
                        </td>
                        <td>
                            <span class="txn_currency_change txn_USD_Currency_span" ><?php echo $transaction['USD_Est']; ?></span>
                            <span class="txn_currency_change txn_GBP_Currency_span" style="display:none;"><?php echo $transaction['GBP_Est']; ?></span>
                            <span class="txn_currency_change txn_EUR_Currency_span" style="display:none;"><?php echo $transaction['EUR_Est']; ?></span>
                            <span class="txn_currency_change txn_NGN_Currency_span" style="display:none;"><?php echo $transaction['NGN_Est']; ?></span>   
                        </td>
                        <td>
                            <span class="txn_currency_change txn_USD_Currency_span" ><?php echo $transaction['USD_Txn']; ?></span>
                            <span class="txn_currency_change txn_GBP_Currency_span" style="display:none;"><?php echo $transaction['GBP_Txn']; ?></span>
                            <span class="txn_currency_change txn_EUR_Currency_span" style="display:none;"><?php echo $transaction['EUR_Txn']; ?></span>
                            <span class="txn_currency_change txn_NGN_Currency_span" style="display:none;"><?php echo $transaction['NGN_Txn']; ?></span>
                        </td>
                        <td>
                            <span class="txn_currency_change txn_USD_Currency_span" ><?php echo $transaction['USD_Rem']; ?></span>
                            <span class="txn_currency_change txn_GBP_Currency_span" style="display:none;"><?php echo $transaction['GBP_Rem']; ?></span>
                            <span class="txn_currency_change txn_EUR_Currency_span" style="display:none;"><?php echo $transaction['EUR_Rem']; ?></span>
                            <span class="txn_currency_change txn_NGN_Currency_span" style="display:none;"><?php echo $transaction['NGN_Rem']; ?></span>
                        </td>
                    <?php /* ?>
                        <td>
                            <div class="items pl-11  mr-10">
                                
                                    <a href="#" onclick="open_edit_transaction_modal();">edit</a>
                                    <a class="ml-5" href="#" onclick="delete_transaction(<?php echo $transaction['Id']; ?>)">delete</a>	
                                
                                
                            </div>
                           
                        </td>
                    <?php */ ?>   
                    </tr>
                <?php }} ?>
                    
                  
                </tbody>
            </table>
            <a href="#" onclick="open_txn_category_madal('<?php echo $category['CategoryId']; ?>','<?php echo $category['Type']; ?>')"class="add-more text-decoration-none font-weight-medium"><span class="icon-plus plus"></span> Add More</a>
        </div>
    </div>
</div>

<?php        
    }
}else{
?>
<button class="budget-planner add-category font-weight-medium bg-transparent border-0 bg-white p-3 px-md-9  pt-md-4 pb-md-4 py-xxl-11   mb-5 text-center w-100">
    No Transactions Found
</button>
<?php } ?>
<?php /* ?>
 
 <!-- <button class="budget-planner add-category font-weight-medium bg-transparent border-0 bg-white p-3 px-md-9  pt-md-4 pb-md-4 py-xxl-11   mb-5 text-center w-100">
    +  Add Expense Category
</button> -->
<?php */ ?>