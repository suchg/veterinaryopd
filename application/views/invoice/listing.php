			<?php 
				$baseUrl = $this->config->base_url();
				$bootstrap = $baseUrl.$this->config->item('bootstrap');
			?>
         		
				<script type="text/javascript" language="javascript" src="<?php echo $baseUrl; ?>html/DataTables-1.10.2/media/js/jquery.dataTables.js"></script>
				<script type="text/javascript" language="javascript" src="<?php echo $baseUrl; ?>html/DataTables-1.10.2/examples/resources/syntax/shCore.js"></script>
				<script type="text/javascript" language="javascript" src="<?php echo $baseUrl; ?>html/DataTables-1.10.2/examples/resources/demo.js"></script>
				<script type="text/javascript" language="javascript" class="init">
			
			
					$(document).ready(function() {
						$('#dataTables-example').dataTable();
					} );
			
			
				</script>
         	
         	<script type="text/javascript">
         	$(document).load(function(){
         		//$('#dataTables-example').dataTable();
            });
			    
			</script>
           
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<div class="panel-heading">
                            <a href="<?php echo $baseUrl; ?>invoice/addupdate">Generate Invoice</a>
                        </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Invoice List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Invoice No</th>
                                            <th>B/L No.</th>
                                            <th>Customer Name</th>
                                            <th>Container No.</th>
                                            <!-- th>Buyer</th -->
                                            <th>Vessel Name & Voy</th>
                                            <!-- th>Stuffing Date</th -->
                                            <th style="width:60px;" >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    	$loopCounter = 0;
                                    	if (isset($invoiceList))
                                    	{
	                                    	foreach($invoiceList as $val)
	                                    	{
	                                    		$loopCounter++;
	                                ?>
		                                    	<tr class="odd gradeX">
		                                    		<td><?php echo $loopCounter; ?></td>
		                                    		<td><?php echo $val->invoiceNo; ?></td>
		                                    		<td><?php echo $val->billNo; ?></td>
		                                            <td><?php echo $val->custName; ?></td>
		                                            <td><?php echo $val->containerNo ; ?></td>
		                                            <!-- td><?php echo $val->nameOfBuyer; ?></td -->
		                                            
		                                    		<td><?php echo $val->vesselNameNvoy ; ?></td>
		                                            <!-- td><?php echo date ("Y-m-d", strtotime($val->stuffingDate)); ?></td -->
		                                            <td class="center">
		                                            	<a href="<?php echo $baseUrl; ?>invoice/addupdate?invoiceId=<?php echo $val->invoiceId; ?>">Edit</a>
		                                            	 | <a href="#" class='btnDel' postval="<?php echo $val->invoiceId; ?>">Delete</a>
		                                            </td>
		                                        </tr>	
	                                <?php 
	                                    	}
                                    	}
                                    ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <script type="text/javascript">
            $(document).ready(function(){
            	
				$('#dataTables-example').on('click', '.btnDel', function(e){
					e.preventDefault();
					var r = confirm("Do you want to delete this Invoice!");
					if (!r) {
					    return false;
					}
					
					var invoiceId = $(this).attr('postval');
					var reditectUrl = "<?php echo $baseUrl; ?>invoice/delete";
					$('#postId').val(invoiceId);					
					$('#frmDynamicPost').attr('action', reditectUrl);
					$('#frmDynamicPost').submit();
				});

            });
            </script>
           
           <form id="frmDynamicPost" method="post" action="">
           		<input type="hidden" id='postId' name="invoiceId" value="" />
           </form>
           
           <!--  div id="dialog" title="Basic dialog">
			<p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
			</div -->