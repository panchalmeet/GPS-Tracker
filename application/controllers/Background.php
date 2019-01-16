<?php

class Ajax extends CI_Controller{

	public function index(){

			$this->load->view('ajax/ajax');
	}

	public function check_for_service(){

		$cars = $this->db->get('car')->result();


		foreach($cars as $c):{

			$current_km = $c->km;

			

			if ($current_km>500) {
				
				$id = $c->id;

				$total_km = $c->total;

				$service = $c->service;

				$date = date('d/m/Y');
				
				$insert_data = ['car'=>$id,
						 'date'=>$date,
						 'current_distance'=>$current_km,
						 'total_distance'=>$total_km,
						 'status'=>'0'
						];

				$update_data = ['km'=>'0'];		

				// save into service 

				$this->db->insert('service',$insert_data);

				// update km in car

				$this->db->where('id',$c->id);
				$this->db->update('car',$update_data);
			
			}else{

				echo "All Ok";
			}

		}endforeach;
	}



	public function check_for_location(){



			
		

			$data = $this->db->where('id',$user)->get('registration')->result();

			print_r($data);


			?>
			<div id="">
				
				<form id="form">
				<input type="text" id="lat" name="lat" value="" >
				<input type="text" id="lon" value="" name="lon" >
				</form>

			</div>
			<script>

				$(document).ready(function(){
					getLocation();
				});

var x = document.getElementById("lat");

var y = document.getElementById("lon");



function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = position.coords.latitude;
    y.innerHTML = position.coords.longitude;

    $("#lat").val(position.coords.latitude);
    $("#lon").val(position.coords.longitude);

      $.ajax({
            url: "<?= site_url('Ajax/add_location') ?>", 
            type: "POST",
            data:  $("#form").serialize(),
            success: function(msg){
            	//alert(position.coords.longitude);
            }
        });
    	
}
</script>


<?php

	}


	public function add_location(){
		
		$lat = $this->input->post('lat');

		$lon = $this->input->post('lon');


		$update_data = ['slet'=>$lat,
				'slon'=>$lon,
				];

			$user = $this->session->userdata('user');

			$this->db->where('driver',$user);
			$this->db->update('car',$update_data);

	}
}


?>