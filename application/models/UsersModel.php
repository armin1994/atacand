<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-12
 * Time: 3:48 PM
 */
class UsersModel extends CI_Model
{
    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->database();

    }
    public function getAllUsers()
    {

        //$password = md5($password);
        $p = $this->db->from('users')->where(['TYPE' =>'1'])->get();
        if ($p->num_rows()>=1) {

            return $p->result_array();
            //return TRUE;
        } else {
            return FALSE;
        }
    }
}