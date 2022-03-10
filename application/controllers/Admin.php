<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	//---------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	//----login page------------------

	public function getcode()
	{
		$this->load->view('inc1/header_view');
		$this->load->view('inc1/login');
		$this->load->view('inc1/footer_view');
	}

	//-----------------------------

	public function index()
	{
		$this->load->view('inc1/header_view');
		$this->load->view('inc1/getcode_view');
		$this->load->view('inc1/footer_view');
	}

	//--------------------------------

	public function postcode()
	{
		//validate login details
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run()) {
			$email = $this->input->post('email');

			//check if email exists
			$chkemail = $this->admin_model->checkEmail($email);

			if (!$chkemail) {
				$this->session->set_flashdata('msg','No such email. Check list of profiled emails or contact admin');
				return redirect('admin/index');
			}
			else{
				$name = $chkemail->name;
				$code = hash('sha256', $email . KEY);
				$updatecode = $this->admin_model->updateusercode($code, $email);

				//update code in users table

				$config = array(
								'protocol' => 'sendmail',
								'mailpath' => '/usr/sbin/sendmail',
								'charset'	=>	'iso-8859-1',
								'mailtype'	=>	'html',
								'smtp_port'	=>	25,
								'wordwrap'	=>	TRUE
							);

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('no-reply@ariyaawards');
				$this->email->to($email);
				$this->email->subject('Access Code');

				$message = 'Dear ' . $name . ', <br><br>';
				$message = $message . 'See below your access code to the Ariya Awards voting platform.<br><br>';
				$message = $message . 'Copy and paste the code below in the field provided on the platform:<br><br>';
				$message = $message . '<span style="color: #126bc9;"><strong>' . $code . '</strong></span><br><br>';
				$message = $message . 'Happy voting!<br>';
				$message = $message . 'Ariya Awards';
				$this->email->message($message);

				if ($this->email->send()) {
					$this->session->set_flashdata('success', 'Check your mail for the <br> access code');
					return redirect('admin/getcode');
				}
				else {
					$this->session->set_flashdata('msg', 'Unable to deliver mail. <br>Try again');
					return redirect('admin/index');
				}
			}
		}
		else {
			$this->session->set_flashdata('msg','Enter a valid email');
			return redirect('admin/index');
		}
	}

	//--------- login user -------------

	public function login()
	{

		//validate login details
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('pwd', 'Access code', 'required');

		if($this->form_validation->run()) {
			$useremail = $this->input->post('email');
			$password = $this->input->post('pwd');
			//$password = hash('sha256', $password . KEY);

			//check if user record exists in db
			$res = $this->admin_model->islogin($useremail, $password);
			
			if($res) {
		    	$status = $res->status;
		    	$userid = $res->id;
		    	$role = $res->role;
		    	$now = date('Y-m-d');
				$mark = '2021-12-18';

		    	//check if account has been deactivated
		    	if ($status == 1  && $role == 0) {
		    	  $this->session->set_flashdata('msg','You have already voted');
					return redirect('admin/index');	
		    	}

		    	if ($now == $mark) {
					$this->session->set_flashdata('msg','Voting has ended');
					return redirect('admin/index');
				}
					
					//set session variables
					$this->session->set_userdata('userId', $userid); //userId
					$this->session->set_userdata('role', $role); //user role
					$this->session->set_userdata('status', $status); //user role
					return redirect('staffvote/voteform'); 
			}

			//Login failed
			else {
				$this->session->set_flashdata('msg','Invalid Email/Access Code');
				return redirect('admin/getcode'); 
			}
		}

		//validation fails, back to home page
		else {
			$this->session->set_flashdata('msg','Fill in your email<br> and access code');
			return redirect('admin/getcode'); 
		}
	}

	//------------logout --------------

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/index');
	}

	//----------------------------------------------

	public function viewstaff()
	{
		$allstaff = $this->admin_model->getstaff();

		if (!$allstaff) {
			$this->session->set_flashdata('msg', 'No record found');
			return redirect('admin/index');
		}
		else {
			$staffs = $allstaff['rows'];
			//$num = $users['num'];
			$this->load->view('inc/header_view');
			//$this->load->view('inc/sidebar_view');
			$this->load->view('customer/viewcustomers_view', ['staffs' => $staffs]);
			$this->load->view('inc2/footer_view5');
		}
		
	}

	//------------------------------------------

	public function shuffle_assoc($array)
	{
	    $keys = array_keys($array);

	    shuffle($keys);

	    foreach($keys as $key) {
	        $new[$key] = $array[$key];
	    }

	    $array = $new;

	    return $array;
	}

	//-------------------------------------------

	public function viewnominees()
	{
		$now = date('Y-m-d');
		$mark = '2021-12-20';

		if ($now < $mark) {
			$this->session->set_flashdata('msg','Result not yet available');
			return redirect('admin/index');
		}

		//baba for the girls
		$baba_girls = $this->admin_model->getBabaGirls();
		$babaRecords = $baba_girls['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($babaRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$babaRecords = $this->shuffle_assoc($sort_array);

		//baby
		$baby = $this->admin_model->getBaby();
		$babyRecords = $baby['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($babyRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$babyRecords = $this->shuffle_assoc($sort_array);

		//besties
		$besties = $this->admin_model->getBesties();
		$bestiesRecords = $besties['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($bestiesRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$bestiesRecords = $this->shuffle_assoc($sort_array);

		//chop
		$chop = $this->admin_model->getChop();
		$chopRecords = $chop['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($chopRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$chopRecords = $this->shuffle_assoc($sort_array);

		//closeup
		$closeup = $this->admin_model->getcloseup();
		$closeupRecords = $closeup['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($closeupRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$closeupRecords = $this->shuffle_assoc($sort_array);

		//comedian
		$comedian = $this->admin_model->getcomedian();
		$comedianRecords = $comedian['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($comedianRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$comedianRecords = $this->shuffle_assoc($sort_array);
		
		//donkey
		$donkey = $this->admin_model->getdonkey();
		$donkeyRecords = $donkey['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($donkeyRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$donkeyRecords = $this->shuffle_assoc($sort_array);

		//early momo
		$earlymomo = $this->admin_model->getearlymomo();
		$earlymomoRecords = $earlymomo['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($earlymomoRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$earlymomoRecords = $this->shuffle_assoc($sort_array);

		//instablog
		$instablog = $this->admin_model->getinstablog();
		$instablogRecords = $instablog['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($instablogRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$instablogRecords = $this->shuffle_assoc($sort_array);

		//jaye
		$jaye = $this->admin_model->getjaye();
		$jayeRecords = $jaye['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($jayeRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$jayeRecords = $this->shuffle_assoc($sort_array);

		//call
		$call = $this->admin_model->getcall();
		$callRecords = $call['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($callRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$callRecords = $this->shuffle_assoc($sort_array);

		//papapa
		$papapa = $this->admin_model->getpapapa();
		$papapaRecords = $papapa['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($papapaRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$papapaRecords = $this->shuffle_assoc($sort_array);

		//trouble
		$trouble = $this->admin_model->gettrouble();
		$troubleRecords = $trouble['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($troubleRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$troubleRecords = $this->shuffle_assoc($sort_array);

		//vibe
		$vibe = $this->admin_model->getvibe();
		$vibeRecords = $vibe['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($vibeRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$vibeRecords = $this->shuffle_assoc($sort_array);

		//wife
		$wife = $this->admin_model->getwife();
		$wifeRecords = $wife['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($wifeRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$wifeRecords = $this->shuffle_assoc($sort_array);

		//workpass
		$workpass = $this->admin_model->getworkpass();
		$workpassRecords = $workpass['rows'];

		//get unique values
		$ids = [];
		$sort_array = [];
		$num = 0;

		foreach ($workpassRecords as $row) {
			if ($num < 5) {
				if (in_array($row->user_id, $ids))
                {
                  continue;
                }
                else {
                  $ids[$num] = $row->user_id;
                  $sort_array[$num] = $row;
                  $num++;
                }
			}
			else {
				break;
			}
		}
		$workpassRecords = $this->shuffle_assoc($sort_array);

		$this->load->view('inc/header_view');
		$this->load->view('customer/nominees_view', ['baba' => $babaRecords, 'baby' => $babyRecords, 'besties' => $bestiesRecords, 'chop' => $chopRecords, 'closeup' => $closeupRecords, 'comedian' => $comedianRecords, 'donkey' => $donkeyRecords, 'earlymomo' => $earlymomoRecords, 'instablog' => $instablogRecords, 'jaye' => $jayeRecords, 'call' => $callRecords, 'papapa' => $papapaRecords, 'trouble' => $troubleRecords, 'vibe' => $vibeRecords, 'wife' => $wifeRecords, 'workpass' => $workpassRecords]);
		$this->load->view('inc2/footer_view5');
	}

	//------------------------------------------

}