<?php
	
	$this->db->where('Status','1');
	$this->db->where('mailed','0');
	$this->db->where('solution','');
	$data = $this->db->get('complain')->result();

	$c_day = date('d');
	$c_month = date('m');
	$c_year = date('Y');


	foreach($data as $d):{
		
		$date = $d->c_date;

		$day = substr($date,0,2);
		$month = substr($date,3,2);
		$year = substr($date,6,4);

		if ($year==$c_year) {

			//SAME YEAR

			if ($month==$c_month) {
				
				//SAME MONTH

				//CHECK FOR 15 DAYS

					$remain = $c_day-$day;

					if ($remain>15) {
						
						// SEND MAIL

						$reciever = $this->db->where('id',$d->u_id)->get('registration')->row();

						$department = $this->db->where('id',$d->c_dept)->get('department')->row();

						$principal = $this->db->where('type','3')->get('registration')->row();

						

						$subject = "Pending Complains";

					$message = "Respected Sir Complain of ".$reciever->fname.' '.$reciever->lname.' on '.$d->c_date.' to '.$department->name.' department for topic '.$d->complain.' is not solved';
					
					
					
    
    
			mail($principal->email,"Pending Complains",$message,"From: Grevieances@gmail.com");
			
						$update = ['mailed'=>'1'];



						$this->db->where('id',$d->id);
						$this->db->update('complain',$update);


					}else{

						// NOTHING
						
					
					}


			
			}else{

				//NOTHING
			}

		}else{

			//NOTHING

		}

	}endforeach;
?>