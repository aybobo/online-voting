<?php

class Staffvote_model extends CI_Model {

	public function getstaff() {
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get('users');		
		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}	
	}

	//---------------------------------

	public function addvote($data)
	{
		$this->db->trans_begin();

		//baba for the girls
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['baba']);
		$query = $this->db->get('baba_girls_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('baba_girls_award', ['voter_id' => $data['userId'],
												'user_id' => $data['baba'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('baba_girls_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 1);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//baby award-----------------------
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['baby']);
		$query = $this->db->get('baby_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('baby_award', ['voter_id' => $data['userId'],
												'user_id' => $data['baby'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('baby_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 2);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//besties award------------------
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['besties']);
		$query = $this->db->get('besties_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('besties_award', ['voter_id' => $data['userId'],
												'user_id' => $data['besties'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('besties_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 3);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//chop award----------------
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['chop']);
		$query = $this->db->get('chop_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('chop_award', ['voter_id' => $data['userId'],
												'user_id' => $data['chop'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('chop_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 4);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//close up award---------------------
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['closeup']);
		$query = $this->db->get('close_up_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('close_up_award', ['voter_id' => $data['userId'],
												'user_id' => $data['closeup'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('close_up_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 5);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);


		//comedian award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['comedian']);
		$query = $this->db->get('comedian_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('comedian_award', ['voter_id' => $data['userId'],
												'user_id' => $data['comedian'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('comedian_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 6);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//donkey award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['donkey']);
		$query = $this->db->get('donkey_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('donkey_award', ['voter_id' => $data['userId'],
												'user_id' => $data['donkey'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('donkey_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 7);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//early momo award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['earlymomo']);
		$query = $this->db->get('early_momo_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('early_momo_award', ['voter_id' => $data['userId'],
												'user_id' => $data['earlymomo'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('early_momo_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 8);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//instablog award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['instablog']);
		$query = $this->db->get('instablog_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('instablog_award', ['voter_id' => $data['userId'],
												'user_id' => $data['instablog'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('instablog_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 9);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);


		//call award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['call']);
		$query = $this->db->get('oncall_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('oncall_award', ['voter_id' => $data['userId'],
												'user_id' => $data['call'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('oncall_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 10);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//papapa award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['papapa']);
		$query = $this->db->get('papapa_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('papapa_award', ['voter_id' => $data['userId'],
												'user_id' => $data['papapa'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('papapa_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 11);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//trouble maker award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['trouble']);
		$query = $this->db->get('trouble_maker_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('trouble_maker_award', ['voter_id' => $data['userId'],
												'user_id' => $data['trouble'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('trouble_maker_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 12);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//vibe carrier award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['vibe']);
		$query = $this->db->get('vibe_carrier_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('vibe_carrier_award', ['voter_id' => $data['userId'],
												'user_id' => $data['vibe'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('vibe_carrier_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 15);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//wife award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['wife']);
		$query = $this->db->get('wife_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('wife_award', ['voter_id' => $data['userId'],
												'user_id' => $data['wife'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('wife_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 13);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//work_pass award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['work_pass']);
		$query = $this->db->get('work_pass_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('work_pass_award', ['voter_id' => $data['userId'],
												'user_id' => $data['work_pass'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('work_pass_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 14);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//--------------------------

		//jaye jaye award
		$this->db->select_max('count');
		$this->db->where('user_id =', $data['jaye']);
		$query = $this->db->get('jaye_jaye_award');
		$num = 0;
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$num = $query->count;
			$num += 1;
		}
		else {
			$num = 1;
		}

		$this->db->insert('jaye_jaye_award', ['voter_id' => $data['userId'],
												'user_id' => $data['jaye'],
												'count' => $num]);

		$this->db->order_by('count', 'DESC');
		$result = $this->db->get('jaye_jaye_award');
		$result = $result->row();
		$maxCount = $result->count;
		$id = $result->user_id;

		$this->db->where('id =', 16);
		$this->db->update('award_names', ['user_id' => $id, 'count' => $maxCount]);

		//update users table
		$this->db->where('id =', $data['userId']);
		$this->db->update('users', ['status' => 1]);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 0;
		}
		else {
			$this->db->trans_commit();
            return 1;
		}
	}

	//---------------------------------

	public function getSingleStaff($data)
	{
		$this->db->where('id =', $data['userId']);
		$query = $this->db->get('users');
		return $query->row();
	}

	//----------------------------------

	public function getawards()
	{
		$this->db->select('*');
		$this->db->from('award_names');
		$this->db->join('users', 'users.id = award_names.user_id');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			$record = $query->result();
			return array('rows' => $record, 'num' => count($record));
		}
	}

	//-------------------------------------

	public function getBabaGirls()
	{
		$this->db->from('baba_girls_award');
		$this->db->join('users', 'users.id = baba_girls_award.user_id');
		$this->db->order_by('count', 'DESC');
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