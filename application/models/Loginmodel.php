<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-04
 * Time: 3:33 PM
 */

class Loginmodel extends CI_Model
{
    public function __construct(){

        $this->load->database();

    }
    public function login_valid($username, $password , $type)
    {

        //$password = md5($password);

        $q = $this->db->select('id')->from('users')->where(['username' => $username, 'password' => $password ] )->get();

        if ($q->num_rows()==1) {

            return $q->row()->id;
            //return TRUE;
        } else {
            return FALSE;
        }
    }
    public function login($username,$password) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(['username' => $username, 'password' => md5($password) ]);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result_array();
        }else{
            return null;
        }


    }
    public function register($username,$password,$Firstname,$Lastname,$email,$birthday) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(['username' => $username]);
        $query = $this->db->get();
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(['email' => $email]);
        $query2 = $this->db->get();
        if ($query->num_rows() == 1 or $query2->num_rows() == 1) {
            return $query->num_rows();
        } else{
            if ($this->db->insert('users',['username' => $username,'First_name' => $Firstname,'Last_name' => $Lastname,'TYPE' => '1','email' => $email,'password' => md5($password),'birthday' => $birthday])){
                return 3;
            } else{
                return 4;
            }


        }
    }
    public function verifyem($email) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(['email' => $email]);
        $query = $this->db->get();
        return $query->num_rows();
    }
}