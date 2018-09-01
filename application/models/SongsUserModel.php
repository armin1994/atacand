<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-09-01
 * Time: 2:13 PM
 */
class SongsUserModel extends CI_Model
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
    public function getHistory($user_id)
    {

        //$password = md5($password);
        $p = $this->db->select('*')->from('songs_user')->where(['user_id' =>$user_id])->get();
        if ($p->num_rows()>=1) {

            return $p->result_array();
            //return TRUE;
        } else {
            return FALSE;
        }
    }

}