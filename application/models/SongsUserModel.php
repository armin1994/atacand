<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-09-01
 * Time: 2:13 PM
 */

//require APPPATH . 'libraries/codeigniter-doctrine/libraries/Doctrine.php';
class SongsUserModel extends CI_Model
{
    public $em;

    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
        //$this->load->database();

        $this->load->library('doctrine');

        $this->em = $this->doctrine->em;

    }

    public function getHistory($user_id)
    {
        $res = $this->em->getRepository(Entity\SongsUser::class)->findAll();
        $user = $this->em->getRepository(Entity\Users::class)->find(array("id" => $user_id));
        $user2 = $this->em->getRepository(Entity\Users::class)->find(array("id" => 1));
        //return $res;
        $temp = array();
//        foreach ($res as $item) {
//            //if ($item->getId() === 3) {
//
//                $item->addParticipant($user);
//                //var_dump($item->getParticipants());
//                $this->em->persist($item);
//            //}
//            array_push($temp, $item);
//        }
//
//        $this->em->flush();

        if (!empty($res)) {
            return $res;
        } else {
            return false;
        }

    }

    public function AddNewUserSong($id_song_user, $id_user, $song_src, $date)
    {


        $user = $this->em->getRepository(Entity\Users::class)->find(array("id" => $id_user));


        $song_users = $this->em->getRepository(Entity\SongsUser::class)->find(array("id" => $id_song_user));


        $song_user_new = new Entity\SongsUser();
        $song_user_new->setSongSrc($song_src);
        $song_user_new->setDate($date);
        $song_user_new->setSong($song_users->getSong());
        $song_user_new->setUser($user->getId());
        $song_user_new->setParticipants($song_users->getParticipants());
        $song_user_new->addParticipant($song_users->getUser());
        $song_user_new->addUser($user);

        $this->em->persist($song_user_new);
        $this->em->flush();


    }

    public function Save_user_song($date, $song_id, $song, $user_id)
    {
        $user = $this->em->getReposiotry(Entity\Users::class)->find(array("id" => $user_id));

        $song_user = new Entity\SongsUser();
        $song_user->setDate($date);
        $song_user->setParticipants(new \Doctrine\Common\Collections\ArrayCollection());
        $song_user->setUser($user);
        $song_user->setSongSrc($song);
        $songToUse = $this->em->getReposiotry(Entity\Songs::class)->find(array("id" => $song_id));
        $song_user->setSong($songToUse);

        $this->em->persist($song_user);
        $this->em->flush();
        return true;


    }


}