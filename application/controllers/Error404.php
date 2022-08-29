<?php 
//controllers/Error404.php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Error404 extends CI_Controller { 
    public function index() 
    { 
        $data['heading'] = "Error 404 - Page Not Okay"; 
        $data['picture'] = "img/owl.jpg"; 
        $data['message'] = "<p>Sorry. It appears the page you are looking for does not exist.</p>"; 
        
        // echo "<pre>"; 
        // print_r($data); 
        // echo "</pre>"; 

        $this->load->view('includes/header',$data); 
        $this->load->view('error404_view',$data); // we need to pass the array to the view 
        $this->load->view('includes/footer');
    }
}