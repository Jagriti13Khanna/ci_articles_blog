<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Home extends CI_Controller 
{ 
    function __construct() 
    { 
        parent::__construct(); 
        $this->load->helper('form'); // loading this for the entire class/controller 
        $this->load->library('form_validation'); // loading this for the entire class/controller 
        $this->load->database(); // ummm…ditto 
    } 
    public function index() 
    { 
        $data['heading'] = "Reading from a DB"; 
        $this->load->model('home_model'); 
        $data['results'] = $this->home_model->get_articles();

        $this->load->view('includes/header'); 
        $this->load->view('home_read_view',$data); 
       $this->load->view('includes/footer'); 

        // echo "home";

        // echo "<pre>";
        // print_r($data); 
        // echo "</pre>";
    }
    public function detail($id) 
    { 
        /* We need to add some security and a "graceful exit: in case of a URL manipulation or other error that prevents us from getting the required $id */ 
        if(!is_numeric($id))
        { 
            /* if this parameter is missing, or wrong format...*/ 
            /* best to just redirect*/ 
            redirect('/', 'location'); 
        } 
        $this->load->library('typography'); 
        $data['heading'] = "Reading from a DB"; 
        $this->load->model('home_model'); 
        $data['results'] = $this->home_model->get_article_detail($id); 
        $this->load->view('includes/header',$data); 
        $this->load->view('home_detail_view',$data); 
        $this->load->view('includes/footer'); 

        // echo "detail";
    }   // /detail
    public function write()
    {
        if (!$this->ion_auth->logged_in()) 
        { 
            redirect('/auth/login/'); 
        }
        else
        { 
            $data['author_id'] = $this->ion_auth->user()->row()->id; 
        }
        
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[4]|max_length[40]'); 
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[20]|max_length[2000]');

        // Validation Library was loaded in the constructor.
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('includes/header');
            $this->load->view('home_write_view');
            $this->load->view('includes/footer');
        }
        else 
        { 
            // echo "SUCCESS"; 
            // retrieve POSTED form data 
            $data['title'] = $this->input->post('title'); 
            $data['description']= $this->input->post('description'); 
            $this->load->model('home_model'); 
            $this->home_model->insert_article($data);
            
            // $this->session->set_flashdata('message', 'Insert Successful');

            redirect("home", 'location');
        }
    }

    // GET request - load edit page form
    // POST request - handle update POST
    public function edit($id)
    {
        $this->load->model('home_model'); // just moved this up so we can call the model function 

        if(!is_numeric($id))
        { 
            redirect('/', 'location'); 
        } 
        // Check if it's a POST request, otherwise just return the edit form.
        else if (!isset($_POST['submit'])) 
        {
            $data['results'] = $this->home_model->get_article_detail($id);
            $this->load->view('includes/header');
            $this->load->view('home_edit_view',$data); 
            $this->load->view('includes/footer'); 

            return;
        }

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]|max_length[40]'); 
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[20]|max_length[2000]'); 

        if ($this->form_validation->run() == FALSE) 
        { 
            $data['results'] = $this->home_model->get_article_detail($id);
            $this->load->view('includes/header');
            $this->load->view('home_edit_view',$data); 
            $this->load->view('includes/footer'); 
        }
        else 
        { 
            $data['title'] = $this->input->post('title'); 
            $data['description']= $this->input->post('description'); 
            
            $this->load->model('home_model'); 

            $this->home_model->edit_article($data,$id);

            // $this->session->set_flashdata('message', 'Edit Successful'); 
            redirect('home/edit/' . $id, 'location');
        } 
    } // \ edit      

    public function delete($id)
    {
        if(!is_numeric($id))
        { 
            redirect('/', 'location'); 
        } 

        $this->form_validation->set_rules('article_name', 'Article Name', 'required|min_length[3]|max_length[40]'); $this->form_validation->set_rules('description', 'Description', 'required|min_length[20]|max_length[2000]'); 
        
        $this->load->model('home_model'); // just moved this up so we can call the model function 
        
        $data['results'] = $this->home_model->get_article_detail($id);

        $this->load->view('includes/header');
        $this->load->view('includes/footer'); 


        $data['title'] = $this->input->post('title'); 
        $data['description']= $this->input->post('description'); 
            
        // $this->load->model('home_model'); 

        $this->home_model->delete_article($data,$id);

        // $this->session->set_flashdata('message', 'Delete Successful'); 
        redirect('home', 'location');
    }      
}