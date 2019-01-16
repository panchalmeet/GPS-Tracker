<?php

	class Crud extends CI_Model
	{

		public function user(){

			
			$data = $this->db->get('complain');

			return $data->result();


		}

			public function admin_complain(){
			
			$this->db->order_by('id','desc');
			$this->db->where('Status','1');

			$data = $this->db->get('complain');

			return $data->result();


		}


				
		public function comitee_complain($department){
			$this->db->order_by('id','desc');

			
						$this->db->where('c_dept',$department);
			$this->db->where('Status','1');
			$data = $this->db->get('complain');

			return $data->result();


		}

		public function insert_vehicle($data){
			$this->db->insert('car',$data);
		}

			public function insert_driver($data){
			$this->db->insert('registration',$data);
		}


		public function solve_complain($id,$data){
			$this->db->where('id',$id);	
			$this->db->update('complain',$data);
		}
		
		public function members_complain($id){
			$this->db->order_by('id','desc');

						
			$this->db->where('car',$id);

			$data = $this->db->get('service');

			return $data->result();


		}

			public function head_complain(){
			$this->db->order_by('id','desc');

						
			//$this->db->where('car',$id);

			$data = $this->db->get('service');

			return $data->result();


		}


		public function members_locations($car){
			$this->db->where('car',$car);

			$data = $this->db->get('car_history');

			return $data->result();
		}

		public function register_user($data){
		$this->db->insert('registration',$data);
		}



		public function head_locations(){
			//$this->db->where('car',$car);

			$data = $this->db->get('car_history');

			return $data->result();
		}

		
		public function admin_verify_complain(){
				
				$this->db->where('Status','0');
			$data = $this->db->get('complain');

			return $data->result();


		}


		public function get_members(){

			$this->db->where('type','1');
			$data = $this->db->get('registration');

			return $data->result();


		}

		public function head_cars(){


			$data = $this->db->get('car');

			return $data->result();


		}


			public function get_message($id){

			$this->db->where('to',$id);
			$data = $this->db->get('msg');

			return $data->result();


		}

		public function aproove_complain(){

				$this->db->where('c_dept','4');
				$this->db->where('Status','1');
			$data = $this->db->get('complain');

			return $data->result();


		}

			public function verify_complain(){

				$this->db->where('Status','0');
			$data = $this->db->get('complain');

			return $data->result();


		}

		public function member_login($email,$pass)
		{
			//$pass = md5($pass);
			$this->db->where('email',$email);
			$this->db->where('password',$pass);
			$data = $this->db->get('registration')->result();
			return $data;
		}

		public function get_my_profile($id)
		{
			$this->db->where('id',$id);
			$data = $this->db->get('registration');

			return $data->result();
		}

		

			public function mail()
		{
			
			$data = $this->db->get('mail');

			return $data->result();
		}

			public function update_profile($data,$id)
		{
			$this->db->where('id',$id);	
			$this->db->update("registration",$data);	
		}

		public function update_pic($id,$data)
		{
			$this->db->where('id',$id);	
			$this->db->update("registration",$data);	
		}

		public function getMsg($id)
		{
			$this->db->where('user',$id);	
			$data = $this->db->get("mail");	
			return $data->result();
		}
		public function save_complain($data)
		{
			$this->db->insert('complain',$data);
		}


		public function accept_complain($id,$data){
			$this->db->where('id',$id);
			$this->db->update('complain',$data);
		}

		public function remove_complain($id){
			$this->db->where('id',$id);
			$this->db->delete('service');
		}	


		public function remove_member($id){
			$this->db->where('u_id',$id);
			$this->db->delete('complain');
			
			$this->db->where('id',$id);
			$this->db->delete('registration');
		}	

	}
?>
