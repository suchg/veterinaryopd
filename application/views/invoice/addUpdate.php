         	<style>
         		.frmRow{
         			display: block;
         			overflow: auto;
         		}
         		.rootDivPadding{
         			padding-left:2px;
         			padding-right:2px;
         		}
         		.rootDivPadding input{
         			padding:2px !important;
         			font-size:12px;
         		}
         		 .rootDivPadding select{
         			padding:0px !important;
         			font-size:10px;
         		}
         		.mailSuccess{
         			color: green;
         			float: right;
         			text-align: right;
         			display: none;
         		}
         		.mailError{
         			color: red;
         			float: right;
         			text-align: right;
         			display: none;
         		}
         		.rootRow{
         			padding: 0px;
         		}
         		.rootContainer{
         			padding: 0px;
         			margin:0px 0px 0px -15px;
         			width:103%!important;
         		}
         		.customLarge{
         			width:79%;
         			display: inline;
         		}
         		.customSmallDate{
         			width:19%;
         			display: inline;
         		}
         	</style>
         	<?php 
         	$nullDate = '0000-00-00 00:00:00';
         	
         	
         	?>
         	<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Generate Invoice
                        </div>
                        <div class="panel-body">
                        	<span class="mailSuccess">Mail sent successfully</span>
                        	<span class="mailError">Mail not sent</span>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="frmInvoice" role="form" action="<?php echo $this->config->base_url(); ?>invoice/addUpdate" method="post">
                                        
                                        <?php 
                                        if(isset($invoiceData))
										{
                                        ?>	
                                        	<div class="frmRow">
                                        		<div class="form-group col-lg-6">
                                        		</div>
                                        		
                                        		<div class="form-group col-lg-6">
													<input id="btnSendStatus" type="button" class="form-control" name="btnSendStatus" value="Send Status">
                                        		</div>
                                        	</div>
                                        <?php
                                        }
                                        ?>
	                                        	
	                                        	                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-6">
	                                            <label>Booking No.</label>
	                                            <input class="form-control" name="txtBookingNo" value="<?php echo isset($invoiceData) ? $invoiceData->bookingNo : ""; ?>">
	                                        </div>
	                                        
	                                        <div class="form-group col-lg-6">
	                                            <label>Transporter</label>
	                                            <input class="form-control" name="txtTransporter" value="<?php echo isset($invoiceData) ? $invoiceData->transporter : ""; ?>">
	                                        </div>
	                                        
	                                        <!-- div class="form-group col-lg-2" style="float:right;">
	                                        	<label>&nbsp;</label>
	                                        	<?php 
	                                        		if(isset($invoiceData))
													{
	                                        	?>	
														<input id="btnSendStatus" type="button" class="form-control" name="btnSendStatus" value="Send Status">
	                                        	<?php 
	                                        		}
	                                        	?>	                                            
	                                        </div -->
                                        </div>
                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-6">
	                                            <label>Truck No.</label>
	                                            <input class="form-control" name="txtTruckNo" value="<?php echo isset($invoiceData) ? $invoiceData->truckNo : ""; ?>">
	                                        </div>
	                                        
	                                        <div class="form-group col-lg-6">
	                                            <label>Empty container pick up date from yard</label>
	                                            <input class="form-control" id="txtEmptyContainerPickUpDateFromYard" name="txtEmptyContainerPickUpDateFromYard" readonly="readonly" value="<?php echo ( (isset($invoiceData) && ($invoiceData->emptyContainerPickUpDateFromYard != $nullDate)) ? date ("j-n-Y", strtotime($invoiceData->emptyContainerPickUpDateFromYard)) : ''); ?>">
	                                        </div>
                                        </div>
                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-6">
	                                            <label style="clear: both;display:block;">Planned stuffing place.</label>
	                                            <input class="form-control customLarge" name="txtPlannedStuffingPlace" value="<?php echo isset($invoiceData) ? $invoiceData->plannedStuffingPlace : ""; ?>">
	                                            <input class="form-control customSmallDate" id="txtPlannedStuffingPlaceDate" readonly="readonly" name="txtPlannedStuffingPlaceDate" value="<?php echo ( (isset($invoiceData) && ($invoiceData->plannedStuffingPlaceDate != $nullDate)) ? date ("j-n-Y", strtotime($invoiceData->plannedStuffingPlaceDate)) : ''); ?>">
	                                        </div>
	                                        
	                                        <div class="form-group col-lg-6">
	                                            <label>Stuffing container out date from factory</label>
	                                            <input class="form-control" id="txtStuffingContainerOutDateFromFactory" readonly="readonly" name="txtStuffingContainerOutDateFromFactory" value="<?php echo (isset($invoiceData) && ($invoiceData->stuffingContainerOutDateFromFactory != $nullDate)) ? date ("j-n-Y", strtotime($invoiceData->stuffingContainerOutDateFromFactory)) : ''; ?>">
	                                        </div>
                                        </div>
                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-6">
	                                            <label>Buffer yard</label>
	                                            <input class="form-control" name="txtBufferYard" value="<?php echo isset($invoiceData) ? $invoiceData->bufferYard : ""; ?>">
	                                        </div>
	                                        
	                                        <div class="form-group col-lg-6">
	                                            <label>Container port gate in date</label>
	                                            <input class="form-control" id="txtContainerPortGateInDate" name="txtContainerPortGateInDate" readonly="readonly" value="<?php echo (isset($invoiceData) && ($invoiceData->containerPortGateInDate != $nullDate)) ? date ("j-n-Y", strtotime($invoiceData->containerPortGateInDate)) : ''; ?>">
	                                        </div>
                                        </div>
                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-6">
	                                            <label style="clear: both;display:block;">Shipping bill no.</label>
	                                            <input class="form-control customLarge" name="txtShippingBillNo" value="<?php echo isset($invoiceData) ? $invoiceData->shippingBillNo : ""; ?>">
	                                            <input class="form-control customSmallDate" id="txtShippingBillNoDate" readonly="readonly" name="txtShippingBillNoDate" value="<?php echo (isset($invoiceData) && ($invoiceData->shippingBillNoDate != $nullDate)) ? date ("j-n-Y", strtotime($invoiceData->shippingBillNoDate)) : ''; ?>">
	                                        </div>
	                                        
	                                        <div class="form-group col-lg-6">
	                                            <label>Custom out of charge date</label>
	                                            <input class="form-control" id="txtCustomOutOfChargeDate" readonly="readonly" name="txtContainerPortInDate" value="<?php echo (isset($invoiceData) && ($invoiceData->containerPortGateInDate != $nullDate)) ? date ("j-n-Y", strtotime($invoiceData->containerPortGateInDate)) : ''; ?>">
	                                        </div>
                                        </div>
                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-6">
	                                            <label style="clear: both;display:block;">Intended vessel / ETD</label>
	                                            <input class="form-control customLarge" name="txtIntendedVessel" value="<?php echo isset($invoiceData) ? $invoiceData->intendedVesselEtd : ""; ?>">
	                                            <input class="form-control customSmallDate" id="txtIntendedVesselDate" name="txtIntendedVesselDate" readonly="readonly" value="<?php echo (isset($invoiceData) && ($invoiceData->intendedVesselEtdDate != $nullDate)) ? date ("j-n-Y", strtotime($invoiceData->intendedVesselEtdDate)) : ''; ?>">
	                                        </div>
	                                        
	                                        <div class="form-group col-lg-6">
	                                            <label>ESTIMATED ARRIVAL TIME / ETA DEST</label>
	                                            <input class="form-control" id="txtEstimatedArrivalDate" readonly="readonly" name="txtEstimatedArrivalDate" value="<?php echo (isset($invoiceData) && ($invoiceData->estimatedArrivalDate != $nullDate)) ? date ("j-n-Y", strtotime($invoiceData->estimatedArrivalDate)) : ''; ?>">
	                                        </div>
                                        </div>
                                        
                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-3">
	                                            <label>BL no.</label>
	                                            <input class="form-control" name="txtBillNo" value="<?php echo isset($invoiceData) ? $invoiceData->billNo : ""; ?>">
	                                        </div>
	                                        
	                                        <div class="form-group col-lg-3">
	                                        </div>
	                                        
	                                        <div class="form-group col-lg-6">
	                                            <label>Invoice No.</label>
	                                            <input class="form-control" name="txtInvoiceNo" value="<?php echo isset($invoiceData) ? $invoiceData->invoiceNo : ""; ?>">
	                                        </div>
                                        </div>
                                                                                
                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-6">
	                                            <label>Container No.</label>
	                                            <input class="form-control" name="txtContainerNo" value="<?php echo isset($invoiceData) ? $invoiceData->containerNo : ""; ?>">
	                                        </div>
	                                        <div class="form-group col-lg-6">
	                                            <label>Size of container.</label>
	                                            <input class="form-control" name="txtContainerSize" value="<?php echo isset($invoiceData) ? $invoiceData->containerSize : ""; ?>">
	                                        </div>
                                        </div>
                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-6">
	                                            <label>Shipper</label>
	                                            <select class="form-control" name="txtBuyer">
	                                            	<option>--select buyer--</option>
	                                            <?php
													foreach($custList as $custVal)
													{
														$selected = ($custVal->custId == $invoiceData->customerId) ? 'selected="selected"' : '';
														?>
														<option value="<?php echo $custVal->custId; ?>" <?php echo $selected; ?> ><?php echo $custVal->custName; ?></option>
														<?php 
													}
	                                            ?>
	                                            </select>
	                                        </div>
	                                        <div class="form-group col-lg-6">
	                                            <label>Vessel Name & Voy</label>
	                                            <input class="form-control" name="txtVesselName" maxlength="100" value="<?php echo isset($invoiceData) ? $invoiceData->vesselNameNvoy : ""; ?>">
                                        	</div>
                                        </div>
                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-6 " >
	                                            <label>Shipping Agent Name</label>
	                                            <input class="form-control " name="txtShippingAgent" maxlength="100" value="<?php echo isset($invoiceData) ? $invoiceData->shippingAgent : ""; ?>">
	                                        </div>
	                                        <div class="form-group col-lg-6 " >
	                                            <label>Final Destination</label>
	                                            <input class="form-control " name="txtFinalDestination" maxlength="100" value="<?php echo isset($invoiceData) ? $invoiceData->finalDestination : ""; ?>">
	                                        </div>
	                                        
	                                    </div>
	                                    <div class="frmRow">
	                                        <div class="form-group col-lg-6 " >
	                                            <label>Consignee name</label>
	                                            <input class="form-control " name="txtConsingeeName" maxlength="100" value="<?php echo isset($invoiceData) ? $invoiceData->consingeeName : ""; ?>">
	                                        </div>
	                                        <div class="form-group col-lg-6 " >
	                                            <label>Term of shipment</label>
	                                            <input class="form-control " name="txtTermOfShipment" maxlength="100" value="<?php echo isset($invoiceData) ? $invoiceData->termsOfShipment : ""; ?>">
	                                        </div>
                                        </div>
                                        
                                        <div class="frmRow">
	                                        <!-- div class="form-group col-lg-6 " >
	                                            <label>Origin</label>
	                                            <input class="form-control " name="txtOrigin" maxlength="100" value="<?php echo isset($invoiceData) ? $invoiceData->origin : ""; ?>">
	                                        </div>
	                                        <div class="form-group col-lg-6 " >
	                                            <label>Final Destination</label>
	                                            <input class="form-control " name="txtFinalDestination" maxlength="100" value="<?php echo isset($invoiceData) ? $invoiceData->finalDestination : ""; ?>">
	                                        </div -->	                                        
                                        </div>
                                        
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-6" style="clear: left;">
	                                            <label>Carrier Name</label>
	                                            <input class="form-control" name="txtCarrierName" maxlength="100" value="<?php echo isset($invoiceData) ? $invoiceData->carrierName : ""; ?>">
	                                        </div>
	                                        <div class="form-group col-lg-6 " >
	                                            <label>Load Port Name</label>
	                                            <input class="form-control " name="txtPortName" maxlength="100" value="<?php echo isset($invoiceData) ? $invoiceData->portName : ""; ?>">
	                                        </div>                                       
                                        </div>
                                                                                                                                                               
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-3" style="clear: left;">
	                                            <label>T/T Days</label>
	                                            <input class="form-control" name="txtTTDays" maxlength="10" value="<?php echo isset($invoiceData) ? $invoiceData->TTdays : ""; ?>">
	                                        </div>
	                                        <div class="form-group col-lg-3">
	                                            <label>Actual Days</label>
	                                            <input class="form-control" name="txtActualDays" maxlength="10" value="<?php echo isset($invoiceData) ? $invoiceData->actualDays : ""; ?>">
	                                        </div>
	                                        <div class="form-group col-lg-3">
	                                            <label>Diff Days</label>
	                                            <input class="form-control" name="txtDiffDays" maxlength="10" value="<?php echo isset($invoiceData) ? $invoiceData->diffDays : ""; ?>">
	                                        </div>
	                                        <div class="form-group col-lg-3">
	                                            <label>Del Days</label>
	                                            <input class="form-control" name="txtDelDays" maxlength="10" value="<?php echo isset($invoiceData) ? $invoiceData->delDays : ""; ?>">
                                        	</div>
                                        </div>
                                                                                
                                        <div class="frmRow">
	                                        <div class="form-group col-lg-12">
	                                            <label>Remarks</label>
	                                            <textarea class="form-control" name="txtRemarks" maxlength="500" rows="3"><?php echo isset($invoiceData) ? $invoiceData->remarks : ""; ?></textarea>
	                                        </div>
                                        </div>
                                      	
                                        
                                        <div class="col-lg-12 rootContainer">
			                                <div class="panel panel-default">
						                        <div class="panel-heading">
						                            Set Root
						                            <div class="pull-right">
						                            	<a href="#" class="clsAddRoot">Add Root</a>
						                            </div>
						                        </div>
					                        	<div class="panel-body">
						                            <div class="row">
						                            	<div class="rootRow col-lg-12">	
						                            		<div class="frmRow">
						                            			<!-- div class="rootDivPadding form-group col-lg-3">
						                                            <label>PORT OF LOADING</label>
						                                        </div>
						                                        <div class="rootDivPadding form-group col-lg-2">
						                                            <label>VESSEL NAME & VOY</label>
						                                        </div>
						                                        
						                                        <div class="rootDivPadding form-group col-lg-1">
						                                            <label>ETD</label>
						                                        </div -->
						                                        
						                                        <div class="rootDivPadding form-group col-lg-5">
						                                            <label>Location</label>
						                                        </div>
						                                        
						                                        <div class="rootDivPadding form-group col-lg-1">
						                                            <label>Date</label>
						                                        </div>
						                                        
						                                        <div class="rootDivPadding form-group col-lg-4">
						                                            <label>VESSEL AND VOY</label>
						                                        </div>
						                                        
						                                        <div class="rootDivPadding form-group col-lg-2">
						                                            <label>ACTIVITY</label>
						                                        </div>
						                                        
					                                        </div>
					                                        <?php 
					                                        
					                                        if(isset($rootList) && count($rootList)){
					                                        	foreach($rootList as $val)
					                                        	{
					                                        	?>
					                                        		<div class="frmRow">
					                                        			<!-- div class="rootDivPadding form-group col-lg-3">
								                                            <input class="form-control" name="portOfLoading[]" value="<?php echo $val->portOfLoading; ?>">
								                                        </div>
								                                        <div class="rootDivPadding form-group col-lg-2">
								                                            <input class="form-control" name="vesselNameVoy[]" value="<?php echo $val->vesselNameVoy; ?>">
								                                        </div>
						                                        		<div class="rootDivPadding form-group col-lg-1">
								                                            <input class="form-control rootDate" name="etdDate[]" readonly="readonly" value="<?php echo date ("j-n-Y", strtotime($val->etdDate)); ?>">
								                                        </div -->
								                                        <div class="rootDivPadding form-group col-lg-5">
								                                            <input class="form-control" name="deschargePort[]" value="<?php echo $val->deschargePort; ?>">
								                                        </div>
								                                        
								                                        <div class="rootDivPadding form-group col-lg-1" >
								                                            <input class="form-control rootDate" name="etaDate[]" readonly="readonly" value="<?php echo date ("j-n-Y", strtotime($val->etaDate)); ?>">
								                                        </div>
								                                        
								                                        <div class="rootDivPadding form-group col-lg-4" >
								                                            <input class="form-control" name="connectingVesselVoy[]" value="<?php echo $val->connectingVesselVoy; ?>">
								                                        </div>
								                                        
								                                        <div class="rootDivPadding form-group col-lg-2">
								                                            <select class="form-control" name="rootActivity[]">
								                                            	<option value="TO BE LOADED" <?php echo $Selected = ($val->rootActivity == 'TO BE LOADED') ? 'selected="selected"' : ''; ?> >TO BE LOADED</option>
								                                                <option value="ARRIVING" <?php echo $Selected = ($val->rootActivity == 'ARRIVING') ? 'selected="selected"' : ''; ?> >ARRIVING</option>
								                                                <option value="LOADED" <?php echo $Selected = ($val->rootActivity == 'LOADED') ? 'selected="selected"' : ''; ?> >LOADED</option>
								                                                <option value="DISCHAGED" <?php echo $Selected = ($val->rootActivity == 'DISCHAGED') ? 'selected="selected"' : ''; ?> >DISCHAGED</option>
								                                                <option value="DELIVERED" <?php echo $Selected = ($val->rootActivity == 'DELIVERED') ? 'selected="selected"' : ''; ?> >DELIVERED</option>
								                                                <option value="PLEASE INFORM BUYER TO TAKE DELIVERY" <?php echo $Selected = ($val->rootActivity == 'PLEASE INFORM BUYER TO TAKE DELIVERY') ? 'selected="selected"' : ''; ?> >PLEASE INFORM BUYER TO TAKE DELIVERY</option>
								                                            </select>
								                                        </div>
								                                       
								                                     </div>
					                                        	<?php 
					                                        	}

					                                        }else 
					                                        {
					                                        	?>
					                                        		<div class="frmRow">
					                                        			<!--  div class="rootDivPadding form-group col-lg-3">
								                                            <input class="form-control" name="portOfLoading[]">
								                                        </div>
								                                        <div class="rootDivPadding form-group col-lg-2">
								                                            <input class="form-control" name="vesselNameVoy[]">
								                                        </div>
						                                        		<div class="rootDivPadding form-group col-lg-1">
								                                            <input class="form-control rootDate" name="etdDate[]" readonly="readonly">
								                                        </div -->
								                                        <div class="rootDivPadding form-group col-lg-5">
								                                            <input class="form-control" name="deschargePort[]">
								                                        </div>
								                                        
								                                        <div class="rootDivPadding form-group col-lg-1" >
								                                            <input class="form-control rootDate" name="etaDate[]" readonly="readonly">
								                                        </div>
								                                        
								                                        <div class="rootDivPadding form-group col-lg-4" >
								                                            <input class="form-control" name="connectingVesselVoy[]">
								                                        </div>
								                                        
								                                        <div class="rootDivPadding form-group col-lg-2">
								                                            <select class="form-control" name="rootActivity[]">								                                            	
								                                            	<option value="TO BE LOADED" >TO BE LOADED</option>
								                                            	<option value="ARRIVING" >ARRIVING</option>
								                                                <option value="LOADED" >LOADED</option>
								                                                <option value="DISCHAGED" >DISCHAGED</option>
								                                                <option value="DELIVERED" >DELIVERED</option>
								                                                <option value="PLEASE INFORM BUYER TO TAKE DELIVERY" >PLEASE INFORM BUYER TO TAKE DELIVERY</option>
								                                            </select>
								                                        </div>
								                                       
								                                     </div>
					                                        	<?php 
					                                        }
					                                        
					                                        ?>
					                                        
					                                    </div>
						                            </div>
					                            </div>
					                         </div>
		                                </div>
		                                
		                                <input type="hidden" class="form-control" name="invoiceId" value="<?php echo isset($invoiceData) ? $invoiceData->invoiceId : ""; ?>">
		                                <div class="form-group col-lg-12">
	                                        <button type="submit" class="btn btn-default">Save Invoice</button>
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
            
            <script type="text/javascript">
            $(document).ready(function(){
				$(".clsAddRoot").click(function(event){
					event.preventDefault();
					var html ="";
						html +='<div class="frmRow">';
						/*html +='<div class="rootDivPadding form-group col-lg-3">';
						html +='    <input class="form-control" name="portOfLoading[]" >';
						html +='</div>';
						html +='<div class="rootDivPadding form-group col-lg-2">';
						html +='    <input class="form-control" name="vesselNameVoy[]" >';
						html +='</div>';
						html +='<div class="rootDivPadding form-group col-lg-1">';
						html +='    <input class="form-control rootDate" name="etdDate[]" readonly="readonly">';
						html +='</div>';*/
						html +='<div class="rootDivPadding form-group col-lg-5">';
						html +='    <input class="form-control" name="deschargePort[]" >';
						html +='</div>';
						html +='<div class="rootDivPadding form-group col-lg-1" >';
						html +='    <input class="form-control rootDate" name="etaDate[]" readonly="readonly">';
						html +='</div>';
						html +='<div class="rootDivPadding form-group col-lg-4" >';
						html +='    <input class="form-control" name="connectingVesselVoy[]" >';
						html +='</div>';
						html +='<div class="rootDivPadding form-group col-lg-2">';
						html +='    <select class="form-control" name="rootActivity[]">';
						html +='        <option value="TO BE LOADED" >TO BE LOADED</option>';
						html +='        <option value="ARRIVING" >ARRIVING</option>';
						html +='        <option value="LOADED" >LOADED</option>';
						html +='        <option value="DISCHAGED" >DISCHAGED</option>';
						html +='        <option value="DELIVERED" >DELIVERED</option>';
						html +='        <option value="PLEASE INFORM BUYER TO TAKE DELIVERY" >PLEASE INFORM BUYER TO TAKE DELIVERY</option>';
						html +='    </select>';
						html +='</div>';
						html +='</div>';
					$(".rootRow").append(html);
					
				});

				
				

				$('#txtContainerPortInDate').datepicker({
					format: 'd-m-yyyy'
				}).on('changeDate', function(){
		          	$('.datepicker').hide();
		        });

				$('#txtStuffingContainerOutDateFromFactory').datepicker({
					format: 'd-m-yyyy'
				}).on('changeDate', function(){
		          	$('.datepicker').hide();
		        });
				
				$('#txtContainerPortGateInDate').datepicker({
					format: 'd-m-yyyy'
				}).on('changeDate', function(){
		          	$('.datepicker').hide();
		        });

				$('#txtCustomOutOfChargeDate').datepicker({
					format: 'd-m-yyyy'
				}).on('changeDate', function(){
		          	$('.datepicker').hide();
		        });

		        $('#txtEstimatedArrivalDate').datepicker({
					format: 'd-m-yyyy'
				}).on('changeDate', function(){
		          	$('.datepicker').hide();
		        });

				$('#txtEmptyContainerPickUpDateFromYard').datepicker({
					format: 'd-m-yyyy'
				}).on('changeDate', function(){
		          	$('.datepicker').hide();
		        });				


				$('body').on('focus',".rootDate", function(){
				    $(this).datepicker({
						format: 'd-m-yyyy'
					}).on('changeDate', function(){
			          	$('.datepicker').hide();
			        }); 
				});

				$('body').on('focus',".customSmallDate", function(){
				    $(this).datepicker({
						format: 'd-m-yyyy'
					}).on('changeDate', function(){
				      	$('.datepicker').hide();
				    });
				});

				$("#ui-datepicker-div").wrap('<div style="position:absolute;top:0px;"></div>');

				

				var validator = $("#frmInvoice").validate({			
					rules: {
						txtBillNo: {
							required: true,
							minlength: 3,
							maxlength: 100
						},
						txtInvoiceNo: {
							required: true,
							minlength: 1,
							maxlength: 100
						},
						txtContainerNo:{
							required: true,
							minlength: 3,
							maxlength: 100
						},
						txtStuffingDate: {
							required: true
						},
						txtBuyer: {
							required: true
						},
						txtVesselName:{
							required: true,
							minlength: 5,
							maxlength: 100
						},
						txtShippingAgent:{
							required: true,
							minlength: 5,
							maxlength: 100
						}
					},
					messages:{
						txtBillNo: {
							required: "Required",
							minlength: "Min 3 char required",
							maxlength: "Max 3 char required"
						}
					}
				});

				
				$("#btnSendStatus").click(function(){
					var url = "<?php echo $this->config->base_url(); ?>mailSend/sendMail";
					var invoiceId = "<?php echo isset($invoiceData) ? $invoiceData->invoiceId : ""; ?>";

					if(!invoiceId || invoiceId == ""){
						return false;
					}

					$(".mailSuccess").hide();
					$(".mailError").hide();


					$.get( url, { invoiceId: invoiceId})
					.done(function(data) {
						if(data == '1'){
							$(".mailSuccess").show();
						}else{
							$(".mailError").show();
						}
					});
				});
				
            });
            </script>
	
        