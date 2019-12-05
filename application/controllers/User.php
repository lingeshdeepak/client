<?php
class User extends CI_Controller
{



      function __construct()
      {
            parent::__construct();
      }

      public function register()
      {
            $data['title'] = 'Sign Up';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'matches[password]|required');
            $this->form_validation->set_error_delimiters('<div id="error">', '</div>');

            if ($this->form_validation->run() === FALSE) {

                  $this->load->view('templates/loginheader');
                  $this->load->view('user/register', $data);
                  $this->load->view('templates/loginfooter');
            } else {
                  // Encrypt password
                  $enc_password = md5($this->input->post('password'));

                  $this->user_model->register($enc_password);

                  $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

                  redirect('user/login');
            }
      }

      public function login()
      {
            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_error_delimiters('<div id="error">', '</div>');

            if ($this->form_validation->run() == FALSE) {

                  $this->load->view('templates/loginheader');
                  $this->load->view('user/login', $data);
                  $this->load->view('templates/loginfooter');
            } else {
                  $username = $this->input->post('username');

                  $password = md5($this->input->post('password'));

                  // Login user
                  $userid = $this->user_model->login($username, $password);
                  // $user_type =$this->user_model->getuser($userid);


                  if ($userid) {
                        $user_data = array(
                              'id' => $userid,
                              'username' => $username,
                        );

                        $this->session->set_userdata($user_data);

                        $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                        redirect('client/viewclient');
                  } else {

                        $this->session->set_flashdata('login_failed', 'Login is invalid');

                        redirect('user/login');
                  }
            }
      }

      public function logout()
      {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');

            $this->session->set_flashdata('user_logout', 'Loged Out!');
            $this->session->sess_destroy();

            redirect('user/login', 'refresh');
      }

      //check username 
      public function check_username_exists($username = NULL)
      {
            if ($username == NULL) {
                  echo $this->user_model->check_username_exists($_POST['username']);
            } else {
                  $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
                  if ($this->user_model->check_username_exists($username)) {
                        return true;
                  } else {
                        return false;
                  }
            }
      }

      //check email
      public function check_email_exists($email = NULL)
      {
            if ($email == NULL) {
                  echo $this->user_model->check_email_exists($_POST['email']);
            } else {
                  $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
                  if ($this->user_model->check_email_exists($email)) {
                        return true;
                  } else {
                        return false;
                  }
            }
      }


      //function to load forgetpassword
      public function forgetpassword()
      {
            $this->load->view('templates/loginheader');
            $this->load->view('user/forgetpassword');
            $this->load->view('templates/loginfooter');
      }

      //function to send reset link to mail id
      public function reset_link()
      {
            $email = $this->input->post('email');
            // $result=$this->db->query("select * from user where email='".$email."'")->result_array();
            $result = $this->user_model->get_email($email);

            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_error_delimiters('<div id="error">', '</div>');
            if ($this->form_validation->run() == TRUE) {

                  if (count($result) > 0) {

                        $tokan = rand(1000, 99999);

                        $enc_token = $tokan;

                        $this->user_model->set_tokan($enc_token, $email);

                        $message = "click the link to reset password <a href='" . base_url('user/reset_password?tokan=') . $enc_token . "'>Reset Link</a>";


                        $this->load->library('email');
                        $this->email->set_newline("\r\n");
                        $this->email->from('lingeshtest123@gmail.com'); // change it to yours
                        $this->email->to($email); // change it to yours
                        $this->email->subject('Password reset link');
                        $this->email->message($message);
                        if ($this->email->send()) {
                              $this->session->set_flashdata('Email_message', "RESET LINK has been send to user  registered email");
                              redirect('user/forgetpassword');
                        } else {
                              show_error($this->email->print_debugger());
                        }
                  } else {
                        $this->session->set_flashdata('wrong_email', "email not registered");
                        redirect(base_url('user/forgetpassword'));
                  }
            } else {
                  $this->load->view('templates/loginheader');
                  $this->load->view('user/forgetpassword');
                  $this->load->view('templates/loginfooter');
            }
      }

      //reset password
      public function reset_password()
      {
            $user_id = $this->session->userdata('id');

            $data['tokan'] = $this->input->get('tokan');
            $_SESSION['tokan'] = $data['tokan'];

            $this->load->view('templates/loginheader');
            $this->load->view('user/reset_password', $data);
            $this->load->view('templates/loginfooter');
      }

      //update password
      public function update_password()
      {

            $data['tokan'] = $this->input->get('tokan');

            $data = $this->input->post();
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'matches[password]|required');

            if ($data['password'] == $data['confirmpassword']) {
                  $password = md5($this->input->post('password'));
                  $tokan = $_SESSION['tokan'];
                  $this->user_model->reset_password($password, $tokan, false);
                  $this->logout();
            } else {
                  $this->session->set_flashdata('message', "can't update password");
            }
      }

      public function myAccount()
      {
            $user_id = $_SESSION['id'];

            $data['changeview']=1;
            $data['user'] = $this->user_model->get_user($user_id);
            if( $data['changeview']==1){
                  $this->load->view('templates/header');
                  $this->load->view('client/myaccount', $data);
                  $this->load->view('templates/footer');
            }        
      }

      public function editAccount($id)
      {
          

            $data['changeview']=2;
            $data['user'] = $this->user_model->get_user($id);
            if( $data['changeview']==2){
                  $this->load->view('templates/header');
                  $this->load->view('client/myaccount', $data);
                  $this->load->view('templates/footer');
            }        
      }


      public function changePassword()
      {
            $user_id = $_SESSION['id'];
            $data['user'] = $this->user_model->get_user($user_id);

            //   $this->form_validation->set_rules('email', 'Email','required');
            $this->form_validation->set_rules('newpassword', 'new password', 'required');
            $this->form_validation->set_rules('confirmpassword', 'confirm password', 'required|matches[newpassword]');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run() == false) {
  
                  $this->load->view('templates/header');
                  $this->load->view('user/change_password', $data);
                  $this->load->view('templates/footer');
            } else {

                  $email = $this->input->post('email');
                  // $result=$this->user_model->get_email($email);
               
                  $newpass =md5($this->input->post('newpassword'));
                  $this->user_model->update_user($newpass,$user_id);
                  $this->logout();
            }
      }
}
