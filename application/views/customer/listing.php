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
                            <a href="<?php echo $baseUrl; ?>customer/addupdate">Add Customers</a>
                        </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Customers
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Customer name</th>
                                            <th>Mobile No</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    	$loopCounter = 0;
                                    	foreach($custList as $val)
                                    	{
                                    		$loopCounter++;
                                    ?>
	                                    	<tr class="odd gradeX">
	                                    		<td><?php echo $loopCounter; ?></td>
	                                    		<td><?php echo $val->custName; ?></td>
	                                            <td><?php echo $val->custMob; ?></td>
	                                            <td><?php echo $val->custAddress; ?></td>
	                                            <td class="center">
	                                            <a href="<?php echo $baseUrl; ?>customer/addupdate?custId=<?php echo $val->custId; ?>">Edit</a>
	                                            </td>
	                                        </tr>	
                                    <?php 
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
           