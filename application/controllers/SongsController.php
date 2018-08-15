<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-27
 * Time: 5:25 PM
 */
class SongsController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('alert_helper');
        $this->load->helper(array('form', 'url'));
    }
    public function index() {

        if ($this->session->userdata('user_id')) {
            //$this->load->view('admin/dashboard');
            //$this->GetAllUser();
            $this->load->helper(array('form', 'url','alert_helper'));

            $this->load->view('admin/upload_song', array('error' => ' ' ));
        }else{
            $this->load->helper('form');
            redirect('');
        }


    }

    public function test_params(){
        $song_name = $this->input->post('songName');
        $artist_name = $this->input->post('artistName');
        if (!empty($song_name) && !empty($artist_name) && $_FILES['userfile']['name'] != ""
            && $_FILES['imageSong']['name'] != "" && $_FILES['userlyrics']['name'] != ""
        ){
            $this->do_upload_image();
        }else{
            $this->alert->set('alert-danger', 'Save: ' . 'please provide all the informations');
            $this->load->view('admin/upload_song');
        }
    }
    public function do_upload_image()
    {
        $client = new GuzzleHttp\Client();

        #This url define speific Target for guzzle
        $url = 'http://adcarryteam.000webhostapp.com/uploadimage.php';

        #guzzle
        try {
            $response = $client->request('POST',
                $url,
                [
                    'multipart' => [
                        ['name' => 'name' ,
                            'contents' => 'aaaa'


                        ],

                        [
                            'name' => 'userfile',
                            'filename' => $_FILES['imageSong']['name'],
                            'contents' => fopen($_FILES['imageSong']['tmp_name'], 'r')
                        ]

                    ]

                ]
            );
            #guzzle repose for future use

            //echo $response->getStatusCode(); // 200
            //echo $response->getReasonPhrase(); // OK
            //echo $response->getProtocolVersion(); // 1.1
            //echo $response->getBody();
            $error = array('error' => $response);
            $data = json_decode($response->getBody(),true);
            print_r($data);
            if ($response->getStatusCode() === 200) {
                if (isset($data['message'])) {
                    if ($data['message'] === 'Please choose a file') {
                        $this->alert->set('alert-danger', 'Image: ' . $data['message']);
                        $this->load->view('admin/upload_song');
                    } else {
                        $this->session->set_userdata('user_img', $data['url']);
                        $this->do_upload_song();
                    }
                }else{

                }
            }else{
                $this->alert->set('alert-danger', 'Image: ' . 'error occured with server,please try again');
                $this->load->view('admin/upload_song');
            }

        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            #guzzle repose for future use
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $error = array('error' => $responseBodyAsString);

            $this->alert->set('alert-danger', 'Image: ' . $error);
            $this->load->view('admin/upload_song');

        }

    }
    public function do_upload_song()
    {
                    $client = new GuzzleHttp\Client();

                    #This url define speific Target for guzzle
                    $url = 'http://adcarryteam.000webhostapp.com/uploadimage.php';

                    #guzzle
                    try {
                        $response = $client->request('POST',
                            $url,
                            [
                                'multipart' => [
                                    ['name' => 'name' ,
                                      'contents' => 'aaaa'


                                    ],

                                    [
                                        'name' => 'userfile',
                                        'filename' => $_FILES['userfile']['name'],
                                        'contents' => fopen($_FILES['userfile']['tmp_name'], 'r')
                                    ]

                                ]

                            ]
                        );
                        #guzzle repose for future use

                        //echo $response->getStatusCode(); // 200
                        //echo $response->getReasonPhrase(); // OK
                        //echo $response->getProtocolVersion(); // 1.1
                        //echo $response->getBody();
                        $error = array('error' => $response);
                        $data = json_decode($response->getBody(),true);
                        if ($response->getStatusCode() === 200) {
                            if ($data['message'] === 'Please choose a file') {
                                $this->alert->set('alert-danger', 'Song: ' . $data['message']);
                                $this->load->view('admin/upload_song');
                            } else {
                                $this->session->set_userdata('user_song', $data['url']);
                                $this->do_upload_lyrics();
                            }
                        }else{
                            $this->alert->set('alert-danger', 'Song: ' . 'error occured with server,please try again');
                            $this->load->view('admin/upload_song');
                        }

                    } catch (GuzzleHttp\Exception\BadResponseException $e) {
                        #guzzle repose for future use
                        $response = $e->getResponse();
                        $responseBodyAsString = $response->getBody()->getContents();
                        $error = array('error' => $responseBodyAsString);

                        $this->alert->set('alert-danger', 'Song: ' . $error);
                        $this->load->view('admin/upload_song');

                    }

    }
    public function do_upload_lyrics()
    {
        $client = new GuzzleHttp\Client();

        #This url define speific Target for guzzle
        $url = 'http://adcarryteam.000webhostapp.com/uploadimage.php';

        #guzzle
        try {
            $response = $client->request('POST',
                $url,
                [
                    'multipart' => [
                        ['name' => 'name' ,
                            'contents' => 'aaaa'


                        ],

                        [
                            'name' => 'userfile',
                            'filename' => $_FILES['userlyrics']['name'],
                            'contents' => fopen($_FILES['userlyrics']['tmp_name'], 'r')
                        ]

                    ]

                ]
            );
            #guzzle repose for future use

            //echo $response->getStatusCode(); // 200
            //echo $response->getReasonPhrase(); // OK
            //echo $response->getProtocolVersion(); // 1.1
            //echo $response->getBody();
            $error = array('error' => $response);
            $data = json_decode($response->getBody(),true);
            if ($response->getStatusCode() === 200) {
                if ($data['message'] === 'Please choose a file') {
                    $this->alert->set('alert-danger', 'Lyrics: ' . $data['message']);
                    $this->load->view('admin/upload_song');
                } else {
                    $this->session->set_userdata('user_lyrics', $data['url']);
                    $this->save_song();
                }
            }else{
                $this->alert->set('alert-danger', 'Lyrcis: ' . 'error occured with server,please try again');
                $this->load->view('admin/upload_song');
            }

        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            #guzzle repose for future use
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $error = array('error' => $responseBodyAsString);

            $this->alert->set('alert-danger', 'Lyrics: ' . $error);
            $this->load->view('admin/upload_song');

        }

    }



    public function save_song()
    {

        $song_name = $this->input->post('songName');
        $artist_name = $this->input->post('artistName');
        $image = $this->session->userdata('user_img');

        if ($this->session->userdata('user_song') &&  $this->session->userdata('user_lyrics') ){
            $song = $this->session->userdata('user_song');
            $lyrics = $this->session->userdata('user_lyrics');
            $this->load->model('SongsModel');
            $login_id = $this->SongsModel->save_song($song,$lyrics,$song_name,$artist_name,$image);
            if ($login_id){
                $this->session->unset_userdata('user_song');
                $this->session->unset_userdata('user_lyrics');
                $this->session->unset_userdata('user_img');
                redirect('');
            }
        }else{
            $this->alert->set('please upload both of song and lyric!');
            $this->load->view('admin/upload_song');
        }
    }
}