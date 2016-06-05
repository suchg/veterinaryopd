<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MailSend extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('invoice_model');
        $this->load->model('customer_model');
        $this->load->helper('url');
    }
	
	function sendMail()
	{	
		$invoiceData = $this->invoice_model->get_invoice();
		
		$nullDate = '0000-00-00 00:00:00';
		
		$invoiceData->emptyContainerPickUpDateFromYard = ($invoiceData->emptyContainerPickUpDateFromYard != $nullDate && $invoiceData->emptyContainerPickUpDateFromYard) ? date ("j-n-Y", strtotime($invoiceData->emptyContainerPickUpDateFromYard)) : "";
		$invoiceData->plannedStuffingPlaceDate = ($invoiceData->plannedStuffingPlaceDate != $nullDate && $invoiceData->plannedStuffingPlaceDate) ? date ("j-n-Y", strtotime($invoiceData->plannedStuffingPlaceDate)) : "";
		$invoiceData->stuffingContainerOutDateFromFactory = ($invoiceData->stuffingContainerOutDateFromFactory != $nullDate && $invoiceData->stuffingContainerOutDateFromFactory) ? date ("j-n-Y", strtotime($invoiceData->stuffingContainerOutDateFromFactory)) : "";
		$invoiceData->containerPortGateInDate = ($invoiceData->containerPortGateInDate != $nullDate && $invoiceData->containerPortGateInDate) ? date ("j-n-Y", strtotime($invoiceData->containerPortGateInDate)) : "";
		$invoiceData->shippingBillNoDate = ($invoiceData->shippingBillNoDate != $nullDate && $invoiceData->shippingBillNoDate) ? date ("j-n-Y", strtotime($invoiceData->shippingBillNoDate)) : "";
		$invoiceData->customOutOfChargeDate = ($invoiceData->customOutOfChargeDate != $nullDate && $invoiceData->customOutOfChargeDate) ? date ("j-n-Y", strtotime($invoiceData->customOutOfChargeDate)) : "";
		$invoiceData->intendedVesselEtdDate = ($invoiceData->intendedVesselEtdDate != $nullDate && $invoiceData->intendedVesselEtdDate) ? date ("j-n-Y", strtotime($invoiceData->intendedVesselEtdDate)) : "";
		$invoiceData->estimatedArrivalDate = ($invoiceData->estimatedArrivalDate != $nullDate && $invoiceData->estimatedArrivalDate) ? date ("j-n-Y", strtotime($invoiceData->estimatedArrivalDate)) : "";
		
		$mailHtml = $this->emailTemplate($invoiceData);
		if(!$invoiceData->emailAddr || $invoiceData->emailAddr == "")
		{
			return false;
		}
		
	    $config = array();
        $config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		
		//$this->email->initialize($config);
        
        $config['mailtype'] = 'html';
        $config['charset']  = 'utf-8';
        $config['newline']  = "\r\n";
        $config['wordwrap'] = TRUE;
	    
	    $this->load->library('email');
	    $this->email->initialize($config);

	    
	    $this->email->from('info@chetan-traders.com', 'CHETAN TRADERS');
		//$this->email->from('chetan@bom7.vsnl.net.in', 'CHETAN TRADERS');
		$this->email->to($invoiceData->emailAddr);

		//$this->email->to('sachin.gavas90@gmail.com');
		
		if($invoiceData->altEmailAddr)
		{
			$ccEmailAddresses = preg_replace('#\s+#',',',trim($invoiceData->altEmailAddr));
			$this->email->cc($ccEmailAddresses);
		}
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');
		
		$this->email->subject('Shipment Status for INV.NO:'.$invoiceData->invoiceNo);
		$this->email->message($mailHtml);
		
		if($this->email->send())
		{
			echo "1";
		}else 
		{
			echo "0";
		}
		//echo $this->email->print_debugger();
	}
	
	function emailTemplate($invoiceData){
		
		
		$rootList = $this->invoice_model->get_roots();
		
		
		$html = '  <html>
					<header>
				</header>
				<title></title>
				<body>
				  <div>
    	<div style="overflow: hidden;" >
    		<div>						
    			<div align="center">
    				<table width="90%" cellspacing="0" cellpadding="0" border="1" style="width:90.0%;border:outset green 1.0pt">
    				<tbody>
                        <tr>
                            <td style="border:inset green 1.0pt;padding:6.0pt 6.0pt 6.0pt 6.0pt">
                            	<span style="color:#1f497d">CHETAN TRADERS</span>
                            </td>
                        </tr>
                        <tr>
                        	<td style="border:inset green 1.0pt;padding:6.0pt 6.0pt 6.0pt 6.0pt"></td>
                        </tr>
                        <tr style="height:29.25pt">
                        	<td width="100%" style="width:100.0%;border:inset green 1.0pt;background:#ff8000;padding:6.0pt 6.0pt 6.0pt 6.0pt;height:29.25pt">
                            	<span style="color:#1f497d">Shipment Status </span>
                        	</td>
                        </tr>
                        <tr style="height:527.85pt">
                        	<td style="border:inset green 1.0pt;padding:6.0pt 6.0pt 6.0pt 6.0pt;height:527.85pt">
                        		<div style="color:red;font-weight:bold;">Dear Customer,</div>
                        		<div>Please find your shipment details below:</div>
                        		<table width="100%" cellspacing="0" cellpadding="0" border="1" style="width:100.0%">
                                <tbody>
				
                                <tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">BOOKING NO.</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->bookingNo.'</td>
                                </tr>
				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">TRANSPORTER</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->transporter.'</td>
                                </tr>
				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">TRUCK NO.</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->truckNo.'</td>
                                </tr>
				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">EMPTY CONTAINER PICK UP DATE FROM YARD</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->emptyContainerPickUpDateFromYard.'</td>
                                </tr>
                                  				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">PLANNED STUFFING PLACE</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt"><span>'.($invoiceData->plannedStuffingPlace ? $invoiceData->plannedStuffingPlace : '--').'</span><span>'. (($invoiceData->plannedStuffingPlaceDate) ? ' &nbsp;&nbsp;&nbsp; Date: '.$invoiceData->plannedStuffingPlaceDate : '') .'</span></td>
                                </tr>
				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">STUFFING CONTAINER OUT DATE FROM FACTORY</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->stuffingContainerOutDateFromFactory.'</td>
                                </tr>
                                    		
                                <tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">BUFFER YARD</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->bufferYard.'</td>
                                </tr>		
				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">CONTAINER PORT GATE IN DATE</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->containerPortGateInDate.'</td>
                                </tr>
				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">SHIPPING BILL NO.</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt"><span>'.($invoiceData->shippingBillNo ? $invoiceData->shippingBillNo : '--') .'<span><span>'. (($invoiceData->shippingBillNoDate) ? ' &nbsp;&nbsp;&nbsp; Date: '.$invoiceData->shippingBillNoDate : '')  .'</span></td>
                                </tr>
				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">CUSTOM OUT OF CHARGE DATE</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->customOutOfChargeDate.'</td>
                                </tr>
				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">INTENDED VESSEL / ETD.</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt"><span>'.($invoiceData->intendedVesselEtd ? $invoiceData->intendedVesselEtd : '--') .'<span><span>'. (($invoiceData->intendedVesselEtd) ? ' &nbsp;&nbsp;&nbsp; Date: '.$invoiceData->intendedVesselEtdDate : '')  .'</span></td>
                                </tr>
				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">ESTIMATED ARRIVAL TIME / ETA DEST</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt"><span>'. (($invoiceData->estimatedArrivalDate) ? ' &nbsp;&nbsp;&nbsp; Date: '.$invoiceData->estimatedArrivalDate : '')  .'</span></td>
                                </tr>
				
				
								<tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold;text-transform:capitalize;">INVOICE NO.</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->invoiceNo.'</td>
                                </tr>
                        
                                <tr>
                                    <td width="40%" style="width:40.0%;padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                    	<span style="font-weight:bold">CONTAINER NO.</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->containerNo.'</td>
                                </tr>                                
                                                                
                                <tr>
                                    <td width="40%" style="width:40.0%;padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                    	<span style="font-weight:bold">SIZE OF CONTAINER</span>
                                    </td>
                                    <td width="60%" style="width:60.0%;padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->containerSize.'</td>
                                </tr>
                                
                                <tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold">BL NO.</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->billNo.'</td>
                                </tr>
                                
                                <tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold">PORT NAME</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->portName.'</td>
                                </tr>
                                
                                <tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                    	<span style="font-weight:bold">CARRIER NAME</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->carrierName.'</td>
                                </tr>
                                
                                <tr>
                                <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                	<span style="font-weight:bold">SHIPPER NAME </span>
                                </td>
                                <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->custName.'</td>
                                </tr>
                        
                                <tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                    	<span style="font-weight:bold">CONSINGEE NAME </span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->consingeeName.'</td>
                                </tr>
                                
                                <tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                    	<span style="font-weight:bold">TERMS OF SHIPMENT</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->termsOfShipment.'</td>
                                </tr>
                                
                                <tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                    	<span style="font-weight:bold">FINAL DESTINATION</span>
                                    </td>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$invoiceData->finalDestination.'</td>
                                </tr>
                                <tr>
                                    <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                        <span style="font-weight:bold">REMARK </span>
                                    </td>
                                    <td style="font-weight:bold;text-transform:capitalize;padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                    	'.$invoiceData->remarks.'
                                    </td>
                                </tr>
                        </tbody>
                       </table>
    
    
    					<table width="100%" cellspacing="0" cellpadding="0" border="1" style="width:100.0%">
    					<tbody>
                        <tr>
                        	<td style="background:#9c9c9c;padding:1.5pt 1.5pt 1.5pt 1.5pt;font-weight:bold;text-transform:capitalize;">
                        		Container Connection
                        	</td>
                        </tr>
                        <tr style="height:184.5pt">
                            <td style="padding:1.5pt 1.5pt 1.5pt 1.5pt;height:184.5pt">
                            <table width="100%" cellspacing="0" cellpadding="0" border="1" style="width:100.0%">
                            <tbody>
                        	<tr>
                                <td style="width:40%;background:#ff8000;padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                	<span style="color:white;font-weight:bold;text-transform:capitalize;">Location</span>
                                </td>
                                <td style="width:20%;background:#ff8000;padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                	<span style="color:white;font-weight:bold;text-transform:capitalize;">Date</span>
                                </td>
                                <td style="width:30%;background:#ff8000;padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                	<span style="color:white;font-weight:bold;text-transform:capitalize;">VESSEL AND VOY</span>
                                </td>
                                <td style="width:10%;background:#ff8000;padding:1.5pt 1.5pt 1.5pt 1.5pt">
                                	<span style="color:white;font-weight:bold;">ACTIVITY</span>
                                </td>
                                </tr>';
                                
			    if(isset($rootList)){
						foreach($rootList as $val)
			            {
			            	$html .= '
			            		<tr>
					            	<td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.$val->deschargePort.'</td>
					            	<td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'.date ("j-n-Y", strtotime($val->etaDate)).'</td>
					            	<td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">'. $val->connectingVesselVoy .'</td>
					            	<td style="padding:1.5pt 1.5pt 1.5pt 1.5pt">
					            		'.$val->rootActivity.'
					            	</td>
				            	</tr>';
			            }
					}
	
            $html .='              </tbody>
                            </table>
    					</td>
    				</tr>
                </tbody>
                </table>
                
                
        <p>Please VISIT our website <a target="_blank" href="http://www.chetan-traders.com" style="font-weight:bold;">www.chetan-traders.com</a> for online tracking</p>
        </td>
    </tr>
    
    </tbody>
    </table>
    
    <span class="HOEnZb adL">
        <font color="#888888">
        <br clear="all"><br>-- <br>
            <div></div>
        </font>
    </span>
    </div>
    
    </div>
    </div>
            		</body></html>';
		
		return $html;
	}
	
	function sendAutoEmail(){
		
		
		$config = array();
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		
		//$this->email->initialize($config);
		
		$config['mailtype'] = 'html';
		$config['charset']  = 'utf-8';
		$config['newline']  = "\r\n";
		$config['wordwrap'] = TRUE;
		 
		$this->load->library('email');
		$this->email->initialize($config);
		
		$this->email->from('chetan@bom7.vsnl.net.in');
		$this->email->to('sachin.gavas99@gmail.com');		
		
		$this->email->subject('cron job');
		$this->email->message("Hiii testing mail from cron job");		
		
		if($this->email->send())
		{
			echo "1";
		}else
		{
			echo "0";
		}
		
	}
}