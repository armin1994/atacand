<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-12
 * Time: 1:51 PM
 */

class SongsModel extends CI_Model
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
    public function getAllSong()
    {

        //$password = md5($password);
        $p = $this->db->from('Songs')->get();
        if ($p->num_rows()>=1) {

            return $p->result_array();
            //return TRUE;
        } else {
            return FALSE;
        }
    }
    public function save_song($song,$lyrics,$song_name,$artist_name,$image) {
        if ($this->db->insert('Songs',['song_name' => $song_name,'artist_name' => $artist_name,'song_src' => $song,'image_src' => $image,'lyric_src' => $lyrics])){
        return true;


        }else{
            return false;
        }
    }
    public  function  save_song_user($date,$song_id,$song,$user_id) {

        $this->load->model('SongsUserModel');
        $res = $this->SongsUserModel->Save_user_song($date,$song_id,$song,$user_id);


        if ($res) {
            return true;
        }else{
            return false;
        }
    }
}