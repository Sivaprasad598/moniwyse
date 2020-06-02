<DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Moniwyse</title>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/main.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
		<script>window.jQuery || document.write('<script src="js/jquery-3.3.1.min.js" defer><\/script>')</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous" defer></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
		<script src="<?php echo base_url('assets/'); ?>js/jquery.main.js" defer></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.5/dist/sweetalert2.all.min.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<header class="header"></header>
			<main class="main">
				<div class="container">
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#LoginModal">Login</button>
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#SignUpModal">Sign Up</button>
					<!-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ResetPasswordModal">Reset Password</button>
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ForgetPasswordModal">Forget Password</button>
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ForgetPasswordOneModal">Forget Password Link</button>
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#VerifyEmailModal">Verify Enail</button>
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PaymentModal">Payment</button>
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PaymentOneModal">Payment One</button>
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#memberInformation">Member Information</button> -->

				</div>
			</main>
			<footer class="footer"></footer>
			<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header border-0 pt-lg-11 pb-lg-14">
							<h2 class="modal-title w-100 text-center">Login</h2>
							<button type="button" class="close py-3 px-2" data-dismiss="modal" aria-label="Close">
								Close
							</button>
						</div>
						<div class="modal-body px-7">
							<form class="login-form needs-validation" novalidate action="#">
								<div class="focus-group mb-3">
									<input type="email" class="form-control focus-control " name="login_email" id="login-email" required>
									<label for="login-email">Email</label>
								</div>
								<div class="focus-group mb-3 show-hide">
									<input type="password" class="form-control focus-control" name="login_password" id="login-pw" required>
									<label for="login-pw">Password</label>
									<div class="eye">
										<span class="icon-eye" onclick="ShowPassword()"></span>
									</div>
								</div>
								<a href="#" class="text-decoration-none  ml-auto d-table forget-password" data-toggle="modal" data-target="#ForgetPasswordModal" data-dismiss="modal">Forget Password?</a>
								<div class="form-footer pt-8 pb-4 text-center">
									<input type="button" onclick="authenticate_user()" class="btn btn-secondary text-white mb-5 mb-lg-27" value="Sign In">
									<a href="#" class="text-decoration-none d-block sign-up" data-toggle="modal" data-target="#SignUpModal" data-dismiss="modal">New member? Sign Up</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header border-0 pt-lg-11 pb-lg-6">
							<h2 class="modal-title w-100 text-center">Sign Up</h2>
							<button type="button" class="close py-3 px-2" data-dismiss="modal" aria-label="Close">
								Close
							</button>
						</div>
						<div class="modal-body px-7">
							<form class="signUp-form modal-select-wrap needs-validation" novalidate action="#">
								<div class="focus-group mb-3">
									<input type="name" class="form-control focus-control " id="signup-name" required>
									<label for="signup-name">Full Name</label>
								</div>
								<div class="focus-group mb-2">
									<input type="email" class="form-control focus-control " id="signup-email" required>
									<label for="signup-email">Email Address</label>
								</div>
								<div class="select-wrap mb-2">
									<div class="form-group">
										<label for="employment">Employment type</label>
										<select class="py-2" id="employment">
											<option>Employment type </option>
											<option>Employment type 1</option>
											<option>Employment type 2</option>
											<option>Employment type 3</option>
										</select>
									</div>
								</div>
								<div class="select-wrap mb-2">
									<div class="form-group">
										<label for="country">Country</label>
										<select class="py-2" id="country">
											<option>Country</option>
											<option>Country 1</option>
											<option>Country 2</option>
											<option>Country 3</option>
											<option>Country 4</option>
										</select>
									</div>
								</div>
								<div class="focus-group mb-3">
									<input type="password" class="form-control focus-control" id="signup-pw" required>
									<label for="signup-pw">Password</label>
								</div>
								<div class="focus-group mb-3">
									<input type="password" class="form-control focus-control" id="signup-re-pw" required>
									<label for="signup-re-pw">Re-enter password</label>
								</div>
								<div class="activity-checkbox mt-4 mt-lg-8">
									<div class="check-wrap">
										<input type="checkbox" class="checkbox" id="cardio">
										<label for="cardio" class="pl-12 pt-2 mb-0">Captcha</label>
									</div>
								</div>
								<div class="form-footer mt-10 mb-4 mt-lg-15 mb-lg-8 text-center">
									<input type="submit" class="btn btn-secondary text-white" value="Sign Up">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="ResetPasswordModal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header border-0 pt-lg-10 pb-lg-14">
							<h2 class="modal-title w-100 text-center">Reset Password</h2>
							<button type="button" class="close py-3 px-2" data-dismiss="modal" aria-label="Close">
								Close
							</button>
						</div>
						<div class="modal-body px-9">
							<form class="reset-form needs-validation" novalidate action="#">
								<div class="focus-group mb-3">
									<input type="password" class="form-control focus-control " id="reset-password" required>
									<label for="reset-password">Password</label>
								</div>
								<div class="focus-group mb-2">
									<input type="password" class="form-control focus-control " id="reset-enter-pw" required>
									<label for="reset-enter-pw">Re Enter Password</label>
								</div>
								<div class="form-footer mt-10 mb-4 mt-lg-17 mb-lg-8 text-center">
									<input type="submit" class="btn btn-secondary  text-white" value="Reset">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="ForgetPasswordModal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header border-0 pt-lg-10 pb-lg-8">
							<h2 class="modal-title w-100 text-center">Forgot Password</h2>
							<button type="button" class="close py-3 px-2" data-dismiss="modal" aria-label="Close">
								Close
							</button>
						</div>
						<div class="modal-body px-8">
							<form class="forgetPassword-form needs-validation" novalidate action="#">
								<div class="focus-group mb-3">
									<input type="email" class="form-control focus-control " id="forget-email" required>
									<label for="forget-email">Email</label>
								</div>
								<div class="activity-checkbox mt-5">
									<div class="check-wrap">
										<input type="checkbox" class="checkbox" id="cardio-one">
										<label for="cardio-one" class="pl-12 pt-2 mb-0">Captcha</label>
									</div>
								</div>
								<div class="form-footer mt-10 mb-4 mt-lg-10 mb-lg-6 text-center">
									<input type="submit" class="btn btn-secondary text-white" value="Reset">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="ForgetPasswordOneModal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header border-0 pt-lg-10 pb-lg-21">
							<h2 class="modal-title w-100 text-center">Forgot Password</h2>
							<button type="button" class="close py-3 px-2" data-dismiss="modal" aria-label="Close">
								Close
							</button>
						</div>
						<div class="modal-body pt-5 px-6 pb-lg-24 pb-5 text-center link-forget-password">
							<h5 class="font-weight-medium mb-3">Reset link has been sent to your mail</h5>
							<p>Check your mail for reset password link. Open that link and reset your password. The link is active for 24hrs only.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="VerifyEmailModal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header border-0 pt-lg-9 pb-lg-16">
							<h2 class="modal-title w-100 text-center">Verify your mail</h2>
							<button type="button" class="close py-3 px-2" data-dismiss="modal" aria-label="Close">
								Close
							</button>
						</div>
						<div class="modal-body px-9 verify-email text-center">
							<p class="mb-5">Check your mail for a verification mail sent by us. Find link in the mail and by clicking it, you will be taken to the Moniwyse platform. </p>
							<p class="mb-5 mb-lg-9">If you don’t find any mail in your inbox Then kindly check in spam box and promotions. 
							</p>
							<span class="thank-you">Thank you</span> 
						</div>
						<div class="form-footer mt-10 mb-4 mt-lg-17 mb-lg-8 text-center">
							<a href="#" class="text-secondary text-decoration-none">Did’t receive mail?</a>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade payment" id="PaymentModal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header  p-4">
							<h5 class="modal-title w-100">Payment</h5>
							<button type="button" class="close py-3 px-2" data-dismiss="modal" aria-label="Close">
								Close
							</button>
						</div>
						<div class="modal-body px-5 px-lg-13">
							<form class="payment-form needs-validation modal-select-wrap" novalidate action="#">
								<div class="focus-group mb-3">
									<input type="name" class="form-control focus-control " id="payment-card-name" required>
									<label for="payment-card-name">Name on the card</label>
								</div>
								<div class="focus-group mb-1">
									<input type="number" class="form-control focus-control " id="payment-card-number" required>
									<label for="payment-card-number">Card number</label>
								</div>
								<div class="selection-wrapper d-flex flex-wrap justify-content-between align-items-center mb-2">
									<span class="validation mt-3">Valid till</span>
									<div class="selection d-flex flex-wrap justify-content-between align-items-center mx-n4">
										<div class="select-wrap down-arrow-wrap">
											<div class="form-group">
												<label for="month">Month</label>
												<select class="py-2" id="month">
													<option> Month</option>
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
										<div class="select-wrap down-arrow-wrap">
											<div class="form-group">
												<label for="year">Year</label>
												<select class="py-2" id="year">
													<option>Year</option>
													<option>2015</option>
													<option>2016</option>
													<option>2017</option>
													<option>2018</option>
													<option>2019</option>
													<option>2020</option>
												</select>
											</div>
											<span class="icon-drop"></span>
										</div>
									</div>
								</div>
								<div class="focus-group mb-3">
									<input type="text" class="form-control focus-control w-25" id="payment-cvv" required>
									<label for="payment-cvv">CVV</label>
								</div>
								<div class="form-footer mt-10 mb-4 mt-lg-17 mb-lg-6 text-center">
									<input type="submit" class="btn btn-secondary text-white " value="Pay">
								</div>
							</form>
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
			<div class="modal fade member-infoemation" id="memberInformation" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header  border-0  p-4">
							<button type="button" class="close py-3 px-2" data-dismiss="modal" aria-label="Close">
								Close
							</button>
						</div>
						<div class="modal-body px-6 px-lg-13">
							<div class="info pb-lg-3">
								<div class="img pt-6 pb-3 mx-auto d-table">
									<img src="images/member01.svg" alt="image description">
								</div>
								<span class="mb-9 d-block text-center font-weight-semi">John H</span>

								<ul class="member-info list-unstyled">
									<li class="mb-5 mb-lg-6">
										<h6 class="font-weight-medium">Email: <span class="font-weight-normal">johnh@gmail.com</span></h6>
									</li>

									<li class="mb-5 mb-lg-6">
										<h6 class="font-weight-medium">Employment-type: <span class="font-weight-normal">IT Industry</span></h6>
									</li>

									<li class="mb-5 mb-lg-6">
										<h6 class="font-weight-medium">Country: <span class="font-weight-normal">Canada</span></h6>
									</li>

									<li class="mb-5 mb-lg-6">
										<h6 class="font-weight-medium">Joined On: <span class="font-weight-normal">2 April 2021</span></h6>
									</li>

									<li class="mb-5 mb-lg-6">
										<h6 class="font-weight-medium">Membership: <span class="font-weight-normal">Free</span></h6>
									</li>

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<script>

function authenticate_user()
{
	var user_email = $('#login-email').val();
	var password = $('#login-pw').val();

	
		url="<?php echo base_url();?>Login/authenticate";
	$.ajax({
		type: "POST",
		url: url,
		data : { user_email : user_email, password : password },
		success: function(data){
		if(data != 0)
		 {
			$('#LoginModal').modal('hide');
			window.location.replace("http://localhost/moniwyse/home");
		 }else{
			swal.fire("Sorry!", "Login Credentials Wrong!", "error");
		 }

		}
	});
	

}
</script>	
</body>
</html>
