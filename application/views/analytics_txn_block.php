<?php if(!empty($transactions)){ foreach($transactions as $transaction) { ?>
    <li class="d-flex flex-wrap justify-content-between align-items-center pl-11 pl-xlg-13 py-3 border-0">
    <div class="income-date">
        <div class="icon-wrap">
            <span class="<?php echo $transaction['Icon']; ?>  p-2 text-white"></span>
        </div>
        <h6 class="text font-weight-medium m-0"><?php echo $transaction['Name']; ?></h6>
        <span class="date"><?php echo date('n M Y',strtotime($transaction['CrDate'])); ?></span>
    </div>
    <span class="<?php echo $class; ?> font-weight-medium analytics_currency USD_net_buget_val "><?php echo $symbol." ".$transaction['USD']; ?></span>
    <span class="<?php echo $class; ?> font-weight-medium analytics_currency EUR_net_buget_val " style="display:none;"><?php echo $symbol." ".$transaction['EUR']; ?></span>
    <span class="<?php echo $class; ?> font-weight-medium analytics_currency GBP_net_buget_val " style="display:none;"><?php echo $symbol." ".$transaction['GBP']; ?></span>
    <span class="<?php echo $class; ?> font-weight-medium analytics_currency NGN_net_buget_val " style="display:none;"><?php echo $symbol." ".$transaction['NGN']; ?></span>
</li>
<?php }} ?>
