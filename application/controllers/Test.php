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

        $this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]',array('is_unique' =>'This username already exists. Please choose another one.'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');





        if($this->form_validation->run() === false){


            $this->load->view('register');
        }
        else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data->username = $username;
            
            if($this->user_model->signup($username,$password)){
                $this->load->view('sucess',$data);
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

    public function contact_list(){
        $this->load->view('contact_list');
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