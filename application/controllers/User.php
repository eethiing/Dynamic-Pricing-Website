<?php

class User extends CI_Controller{

 
    // Show login page
    public function index() {
        $this->load->view('login/login-navbar');
        $this->load->view('login/login');

    }
        
    // Show registration page
    public function user_registration_show() {
        $this->load->view('login/login-navbar');
        $this->load->view('login/register');
    }
}


    
    // Validate and store registration data in database
    #public function new_user_registration() {}
    
        // Check validation for user input in SignUp form
    #    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[20]');
    #    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
    #    $this->form_validation->set_rules('confirmation_pass', 'Confirmation Password', 'trim|required|matches[password]'); //add
#
    #    if ($this->form_validation->run() == FALSE) {
    #    $this->load->view('login/login-navbar');
    #    $this->load->view('login/register');
    #    } else {
    #            $data = array(
    #            'username' => $this->input->post('username'),
    #            'password' =>md5($this->input->post('password')) ,
    #        );
#
    #        $result = $this->login_model->registration_insert($data);
    #        if ($result == TRUE) {
    #            $data['register_display'] = 'Registration Successfull !';
    #            //$this->load->view('index/user/index', $data);
    #            $this->load->view('login/login-navbar');
    #            $this->load->view('login/login', $data);
    #        } else {
    #            $data['user_exist_display'] = 'Username already exist!';
    #            $this->load->view('login/login-navbar');
    #            $this->load->view('login/register', $data);
    #        }
    #    }
    #}
    
    // Check for user login process
    #public function user_login_process() {
    #    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[20]');
    #    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
    #}
        #if ($this->form_validation->run() == FALSE) {
        #    if(isset($this->session->userdata['logged_in'])){
        #        redirect(base_url().'index.php/dashboard/index');
        #    }else{
        #        $this->load->view('login/login-navbar');
        #        $this->load->view('login/login');
        #    }
        #} else {
        #    $data = array(
        #    'username' => $this->input->post('username'),
        #    'password' => md5($this->input->post('password'))
        #    );
        #   }
          
           //echo "$data";

          // $result = $this->login_model->login($data);
          //echo "<script> login($data); </script>";

    #      echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'> </script>";
#
    #      echo "<script >
    #      function login(username,password){ 
    #        console.log('waffie login'); 
    #        console.log(username,password);                          
    #        $.ajax({
    #            data: JSON.stringify({'username' : 'omit', 
    #            'password' : 'omitter1234'}),
    #            dataType: 'application/json',
    #            url: 'http://localhost:50/login',
    #            type: 'POST',
    #            contentType: 'application/json; charset=utf-8',
    #            success: function (data) {
    #                //jdata = data.json();
    #                a = data[0].responseText;
    #                console.log(a);
    #            },
    #            error: function (errMsg) {
    #                console.log(errMsg);
    #            }
    #        });
    #    }
    #      </script>";
    #}
      
         //echo "<script type = 'text/javascript' console.log('pet waffie')></script>";

            #if ($result == TRUE) {
            #    $username = $this->input->post('username');
            #    $result = $this->login_model->read_user_information($username);
            #    if ($result != false) {
            #        $session_data = array(
            #        'username' => $result[0]->username,
            #        );
#
            #        // Add user data in session
            #        $this->session->set_userdata('logged_in', $session_data);
            #        redirect(base_url().'index.php/dashboard/index');
            #        }
            #        
            #    } else {
            #        $data['invalid_display'] = 'Invalid Username and Password.';
            #        $this->load->view('login/login-navbar');
            #        $this->load->view('login/login', $data);
         #        }
        
    // Logout from admin page
    #public function logout() {
    #    
    #    // Removing session data
    #    $sess_array = array(
    #    'username' => ''
    #    );
#
    #    $this->session->unset_userdata('logged_in', $sess_array);
    #    $data['logout_display'] = 'Logout Successfully.';
    #    $this->load->view('login/login-navbar');
    #    $this->load->view('login/login', $data);
    #}
#

?>

