<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-09-01
 * Time: 2:13 PM
 */
require APPPATH . "libraries/Doctrine.php";
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
        //$this->load->database();



    }
    public function getHistory($user_id)
    {
        $doctrine = new Doctrine;
        $em = $doctrine->em;

        //$password = md5($password);
        $res = $em->find(\models\generated\SongsUser::class,$user_id);
        if ($res) {
            return $res;
        }else{
            return false;
        }

    }

}