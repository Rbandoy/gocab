<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
  public $fields;
  function __construct() {
    parent::__construct();
    $this->load->helper("form");
    $this->load->model("main_model");
    $this->load->helper('date');
  }

  public function index(){ 
    $data['data'] = "Home Pages";
    // load view
    $this->load->model('main_model');  
    $this->load->view("home_view", $data);
  }
  public function validation() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules("fname","firstname", 'required');  
    $this->form_validation->set_rules("lname","lastname", 'required');
    $this->form_validation->set_rules("address","Address", 'required'); 
    $this->form_validation->set_rules("refno","RefNo.", 'required'); 
    $this->form_validation->set_rules("amount","Amount", 'required'); 
    $this->form_validation->set_rules("status","Status", 'required');  
    $this->form_validation->set_rules("email","Email", 'trim|required|valid_email'); 
    if (!$this->form_validation->run()) {
      return;
    }
  }

  public function RegisterUser() {
    if ($this->input->post("insert")) {
      $this->validation();
      
      $data = array(
        "fname" => $this->input->post("fname"),
        "lname" => $this->input->post("lname"),
        "email" => $this->input->post("email"),
        "address" => $this->input->post("address"),
        "refno" => $this->input->post("refno"),
        "amount" => $this->input->post("amount"),
        "dateCreated" => unix_to_human(time()),
        "dateUpdated" => unix_to_human(time())
      );
      $this->main_model->insertData($data);
      $this->index();
      return;
    }
    if ($this->input->post("view")) {
      $result['listdata'] = $this->main_model->viewData(); 
      $this->load->view('home_view', $result);
    }

    if ($this->input->post("search")) {
      $result['result'] = $this->main_model->search($this->input->post("id"));
      $this->load->view('home_view', $result);
    }

    if ($this->input->post("update")) {
      $this->validation();

      $id = $this->input->post("id");
      $lname = $this->input->post("lname");
      $fname = $this->input->post("fname");
      $email = $this->input->post("email");
      $address = $this->input->post("address");
      $refno = $this->input->post("refno");
      $amount = $this->input->post("amount");
      $status = $this->input->post("status");
      $dateUpdated = unix_to_human(time());
      $result = $this->main_model->updateData($id, $lname, $fname, $email, $address, $refno, $amount, $status, $dateUpdated);
      if (!$result) { 
        echo "<script type='text/javascript'>alert('No Data Updated');</script>";
        $this->index();
        return;
      }
      echo "<script type='text/javascript'>alert('Data Updated');</script>";
      $this->index();
    }

    if ($this->input->post("delete")) {
      $id = $this->input->post("id");
      $result = $this->main_model->deleteData($id);
      if (!$result) { 
        echo "<script type='text/javascript'>alert('No Data Deleted');</script>";
        $this->index();
      }
      echo "<script type='text/javascript'>alert('Data Deleted');</script>";
      $this->index();
    }
  }
}