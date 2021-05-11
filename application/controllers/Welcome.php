<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('google_login_model');
		$this->load->model('weather_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('head');
		include_once APPPATH . "libraries/vendor/autoload.php";

		$google_client = new Google_Client();
		$google_client->setClientId('619411216493-9go2t7huodikbqgm66qmnsfr2382mi63.apps.googleusercontent.com'); //Define your ClientID
		$google_client->setClientSecret('gK6MNLqIvj4YenzbMVejwgqJ'); //Define your Client Secret Key
		$google_client->setRedirectUri('http://localhost/t2vreme/'); //Define your Redirect Uri
		$google_client->addScope('email');
		$google_client->addScope('profile');

		if(isset($_GET["code"]))
		{
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
			if(!isset($token["error"]))
			{
				$google_client->setAccessToken($token['access_token']);
				$this->session->set_userdata('access_token', $token['access_token']);
				$google_service = new Google_Service_Oauth2($google_client);
				$data = $google_service->userinfo->get();
				$current_datetime = date('Y-m-d H:i:s');
				if($this->google_login_model->Is_already_register($data['id']))
				{
					//update data
					$user_data = array(
						'first_name' => $data['given_name'],
						'last_name'  => $data['family_name'],
						'email_address' => $data['email'],
						'profile_picture'=> $data['picture'],
						'updated_at' => $current_datetime
					);
					$this->google_login_model->Update_user_data($user_data, $data['id']);
				}
				else
				{
					//insert data
					$user_data = array(
						'login_oauth_uid' => $data['id'],
						'first_name'  => $data['given_name'],
						'last_name'   => $data['family_name'],
						'email_address'  => $data['email'],
						'profile_picture' => $data['picture'],
						'created_at'  => $current_datetime
					);
					$this->google_login_model->Insert_user_data($user_data);
				}
				$this->session->set_userdata('user_data', $user_data);
			}
		}
		$login_button = '';$data = array();
		if(!$this->session->userdata('access_token'))
		{
			$login_button = '<a href="'.$google_client->createAuthUrl().'">
				<div style="display: inline-block; height: 28px; width: 28px; margin-right: 12px;"><svg xmlns="https://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 48 48" aria-hidden="true" class="L5wZDc"><path fill="#4285F4" d="M45.12 24.5c0-1.56-.14-3.06-.4-4.5H24v8.51h11.84c-.51 2.75-2.06 5.08-4.39 6.64v5.52h7.11c4.16-3.83 6.56-9.47 6.56-16.17z"></path><path fill="#34A853" d="M24 46c5.94 0 10.92-1.97 14.56-5.33l-7.11-5.52c-1.97 1.32-4.49 2.1-7.45 2.1-5.73 0-10.58-3.87-12.31-9.07H4.34v5.7C7.96 41.07 15.4 46 24 46z"></path><path fill="#FBBC05" d="M11.69 28.18C11.25 26.86 11 25.45 11 24s.25-2.86.69-4.18v-5.7H4.34C2.85 17.09 2 20.45 2 24c0 3.55.85 6.91 2.34 9.88l7.35-5.7z"></path><path fill="#EA4335" d="M24 10.75c3.23 0 6.13 1.11 8.41 3.29l6.31-6.31C34.91 4.18 29.93 2 24 2 15.4 2 7.96 6.93 4.34 14.12l7.35 5.7c1.73-5.2 6.58-9.07 12.31-9.07z"></path><path fill="none" d="M2 2h44v44H2z"></path></svg></div>Vpis z Googlom</a>';
			$data['login_button'] = $login_button;
			$this->load->view('welcome_message', $data);
		}
		else
		{
			$data['citys'] = $this->weather_model->get_citys();
			$this->load->view('weather_view', $data);
		}
		//$this->load->view('welcome_message');
	}

	public function logout()
	{
		$this->session->unset_userdata('access_token');
		$this->session->unset_userdata('user_data');
		redirect('');
	}
}
