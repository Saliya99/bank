<?php
class backup_model extends CI_Model {

    public function addRecords($id) {
        // Query the 'BankDetails' table to retrieve a record with the specified ID.
        $bankdetails = $this->db->where('id', $id)->get('BankDetails');

        if ($bankdetails->num_rows() > 0) {
            $bankdetail = $bankdetails->row(); // Get the first (and presumably only) row.

            // Create an associative array $backup_d with data from the 'BankDetails' record.
            $backup_d['id'] = $bankdetail->id;
            $backup_d['BankName'] = $bankdetail->BankName;
            $backup_d['BranchName'] = $bankdetail->BranchName;
            $backup_d['BankAccNo'] = $bankdetail->BankAccNo;
            $backup_d['created_at'] = date('Y-m-d H:i:s'); // Use the current timestamp for 'created_at'.
            $backup_d['updated_at'] = date('Y-m-d H:i:s'); // Use the current timestamp for 'updated_at'.
        } else {
            return; 
        }

        if ($this->db->insert('backup_records', $backup_d)) {
            //echo "Record inserted successfully.";
        } else {
            //echo "Failed to insert the record.";
        }
    }
}
