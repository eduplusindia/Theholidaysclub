<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Member_Leads extends CI_Model
{
   
	 function addNewLead($leadInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_leads', $leadInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id; 
    }
	function leadList(){
		 $query = $this->db->get('tbl_leads');
		return  $query->result();
	}
	function singleLead($leadId){
		$this->db->select('id, title, content, status');
        $this->db->from('tbl_leads');
        $this->db->where('id', $leadId);
        $query = $this->db->get();
        return $query->result();
	}
	function editLead($leadID, $leadInfo){
		$this->db->where('id', $leadID);
        //$this->db->where('id', 0);
        $this->db->update('tbl_leads', $leadInfo);
        return $this->db->affected_rows();
	}
}	

  
   ?>