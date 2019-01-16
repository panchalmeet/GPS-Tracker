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

		$user = $this->session->userdata('user');
			$data = $this->db->where('id',$user)->get('registration')->result();

?>

<form id="frm" method="post">
		<input type="text" name="lat" id="lat">
		<input type="text" name="lon" id="lon">
</form>

<script type="text/javascript">  
   $(document).ready(function(){
   	$.ajax({
            url: "http://ip-api.com/157.32.17.40", 
            type: "get",
            data:  "ip"+"ip",
            success: function(msg){
            	//alert(msg);
            }
        });

   	$.getJSON('//gd.geobytes.com/GetCityDetails?callback=?', function(data) {
  console.log(JSON.stringify(data, null, 2));

  var s = JSON.stringify(data, null, 2);

  var obj = JSON.parse(s);
  	
  	var latitude = obj.geobyteslatitude;
  	var longitude = obj.geobyteslongitude;

 	$("#lat").val(latitude);
 	$("#lon").val(longitude);

 	//alert(obj.geobyteslatitude+',' +obj.geobyteslongitude);

 	var s = $("#lat").val();
 	var d = $("#lon").val();



   	$.ajax({
            url: "<?=site_url('Ajax/add_location');?>", 
            type: "post",
            data:  $("#frm").serialize(),
            success: function(msg){
            	alert(msg);
            }
        });


});
   });
    
</script>



<?php

	}


	public function add_location(){

		
		
		$lat = $this->input->post('lat');

		$lon = $this->input->post('lon');


		echo $lat.$lon;

$d =  date('d/m/Y');
$t = date('h:i:s');

$myfile = fopen("assets/file/location.txt", "w");
$txt = $d.','.$t.','.$lat.','.$lon;
fwrite($myfile, $txt);

fclose($myfile);

	}
}


?>