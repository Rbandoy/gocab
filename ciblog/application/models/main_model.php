<?php
    class Main_model extends CI_Model{
        function test_main() {
            echo "this is a function";
        }
        function insertData($data) {
            $this->db->insert("tbluser", $data); 
        }
        function viewData() {
            $query = $this->db->query("select * from tbluser");
            return $query->result();
        }
        function search($id) {
            if(!$id) {
                return;
            }
            $query = $this->db->query("select * from tbluser where id=".$id);
            return $query->row();
        }
        function updateData($id, $lname, $fname, $email, $address, $refno, $amount, $status, $dateUpdated) {
            $this->db->query("UPDATE `tbluser` SET `lname`= '$lname', `fname`= '$fname', `email`= '$email', 
                `address`= '$address', `refno`= '$refno', `amount`= '$amount', `status`= '$status', 
                `dateUpdated`= '$dateUpdated' where `id`= '$id'");
            return $this->db->affected_rows();;
        }
        function deleteData($id) {  
            $this->db->query("delete  from `tbluser` where `id`='$id'");
            return $this->db->affected_rows();
        }
    }
?>