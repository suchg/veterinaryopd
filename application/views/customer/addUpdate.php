<script type="text/javascript">
	$(document).ready(function(){
		var validator = $("#frmCust").validate({			
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
		});

	});
</script>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Customer</h1>
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
                                
                                    <form id="frmCust" role="form" action="<?php echo $this->config->base_url(); ?>customer/addUpdate" method="post">
                                        <div class="form-group col-lg-6">
                                            <label>Customer Name</label>
                                            <input class="form-control" name="txtName" value="<?php echo isset($custData) ? $custData->custName : ""; ?>">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Mobile</label>
                                            <input class="form-control" name="txtMobile" value="<?php echo isset($custData) ? $custData->custMob : ""; ?>">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>E-mail Address</label>
                                            <input class="form-control" name="txtEmailAddress" value="<?php echo isset($custData) ? $custData->emailAddr : ""; ?>">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Alternate email addresses</label>
                                            <textarea class="form-control" name="txtAltEmails" rows="3"><?php echo isset($custData) ? $custData->altEmailAddr : ""; ?></textarea>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Address</label>
                                            <textarea class="form-control" name="txtAddress" rows="3"><?php echo isset($custData) ? $custData->custAddress : ""; ?></textarea>
                                        </div>
                                        
                                      	<div class="form-group col-lg-12">
	                                        <button type="submit" class="btn btn-default"><?php echo $btnVal = isset($custData) ? 'Update' : 'Add'; ?></button>
	                                        <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                        <input type="hidden" class="form-control" name="custId" value="<?php echo isset($custData) ? $custData->custId : ""; ?>">
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
	
        