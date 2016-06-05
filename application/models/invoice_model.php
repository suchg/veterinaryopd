<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model {
	
	/*This is to insert data on database*/
	public function addUpdate($invoiceId)
	{
		/*array('field'=>$this->input->post('name of your input form field'))*/
		
		$stuffingDate = str_replace(' ', '', trim( $this->input->post('txtStuffingDate') ));
		$stuffingDate = ($stuffingDate && $stuffingDate != "") ? date ("Y-m-d H:i:s", strtotime($stuffingDate)) : "";
		
		$plannedStuffingDate = str_replace(' ', '', trim( $this->input->post('txtPlannedStuffingPlaceDate') ));
		$plannedStuffingDate = ($plannedStuffingDate && $plannedStuffingDate != "") ? date ("Y-m-d H:i:s", strtotime($plannedStuffingDate)) : "";
		
		$containerGateOutDateFromPortDate = str_replace(' ', '', trim( $this->input->post('txtContainerGateOutDateFromPortDate') ));
		$containerGateOutDateFromPortDate = ($containerGateOutDateFromPortDate && $containerGateOutDateFromPortDate != "") ? date ("Y-m-d H:i:s", strtotime($containerGateOutDateFromPortDate)) : "";
		
		$actualStuffingPlaceDate = str_replace(' ', '', trim( $this->input->post('txtActualStuffingPlaceDate') ));
		$actualStuffingPlaceDate = ($actualStuffingPlaceDate && $actualStuffingPlaceDate != "") ? date ("Y-m-d H:i:s", strtotime($actualStuffingPlaceDate)) : "";
		
		$customOutOfChargeDate = str_replace(' ', '', trim( $this->input->post('txtCustomOutOfChargeDate') ));
		$customOutOfChargeDate = ($customOutOfChargeDate && $customOutOfChargeDate != "") ? date ("Y-m-d H:i:s", strtotime($customOutOfChargeDate)) : "";
		
		$shippingBillNoDate = str_replace(' ', '', trim( $this->input->post('txtShippingBillNoDate') ));
		$shippingBillNoDate = ($shippingBillNoDate && $shippingBillNoDate != "") ? date ("Y-m-d H:i:s", strtotime($shippingBillNoDate)) : "";
		
		$containerPortInDate = str_replace(' ', '', trim( $this->input->post('txtContainerPortInDate') ));
		$containerPortInDate = ($containerPortInDate && $containerPortInDate != "") ? date ("Y-m-d H:i:s", strtotime($containerPortInDate)) : "";
				
		//-----
		$emptyContainerPickUpDateFromYard = str_replace(' ', '', trim( $this->input->post('txtEmptyContainerPickUpDateFromYard') ));
		$emptyContainerPickUpDateFromYard = ($emptyContainerPickUpDateFromYard && $emptyContainerPickUpDateFromYard != "") ? date ("Y-m-d H:i:s", strtotime($emptyContainerPickUpDateFromYard)) : "";
		
		$plannedStuffingPlaceDate = str_replace(' ', '', trim( $this->input->post('txtPlannedStuffingPlaceDate') ));
		$plannedStuffingPlaceDate = ($plannedStuffingPlaceDate && $plannedStuffingPlaceDate != "") ? date ("Y-m-d H:i:s", strtotime($plannedStuffingPlaceDate)) : "";
		
		$stuffingContainerOutDateFromFactory = str_replace(' ', '', trim( $this->input->post('txtStuffingContainerOutDateFromFactory') ));
		$stuffingContainerOutDateFromFactory = ($stuffingContainerOutDateFromFactory && $stuffingContainerOutDateFromFactory != "") ? date ("Y-m-d H:i:s", strtotime($stuffingContainerOutDateFromFactory)) : "";
		
		$containerPortGateInDate = str_replace(' ', '', trim( $this->input->post('txtContainerPortGateInDate') ));
		$containerPortGateInDate = ($containerPortGateInDate && $containerPortGateInDate != "") ? date ("Y-m-d H:i:s", strtotime($containerPortGateInDate)) : "";
		
		$shippingBillNoDate = str_replace(' ', '', trim( $this->input->post('txtShippingBillNoDate') ));
		$shippingBillNoDate = ($shippingBillNoDate && $shippingBillNoDate != "") ? date ("Y-m-d H:i:s", strtotime($shippingBillNoDate)) : "";
		
		$customOutOfChargeDate = str_replace(' ', '', trim( $this->input->post('txtContainerPortInDate') ));
		$customOutOfChargeDate = ($customOutOfChargeDate && $customOutOfChargeDate != "") ? date ("Y-m-d H:i:s", strtotime($customOutOfChargeDate)) : "";
		
		$intendedVesselEtdDate = str_replace(' ', '', trim( $this->input->post('txtIntendedVesselDate') ));
		$intendedVesselEtdDate = ($intendedVesselEtdDate && $intendedVesselEtdDate != "") ? date ("Y-m-d H:i:s", strtotime($intendedVesselEtdDate)) : "";
				
		$estimatedArrivalDate = str_replace(' ', '', trim( $this->input->post('txtEstimatedArrivalDate') ));
		$estimatedArrivalDate = ($estimatedArrivalDate && $estimatedArrivalDate != "") ? date ("Y-m-d H:i:s", strtotime($estimatedArrivalDate)) : "";
		
		
		$data = array(						
						'bookingNo'		=> $this->input->post('txtBookingNo'),
						'transporter'		=> $this->input->post('txtTransporter'),
						'truckNo'	=> $this->input->post('txtTruckNo'),
						'emptyContainerPickUpDateFromYard'	=> $emptyContainerPickUpDateFromYard,
						'plannedStuffingPlace'		=> $this->input->post('txtPlannedStuffingPlace'),
						'plannedStuffingPlaceDate'		=> $plannedStuffingPlaceDate,
						'stuffingContainerOutDateFromFactory'	=> $stuffingContainerOutDateFromFactory,				
						'bufferYard'	=> $this->input->post('txtBufferYard'),
						'containerPortGateInDate'		=> $containerPortGateInDate,
						'shippingBillNo'		=> $this->input->post('txtShippingBillNo'),
						'shippingBillNoDate'	=> $shippingBillNoDate,
						'customOutOfChargeDate'	=> $customOutOfChargeDate,
						'intendedVesselEtd'	=> $this->input->post('txtIntendedVessel'),
						'intendedVesselEtdDate'		=> $intendedVesselEtdDate,
										
						'billNo'		=> $this->input->post('txtBillNo'),
						'invoiceNo'		=> $this->input->post('txtInvoiceNo'),
						'customerId'	=> $this->input->post('txtBuyer'),
						'containerNo'	=> $this->input->post('txtContainerNo'),
						'stuffingDate'	=> $stuffingDate,
						'vesselNameNvoy'=> $this->input->post('txtVesselName'),
						'TTdays'		=> $this->input->post('txtTTDays'),
						'actualDays'	=> $this->input->post('txtActualDays'),
						'diffDays'		=> $this->input->post('txtDiffDays'),
						'delDays'		=> $this->input->post('txtDelDays'),
						'shippingAgent'	=> $this->input->post('txtShippingAgent'),
						'remarks'		=> $this->input->post('txtRemarks'),
						
						'containerSize'		=> $this->input->post('txtContainerSize'),
						'portName'	=> $this->input->post('txtPortName'),
						'carrierName'		=> $this->input->post('txtCarrierName'),
						'consingeeName'		=> $this->input->post('txtConsingeeName'),
						'termsOfShipment'	=> $this->input->post('txtTermOfShipment'),
						'origin'		=> $this->input->post('txtOrigin'),
						'finalDestination'		=> $this->input->post('txtFinalDestination'),
						'estimatedArrivalDate'	=> $estimatedArrivalDate
					 );
		
		
		
			
		if($invoiceId)
		{
			$this->db->where('invoiceId', $invoiceId);
			$this->db->update('invoicemaster',$data);
			
			$this->db->where('invoiceId', $invoiceId);
			$this->db->delete('rootmaster');
		}else
		{
			$this->db->insert('invoicemaster',$data);
			$invoiceId = $this->db->insert_id();
		}		
		
		
		if($this->input->post('deschargePort') && $this->input->post('connectingVesselVoy'))
		{
			$portOfLoading = $this->input->post('portOfLoading');
			$vesselNameVoy = $this->input->post('vesselNameVoy');
			$etdDate = $this->input->post('etdDate');
			$etaDate = $this->input->post('etaDate');
			
			$deschargePort = $this->input->post('deschargePort');
			
			$connectingVesselVoy = $this->input->post('connectingVesselVoy');
			$rootActivity = $this->input->post('rootActivity');
			
			for($i = 0 ; $i < count($connectingVesselVoy) ; $i++ )
			{
				$strEtdDate = str_replace(' ', '', trim($etdDate[$i]));
				$strEtaDate = str_replace(' ', '', trim($etaDate[$i]));
				
				$strEtdDate = ($strEtdDate && $strEtdDate != "") ? date ("Y-m-d H:i:s", strtotime($strEtdDate)) : date('Y-m-d H:i:s', time());
				$strEtaDate = ($strEtaDate && $strEtaDate != "") ? date ("Y-m-d H:i:s", strtotime($strEtaDate)) : date('Y-m-d H:i:s', time());
				
				$rootData = array(
						"invoiceId" => $invoiceId,
						"portOfLoading" => '',//$portOfLoading[$i],
						"vesselNameVoy" => '',//$vesselNameVoy[$i],
						"etdDate" => '',//$strEtdDate,
						"deschargePort" => $deschargePort[$i],
						"etaDate" => $strEtaDate,
						"connectingVesselVoy" => $connectingVesselVoy[$i],
						"rootActivity" => $rootActivity[$i]
				);
				$this->db->insert('rootmaster',$rootData);
			}
		}
	}

	public function get_invoices()
	{
		$query= $this->db->get('invoicemaster');		
		$strSql = "SELECT * FROM invoicemaster AS inv LEFT JOIN customermaster AS cstm ON ";
		$strSql .= "		inv.customerId = cstm.custId WHERE inv.status = 1";
		$query = $this->db->query($strSql);
		$result = $query->result();
		return $result;
	}
	
	
	public function get_roots()
	{
		$strSql = "SELECT * FROM rootmaster WHERE invoiceId = ".$this->input->get('invoiceId');
		$query = $this->db->query($strSql);
		return $result = $query->result();
	}
	
	public function get_invoice()
	{
		if($this->input->get('invoiceId'))
		{
			$strSql = "SELECT * FROM invoicemaster AS inv LEFT JOIN customermaster AS cstm ON ";
			$strSql .= "		inv.customerId = cstm.custId ";
			$strSql .= "		WHERE invoiceId = ".$this->input->get('invoiceId') . " AND inv.status = 1 ";
			$query = $this->db->query($strSql);
			$result = $query->result();
			return isset($result[0]) ? $result[0] : "" ;
		}
	}
	
	public function statusGetInvoice()
	{
		if($this->input->get('searchVal'))
		{
			
			$strSql = "SELECT * FROM invoicemaster AS inv LEFT JOIN customermaster AS cstm ON ";
			$strSql .= "		inv.customerId = cstm.custId ";
			$strSql .= "		WHERE invoiceNo = '".$this->input->get('searchVal')."' AND inv.status = 1";
			$query = $this->db->query($strSql);
			$result = $query->result();
			$result = $result[0];
			//$result->stuffingDate = date ("Y-m-d", strtotime($result->stuffingDate));
			$nullDate = '0000-00-00 00:00:00';
						
			$result->emptyContainerPickUpDateFromYard = ($result->emptyContainerPickUpDateFromYard != $nullDate) ? date ("j-n-Y", strtotime($result->emptyContainerPickUpDateFromYard)) : "";
			$result->plannedStuffingPlaceDate = ($result->plannedStuffingPlaceDate != $nullDate) ? date ("j-n-Y", strtotime($result->plannedStuffingPlaceDate)) : "";
			$result->stuffingContainerOutDateFromFactory = ($result->stuffingContainerOutDateFromFactory != $nullDate) ? date ("j-n-Y", strtotime($result->stuffingContainerOutDateFromFactory)) : "";
			$result->containerPortGateInDate = ($result->containerPortGateInDate != $nullDate) ? date ("j-n-Y", strtotime($result->containerPortGateInDate)) : "";
			$result->shippingBillNoDate = ($result->shippingBillNoDate != $nullDate) ? date ("j-n-Y", strtotime($result->shippingBillNoDate)) : "";
			$result->customOutOfChargeDate = ($result->customOutOfChargeDate != $nullDate) ? date ("j-n-Y", strtotime($result->customOutOfChargeDate)) : "";
			$result->intendedVesselEtdDate = ($result->intendedVesselEtdDate != $nullDate) ? date ("j-n-Y", strtotime($result->intendedVesselEtdDate)) : "";
			$result->estimatedArrivalDate = ($result->estimatedArrivalDate != $nullDate) ? date ("j-n-Y", strtotime($result->estimatedArrivalDate)) : "";
			
			
			return $result;
		}
	}
	
	public function getInvoiceByContainerId()
	{
		if($this->input->get('searchVal'))
		{
			$strSql = "SELECT * FROM invoicemaster AS inv LEFT JOIN customermaster AS cstm ON ";
			$strSql .= "		inv.customerId = cstm.custId ";
			$strSql .= "		WHERE containerNo = '".$this->input->get('searchVal')."' AND inv.status = 1";
			$query = $this->db->query($strSql);
			$result = $query->result();
			$result = $result[0];
			$nullDate = '0000-00-00 00:00:00';
			
			$result->emptyContainerPickUpDateFromYard = ($result->emptyContainerPickUpDateFromYard != $nullDate) ? date ("j-n-Y", strtotime($result->emptyContainerPickUpDateFromYard)) : "";
			$result->plannedStuffingPlaceDate = ($result->plannedStuffingPlaceDate != $nullDate) ? date ("j-n-Y", strtotime($result->plannedStuffingPlaceDate)) : "";
			$result->stuffingContainerOutDateFromFactory = ($result->stuffingContainerOutDateFromFactory != $nullDate) ? date ("j-n-Y", strtotime($result->stuffingContainerOutDateFromFactory)) : "";
			$result->containerPortGateInDate = ($result->containerPortGateInDate != $nullDate) ? date ("j-n-Y", strtotime($result->containerPortGateInDate)) : "";
			$result->shippingBillNoDate = ($result->shippingBillNoDate != $nullDate) ? date ("j-n-Y", strtotime($result->shippingBillNoDate)) : "";
			$result->customOutOfChargeDate = ($result->customOutOfChargeDate != $nullDate) ? date ("j-n-Y", strtotime($result->customOutOfChargeDate)) : "";
			$result->intendedVesselEtdDate = ($result->intendedVesselEtdDate != $nullDate) ? date ("j-n-Y", strtotime($result->intendedVesselEtdDate)) : "";
			$result->estimatedArrivalDate = ($result->estimatedArrivalDate != $nullDate) ? date ("j-n-Y", strtotime($result->estimatedArrivalDate)) : "";
			
			return $result;
		}
	}
	
	public function getInvoiceByBillNo()
	{
		if($this->input->get('searchVal'))
		{
			$strSql = "SELECT * FROM invoicemaster AS inv LEFT JOIN customermaster AS cstm ON ";
			$strSql .= "		inv.customerId = cstm.custId ";
			$strSql .= "		WHERE billNo = '".$this->input->get('searchVal')."' AND inv.status = 1";
			$query = $this->db->query($strSql);
			$result = $query->result();
			$result = $result[0];
			$nullDate = '0000-00-00 00:00:00';
			
			$result->emptyContainerPickUpDateFromYard = ($result->emptyContainerPickUpDateFromYard != $nullDate) ? date ("j-n-Y", strtotime($result->emptyContainerPickUpDateFromYard)) : "";
			$result->plannedStuffingPlaceDate = ($result->plannedStuffingPlaceDate != $nullDate) ? date ("j-n-Y", strtotime($result->plannedStuffingPlaceDate)) : "";
			$result->stuffingContainerOutDateFromFactory = ($result->stuffingContainerOutDateFromFactory != $nullDate) ? date ("j-n-Y", strtotime($result->stuffingContainerOutDateFromFactory)) : "";
			$result->containerPortGateInDate = ($result->containerPortGateInDate != $nullDate) ? date ("j-n-Y", strtotime($result->containerPortGateInDate)) : "";
			$result->shippingBillNoDate = ($result->shippingBillNoDate != $nullDate) ? date ("j-n-Y", strtotime($result->shippingBillNoDate)) : "";
			$result->customOutOfChargeDate = ($result->customOutOfChargeDate != $nullDate) ? date ("j-n-Y", strtotime($result->customOutOfChargeDate)) : "";
			$result->intendedVesselEtdDate = ($result->intendedVesselEtdDate != $nullDate) ? date ("j-n-Y", strtotime($result->intendedVesselEtdDate)) : "";
			$result->estimatedArrivalDate = ($result->estimatedArrivalDate != $nullDate) ? date ("j-n-Y", strtotime($result->estimatedArrivalDate)) : "";
			
			return $result;
		}
	}
	
	public function getRoots($invoiceId)
	{
		if($invoiceId)
		{
			$strSql = "SELECT * FROM rootmaster ";
			$strSql .= "		WHERE invoiceId = ".$invoiceId;
			$query = $this->db->query($strSql);
			$result = $query->result();
			
			foreach($result as $val)
			{
				$val->portOfLoading = substr($val->portOfLoading, 0, 50);
				$val->vesselNameVoy = substr($val->vesselNameVoy, 0, 50);
				$val->etdDate = date ("j-n-Y", strtotime($val->etdDate));
				$val->deschargePort = substr($val->deschargePort, 0, 50);
				$val->etaDate = date ("j-n-Y", strtotime($val->etaDate));
				$val->connectingVesselVoy = substr($val->connectingVesselVoy, 0, 50);
				$val->rootActivity = substr($val->rootActivity, 0, 50);
			}
			
			return $result;
		}
	}
	
	
	public function deleteInvoice($invoiceId)
	{
		if($invoiceId)
		{
			$data = array(
					'status'		=> 0
					);
			$this->db->where('invoiceId', $invoiceId);
			$this->db->update('invoicemaster',$data);
		}
	}
	
	
}
?>