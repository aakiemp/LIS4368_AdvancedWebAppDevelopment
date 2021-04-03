<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Basic Client-Side Validation">
	<meta name="author" content="Aakiem Philippe">
	<link rel="icon" href="../img/favicon.ico">

	<title>LIS4381 - Assignment4</title>
		<?php include_once("../css/include_css.php"); ?>
</head>
<body>

	<?php include_once("../global/nav.php"); ?>

	<div class="container">
		<div class="starter-template">
					
					<div class="page-header">
						<?php include_once("global/header.php"); ?>	
					</div>

					<h2>Pet Stores</h2>

						<form id="defaultForm" method="post" class="form-horizontal" action="#">
								<div class="form-group">
										<label class="col-sm-4 control-label">Name:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="name" />
										</div>
								</div>

								<div class="form-group">
                            			<label class="col-sm-4 control-label">Street:</label>
                            		<div class="col-sm-4">
                                		<input type="text" class="form-control" name="street"  />
                            		</div>
                        		</div>

								<div class="form-group">
                            		<label class="col-sm-4 control-label">City:</label>
                            		<div class="col-sm-4">
                                	<input type="text" class="form-control" name="city"/>
								</div>	
							</div>

							<div class="form-group">
                            <label class="col-sm-4 control-label">State:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="state"/>
                            </div>
                        </div>

						<div class="form-group">
                            <label class="col-sm-4 control-label">Zip:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="zip"/>
                            </div>
						</div>
						
						<div class="form-group">
                            <label class="col-sm-4 control-label">Phone:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone" />
                            </div>
						</div>
						
						<div class="form-group">
										<label class="col-sm-4 control-label">Email:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="email" />
										</div>
								</div>

						<div class="form-group">
								<label class="col-sm-4 control-label">URL:</label>
								<div class="col-sm-4">
										<input type="text" class="form-control" name="url" />
								</div>
						</div>

						<div class="form-group">
										<label class="col-sm-4 control-label">YTD Sales:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="ytdsales" />
										</div>
								</div>

						<div class="form-group">
								<label class="col-sm-4 control-label">Notes:</label>
								<div class="col-sm-4">
										<input type="text" class="form-control" name="notes" />
								</div>
						</div>

								<div class="form-group">
									<div class="col-sm-6 col-sm-offset-3">
									<button type="submit" class="btn btn-primary" name="add" value="Add">Add</button>
										</div>
								</div>
						</form>

			<?php include_once "global/footer.php"; ?>
			
		</div> <!-- end starter-template -->
 </div> <!-- end container -->

	
	<!-- Bootstrap JavaScript
	================================================== -->
	<!-- Placed at end of document so pages load faster -->
			<?php include_once("../js/include_js.php"); ?>

<script type="text/javascript">
 //See Regular Expressions: http://www.qcitr.com/usefullinks.htm#lesson7
 $(document).ready(function() {

	$('#defaultForm').formValidation({
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
                                        regexp: /^[a-zA-Z0-9,\-\s]+$/,
                                        message: 'City can only contain letters, numbers hyphens, and space character (29 Palms)'
                                    },                                  
                            },
                    },

					state: {
                            validators: {
                                    notEmpty: {
                                            message: 'State required'
                                    },
                                    stringLength: {
                                            min: 2,
                                            max: 2,
                                            message: 'State must be 2 characters'
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
                                            message: 'Phone required, Including area code. only numbers'
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

                                    /*
                                    //built-in e-mail validator, comes with formValidation.min.js
                                    //using regexp instead (below)
                                    emailAddress: {
                                            message: 'Must include valid email address'
                                    },
                                    */
                                
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

					url: {
                            validators: {
                                    notEmpty: {
                                            message: 'url is required'
                                    },

                                    /*
                                    //built-in e-mail validator, comes with formValidation.min.js
                                    //using regexp instead (below)
                                    emailAddress: {
                                            message: 'Must include valid email address'
                                    },
                                    */
                                
                                    stringLength: {
                                            min: 1,
                                            max: 100,
                                            message: 'url no more than 100 characters'
                                    },
                                    regexp: {
                                    regexp: /^([a-z0-9_\.-]+)([\da-z\.-]+)\.([a-z\.]{2,6})$/,
                                        message: 'Must include valid url'
                                    },                                                                      
                            },
                    },

					ytdsales: {
                        validators: {
                                notEmpty: {
                                        message: 'YTD Sales is required'
                                },
                                stringLength: {
                                        min: 1,
                                        max: 7,
                                        message: 'YTD sales can be no more than 11 digits, including decimal point'
                                },
                                regexp: {
                                    regexp: /^[0-9\.]+$/,
                                    message: 'YTD sales can only contain numbers and decimal point'
                                },                                  
                        },
                }








					
			}
	});
});
</script>

</body>
</html>
