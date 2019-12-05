<?php
class Client extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $userid = $this->session->userdata('id');
        if (!$userid) {
            redirect('user/login');
        }
    }

    public function index(){
        $data['country'] = $this->client_model-> getAllCountry(); 
        $data['state'] = $this->client_model-> getState();
        $data['city']=$this->client_model->getCity();
    }

    //display client
    public function viewClient()
    {
		$data['posts'] = $this->client_model->getclient();
		$data['country'] = $this->client_model-> getAllCountry(); 
		$data['state'] = $this->client_model-> state(FALSE);
		$data['city']=$this->client_model->city(FALSE);
		
        $this->load->view('templates/header');
        $this->load->view('client/viewclient', $data);
        $this->load->view('templates/footer');
    }

    //addclient
    public function addClient()
    {
        $data['country'] = $this->client_model-> getAllCountry(); 
        $data['state'] = $this->client_model-> getState();
        $data['city']=$this->client_model->getCity();

        $this->form_validation->set_rules('clientname', 'ClientName', 'required');
        $this->form_validation->set_rules('companyname', 'CompanyName', 'required|callback_check_companyname_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phonenumber', 'PhoneNumber', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('postalcode', 'PostalCode', 'required');
        $this->form_validation->set_error_delimiters('<div id="error">', '</div>');

      
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('client/addclient',$data);
            $this->load->view('templates/footer');
        } else {
            //upload image
            $config['upload_path']          = './assets/images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;

            $this->load->library('upload', $config);
            $query = $this->upload->do_upload('image');

            if ($query) {
                $data = array('upload_data' => $this->upload->data());

                $post_image = $_FILES['image']['name'];
			} 
			else {
				$error = array('error' => $this->upload->display_errors());

				$post_image = 'no-image.png';
            }
           

            $this->client_model->addclient($post_image);
            
            $this->session->set_flashdata('client_add', 'Client is added');
            redirect('client/viewclient');
        }
        
    }

    //delete client
    public function deleteClient($id)
    {
        $this->client_model->delete_client($id);
        redirect('client/viewclient');
    }

    //edit category
    public function editclient($id){
     
        $data['post'] = $this->client_model->getclient($id);

		$data['client'] =  $this->client_model->getclient();
		
		$data['country'] = $this->client_model-> getAllCountry(); 
		$data['state'] = $this->client_model-> state(FALSE);
		$data['city']=$this->client_model->city(FALSE);

        $this->load->view('templates/header');
        $this->load->view('client/editclient', $data);
        $this->load->view('templates/footer');
      
    }

    //update client details
    public function updateClient($id){  
       
        
        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $query = $this->upload->do_upload('image');
  
        if($_POST['checkBox'] == 1){
            if ($query)
            {
                $data = array('upload_data' => $this->upload->data());
          
                $post_image = $_FILES['image']['name'];
    
            }
            else 
            {
				$error = array('error' => $this->upload->display_errors());
				
            }
        }
        else{
            $post_image =$_POST['image12'];
        }
    

		$this->client_model->edit_client($post_image,$id);
		
		$this->session->set_flashdata('client_update', 'Client is Updated');
        redirect('client/viewclient');
    }

    

    //view client details
    public function clientDetails($id = NULL)
    {
        if ($id <> NULL) {
            $data['client'] = $this->client_model->getclient($id);

            $this->load->view('templates/header');
            $this->load->view('client/clientdetails', $data);
            $this->load->view('templates/footer');
        }
    }

    //check compant name exixts
    public function check_companyname_exists($companyname = NULL){
        if ($companyname == NULL) {
              echo $this->client_model->check_companyname_exists($_POST['companyname']);
        }
        else {
              $this->form_validation->set_message('check_companyname_exists', 'That companyname is taken. Please choose a different one');
              if($this->client_model->check_companyname_exists($companyname)){
                    return true;
              } else {
                    return false;
              }
        }
  }

    //check email
    public function check_email_exists($email = NULL){
        if ($email == NULL) {
            echo $this->client_model->check_email_exists($_POST['email']);
        }
        else {
            $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
            if($this->client_model->check_email_exists($email)){
                return true;
            } 
            else {
                return false;
            }
        }
    }

    public function get_state(){
       
        if(isset($_POST['c_id'])) { 
            $countryid = $this->input->post('c_id',TRUE);
            $data = $this->client_model->getState($countryid)->result();

            echo json_encode($data);
        }
    }

    public function get_city(){
       
        if(isset($_POST['s_id'])) { 
            $cityid = $this->input->post('s_id',TRUE);
            $data = $this->client_model->getCity($cityid)->result();

            echo json_encode($data);
        }
    }

    public function get_allclient()
    {
       echo $this->client_model->client_data();
   
    }

}
