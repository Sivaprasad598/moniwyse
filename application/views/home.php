<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Moniwyse</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/main.css">
	
</head>
<body>
	<div class="wrapper pt-15  pt-lg-25">
		<header class="header bg-white py-4 py-xxl-11">
			<div class="container d-flex flex-wrap align-items-center">
				<div class="col-5 col-md-3 col-xl-2 col-xxxl-3">	
					<div class="logo">
						<a href="#"><img src="<?php echo base_url('assets/'); ?>images/logo.svg" alt="image description"></a>
					</div>
				</div>
				<div class="col-7 col-md-9 col-xl-10 col-xxxl-9">
					<nav class="nav d-flex flex-wrap justify-content-end   align-items-center justify-content-md-between ">
						<h3 class="font-weight-bold m-0">Welcome!  <?php echo $_SESSION['full_name']; ?></h3>
						<div class="head d-flex flex-wrap justify-content-between align-items-center ml-sm-5">
							<a href="#"><img src="<?php echo $_SESSION['profile_image']; ?>" class="user" alt="image description"></a>
							<div class="user-wrap">
								<a href="#" class="user-name font-weight-medium text-decoration-none mx-4 ml-lg-5 mr-lg-8"><?php echo $_SESSION['full_name']; ?> <span class="icon-drop"></span>
								</a>
								<ul class="user-menu list-unstyled m-0 bg-white">
									<li class="p-4">
										<a href="#" class="text-decoration-none d-block">
											<span class="icon-help icon"></span>
											<span class="text ml-3">Help Center</span>
										</a>
									</li>
									<li class="p-4">
										<a href="<?php echo base_url('SignOut'); ?>" class="text-decoration-none d-block">
											<span class="icon-logout icon"></span>
											<span class="text ml-3">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</header>
		<main class="main">
			<section class="analytics py-5 py-xl-15 py-xlg-17 py-xxl-25">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-2 col-xxxl-3">	
							<div class="tab">
								<ul class="nav nav-pills d-block d-flex flex-wrap justify-content-between d-xl-block mb-5" id="pills-tab" role="tablist">
									<li class="nav-item mb-2" role="presentation">
										<a class="nav-link d-flex flex-wrap align-items-center align-content-center active py-2 py-xxl-4 px-4 px-xl-2  p-xxxl-5" id="pills-home-tab" data-toggle="pill" href="#board">
											<div class="icon text-center mr-2 mr-xlg-4">
												<span class="icon-board"></span>
											</div>
											Budget Board
										</a>
									</li>
									<li class="nav-item mb-2" role="presentation">
										<a class="nav-link d-flex flex-wrap align-items-center align-content-center py-2 py-xxl-4 px-4 px-xl-2  p-xxxl-5" id="pills-profile-tab" data-toggle="pill" href="#analytics">
											<div class="icon text-center mr-2 mr-xlg-4">
												<span class="icon-analytics"></span>
											</div>
											Analytics
										</a>
									</li>

									<li class="nav-item mb-2" role="presentation">
										<a class="nav-link d-flex flex-wrap align-items-center align-content-center py-2 py-xxl-4 px-4 px-xl-2  p-xxxl-5" id="pills-profile-tab" data-toggle="pill" href="#planner">
											<div class="icon text-center mr-2 mr-xlg-4">
												<span class="icon-planner"></span>
											</div>
											Budget Planner
										</a>
									</li>

									<li class="nav-item mb-2" role="presentation">
										<a class="nav-link d-flex flex-wrap align-items-center align-content-center py-2 py-xxl-4 px-4 px-xl-2  p-xxxl-5" id="pills-profile-tab" data-toggle="pill" href="#settings">
											<div class="icon text-center mr-2 mr-xlg-4">
												<span class="icon-setting"></span>
											</div>
											Settings
										</a>
									</li>
								</ul>
							</div>
							<div class="upgrade-btn  pb-5  pb-xl-0 ml-md-auto">
								<span class="label-for-button font-weight-medium d-block pb-2 pb-xl-4">For extra benefits</span>
								<button class="btn pro-btn text-white  py-3 px-2 py-xlg-3 pl-xlg-3 pr-xlg-14 border-0 text-left" data-toggle="modal" data-target="#PaymentOneModal">Upgrade To Pro
									<span class="icon-diamond"></span>
								</button>
							</div>
						</div>
						<div class="col-xl-10 col-xxxl-9">
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="board" role="tabpanel">
									<div class="budget-planner-form-wrap d-flex flex-wrap justify-content-center justify-content-md-between align-items-center mb-5 mb-xl-0">
										<button class="btn budget-btn text-white font-weight-medium py-3 py-xxl-4 mb-5 mb-md-0 mb-xl-5" onclick="open_transaction_modal();">+ Add Transaction</button>
										<form class="calendar-form  d-flex flex-wrap justify-content-center justify-content-sm-end align-items-center mb-xl-5 " action="#">
											<!-- select-wrap -->
											<div class=" down-arrow-wrap px-2  px-md-6 px-xlg-8  mb-md-0 ">
												<select class="py-2" id="txn_currency_filter">
													<?php if(!empty($currencies)){ foreach($currencies as $currency) { ?>
														<option value="<?php echo $currency['Code']; ?>"> <?php echo $currency['Symbol']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $currency['Name']; ?></option>
													<?php }} ?>
												</select>
												<span class="icon-drop"></span>
											</div>
											<!-- select-wrap -->
											<div class=" down-arrow-wrap px-2 ml-2 px-md-6 px-xlg-8  mb-md-0  ml-md-10">
												<select class="py-2" id="txn_date_filter">
													<option value="01" <?php if(date('m') == '01'){ echo "selected"; } ?>> Jan 2020</option>
													<option value="02" <?php if(date('m') == '02'){ echo "selected"; } ?>> Feb 2020</option>
													<option value="03" <?php if(date('m') == '03'){ echo "selected"; } ?>> Mar 2020</option>
													<option value="04" <?php if(date('m') == '04'){ echo "selected"; } ?>> Apr 2020</option>
													<option value="05" <?php if(date('m') == '05'){ echo "selected"; } ?>> May 2020</option>
													<option value="06" <?php if(date('m') == '06'){ echo "selected"; } ?>> Jun 2020</option>
													<option value="07" <?php if(date('m') == '07'){ echo "selected"; } ?>> Jul 2020</option>
													<option value="08" <?php if(date('m') == '08'){ echo "selected"; } ?>> Aug 2020</option>
													<option value="09" <?php if(date('m') == '09'){ echo "selected"; } ?>> Sep 2020</option>
													<option value="10" <?php if(date('m') == '10'){ echo "selected"; } ?>> Oct 2020</option>
													<option value="11" <?php if(date('m') == '11'){ echo "selected"; } ?>> Nov 2020</option>
													<option value="12" <?php if(date('m') == '12'){ echo "selected"; } ?>> Dec 2020</option>
												</select>
												<span class="icon-drop"></span>
											</div>
										</form>
									</div>
									<div id="txn_block">
									
									</div>
								</div>
								<div class="tab-pane fade show" id="analytics" role="tabpanel">
									<form class="calendar-form d-flex flex-wrap justify-content-between justify-content-sm-end align-items-center mb-5  ml-lg-auto" action="#">
										<!-- select-wrap -->
										<div class=" down-arrow-wrap px-2  px-md-6 px-xlg-8  mb-md-0">
											<select class="py-2" id="analytics_currency_filter">
											<?php if(!empty($currencies)){ foreach($currencies as $currency) { ?>
														<option value="<?php echo $currency['Code']; ?>"> <?php echo $currency['Symbol']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $currency['Name']; ?></option>
													<?php }} ?>
											</select>
											<span class="icon-drop"></span>
										</div>
										<div class="date-picker  ml-sm-4 mb-md-0">
											<label for="datePickerDate" class="calendar d-flex flex-wra justify-content-center align-items-center py-3 px-1 px-sm-2 py-lg-3 px-lg-3 m-0">
												<span class="icon-planner calendar-icon"></span>
												<div class="start-date mx-1 mx-sm-3 ">
													<div class="text d-flex flex-wrap justify-content-center align-items-center">
														<h5 class="mx-1 mb-0 font-weight-me"><span class="date-day"><?php echo '01'; ?></span> <span class="date-month"><?php echo date('M'); ?></span></h5>
														<h5 class="year mx-1 mb-0"><?php echo date('Y'); ?></h5>
													</div>
												</div>
												<div class="start-date end-date mx-1 mx-sm-3">
													<div class="text d-flex flex-wrap justify-content-center align-items-center">
														<h5 class="mx-1 mb-0"><span class="date-day"><?php echo date('d'); ?></span> <span class="date-month"><?php echo date('M'); ?></span></h5>
														<h5 class="year mx-1 mb-0"><?php echo date('Y'); ?></h5>
													</div>
												</div>
												<span class="icon-drop calendar-icon"></span>
											</label>
											<input type="text" id="datePickerDate" class="form-control date-pick">
										</div>
									</form>
									<div class="row justify-content-center">
										<div class="col-12 col-md-10 col-lg-6 col-xl-6 mb-5 mb-lg-0 mb-xl-0">
											<div class="graph p-5  h-100 ">
												<div class="heading d-flex flex-wrap justify-content-between align-items-center mb-5 mb-md-0">
													<h2 class="font-weight-semi ">Bugdet Overview</h2>
													<span class="icon-three-dots"></span>
												</div>
												<canvas id="line-chart" width="800" height="400"></canvas>
												
											</div>
										</div>
										<div class="col-12 col-md-10 col-lg-6 col-xl-6 ">
											<div class="budgets h-100 p-5">
												<div class="net-budget heading d-flex flex-wrap justify-content-between align-items-center  py-3  pb-lg-12">
													<h2 class="m-0">Net Budget</h2>
													<a href="#" class="dots text-decoration-none pr-lg-3 pt-lg-2"><span class="icon-three-dots"></span></a>
												</div>	
												<ul class="yearly-budget list-unstyled d-sm-flex flex-wrap  justify-content-between" id="net_budget_block">
													
												</ul>
											</div>
										</div>
									</div>
									<div class="budget-analytics pt-6 pt-xlg-12">
										<div class="row justify-content-center">
											<div class="col-md-6 col-lg-4">
												<div class="budget mb-5 p-5">
													<div class="heading d-flex flex-wrap justify-content-between mb-3">
														<h2 class="font-weight-semi">Income</h2>
														<a href="#" class="text-decoration-none"><span class="icon-three-dots"></span></a>
													</div>
													<div class="pie-chart m-auto">
														<div class="pie-title">
														<div id="income_transactions_total_block">
														
														</div>
														
														
														</div>
														<canvas id="pie"></canvas>
													</div>
													<div class="budget-head d-flex flex-wrap justify-content-between align-items-center pt-6">
														<h6 class="font-weight-medium">May 2020</h6>
														<h6 class="font-weight-medium">Amount 
														<span class="analytics_currency USD_net_buget_val" >(USD)</span>
														<span class="analytics_currency EUR_net_buget_val" style="display:none;">(EUR)</span>
														<span class="analytics_currency GBP_net_buget_val" style="display:none;">(GBP)</span>
														<span class="analytics_currency NGN_net_buget_val" style="display:none;">(NGN)</span>
														</h6>
													</div>
													<ul class="budget-list list-unstyled m-0" id="income_transactions_block">
														
													</ul>
												</div>
											</div>
											<div class="col-md-6 col-lg-4">
												<div class="budget mb-5 p-5">
													<div class="heading d-flex flex-wrap justify-content-between  mb-3">
														<h2 class="font-weight-semi">Expenses</h2>
														<a href="#" class="text-decoration-none"><span class="icon-three-dots"></span></a>
													</div>
													<div class="pie-chart m-auto">
														<div class="pie-title">
														<div id="expense_transactions_total_block">
														
														</div>
														</div>
														<canvas id="pie01"></canvas>
																											</div>
													<div class="budget-head d-flex flex-wrap justify-content-between align-items-center pt-6">
														<h6 class="font-weight-medium">May 2020</h6>
														<h6 class="font-weight-medium">Amount 
														<span class="analytics_currency USD_net_buget_val" >(USD)</span>
														<span class="analytics_currency EUR_net_buget_val" style="display:none;">(EUR)</span>
														<span class="analytics_currency GBP_net_buget_val" style="display:none;">(GBP)</span>
														<span class="analytics_currency NGN_net_buget_val" style="display:none;">(NGN)</span>

														</h6>
													</div>
													<ul class="budget-list list-unstyled m-0" id="expense_transactions_block">
														
													</ul>
												</div>
											</div>
											<div class="col-md-6 col-lg-4">
												<div class="budget mb-5 p-5">
													<div class="heading d-flex flex-wrap justify-content-between  mb-3">
														<h2 class="font-weight-semi">Savings</h2>
														<a href="#" class="text-decoration-none"><span class="icon-three-dots"></span></a>
													</div>
													<div class="pie-chart m-auto">
														<div class="pie-title">
															+5,650 <span>USD </span>
														</div>
														<canvas id="pie02"></canvas>
														
													</div>
													<div class="budget-head d-flex flex-wrap justify-content-between align-items-center pt-6">
														<h6 class="font-weight-medium">May 2020</h6>
														<h6 class="font-weight-medium">Amount (USD)</h6>
													</div>
													<ul class="budget-list list-unstyled m-0">
														<li class="d-flex flex-wrap justify-content-between align-items-center pl-11 pl-xlg-13 py-3">
															<div class="income-date">
																<div class="icon-wrap">
																	<span class="icon-gift p-2 text-white"></span>
																</div>
																<h6 class="text font-weight-medium m-0">Party</h6>
																<span class="date">3 May 2020</span>
															</div>
															<span class="income-amount font-weight-medium">-2,220</span>
														</li>
														<li class="d-flex flex-wrap justify-content-between align-items-center pl-11 pl-xlg-13 py-3">
															<div class="income-date">
																<div class="icon-wrap">
																	<span class="icon-pill p-2 text-white"></span>
																</div>
																<h6 class="text font-weight-medium m-0">Medicines</h6>
																<span class="date">3 May 2020</span>
															</div>
															<span class="expenses-amount font-weight-medium">+ 3,400</span>
														</li>
														<li class="d-flex flex-wrap justify-content-between align-items-center pl-11 pl-xlg-13 py-3">
															<div class="income-date">
																<div class="icon-wrap">
																	<span class="icon-shopping-cart p-2 text-white"></span>
																</div>
																<h6 class="text font-weight-medium m-0">Grocery</h6>
																<span class="date">3 May 2020</span>
															</div>
															<span class="income-amount font-weight-medium">-2,220</span>
														</li>
														<li class="d-flex flex-wrap justify-content-between align-items-center pl-11 pl-xlg-13 py-3">
															<div class="income-date">
																<div class="icon-wrap">
																	<span class="icon-shopping-bag p-2 text-white"></span>
																</div>
																<h6 class="text font-weight-medium m-0">Shopping</h6>
																<span class="date">3 May 2020</span>
															</div>
															<span class="income-amount font-weight-medium">-3,400</span>
														</li>
														<li class="d-flex flex-wrap justify-content-between align-items-center pl-11 pl-xlg-13 py-3 border-0">
															<div class="income-date">
																<div class="icon-wrap">
																	<span class="icon-home  p-2 text-white"></span>
																</div>
																<h6 class="text font-weight-medium m-0">House Rent</h6>
																<span class="date">3 May 2020</span>
															</div>
															<span class="expenses-amount font-weight-medium">-2,220</span>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade show" id="planner" role="tabpanel">
									<div class="budget-planner-form-wrap d-flex flex-wrap justify-content-between align-items-center mb-5 mb-xl-0">
										<button class="btn budget-btn text-white font-weight-medium py-3 py-xxl-4  mb-xl-5" onclick="open_estimation_modal();">+ Add Estimation</button>
										<form class="calendar-form  d-flex flex-wrap  justify-content-between justify-content-sm-end align-items-center  mb-xl-5" action="#">
											<!--  select-wrap -->
											<div class=" down-arrow-wrap px-2  px-md-6 px-xlg-8  mb-md-0">
												<select class="py-2" id ="est_currency_filter">
												<?php if(!empty($currencies)){ foreach($currencies as $currency) { ?>
														<option value="<?php echo $currency['Code']; ?>"> <?php echo $currency['Symbol']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $currency['Name']; ?></option>
													<?php }} ?>
												</select>
												<span class="icon-drop"></span>
											</div>
										</form>
									</div>
									<div class="row" id="est_block">
										
									</div>
								</div>
								<div class="tab-pane fade show" id="settings" role="tabpanel">
									<div class="row justify-content-center">
										<div class="col-md-6 col-lg-4">
											<div class="profile-wrap mb-5 px-6 mb-xl-0">
												<h3 class=" pt-6 font-weight-bold">My Profile</h3>
												<form class="login-form needs-validation"  enctype="multipart/form-data"  novalidate  id="profile_form">
													<div class="avatar-upload mb-4 mt-11">
														<div class="avatar-edit">
															<input type='file' id="imageUpload" name="profile_pic" accept=".png, .jpg, .jpeg" />
															<label for="imageUpload"></label>
														</div>
														<div class="avatar-preview">
															<div id="imagePreview" style="background-image: url(<?php echo $user_details[0]['ProfileImageUrl']; ?>);">
															</div>
														</div>
													</div>
													<div class="focus-group mb-4">
														<input type="text" class="form-control focus-control <?php if(!empty($user_details[0]['FullName'])){ echo "in-focus"; } ?>" value="<?php echo $_SESSION['full_name']; ?>" name="name" id="name" required>
														<label for="name">Name</label>
													</div>
													<div class="focus-group mb-3 show-hide">
														<input type="email" class="form-control focus-control <?php if(!empty($user_details[0]['EmailId'])){ echo "in-focus"; } ?>" value="<?php echo $_SESSION['email_id']; ?>" name="email" id="email" required readonly>
														<label for="email">Email</label>
													</div>
													<div class="form-footer pt-6 pb-7 text-center">
														<input type="button" onclick="update_profile()" class="btn text-white py-1 px-11" value="Save">
													</div>
												</form>
											</div>
										</div>
										<div class="col-lg-8">
											<div class="row  justify-content-md-center">
												<div class="col-md-6  mb-5  mb-lg-9">
													<div class="profile-wrap change-password px-6 h-100 ">
														<h3 class=" pt-6 font-weight-bold">Change Password</h3>
														<form class="login-form needs-validation  pt-8" novalidate action="#">
															<div class="focus-group mb-5">
																<input type="password" class="form-control focus-control " name="pwd" id="setting-password" required>
																<label for="setting-password">New password</label>
															</div>
															<div class="focus-group mb-2">
																<input type="password" class="form-control focus-control " name="re_pwd" id="setting-enter-pw" required>
																<label for="setting-enter-pw">Re enter password</label>
															</div>
															<div class="form-footer mb-8 mt-10 text-center">
																<input type="button" onclick="change_password()"class="btn  py-1 px-11 text-white" value="Reset">
															</div>
														</form>
													</div>
												</div>
												<div class="col-md-6  mb-5  mb-lg-9">
													<div class="profile-wrap account-setting px-6 h-100 " style="display:none;">
														<h3 class=" pt-6 font-weight-bold">Account Settings</h3>
														<ul class="lists list-unstyled m-0  py-4 ">
															<li class="py-4 py-xl-3  d-flex flex-wrap justify-content-between align-items-center">
																<span class="text">All the income tables</span>
																<span class="reset text-danger">Reset</span>
															</li>
															<li class="py-4  py-xl-3 d-flex flex-wrap justify-content-between align-items-center">
																<span class="text">All the expenses tables</span>
																<span class="reset text-danger">Reset</span>
															</li>
															<li class="py-4  py-xl-3 d-flex flex-wrap justify-content-between align-items-center">
																<span class="text">All the estimated tables</span>
																<span class="reset text-danger">Reset</span>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<div class="profile-wrap upgrade d-flex flex-wrap justify-content-center justify-content-md-between align-items-center p-6 py-md-10 px-md-5 p-xlg-10">
												<div class="text pb-5 pb-md-0">
													<p class="font-weight-medium">You have a basic itemship. <br> To get extra features upgrade to pro at $4/month.</p>
												</div>
												<a href="#" class="btn btn-secondary bg-secondary text-white font-weight-medium" data-toggle="modal" data-target="#PaymentOneModal">Upgrade</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<footer class="footer">
		</footer>
	</div>
	<div class="modal fade payment modal-select-wrap" id="transaction" tabindex="-1" role="dialog"  aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header pl-lg-4 mb-lg-2">
					<h5 class="modal-title w-100 font-weight-medium pt-lg-1">Add transaction</h5>
					<button type="button" class="close py-lg-3 px-lg-2" data-dismiss="modal" aria-label="Close">
						Close
					</button>
				</div>
				<div class="modal-body px-12">
					<ul class="nav d-flex justify-content-center nav-pills mb-4 mb-lg-9" role="tablist">
						<li class="nav-item font-weight-medium mr-lg-7 " role="presentation">
							<a class="nav-link active" id="txn_income_tab" data-toggle="pill" href="#income">Income</a>
						</li>
						<li class="nav-item font-weight-medium" role="presentation">
							<a class="nav-link" id="txn_expense_tab"  data-toggle="pill" href="#expense">Expense</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="income" role="tabpanel">
							<form class="login-form needs-validation"  novalidate action="#" id="txn_in_form">
							<!-- select-wrap -->
							<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" id="txn_in_category" name="txn_in_category">
											<option> Category</option>
											<?php if(!empty($income_categories)){ foreach($income_categories as $category) { ?>
												<option value="<?php echo $category['Id']; ?>"> <?php echo $category['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<!-- select-wrap -->
								<div class="down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" id="txn_in_sub_category" name="txn_in_sub_category">
											 <option> Sub Category</option>
											
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>

								<div class="select-wrap down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" name="txn_in_currency">
											<option> Currency</option>
											<?php if(!empty($currencies)){ foreach($currencies as $currency) { ?>
												<option value="<?php echo $currency['Id']; ?>"> <?php echo $currency['Symbol']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $currency['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>


								<div class="focus-group mb-3">
									<input type="text" class="form-control focus-control" id="income-amount" name="txn_in_amount" required>
									<label for="income-amount">Amount</label>
								</div>
								<input type="hidden" name="txn_in_type" value="cr" />
								<div class="form-footer pt-8 pb-6 text-center">
									<input type="button" onclick="add_in_transaction()" class="btn transaction btn-secondary text-white" value="Add">
								</div>
							</form>
						</div>

						<div class="tab-pane fade" id="expense" role="tabpanel">
							<form class="login-form needs-validation" novalidate action="#" id="txn_ex_form">
							<!-- select-wrap -->
							<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" id="txn_ex_category" name="txn_ex_category">
											<option> Category</option>
											<?php if(!empty($expense_categories)){ foreach($expense_categories as $category) { ?>
												<option value="<?php echo $category['Id']; ?>"> <?php echo $category['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<!-- select-wrap -->
								<div class="down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" id="txn_ex_sub_category" name="txn_ex_sub_category">
											<option> Sub Category</option>
										
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<div class="select-wrap down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" name="txn_ex_currency">
											<option> Currency</option>
											<?php if(!empty($currencies)){ foreach($currencies as $currency) { ?>
												<option value="<?php echo $currency['Id']; ?>"> <?php echo $currency['Symbol']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $currency['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>

								<div class="focus-group mb-3">
									<input type="text" class="form-control focus-control" id="expense-amount" name="txn_ex_amount" required>
									<label for="expense-amount">Amount</label>
								</div>
								<input type="hidden" name="txn_ex_type" value="cr" />
								<div class="form-footer pt-8 pb-6 text-center">
									<input type="button" onclick="add_ex_transaction()" class="btn transaction btn-secondary text-white" value="Add">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade estimation payment modal-select-wrap" id="estimation" tabindex="-1" role="dialog"  aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content ">
				<div class="modal-header pl-lg-4 mb-lg-2">
					<h5 class="modal-title w-100 font-weight-medium pt-1">Add Estimation</h5>
					<button type="button" class="close py-lg-3 px-lg-2" data-dismiss="modal" aria-label="Close">
						Close
					</button>
				</div>
				<div class="modal-body px-12">
					<ul class="nav d-flex justify-content-center nav-pills mb-4 mb-lg-9" role="tablist">
						<li class="nav-item font-weight-medium mr-lg-7 " role="presentation">
							<a class="nav-link active"  data-toggle="pill" href="#incomes">Income</a>
						</li>
						<li class="nav-item font-weight-medium" role="presentation">
							<a class="nav-link"  data-toggle="pill" href="#expenses">Expense</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="incomes" role="tabpanel">
							<form class="login-form needs-validation" novalidate action="#" id="est_in_form">
							<!-- select-wrap -->
							<div class="down-arrow-wrap">
									<div class="form-group">
										<select class="py-2"  id="est_in_category" name="est_in_category">
											<option> Category</option>
											<?php if(!empty($income_categories)){ foreach($income_categories as $category) { ?>
												<option value="<?php echo $category['Id']; ?>"> <?php echo $category['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<!-- select-wrap -->
								<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" id="est_in_sub_category" name="est_in_sub_category">
											<option> Sub Category</option>
										
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<div class="select-wrap down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" name="est_in_currency">
											<option> Currency</option>
											<?php if(!empty($currencies)){ foreach($currencies as $currency) { ?>
												<option value="<?php echo $currency['Id']; ?>"> <?php echo $currency['Symbol']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $currency['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<div class="focus-group mb-3">
									<input type="text" class="form-control focus-control" id="income-amounts" name="est_in_amount" required>
									<label for="income-amounts">Amount</label>
								</div>
								<div class="select-wrap down-arrow-wrap">
									<div class="form-group">
										<select class="py-2"  name="est_in_renew_days" >
											<option> Renew Period</option>
											<option value="30"> 1 month</option>
											<option value="90"> 3 months</option>
											<option value="180">6 months</option>
											<option value="365">1 year</option>
											
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<input type="hidden" name="est_in_type" value="cr" />
								<div class="form-footer pt-12 pb-5 text-center">
									<input type="button" onclick="add_in_estimation()" class="btn transaction btn-secondary text-white" value="Add">
								</div>
							</form>
						</div>

						<div class="tab-pane fade" id="expenses" role="tabpanel">
							<form class="login-form needs-validation" novalidate action="#" id="est_ex_form">
							<!-- select-wrap -->
							<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" id="est_ex_category" name="est_ex_category">
											<option> Category</option>
											<?php if(!empty($expense_categories)){ foreach($expense_categories as $category) { ?>
												<option value="<?php echo $category['Id']; ?>"> <?php echo $category['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<!-- select-wrap -->
								<div class=" down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" id="est_ex_sub_category" name="est_ex_sub_category">
											<option> Sub Category</option>
											
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<div class="select-wrap down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" name="est_ex_currency">
											<option> Currency</option>
											<?php if(!empty($currencies)){ foreach($currencies as $currency) { ?>
												<option value="<?php echo $currency['Id']; ?>"> <?php echo $currency['Symbol']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $currency['Name']; ?></option>
											<?php }} ?>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>

								<div class="focus-group mb-3">
									<input type="text" class="form-control focus-control" id="expense-amounts" name="est_ex_amount" required>
									<label for="expense-amounts">Amount</label>
								</div>

								<div class="select-wrap down-arrow-wrap">
									<div class="form-group">
										<select class="py-2" name="est_ex_renew_days">
											<option> Renew Period</option>
											<option value="30"> 1 month</option>
											<option value="90"> 3 months</option>
											<option value="180">6 months</option>
											<option value="365">1 year</option>
										</select>
									</div>
									<img src="<?php echo base_url('assets/'); ?>images/down-arrow.svg" class="down-arrow" alt="image description">
								</div>
								<input type="hidden" name="est_ex_type" value="dr" />
								<div class="form-footer pt-12 pb-5 text-center">
									<input type="button" onclick="add_ex_estimation()" class="btn transaction btn-secondary text-white" value="Add">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>





	<div class="modal fade estimation payment modal-select-wrap" id="estimation_edit_modal" tabindex="-1" role="dialog"  aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content ">
				<div class="modal-header pl-lg-4 mb-lg-2">
					<h5 class="modal-title w-100 font-weight-medium pt-1">Edit Estimation</h5>
					<button type="button" class="close py-lg-3 px-lg-2" data-dismiss="modal" aria-label="Close">
						Close
					</button>
				</div>
				<div class="modal-body px-12" id="estimation_edit_modal_block">
					
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade payment payment-one" id="PaymentOneModal" tabindex="-1" role="dialog"  aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header  p-4">
					<h5 class="modal-title w-100">Payment</h5>
					<button type="button" class="close py-3 px-2" data-dismiss="modal" aria-label="Close">
						Close
					</button>
				</div>
				<div class="modal-body px-5 px-lg-13">
					<form class="paymentOne-form needs-validation modal-select-wrap" novalidate action="#">
						<span class="item pt-3 d-block">Selected Item(s)</span>
						<div class="subscription d-flex flex-wrap justify-content-between ">
							<div class="about-subscription pt-7 pb-6">
								<span class="text">Moniwyse <br> Pro subscription </span>
								<span class="price d-block">$4/month</span>
							</div>
							<div class="select-wrap down-arrow-wrap mt-2">
								<div class="form-group">
									<select class="py-2">
										<option>Month</option>
										<option>Month</option>
										<option> 1</option>
										<option> 2</option>
										<option> 3</option>
										<option> 4</option>
										<option> 5</option>
										<option> 6</option>
										<option> 7</option>
										<option> 8</option>
										<option> 9</option>
										<option> 10</option>
										<option> 11</option>
										<option> 12</option>
									</select>
								</div>
								<span class="icon-drop"></span>
							</div>
						</div> 
						<div class="total d-flex flex-wrap justify-content-between align-items-center pt-5">
							<span class="text">Total Amount:</span>
							<span class="total-price">$20</span>
						</div>
						<div class="form-footer mt-10 mb-4 mt-lg-6 mb-lg-9 text-center">
							<input type="submit" class="btn btn-secondary text-white" value="Pay">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo base_url('assets/'); ?>js/jquery-3.3.1.min.js" defer><\/script>')</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous" defer></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="<?php echo base_url('assets/'); ?>js/jquery.main.js" defer></script>
	 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.5/dist/sweetalert2.all.min.js"></script>
	
	<script>

$(function(){
	get_transactions(month = '');
	get_estimations();
	load_line_graph();
	load_net_budget(date = '');
	load_inc_transactions(date='','cr');
	load_exp_transactions(date='','dr');
	load_inc_transactions_total(date='','cr');
	load_exp_transactions_total(date='','dr');
});


$("body").delegate("#txn_in_category", "change", function(){
    var category_id = $('#txn_in_category').val();
	get_sub_categories(category_id,'txn_in_sub_category');
}); 

$("body").delegate("#txn_ex_category", "change", function(){
    var category_id = $('#txn_ex_category').val();
	get_sub_categories(category_id,'txn_ex_sub_category');
}); 

$("body").delegate("#est_in_category", "change", function(){
    var category_id = $('#est_in_category').val();
	get_sub_categories(category_id,'est_in_sub_category');
}); 

$("body").delegate("#est_ex_category", "change", function(){
    var category_id = $('#est_ex_category').val();
	get_sub_categories(category_id,'est_ex_sub_category');
}); 

$("body").delegate("#edit_est_ex_category", "change", function(){
    var category_id = $('#edit_est_ex_category').val();
	get_sub_categories(category_id,'edit_est_ex_sub_category');
}); 

$("body").delegate("#edit_est_in_category", "change", function(){
    var category_id = $('#edit_est_in_category').val();
	get_sub_categories(category_id,'edit_est_in_sub_category');
}); 





function get_sub_categories(category_id,sub_cat_id)
{
	
	url="<?php echo base_url();?>AjaxRequests/getSubCategories";
	$.ajax({
		type: "POST",
		url: url,
		data : { category_id : category_id },
		success: function(data){

		 if(data)
		 {
			$('#'+sub_cat_id).html('');
			$('#'+sub_cat_id).html(data);
		 }

		}
});
}

function add_in_transaction()
{
	
	url="<?php echo base_url();?>Transactions/addTxnIncome";
	$.post( url, { formdata: $('#txn_in_form').serialize() })
	.done(function( data ) {

		if(data)
		{

		$("#txn_in_form")[0].reset();
		$('#transaction').modal('hide');
		
		swal.fire("Success!", "Transaction Added Successfully!", "success");
		get_transactions(month = '');
		
		}else{
		//$('#transaction').modal('close');
		swal.fire("Sorry!", "Transaction Adding failed!", "error");
	}
	});

}

function add_ex_transaction()
{
	
	url="<?php echo base_url();?>Transactions/addTxnExpense";
	$.post( url, { formdata: $('#txn_ex_form').serialize() })
	.done(function( data ) {

		if(data)
		{

		$("#txn_ex_form")[0].reset();
		$('#transaction').modal('hide');
		swal.fire("Success!", "Transaction Added Successfully!", "success");
		get_transactions(month = '');
		
		}else{
		//$('#transaction').modal('close');
		swal.fire("Sorry!", "Transaction Adding failed!", "error");
	}
	});

}

function get_transactions(month)
{
	
	url="<?php echo base_url();?>Transactions/loadTransactions";
	$.ajax({
		type: "POST",
		url: url,
		data: { month : month},
		success: function(data){

		 if(data)
		 {
			$('#txn_block').html('');
			$('#txn_block').html(data);
			txn_currency_change();
		 }

		}
});
}

function open_txn_category_madal(category_id,type)
{
	

	if(type == 'Income')
	{
		$('#txn_in_category').val(category_id);
		get_sub_categories(category_id,'txn_in_sub_category');

		$('#txn_ex_category').val($("#txn_ex_category option:first").val());
		$('#txn_ex_sub_category').val($("#txn_ex_sub_category option:first").val());
		
		
	}else{
		$('#txn_ex_category').val(category_id);
		get_sub_categories(category_id,'txn_ex_sub_category');

		$('#txn_in_category').val($("#txn_in_category option:first").val());
		$('#txn_in_sub_category').val($("#txn_in_sub_category option:first").val());
	}
	
	$('#transaction').modal('show');
}



//estimations

function add_in_estimation()
{
	
	url="<?php echo base_url();?>Estimations/addEstIncome";
	$.post( url, { formdata: $('#est_in_form').serialize() })
	.done(function( data ) {

		if(data)
		{

		$("#est_in_form")[0].reset();
		$('#estimation').modal('hide');
		swal.fire("Success!", "Estimation Added Successfully!", "success");
		get_estimations();
		}else{
		//$('#transaction').modal('close');
		swal.fire("Sorry!", "Estimation Update Failed!", "error");
	}
	});

}

function add_ex_estimation()
{
	
	url="<?php echo base_url();?>Estimations/addEstExpense";
	$.post( url, { formdata: $('#est_ex_form').serialize() })
	.done(function( data ) {

		if(data)
		{

		$("#est_ex_form")[0].reset();
		$('#estimation').modal('hide');
		swal.fire("Success!", "Estimation Added Successfully!", "success");
		get_estimations();
		}else{
		//$('#transaction').modal('close');
		swal.fire("Sorry!", "Estimation Adding Failed!", "error");
	}
	});

}





function edit_in_estimation()
{
	
	url="<?php echo base_url();?>Estimations/EditEstIncome";
	$.post( url, { formdata: $('#edit_est_in_form').serialize() })
	.done(function( data ) {

		if(data)
		{

		$("#edit_est_in_form")[0].reset();
		$('#estimation_edit_modal').modal('hide');
		swal.fire("Success!", "Estimation Updated Successfully!", "success");
		get_estimations();
		}else{
		//$('#transaction').modal('close');
		swal.fire("Sorry!", "Estimation Update Failed!", "error");
	}
	});

}

function edit_ex_estimation()
{
	
	url="<?php echo base_url();?>Estimations/EditEstExpense";
	$.post( url, { formdata: $('#edit_est_ex_form').serialize() })
	.done(function( data ) {

		if(data)
		{

		$("#edit_est_ex_form")[0].reset();
		$('#estimation_edit_modal').modal('hide');
		swal.fire("Success!", "Estimation Updated Successfully!", "success");
		get_estimations();
		}else{
		//$('#transaction').modal('close');
		swal.fire("Sorry!", "Estimation Update Failed!", "error");
	}
	});

}


function get_estimations()
{
	
	url="<?php echo base_url();?>Estimations/loadEstimations";
	$.ajax({
		type: "GET",
		url: url,
		success: function(data){

		 if(data)
		 {
			$('#est_block').html('');
			$('#est_block').html(data);
			est_currency_change();
		 }

		}
});
}

function open_est_category_madal(category_id,type)
{
	if(type == 'Income')
	{
		$('#est_in_category').val(category_id);
		get_sub_categories(category_id,'est_in_sub_category');

		$('#est_ex_category').val($("#est_ex_category option:first").val());
		$('#est_ex_sub_category').val($("#est_ex_sub_category option:first").val());
		
		
	}else{
		$('#est_ex_category').val(category_id);	
		get_sub_categories(category_id,'est_ex_sub_category');

		$('#est_in_category').val($("#est_in_category option:first").val());
		$('#est_in_sub_category').val($("#est_in_sub_category option:first").val());
	}
	
	
	$('#estimation').modal('show');
}

function open_estimation_modal()
{
	$('#est_in_category').val($("#est_in_category option:first").val());
	$('#est_in_sub_category').val($("#est_in_sub_category option:first").val());
	$('#est_ex_category').val($("#est_ex_category option:first").val());
	$('#est_ex_sub_category').val($("#est_ex_sub_category option:first").val());
	$('#estimation').modal('show');	
}


function open_transaction_modal()
{
	$('#txn_in_category').val($("#txn_in_category option:first").val());
	$('#txn_in_sub_category').val($("#txn_in_sub_category option:first").val());
	$('#txn_ex_category').val($("#txn_ex_category option:first").val());
	$('#txn_ex_sub_category').val($("#txn_ex_sub_category option:first").val());
	$('#transaction').modal('show');	
}

//profile


function change_password()
{	
	var password = $('#setting-password').val();
	var v_password = $('#setting-enter-pw').val();

	if(password == v_password)
	{
		url="<?php echo base_url();?>Profile/updatePassword";
	$.ajax({
		type: "POST",
		url: url,
		data : { password : password },
		success: function(data){

		 if(data)
		 {
			$('#setting-password').val('');
			$('#setting-enter-pw').val('');

			$('#setting-password').removeClass('in-focus');
			$('#setting-enter-pw').removeClass('in-focus');
			swal.fire("Success!", "Password Changed Successfully!", "success");
		 }else{
			swal.fire("Sorry!", "Password Change Failed!", "error");
		 }

		}
	});
	}else{
		$('#setting-enter-pw').val('');
		swal.fire("Sorry!", "Password & Re-Enter Password Doesn't Match!", "error");
	}

	
}

function update_profile()
{	
	url="<?php echo base_url();?>Profile/updateProfile";
	$.ajax({
	url: url,
	type: "POST",             // Type of request to be send, called as method
	data: new FormData(document.getElementById('profile_form')), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
	contentType: false,       // The content type used when sending data to the server.
	cache: false,             // To unable request pages to be cached
	processData:false,        // To send DOMDocument or non processed data file it is set to false
	success: function(data)   // A function to be called if request succeeds
	{
	
		if(data != 0){
		swal.fire("Success!", "Profile Updated Successfully!", "success");
		}else{
		swal.fire("Sorry!", "Profile Update Failed!", "error");
		}

	}
	});

	
}


$('#txn_date_filter').change(function(){
	var month = $('#txn_date_filter').val();
	get_transactions(month);
});


$('#txn_currency_filter').change(function(){
	txn_currency_change();
});

function txn_currency_change()
{
	var currency = $('#txn_currency_filter').val();
	
	$('.txn_currency_change').hide();
	$('.txn_'+currency+'_Currency_span').show();
}

$('#est_currency_filter').change(function(){
	est_currency_change();
});

function est_currency_change()
{
	var currency = $('#est_currency_filter').val();
	
	$('.est_currency_change').hide();
	$('.est_'+currency+'_Currency_span').show();
}

var load = 0;
$('#datePickerDate').change(function()
{
load = load+1;

var date = $('#datePickerDate').val();
if(load >= 2)
{
	load_net_budget(date);
	// load_inc_transactions(date,'cr');
	// load_exp_transactions(date,'dr');
	// load_inc_transactions_total(date,'cr');
	// load_exp_transactions_total(date,'dr');

}else{
	load_net_budget(date = '');
	
}

});

function load_net_budget(date)
{
	url="<?php echo base_url();?>Analytics/getNetBudget";
	$.ajax({
		type: "POST",
		url: url,
		data : { date : date },
		success: function(data){

		 if(data)
		 {
			$('#net_budget_block').html('');
			$('#net_budget_block').html(data);
			analtics_currency_change();
		 }

		}
	});
}


$('#analytics_currency_filter').change(function(){
	analtics_currency_change();
});

function analtics_currency_change()
{
	var currency = $('#analytics_currency_filter').val();
	
	$('.analytics_currency').attr("style", "display: none !important");
	$('.'+currency+'_net_buget_val').show();
}


function load_inc_transactions(date,type)
{
	url="<?php echo base_url();?>Analytics/getTransactions";
	$.ajax({
		type: "POST",
		url: url,
		data : { date : date,  type : type },
		success: function(data){

		 if(data)
		 {
			$('#income_transactions_block').html('');
			$('#income_transactions_block').html(data);
			analtics_currency_change();
		 }

		}
	});
}

function load_exp_transactions(date,type)
{
	url="<?php echo base_url();?>Analytics/getTransactions";
	$.ajax({
		type: "POST",
		url: url,
		data : { date : date, type : type },
		success: function(data){

		 if(data)
		 {
			$('#expense_transactions_block').html('');
			$('#expense_transactions_block').html(data);
			analtics_currency_change();
		 }

		}
	});
}




function load_inc_transactions_total(date,type)
{
	url="<?php echo base_url();?>Analytics/getTransactionsTotal";
	$.ajax({
		type: "POST",
		url: url,
		data : { date : date,  type : type },
		success: function(data){

		 if(data)
		 {
			$('#income_transactions_total_block').html('');
			$('#income_transactions_total_block').html(data);
			analtics_currency_change();
		 }

		}
	});
}

function load_exp_transactions_total(date,type)
{
	url="<?php echo base_url();?>Analytics/getTransactionsTotal";
	$.ajax({
		type: "POST",
		url: url,
		data : { date : date, type : type },
		success: function(data){

		 if(data)
		 {
			$('#expense_transactions_total_block').html('');
			$('#expense_transactions_total_block').html(data);
			analtics_currency_change();
		 }

		}
	});
}

function open_edit_estimation_modal(id)
{
	$.ajax({
				url:"<?php echo base_url(); ?>Estimations/GetEstimationDetails",
				type: "POST",
				data : { id : id },
				success: function(data){
					if(data != 0)
					{
						
						$('#estimation_edit_modal_block').html('');
						$('#estimation_edit_modal_block').html(data);	
						$('#estimation_edit_modal').modal('show');	
					}else{
						
							
					}

				}
			});	
}

function delete_estimation(id)
{
	Swal.fire({
			title: 'Are you sure?',
			text: "You want to delete this estimation ",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Deleted it!'
			}).then(

			(result) => {


			  if(result.value)
			  {
			$.ajax({
				url:"<?php echo base_url(); ?>Estimations/deleteEstimation",
				type: "POST",
				data : { id : id },
				success: function(data){
					if(data != 0)
					{
						get_estimations();
									
							swal.fire("Success!", "Estimation deletion Success!", "success");
					}else{
						
							swal.fire("Sorry!", "Estimation deletion failed!", "error");
					}

				}
			});
		}
});
}


function load_line_graph()
{
	url="<?php echo base_url();?>Analytics/lineGraph";
	$.ajax({
		type: "POST",
		url: url,
		data : { id : 1 },
		success: function(data){

		 if(data)
		 {
			

			var data = JSON.parse(data);

			Chart.defaults.global.defaultFontColor = '#43424b';
		Chart.defaults.global.defaultFontStyle = 'normal';
		Chart.defaults.global.defaultFontFamily = 'Poppins';
		Chart.defaults.global.defaultLineHeight = '1';
		Chart.defaults.global.legend.labels.usePointStyle = true;
		var ctx = document.getElementById('line-chart').getContext("2d");
		var gradientStroke = ctx.createLinearGradient(0, 0, 0, 296);
		gradientStroke.addColorStop(0, 'rgba(80, 143, 244, 0.3)');
		gradientStroke.addColorStop(1, 'rgba(80, 143, 244, 0)');
		var gradientStroke01 = ctx.createLinearGradient(0, 0, 0, 296);
		gradientStroke01.addColorStop(0, 'rgba(244, 80, 80, 0.5)');
		gradientStroke01.addColorStop(1, 'rgba(255, 0, 0, 0)');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: data.months,
				datasets: [{ 
					label: "Income",
					pointBorderColor: "red",
					pointBackgroundColor: "transparent",
					pointHoverBackgroundColor: "transparent",
					pointHoverBorderColor: "transparent",
					pointBorderWidth: 0,
					pointHoverRadius: 0,
					pointHoverBorderWidth: 0,
					pointRadius: 0,
					fill: true,
					backgroundColor: gradientStroke,
					borderWidth: 0,
					borderColor: 'transparent',
					data: data.income,
				}, { 
					label: "Expense",
					pointBorderColor: "red",
					pointBackgroundColor: "transparent",
					pointHoverBackgroundColor: "transparent",
					pointHoverBorderColor: "transparent",
					pointBorderWidth: 0,
					pointHoverRadius: 0,
					pointHoverBorderWidth: 0,
					pointRadius: 0,
					fill: true,
					backgroundColor: gradientStroke01,
					borderWidth: 0,
					borderColor: 'transparent',
					data: data.expense,
				}
				]
			},
			options: {
				legend: {
					align: 'start',
					position: 'top',
				},
				scales: {
					yAxes: [{
						ticks: {
							callback: function(value, index, values) {
								return '$' + value;
							},
							stepSize: 250,
							suggestedMax: 200,
							suggestedMin: 0,
						}
					}],
					xAxes: [{
						gridLines: {
							display:false
						}
					}],
				}
			}
		});
		 }

		}
	});
}

</script>



<script>

var ctx = document.getElementById('pie').getContext('2d');
				var donutFill01 = ctx.createLinearGradient(0, 0, 0, 296);
				donutFill01.addColorStop(0, '#00c6ff');
				donutFill01.addColorStop(1, '#001480');

				var donutFill02 = ctx.createLinearGradient(0, 0, 0, 296);
				donutFill02.addColorStop(0, '#fff500');
				donutFill02.addColorStop(1, '#ffb100');

				var donutFill03 = ctx.createLinearGradient(0, 0, 0, 296);
				donutFill03.addColorStop(0, '#ff6200');
				donutFill03.addColorStop(1, '#fff500');
				
		
				var pie = new Chart(ctx, {
					type: 'doughnut',
					data: {
						labels: ["One", "Two", "Three", "Four", "Five"],
						datasets: [{
							data: [30, 10, 10],
							backgroundColor: [
							donutFill01,
							donutFill02,
							donutFill03,
							],
							hoverBackgroundColor: [
							donutFill01,
							donutFill02,
							donutFill03,
							],
							borderWidth: 1,
						}],
					},
					options: {
						legend: {
							display: false,
						},
						cutoutPercentage: 65,
					}
				});
			</script>
			<script>
			var ctx = document.getElementById('pie02').getContext('2d');
				var donutFill01 = ctx.createLinearGradient(0, 0, 0, 296);
				donutFill01.addColorStop(0, '#00c6ff');
				donutFill01.addColorStop(1, '#001480');
				var donutFill02 = ctx.createLinearGradient(0, 0, 0, 296);
				donutFill02.addColorStop(0, '#fff500');
				donutFill02.addColorStop(1, '#ffb100');
				var donutFill03 = ctx.createLinearGradient(0, 0, 0, 296);
				donutFill03.addColorStop(0, '#ff6200');
				donutFill03.addColorStop(1, '#fff500');
				
				var pie = new Chart(ctx, {
					type: 'doughnut',
					data: {
						labels: ["One", "Two", "Three", "Four", "Five"],
						datasets: [{
							data: [30, 10, 10],
							backgroundColor: [
							donutFill01,
							donutFill02,
							donutFill03,
							],
							hoverBackgroundColor: [
							donutFill01,
							donutFill02,
							donutFill03,
							],
							borderWidth: 1,
						}],
					},
					options: {
						legend: {
							display: false,
						},
						cutoutPercentage: 65,
					}
				});
			</script>
		<script>

var ctx = document.getElementById('pie01').getContext('2d');
				var donutFill01 = ctx.createLinearGradient(0, 0, 0, 296);
				donutFill01.addColorStop(0, '#00c6ff');
				donutFill01.addColorStop(1, '#001480');
				var donutFill02 = ctx.createLinearGradient(0, 0, 0, 296);
				donutFill02.addColorStop(0, '#ff003b');
				donutFill02.addColorStop(1, '#e05676');
				var donutFill03 = ctx.createLinearGradient(0, 0, 0, 296);
				donutFill03.addColorStop(0, '#ff6200');
				donutFill03.addColorStop(1, '#ff8900');
			
				var pie = new Chart(ctx, {
					type: 'doughnut',
					data: {
						labels: ["One", "Two", "Three", "Four", "Five"],
						datasets: [{
							data: [30, 10, 10],
							backgroundColor: [
							donutFill01,
							donutFill02,
							donutFill03,
							],
							hoverBackgroundColor: [
							donutFill01,
							donutFill02,
							donutFill03,
							],
							borderWidth: 1,
						}],
					},
					options: {
						legend: {
							display: false,
						},
						cutoutPercentage: 65,
					}
				});
			</script>



</body>

</html>
