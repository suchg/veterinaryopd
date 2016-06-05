<script type="text/javascript">
	$(document).ready(function(){
		/*var validator = $("#frmCust").validate({			
			rules: {
				txtName: {
					required: true,
					minlength: 3,
					maxlength: 100
				},
				txtMobile:{
					required: true,
					minlength: 3,
					maxlength: 15,
					number: true
				},
				txtEmailAddress: {
					required: true,
					email: true
				}
			}
		});*/

		$('#frmUser').validate({
            rules : {
            	txtNewPassword : {
                    minlength : 5,
                    required: true
                },
                txtRepeatPassword : {
                    minlength : 5,
                    equalTo : "#txtNewPassword"
                },
				txtEmailAddress: {
					required: true,
					email: true
				}
            }
            });

		var hideMsgDiv = setTimeout(function() {
			
		    $('.msgFrm').fadeOut('slow');
		    clearTimeout(hideMsgDiv);
		}, 5000); // <-- time in milliseconds

	});
</script>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile Setting</h1>
                    <?php 
                    	if(isset($msgMailSend))
                    	{
                    		echo $msgMailSend;
                    	}
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Customer details form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                
                                    <form id="frmUser" role="form" action="<?php echo $this->config->base_url(); ?>verifylogin/update" method="post">
                                        <div class="form-group col-lg-6">
                                            <label>User Name</label>
                                            <input class="form-control" name="txtUserName" value="<?php echo $username; ?>">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>E-mail Address</label>
                                            <input class="form-control" name="txtEmailAddress" value="<?php echo $emailId; ?>">
                                        </div>
                                        
                                        <div class="form-group col-lg-6">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" id="txtNewPassword" name="txtNewPassword" value="">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Repeat Password</label>
                                            <input type="password" class="form-control" name="txtRepeatPassword" value="">
                                        </div>
                                        
                                      	<div class="form-group col-lg-12">
	                                        <button type="submit" class="btn btn-default">Submit</button>
	                                        <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                     </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
	
        