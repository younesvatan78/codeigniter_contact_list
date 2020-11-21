<?php
class User_model extends CI_Model{
    

    public function signup($username,$password){
        $this->load->library('encryption');

        $data = array(
            'username'=> $username,
            'password'=> password_hash($password,PASSWORD_BCRYPT)
        );

        return $this->db->insert('users',$data);

    }





    public function verify_user($username,$password){
        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('username',$username);
        $hash = $this->db->get()->row('password');
        
        return password_verify($password,$hash);

        
    }

    public function get_user_id_from_username($username){
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('username',$username);
        
        return $this->db->get()->row('id');
        
        
    }

    public function get_user($user_id){

        $this->db->from('users');
        $this->db->where('id',$user_id);

        return $this->db->get()->row();
    }

    public function check_dup_contact($phone,$user){
        $query = $this->db->get_where('contacts',array(
            'mobile' =>$phone,
            'user' =>$user));
            if($query->num_rows() == 0){
                return false;
            }
            else{
                return true;
            }
    }
    public function check_dup_contact_by_id($id,$user){
        $query = $this->db->get_where('contacts',array(
            'id' =>$id,
            'user'=>$user));

            if($query->num_rows() == 1){
                return true;
            }
    }
    public function add_contact($firstname,$lastname,$phone,$user){
       
       return $this->db->insert('contacts',array(
            'firstname' =>$firstname,
            'lastname' =>$lastname,
            'mobile'=>$phone,
            'user'=>$user
        ));
    }
    
    public function list_contacts($user){
        $query = $this->db->get_where('contacts',array(
            'user' => $user
        ));
        return $query->result();
    }

    public function update_contact($user,$firstname,$lastname,$phone,$id){
        $this->db->where('id',$id);
        $this->db->where('user',$user);
        $this->db->update('contacts', array(
            'firstname' =>$firstname,
            'lastname' =>$lastname,
            'mobile' =>$phone
        ));


    }
    public function delete_contact($id,$user){
        
        return $this->db->delete('contacts',array(
            'id'=>$id,
            'user' =>$user
        ));
    }




}