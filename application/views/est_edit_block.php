<ul class="nav d-flex justify-content-center nav-pills mb-4 mb-lg-9" role="tablist">
						<li class="nav-item font-weight-medium mr-lg-7 " role="presentation">
							<a class="nav-link active"  data-toggle="pill" href="#edit_incomes">Income</a>
						</li>
						<li class="nav-item font-weight-medium" role="presentation">
							<a class="nav-link"  data-toggle="pill" href="#edit_expenses">Expense</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="edit_incomes" role="tabpanel">
							<form class="login-form needs-validation" novalidate action="#" id="edit_est_in_form">
							<!-- select-wrap -->
							<div class="down-arrow-wrap">
									<div class="form-group">
										<select class="py-2"  id="edit_est_in_category" name="edit_est_in_category">
											<option> Category</option>
											<?php if(!empty($income_categories)){ foreach($income_categories as $category) { ?>
												<option value="<?php echo $category['Id']; ?>" <?php if($estimation_details[0]['CategoryId'] == $category['Id']) { echo "selected"; } ?>> <?php echo $category['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<!-- select-wrap -->
								<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" id="edit_est_in_sub_category" name="edit_est_in_sub_category">
											<option> Sub Category</option>
                                            <?php if(!empty($estimation_details[0]['Type'] == 'cr')) { 

                                                if(!empty($sub_categories)){ foreach($sub_categories as $sub_category) { ?>
                                                    <option value="<?php echo $sub_category['Id']; ?>" <?php if($estimation_details[0]['SubCategoryId'] == $sub_category['Id']) { echo "selected"; } ?>> <?php echo $sub_category['Name']; ?></option>
                                                <?php }}} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
                                <!-- select-wrap -->
								<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" name="edit_est_in_currency">
											<option> Currency</option>
											<?php if(!empty($currencies)){ foreach($currencies as $currency) { ?>
												<option value="<?php echo $currency['Id']; ?>" <?php if($estimation_details[0]['CurrencyType'] == $currency['Id']) { echo "selected"; } ?>> <?php echo $currency['Symbol']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $currency['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<div class="focus-group mb-3">
									<input type="text" class="form-control focus-control in-focus" id="income-amounts" name="edit_est_in_amount" value="<?php echo $estimation_details[0]['Amount'];  ?>" required>
									<label for="income-amounts">Amount</label>
								</div>
                                <input type="hidden" name="edit_est_in_id" value="<?php echo $estimation_details[0]['Id']; ?>" />
                                <input type="hidden" name="edit_est_in_type" value="<?php echo $estimation_details[0]['Type']; ?>" />
                                <!-- select-wrap -->
								<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2"  name="edit_est_in_renew_days" >
											<option> Renew Period</option>
                                            <option value="30" <?php if($estimation_details[0]['RenewDays'] == '30') { echo "selected"; } ?>> 1 month</option>
											<option value="90" <?php if($estimation_details[0]['RenewDays'] == '90') { echo "selected"; } ?>> 3 months</option>
											<option value="180" <?php if($estimation_details[0]['RenewDays'] == '180') { echo "selected"; } ?>>6 months</option>
											<option value="365"<?php if($estimation_details[0]['RenewDays'] == '365') { echo "selected"; } ?>>1 year</option>
											
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								
								<div class="form-footer pt-12 pb-5 text-center">
									<input type="button" onclick="edit_in_estimation()" class="btn transaction btn-secondary text-white" value="Update">
								</div>
							</form>
						</div>

						<div class="tab-pane fade" id="edit_expenses" role="tabpanel">
							<form class="login-form needs-validation" novalidate action="#" id="edit_est_ex_form">
							<!-- select-wrap -->
							<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" id="edit_est_ex_category" name="edit_est_ex_category">
											<option> Category</option>
											<?php if(!empty($expense_categories)){ foreach($expense_categories as $category) { ?>
												<option value="<?php echo $category['Id']; ?>" <?php if($estimation_details[0]['CategoryId'] == $category['Id']) { echo "selected"; } ?>><?php echo $category['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<!-- select-wrap -->
								<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" id="edit_est_ex_sub_category" name="edit_est_ex_sub_category">
											<option> Sub Category</option>
                                            <?php if(!empty($estimation_details[0]['Type'] == 'dr')) { 

                                         if(!empty($sub_categories)){ foreach($sub_categories as $sub_category) { ?>
                                                <option value="<?php echo $sub_category['Id']; ?>" <?php if($estimation_details[0]['SubCategoryId'] == $sub_category['Id']) { echo "selected"; } ?>> <?php echo $sub_category['Name']; ?></option>
                                            <?php }}} ?>
                                            
											
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
                                <!-- select-wrap -->
								<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" name="edit_est_ex_currency">
											<option> Currency</option>
											<?php if(!empty($currencies)){ foreach($currencies as $currency) { ?>
												<option value="<?php echo $currency['Id']; ?>" <?php if($estimation_details[0]['CurrencyType'] == $currency['Id']) { echo "selected"; } ?>> <?php echo $currency['Symbol']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $currency['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>

								<div class="focus-group mb-3">
									<input type="text" class="form-control focus-control in-focus" id="expense-amounts" name="edit_est_ex_amount" required value="<?php echo $estimation_details[0]['Amount'];  ?>">
									<label for="expense-amounts">Amount</label>
								</div>
                                <input type="hidden" name="edit_est_ex_id" value="<?php echo $estimation_details[0]['Id']; ?>" />
                                <input type="hidden" name="edit_est_ex_type" value="<?php echo $estimation_details[0]['Type']; ?>" />
								<!-- select-wrap -->
                                <div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" name="edit_est_ex_renew_days">
											<option> Renew Period</option>
											<option value="30" <?php if($estimation_details[0]['RenewDays'] == '30') { echo "selected"; } ?>> 1 month</option>
											<option value="90" <?php if($estimation_details[0]['RenewDays'] == '90') { echo "selected"; } ?>> 3 months</option>
											<option value="180" <?php if($estimation_details[0]['RenewDays'] == '180') { echo "selected"; } ?>>6 months</option>
											<option value="365"<?php if($estimation_details[0]['RenewDays'] == '365') { echo "selected"; } ?>>1 year</option>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								
								<div class="form-footer pt-12 pb-5 text-center">
									<input type="button" onclick="edit_ex_estimation()" class="btn transaction btn-secondary text-white" value="Update">
								</div>
							</form>
						</div>
					</div>