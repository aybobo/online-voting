<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffvote extends CI_Controller {

	//--------------------------------------

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('userId'))
			redirect('admin/index');
		$this->load->model('staffvote_model');
	}

	//--------------------------------------------

	public function voteForm()
	{
		$allstaff = $this->staffvote_model->getstaff();

		$allstaff = $allstaff['rows'];

		$this->load->view('inc/header_view');
		$this->load->view('inc/sidebar_view');
		$this->load->view('customer/customerpage_view', ['staff' => $allstaff]);
		$this->load->view('inc2/footer_view');
	}

	//--------------------------------------------

	public function submitvote()
	{
		//set validation rules
		$this->form_validation->set_rules('call', 'On call', 'required');
		$this->form_validation->set_rules('papapa', 'Papapa', 'required');
		$this->form_validation->set_rules('earlymomo', 'Early momo', 'required');
		$this->form_validation->set_rules('vibe', 'Vibe carrier', 'required');
		$this->form_validation->set_rules('work_pass', 'Na you work pass', 'required');
		$this->form_validation->set_rules('instablog', 'Instablog', 'required');
		$this->form_validation->set_rules('closeup', 'Close Up', 'required');
		$this->form_validation->set_rules('comedian', 'Comedian', 'required');
		$this->form_validation->set_rules('trouble', 'Trouble maker', 'required');
		$this->form_validation->set_rules('besties', 'Besties', 'required');
		$this->form_validation->set_rules('wife', 'Our wife', 'required');
		$this->form_validation->set_rules('baby', 'Baby of the house', 'required');
		$this->form_validation->set_rules('chop', 'Chop chop', 'required');
		$this->form_validation->set_rules('baba', 'Baba for the girls', 'required');
		$this->form_validation->set_rules('donkey', 'Camel', 'required');
		$this->form_validation->set_rules('jaye', 'Jaye jaye', 'required');

		if ($this->form_validation->run()) {
			$data = $this->input->post();
			$data['userId'] = $this->session->userdata('userId');
			$status = $this->session->userdata('status');
			$now = date('Y-m-d');
			$mark = '2021-12-18';

			$user = $this->staffvote_model->getSingleStaff($data);

			if ($user->status == 1) {
				$this->session->set_flashdata('msg','You have already voted');
				return redirect('staffvote/voteform');
			}

			if ($now == $mark) {
				$this->session->set_flashdata('msg','Voting has ended');
				return redirect('staffvote/voteform');
			}

			$vote = $this->staffvote_model->addvote($data);

			if ($vote == 1) {
				$this->session->set_flashdata('success','Vote submitted');
				return redirect('staffvote/voteform');
			}
			else {
				$this->session->set_flashdata('msg','Error submitting vote');
				return redirect('staffvote/voteform');
			}

		}
		else {
			$allstaff = $this->staffvote_model->getstaff();

			$allstaff = $allstaff['rows'];

			$this->load->view('inc/header_view');
			$this->load->view('inc/sidebar_view');
			$this->load->view('customer/customerpage_view', ['staff' => $allstaff]);
			$this->load->view('inc2/footer_view');
		}
	}

	//-------------------------------------------

	public function viewresult()
	{
		if ($this->session->userdata('role') != 1) {
			$this->session->set_flashdata('msg', 'Access Denied');
			return redirect('staffvote/voteform');
		}
		else {
			$winners = $this->staffvote_model->getawards();

			if (!$winners) {
				$this->session->set_flashdata('msg','No record found');
				return redirect('staffvote/voteform');
			}
			else {
				$now = date('Y-m-d');
				$mark = '2021-12-20';

				if ($now < $mark) {
					$this->session->set_flashdata('msg','Result not yet available');
					return redirect('staffvote/voteform');
				}
				
				$winners = $winners['rows'];

				$this->load->view('inc/header_view');
				$this->load->view('inc/sidebar_view1');
				$this->load->view('customer/winners_view', ['rows' => $winners]);
				$this->load->view('inc2/footer_view');
			}
		}
	}

	//-------------------------------------------

	public function viewnominees()
	{
		if ($this->session->userdata('role') != 1) {
			$this->session->set_flashdata('msg', 'Access Denied');
			return redirect('staffvote/voteform');
		}
		else {
			$now = date('Y-m-d');
			$mark = '2021-12-19';

			if ($now < $mark) {
				$this->session->set_flashdata('msg','Result not yet available');
				return redirect('staffvote/voteform');
			}
			else {
				//get nominees

				//baba for the girls
				$baba_girls = $this->staffvote_model->getBabaGirls();
				$babaRecords = $baba_girls['rows'];

				//baby
				$baby = $this->staffvote_model->getBaby();
				$babyRecords = $baby['rows'];

				//besties
				$besties = $this->staffvote_model->getBesties();
				$bestiesRecords = $besties['rows'];

				//chop
				$chop = $this->staffvote_model->getChop();
				$chopRecords = $chop['rows'];

				//closeup
				$closeup = $this->staffvote_model->getcloseup();
				$closeupRecords = $closeup['rows'];

				//comedian
				$comedian = $this->staffvote_model->getcomedian();
				$comedianRecords = $comedian['rows'];
				
				//donkey
				$donkey = $this->staffvote_model->getdonkey();
				$donkeyRecords = $donkey['rows'];

				//early momo
				$earlymomo = $this->staffvote_model->getearlymomo();
				$earlymomoRecords = $earlymomo['rows'];

				//instablog
				$instablog = $this->staffvote_model->getinstablog();
				$instablogRecords = $instablog['rows'];

				//jaye
				$jaye = $this->staffvote_model->getjaye();
				$jayeRecords = $jaye['rows'];

				//call
				$call = $this->staffvote_model->getcall();
				$callRecords = $call['rows'];

				//papapa
				$papapa = $this->staffvote_model->getpapapa();
				$papapaRecords = $papapa['rows'];

				//trouble
				$trouble = $this->staffvote_model->gettrouble();
				$troubleRecords = $trouble['rows'];

				//vibe
				$vibe = $this->staffvote_model->getvibe();
				$vibeRecords = $vibe['rows'];

				//wife
				$wife = $this->staffvote_model->getwife();
				$wifeRecords = $wife['rows'];

				//workpass
				$workpass = $this->staffvote_model->getworkpass();
				$workpassRecords = $workpass['rows'];

				$this->load->view('inc/header_view');
				$this->load->view('inc/sidebar_view1');
				$this->load->view('customer/admnominees_view', ['baba' => $babaRecords, 'baby' => $babyRecords, 'besties' => $bestiesRecords, 'chop' => $chopRecords, 'closeup' => $closeupRecords, 'comedian' => $comedianRecords, 'donkey' => $donkeyRecords, 'earlymomo' => $earlymomoRecords, 'instablog' => $instablogRecords, 'jaye' => $jayeRecords, 'call' => $callRecords, 'papapa' => $papapaRecords, 'trouble' => $troubleRecords, 'vibe' => $vibeRecords, 'wife' => $wifeRecords, 'workpass' => $workpassRecords]);
				$this->load->view('inc2/footer_view5');
			}
		}
	}

	//-------------------------------------------
}