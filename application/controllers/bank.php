<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->model('bank_model');
		$this->load->model('backup_model');
	}

	public function index()
	{	
		$data['bankdetails']  = $this->bank_model->getAllDetails();
		$data['title'] = "Bank Account List";
		$this->load->view('Bank/index',$data);
	}

	public function create(){
		$data['title'] = "Create Account";
		$this->load->view('Bank/create',$data);
	}

	public function storeDetails(){
		$data['BankName'] = $this->input->post('BankName');
		$data['BranchName'] = $this->input->post('BranchName');
		$data['BankAccNo'] = $this->input->post('BankAccNo');

		$this->bank_model->storeDetails($data);
		redirect('Bank');
	}

	public function edit($id){
		$data['bankdetails'] = $this->bank_model->getDetails($id);
		$data['title'] = "Edit Account";
		$this->load->view('Bank/edit',$data);
	}

	public function updateDetails($id){
		$data['BankName'] = $this->input->post('BankName');
		$data['BranchName'] = $this->input->post('BranchName');
		$data['BankAccNo'] = $this->input->post('BankAccNo');
		$data['created_at'] = date('Y-m-d H:i:s'); // Use the current timestamp for 'created_at'.
        $data['updated_at'] = date('Y-m-d H:i:s'); // Use the current timestamp for 'updated_at'.

		$this->bank_model->updateDetails($id,$data);
		redirect('Bank');
	}

	public function delete($id){
		$this->backup_model->addRecords($id);
		$this->bank_model->deleteDetails($id);
		redirect('Bank');
	}
}
