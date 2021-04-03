<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="My online portfolio which showcases my skills and projects using various softwares, languages, and tools.">
	<meta name="author" content="Aakiem Philippe">
	<link rel="icon" href="favicon.ico">

	<title>LIS4381 - Project 2</title>
		<?php include_once("../css/include_css.php"); ?>
</head>
<body>

	<?php include_once("../global/nav.php"); ?>
	
	<div class="container">
		<div class="starter-template">
			<div class="row">
				<div class="col-xs-12">
					
					<div class="page-header">
						<?php include_once("../global/header.php"); ?>	
											</div>
											<p class="text-left">
					<strong>Description:</strong>
					<ul>
					<li class="text-left">PHP server-side validation with prepared statements to prevent SQL injection</li>
					<li class="text-left">Displays user-entered data, and permits users to add data using functionality from A5</li>
									</p>

					<h2>Pet Stores</h2>

						<?php ?>
						<form id="edit_petstore" method="post" class="form-horizontal" action="edit_petstore_process.php">

							<?php
								require_once "../global/connection.php";
								$pst_id_v = $_POST['pst_id'];

								$query =
								"SELECT * FROM petstore WHERE pst_id = :pst_id_p";

								try {
									$statement = $db->prepare($query);
									$statement->bindParam(':pst_id_p', $pst_id_v);
									$statement->execute();
									while($result != null)
									 {
										 ?>
										 	<input type="hidden" name="pst_id" value="<?php echo $result['pst_id'];?>" />
									 
							
								<div class="form-group">
										<label class="col-sm-4 control-label">Name:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" maxlength ="30" name="name" placeholder="(max 30 characters)" value="<?php echo $result['pst_name']; ?>" />
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Street:</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" maxlength ="30" name="street" placeholder="(max 30 characters)" value="<?php echo $result['pst_street']; ?>" />
									</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">City:</label>
										<div class="col-sm-4"> 
										<input type="text" class="form-control" maxlength ="30" name="city" placeholder="(max 30 characters) " value="<?php echo $result['pst_city']; ?>"/>
									</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">State:</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" maxlength ="2" name="state" placeholder="Example: FL" value="<?php echo $result['pst_state']; ?>"/>
									</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">Zip:</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" maxlength ="9" name="zip" placeholder="(5 or 9 digits no dashes)" value="<?php echo $result['pst_zip']; ?>"/>
									</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">Phone:</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" maxlength ="10" name="phone" placeholder="(10 digits no other characters)" value="<?php echo $result['pst_phone']; ?>"/>
									</div>
									</div>
									

								<div class="form-group">
										<label class="col-sm-4 control-label">Email:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" maxlength ="100" name="email" placeholder="Example: jdoe@aol.com" value="<?php echo $result['pst_email']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">URL:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" maxlength ="100" name="URL" placeholder="Example: www.jdoe.com" value="<?php echo $result['pst_url']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">YTD Sales:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" maxlength ="11" name="ytdsales" placeholder="Example: 100.00 (no other characters)" value="<?php echo $result['pst_ytd_sales']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Notes:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="notes" value="<?php echo $result['pst_notes']; ?>"/>
										</div>
								</div>

								<?php
								$result = $statement->fetch();
									 }
									$statement->closeCursor();
									$db = null;
								}

								catch (PDOException $e){
									$error = $e->getMessage();
									include('../global/error.php');
								}
								?>

								<div class="form-group">
									<div class="col-sm-6 col-sm-offset-3">
									<button type="submit" class="btn btn-primary" name="edit" value="Edit">Update</button>
										</div>
								</div>
						</form>

					

			<?php include_once "../global/footer.php"; ?>
			
		</div> <!-- end starter-template -->
 </div> <!-- end container -->

	
	<!-- Bootstrap JavaScript
	================================================== -->
	<!-- Placed at end of document so pages load faster -->
			<?php //include_once("../js/include_js.php"); ?>

<script type="text/javascript">
 //See Regular Expressions: http://www.qcitr.com/usefullinks.htm#lesson7
 $(document).ready(function() {

	$('#edit_petstore').formValidation({
			message: 'This value is not valid',
			icon: {
					valid: 'fa fa-check',
					invalid: 'fa fa-times',
					validating: 'fa fa-refresh'
			},
			fields: {
					name: {
							validators: {
									notEmpty: {
									 message: 'Name required'
									},
									stringLength: {
											min: 1,
											max: 30,
									 message: 'Name no more than 30 characters'
									},
									regexp: {
										//alphanumeric, hyphens, underscores, and spaces
										//regexp: /^[a-zA-Z0-9\-_\s]+$/,										
										//similar to: (though, \w supports other Unicode characters)
											regexp: /^[\w\-\s]+$/,
										message: 'Name can only contain letters, numbers, hyphens, and underscore'
									},									
							},
					},

					street: {
							validators: {
									notEmpty: {
											message: 'Street required'
									},
									stringLength: {
											min: 1,
											max: 30,
											message: 'Street no more than 30 characters'
									},
									regexp: {
										//street: only letters, numbers, commas, hyphens, space character, and periods
										regexp: /^[a-zA-Z0-9,\-\s\.]+$/,		
									message: 'Street can only contain letters, numbers, commas, hyphens, or periods'
									},									
							},
					},
				city: {
					validators: {
						notEmpty: {
							message: 'City required'
						},
						stringLength: {
							min: 1,
							max: 30,
							message: 'City no more than 30 characters'
						},
						regexp: {
							regexp: /^[a-zA-Z0-9,\-\s\.]+$/,
							message: 'City can only contain letters, numbers, commas, hyphens, and space character'
						},
					},
				},

				state: {
					validators: {
						notEmpty: {
							message: 'State required'
						},
						stringLength: {
							min: 1,
							max: 2,
							message: 'State no more than two characters'
						},
						regexp: {
							regexp: /^[a-zA-Z]+$/,
							message: 'State can only contain letters'
						},
					},
				},

				zip: {
					validators: {
						notEmpty: {
							message: 'Zip required, only numbers'
						},
						stringLength: {
							min: 5,
							max: 9,
							message: 'Zip must be 5, and no more than 9 digits'
						},
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Zip can only contain numbers'
						},
					},
				},

				phone: {
					validators: {
						notEmpty: {
							message: 'Phone required, including area code, only numbers'
						},
						stringLength: {
							min: 10,
							max: 10,
							message: 'Phone must be 10 digits'
						},
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Phone can only contain numbers'
						},
					},
				},

				email: {
					validators: {
						notEmpty: {
							message: 'Email address is required'
						},
						stringLength: {
							min: 1,
							max: 100,
							message: 'Email no more than 100 characters'
						},
						regexp: {
							regexp: /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/,
							message: 'Must include valid email'
						},
					},
				},

				URL: {
					validators: {
						notEmpty: {
							message: 'URL required'
						},
						stringLength: {
							min: 1,
							max: 100,
							message: 'URL no more than 100 characters'
						},
						regexp: {
							regexp: /^(https?:VV)?([\da-z\.-]+)\.([a-z\.]{2,6})([V\w\.-]*)*V?$/,
							message: 'Must include valid URL'
						},
					},
				},

				ytdsales: {
					validators: {
						notEmpty: {
							message: 'YTD sales is required'
						},
						stringLength: {
							min: 1,
							max: 11,
							message: 'YTD sales can be no more than 10 digits, including decimal point'
						},
						regexp: {
							regexp: /^[0-9\.]+$/,
							message: 'YTD sales can only contain numbers and decimal point'
						},
					},
				},
					
			}

	});
});
</script>

</body>
</html>
