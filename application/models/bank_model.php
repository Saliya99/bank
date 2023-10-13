<?php
 
 
class bank_model extends CI_Model{

	public function getAllDetails(){
		$Details = $this->db->get('BankDetails')->result();
		return $Details;
	}

	public function storeDetails($data){
		$this->db->insert('BankDetails',$data);
	}

	public function getDetails($id){
		return $this->db->where('id',$id)->get('BankDetails')->row();
	}

	public function updateDetails($id,$data){
		$this->db->where('id',$id)->update('BankDetails',$data);
	}

	public function deleteDetails($id){
		$this->db->where('id',$id)->delete('BankDetails');
	}
}
