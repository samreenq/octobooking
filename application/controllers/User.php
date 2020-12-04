<?php
require_once(FCPATH."vendor/thetechnicalcircle/codeigniter_social_login/src/Social.php");
class User extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function social_login($platform_type)
    {
       // die($platform_type);
       // echo '<pre>'; print_r($this->session->userdata()); exit;
       // $platform_type = isset($_GET['type']) ? $_GET['type'] : "facebook";
        if($platform_type == 'facebook'){
            $userData = $this->login_facebook();
        }
        else{
            $userData = $this->login_gmail();
        }
        $role = 1;
        if(isset($userData['id'])){
          $user =   $this->appmodel->checkSocialUser($platform_type,$userData['id']);
          if($user == false){
              $date = date("Y-m-d H:i:s");
              $data = array(
                  'platform_type' => $platform_type,
                  'platform_id' => isset($userData['id']) ? $userData['id'] : "",
                  'user_type'	=> $role,
                  'fullname' => isset($userData['name']) ? $userData['name'] : "",
                  'password' => '',
                  'email' => isset($userData['email']) ? $userData['email'] : "",
                  'phone' => '',
                  'status' => 1,//($type == 2)?0:1,
                  'package' => 0,
                  'created_at' => $date,
              );
              //echo '<pre>'; print_r($data); exit;
              $this->db->insert("users",$data);
              $user =   $this->appmodel->checkSocialUser($platform_type,$userData['id']);
              //$UserId = $this->db->insert_id();
          }
        //  echo '<pre>'; print_r($user);
          if($user){
              $user_raw = $user;
              unset($user_raw['password']);
              $this->session->set_userdata('user',(object)$user_raw);
              $this->session->set_userdata('user_id',$user['id']);
              $this->session->set_userdata('role',$user['user_type']);
              $this->session->set_userdata('name',$user['fullname']);
              $this->session->set_userdata('platform_type',$user['platform_type']);
          }

          //  echo '<pre>'; print_r($this->session); exit;
          redirect(base_url());
        }
    }


    public function login(){
        $connect = $this->uri->segment(2);
        if($this->session->userdata('logged_user')== true){
            if($connect) {
                $this->load->view('welcome_message');
            } else {
                redirect(base_url('user/dashboard'));
            }
        }
        if($connect == 'fb') {
            $this->login_facebook();
            $this->load->view('welcome_message');
        } elseif($connect == 'twt') {
            $this->login_twitter();
            $this->load->view('welcome_message');
        } elseif($connect == 'gmail') {
            $this->login_gmail();
            $this->load->view('welcome_message');
        } elseif($connect == 'ldn') {
            $this->login_linkedin();
            $this->load->view('welcome_message');
        } elseif($connect == 'fs') {
            $this->login_foursquare();
            $this->load->view('welcome_message');
        } elseif($connect == 'yahoo') {
            $this->login_yahoo();
            $this->load->view('welcome_message');
        }
    }

    private function login_facebook() {
       // echo '<pre>'; print_r($this->session); exit;
        $site_url = $this->config->item('base_url');
        $fb_App_id = "2681348515324533";
        $fb_secret = "cd0aca23dae1ba3dd60b5b4085b26b27";
        $fb_scope = "public_profile,email";
        $redirect_url = base_url().'user/social_login/facebook';

        //$this->load->library('session');
        $social_instance = new Social();
        $fbData = $social_instance->facebook_connect($redirect_url,$this->session,$site_url,$fb_App_id,$fb_secret,$fb_scope);

       // echo "<pre>";
      // print_r($fbData); exit;
        if(!empty($fbData['redirectURL'])) {
            redirect($fbData['redirectURL']);
        } else {
            if(!empty($fbData['id'])) {
               // echo "<pre>";
              //  print_r($fbData);
                return $fbData;
               // echo "</pre>";die; /* all the data returned by facebook will be in this variable (Array). Play with it. */
            }
        }
    }

    private function login_twitter() {
        $site_url = $this->config->item('base_url')."/";
        $client_id = "YOUR TWITTER CLIENT ID";
        $client_secret = "YOUR TWITTER CLIENT SECRET";
        $social_instance = new Social();
        $twtData = $social_instance->twitter_connect($client_id,$client_secret,$site_url);
        if(!empty($twtData['redirectURL'])) {
            redirect($twtData['redirectURL']);
        } else {
            if(!empty($twtData['id'])) {
                echo "<pre>";print_r($twtData);echo "</pre>";die();
            }
        }
    }

    private function login_linkedin() {
        $site_url = $this->config->item('base_url')."/";
        $client_id = "YOUR LINKED IN CLIENT ID";
        $client_secret = "YOUR LINKED IN SECRET";
        $social_instance = new Social();
        $ldnData = $social_instance->linkedin_connect(NULL,$site_url,$client_id,$client_secret);
        if(!empty($ldnData['redirectURL'])) {
            redirect($ldnData['redirectURL']);
        } else {
            if(!empty($ldnData['id'])) {
                echo "<pre>";print_r($ldnData);echo "</pre>";die();
            }
        }
    }

    private function login_gmail() {

        $site_url = $this->config->item('base_url')."/";
        $client_id = "641099482926-f3c39kkkfsmr3fgt1vsnbkdb3i7dqdnk.apps.googleusercontent.com";
        $client_secret = "5bmTMWw5iPJ_4a6IKOg7Wz1Q";
        $client_api_key = "AIzaSyC0yUZ8hvjFp4WZmpKJ1AcB8i6QpiVp7oY";
        $redirect_url = base_url().'user/social_login/google';
        $social_instance = new Social();
        $gmailData = $social_instance->gmail_connect($redirect_url,$site_url,$client_id,$client_secret,$client_api_key);
        if(!empty($gmailData['redirectURL'])) {
            redirect($gmailData['redirectURL']);
        } else {
          //echo "<pre>"; print_r($gmailData);echo "</pre>";die();
            return $gmailData;
          //  redirect($gmailData['redirectURL']);
        }
    }

    private function login_yahoo() {
        $site_url = $this->config->item('base_url')."/";
        $social_instance = new Social();
        $yahooData = $social_instance->yahoo_connect($site_url);
        if(!empty($yahooData['redirectURL'])) {
            redirect($yahooData['redirectURL']);
        } else {
            if(!empty($yahooData['email'])) {
                echo "<pre>";print_r($yahooData);echo "</pre>";die();
            }
        }
    }

    private function login_foursquare() {
        $site_url = $this->config->item('base_url')."/";
        $client_id = "FOURSQUARE CLIENT ID";
        $client_secret = "FOURSQUARE CLIENT SECRET";
        $social_instance = new Social();
        $fsData = $social_instance->foursquare_connect($client_id,$client_secret,$site_url);
        if(!empty($fsData['redirectURL'])) {
            redirect($fsData['redirectURL']);
        } else {
            if(!empty($fsData['id'])) {
                echo "<pre>";print_r($fsData);echo "</pre>";die();
            }
        }
    }
}
