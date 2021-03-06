<?php
class Test extends CI_Controller
{
    public function __construct(){

        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('user_model');
    }

    public function index(){

    }




    public function register(){
		$data = new stdClass();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]|max_length[14]|is_unique[users.username]',array('is_unique' =>'This username already exists. Please choose another one.'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        
        $this->form_validation->set_rules('re_pass', 'Confirm password', 'trim|required|min_length[6]|matches[password]',array('matches'=>'Confirm password and password field does not match'));

       



        if($this->form_validation->run() === false){


            $this->load->view('register');
        }
        else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data->username = $username;
            
            if($this->user_model->signup($username,$password)){
                echo '<script> alert("You signed up successfully!"); </script>';
                sleep(3);
                $this->load->view('login',$data);

            }
            else{
                $data->error = 'There was a problem creating your new account. Please try again.';
                $this->load->view('register',$data);
            }
        }
    }




    public function login(){
        $data = new stdClass();
        $this->load->helper('form');
        $this->load->helper('url'); 

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username_login','Username login','required');
        $this->form_validation->set_rules('password_login','Password Login','required');

        if($this->form_validation->run() == false){
            $this->load->view('login');
        }
        else{
            $username = $this->input->post('username_login');
            $password = $this->input->post('password_login');

            if($this->user_model->verify_user($username,$password)){
                $user_id = $this->user_model->get_user_id_from_username($username);
                $user = $this->user_model->get_user($user_id);

                $this->session->set_userdata(array(
                    'username' => $user->username,
                    'user_id'  => $user->id,
                    'logged_in' => true
                ));
                $this->load->view('login_success',$data);
            }
            else{
                $data->error='Username or password is incorrect';
                $this->load->view('login',$data);
            }
        }
        
        
        
        
        
    }



   



   public function add_contact(){
    $user = $this->session->userdata('username');
    if(!isset($user)):$this->load->view('403'); return; endif;

    $this->load->helper('form');
    $this->load->library('form_validation');
    
    
    $this->form_validation->set_rules('firstname','Firstname','required');
    $this->form_validation->set_rules('lastname','Lastname','required');
    $this->form_validation->set_rules('phone','Lastname','required|numeric');
    $this->form_validation->set_rules('email','Email');

    

    
   


    if($this->form_validation->run() == false){
        $this->load->view('login_success');
        
    }
    else{
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');


        $config['upload_path']          = './upload/'.$user.'';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = $firstname.' '.$lastname;
        $this->load->library('upload', $config);
        
        $dir_exits = false;
            if(!is_dir('./upload/'. $user)){
                mkdir('./upload/' . $user,0777,true);
                $dir_exits = true;
            }

        if(!$this->upload->do_upload('userfile')){
            $error = array('error'=>$this->upload->display_errors());
            if(!$dir_exist):
            rmdir('./upload/' . $user); endif;
            $this->load->view('login',$error);
        }
        else{
            $pic = $this->upload->data('file_name');
            $pic_url_combine = base_url().'upload/'.$user.'/'.$pic;
            $pic_url = $this->session->set_userdata(array(
                'pic_url' => $pic_url_combine
            ));
            //$data = array('pic_url' =>$pic_url);
           
            
        }

        if($this->user_model->check_dup_contact($phone,$user)){
            echo '<script> alert("phone number is in database with another name "); </script>';
            $this->load->view('login_success');
        }
        else{
            $this->user_model->add_contact($firstname,$lastname,$phone,$user,$email,$pic);
            echo '<script> alert("contact saved!"); </script>';

            redirect('test/list_contacts',$data);
           
        }
    }

   }

   public function list_contacts(){
    $user = $this->session->userdata('username');

    if(!isset($user)):$this->load->view('403'); return; endif;

    $loggedin = $this->session->userdata('logged_in');
    if($loggedin){
        $this->user_model->list_contacts($user);

    }
       $this->load->view('login_success');
   }






   public function update_contact(){
       $user = $this->session->userdata('username');
       if(!isset($user)):$this->load->view('403'); return; endif;

       $this->load->helper('form');
       $this->load->library('form_validation');
       
    
    $this->form_validation->set_rules('firstname_edit','Firstname');
    $this->form_validation->set_rules('lastname_edit','Lastname');
    $this->form_validation->set_rules('phone_edit','Phone edit','numeric');
    $this->form_validation->set_rules('contact_id','Contact id');
    $this->form_validation->set_rules('email_edit','Email edit');
    //$this->form_validation->set_rules('userfile_edit','Edit image');
    
    if($this->form_validation->run() == false){
        $this->load->view('login_success');
    }
    else{
        $firstname = $this->input->post('firstname_edit');
        $lastname = $this->input->post('lastname_edit');
        $phone = $this->input->post('phone_edit');
        $id = $this->input->post('contact_id');
        $email = $this->input->post('email_edit');
        //$pic = $this->input->post('userfile_edit');
        

        if($this->user_model->check_dup_contact_by_id($id,$user)){
            $this->user_model->update_contact($user,$firstname,$lastname,$phone,$id,$email);
            redirect('/test/list_contacts');
            

        }
        else{
            echo '<script> alert("no contact is available with id you provided!"); </script>';
            $this->load->view('login_success');
        }



    }


   }
   public function delete_contact(){
    $user = $this->session->userdata('username');
    if(!isset($user)):$this->load->view('403'); return; endif;

    $this->load->helper('form');
    $this->load->library('form_validation');

    //$this->form_validation->set_rules('contact_id_delete','ID_del','b');
    $this->form_validation->set_rules('contact_id_delete','Delete contact id','numeric');

    if($this->form_validation->run() == false){
        $this->load->view('login_success');
        
    }
    else{
        
        $id = $this->input->post('contact_id_delete');

        if($this->user_model->check_dup_contact_by_id($id,$user)){
            $this->user_model->delete_contact($id,$user);
            redirect('/test/list_contacts');
        }
        else{
            
            echo '<script> alert("no contact is available with id you provided!"); </script>';
            redirect('/test/list_contacts');
        }
    }
   }

   public function logout(){
       $this->session->sess_destroy();
       redirect('test/login');
   }






//     public function add_contact(){
//         $username = $this->session->userdata('username');
//         $contact_first_name = $this->input->post('new_contact_first_name');
//         $contact_last_name = $this->input->post('new_contact_last_name');
//         $contact_phone_number = $this->input->post('new_contact_phone_num');
        
        
//         $query = $this->db->get_where('contacts',array(
//             'phonenumber' => $contact_phone_number,
//             'users' => $username
//         ));
//         $row = $query->num_rows();

//         if($row){
//             $find_duplicate = $this->db->get_where('contact',array(
//                 'phonenumber' => $contact_phone_number
//             ));
//             $duplicated_contact_last_name = $find_duplicate->result('lastname');

//             $this->set_flashdata('duplicate_num','This phone number is submited for '.$duplicated_contact_last_name.'');
//         }
//         else{
//             $this->db->insert('contacts',array(
//                 'firstname' => $contact_first_name,
//                 'lastname' => $contact_last_name,
//                 'phonenumber' => $contact_phone_number,
//                 'user' => $username
//             ));
//             $this->session->set_flashdata('suc_add_contact','Contact added successfully.');
//         }
//     }





//     public function update_contact(){
//         $username = $this->session->userdata('username_edit');
//         $contact_first_name = $this->input->post('edit_contact_first_name');
//         $contact_last_name = $this->input->post('edit_contact_last_name');
//         $contact_phone_number = $this->input->post('edit_contact_phone_num');
//         $contact_id = $this->input->post('contact_id');

//         $query = $this->db->get_where('contacts',array(
//             'id' => $contact_id,
//             'user' => $username
//         ));
//         $rows = $query->num_rows();
//         if($rows){
//             $this->db->update('contacts',array(
//                 'firstname' => $contact_first_name,
//                 'lastname' => $contact_last_name,
//                 'phonenumber' => $contact_phone_number,
//             ),array(
//                 'id' => $contact_id,
//                 'user' => $username
//             ));
//         }
//         else{
//             $this->set_flashdata('no_contact_found','no contact available with the information you entered');

//         }

//     }



//     public function delete_contact(){
//         $username = $this->session->userdata('username_edit');
//         $contact_id = $this->input->post('contact_id');

//         $query = $this->db->get_where('contacts',array(
//             'id' => $contact_id,
//             'user' => $username
//         ));

//         $rows = $query->num_rows();
//         if($rows){
//             $this->db->delete('contacts'
//             ,array(
//                 'id' => $contact_id,
//                 'user' => $username
//             ));
//             $this->set_flashdata('contact_deleted_suc','Contact deleted successfully.');

//         }
//         else{
//             $this->set_flashdata('no_contact_found','no contact available with the information you entered');
//         }
//     }
    
 }