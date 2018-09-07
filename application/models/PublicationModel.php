<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-09-04
 * Time: 6:05 PM
 */

class PublicationModel extends CI_Models {

    public $em;

    public function __construct() {

        parent::__construct();
        //$this->load->database();

        $this->load->library('doctrine');

        $this->em = $this->doctrine->em;

    }
    public function CreatePublication($date,$user_id,$song_user){

        $user = $this->em->getRepository(Entity\Users::class)->find(array("id" => $user_id));

        $pub_user = new Entity\PublicationUsers();

        $pub_user->setUser($user);
        $pub_user->setDate($date);
        $pub_user->setSongUser($song_user);
        $this->em->persist($pub_user);
        $this->em->flush();



    }


}