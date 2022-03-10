<?php

class Admin_model extends CI_Model {

	//------- login user

	public function islogin($userEmail, $password)
	{
		$this->db->where('email =', $userEmail);
		$this->db->where('password =', $password);
		$query = $this->db->get('users');
		return $query->row();
	}

	//----------------------------

	public function checkEmail($email)
	{
		$this->db->where('email =', $email);
		$sql = $this->db->get('users');
		return $sql->row();
	}

	//-------------------------------

	public function updateToken($email, $token, $num)
	{
		$this->db->where('email =', $email);
		return $this->db->update('users', ['token' => $token, 'num' => $num]);
	}

	//---------------------------------

	public function verifyToken($data)
	{
		$this->db->where('token =', $data['token']);
		$sql = $this->db->get('users');
		return $sql->row();
	}

	//------------------------------------

	public function updatePassword($data)
	{
		$this->db->where('token =', $data['token']);
		return $this->db->update('users', ['password' => $data['pwd'],
										'token' => $data['token'],
										'num' => $data['num']]);
	}

	//-------------------------------------

	public function getstaff() {
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get('users');		
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}	
	}

	//---------------------------------

	public function updateusercode($code, $email)
	{
		$this->db->where('email =', $email);
		return $this->db->update('users', ['password' => $code]);
	}

	//-----------------------------------

	/*public function testcode()
	{
		$this->db->select('*');
		$this->db->from('award_names');
		$this->db->join('users', 'users.id = award_names.user_id');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}*/

	//-----------------------------------

	public function getBabaGirls()
	{
		$this->db->from('baba_girls_award');
		$this->db->join('users', 'users.id = baba_girls_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->distinct('baba_girls_award.user_id');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getBaby()
	{
		$this->db->from('baby_award');
		$this->db->join('users', 'users.id = baby_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();

		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getBesties()
	{
		$this->db->from('besties_award');
		$this->db->join('users', 'users.id = besties_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getChop()
	{
		$this->db->from('chop_award');
		$this->db->join('users', 'users.id = chop_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getcloseup()
	{
		$this->db->from('close_up_award');
		$this->db->join('users', 'users.id = close_up_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getcomedian()
	{
		$this->db->from('comedian_award');
		$this->db->join('users', 'users.id = comedian_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getdonkey()
	{
		$this->db->from('donkey_award');
		$this->db->join('users', 'users.id = donkey_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getearlymomo()
	{
		$this->db->from('early_momo_award');
		$this->db->join('users', 'users.id = early_momo_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getinstablog()
	{
		$this->db->from('instablog_award');
		$this->db->join('users', 'users.id = instablog_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getjaye()
	{
		$this->db->from('jaye_jaye_award');
		$this->db->join('users', 'users.id = jaye_jaye_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getcall()
	{
		$this->db->from('oncall_award');
		$this->db->join('users', 'users.id = oncall_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getpapapa()
	{
		$this->db->from('papapa_award');
		$this->db->join('users', 'users.id = papapa_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function gettrouble()
	{
		$this->db->from('trouble_maker_award');
		$this->db->join('users', 'users.id = trouble_maker_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getvibe()
	{
		$this->db->from('vibe_carrier_award');
		$this->db->join('users', 'users.id = vibe_carrier_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getwife()
	{
		$this->db->from('wife_award');
		$this->db->join('users', 'users.id = wife_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------

	public function getworkpass()
	{
		$this->db->from('work_pass_award');
		$this->db->join('users', 'users.id = work_pass_award.user_id');
		$this->db->order_by('count', 'DESC');
		//$this->db->limit(5);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-----------------------------------
}