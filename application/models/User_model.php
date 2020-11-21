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
    




}