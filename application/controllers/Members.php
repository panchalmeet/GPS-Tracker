<?php

class Members extends CI_Controller{

	public function dashboard(){
		
     $login = $this->session->userdata('login');

  if ($login==TRUE) {

    $driver_id = $this->session->userdata('user');

    $this->db->where('driver',$driver_id);
    $car = $this->db->get('car')->row();
    
    $car_id = $car->id;

    $this->db->where('car',$car_id);
    $this->db->where('status','2');

    $completed = $this->db->get('service')->result();


     $this->db->where('car',$car_id);
    $this->db->where('status','0');

    $pending = $this->db->get('service')->result();


     $this->db->where('car',$car_id);
    $this->db->where('status','1');

    $aprooved = $this->db->get('service')->result();
 
  $this->load->view('Members/dashboard',['completed'=>$completed,'pending'=>$pending,'aprooved'=>$aprooved]);
   
  }else{
    $this->load->view('error');
  }


	}


	public function profile(){

	
	$data = $this->session->userdata('user');
	$user = $this->Crud->get_my_profile('1');	
	$this->load->view('Members/profile.php',['data'=>$user]);

   }

	public function message(){

     $login = $this->session->userdata('login');

  if ($login==TRUE) {
 
	$data = $this->session->userdata('user');
	$message = $this->Crud->get_message($data);	
	$this->load->view('Members/message',['message'=>$message]);
   }else{
    $this->load->view('error');
  }
	}

	public function service(){

     $login = $this->session->userdata('login');

  if ($login==TRUE) {
 
	
	$user = $this->session->userdata('user');

 


   $driver_id = $this->session->userdata('user');

      $this->db->where('driver',$driver_id);
    $car = $this->db->get('car')->row();


    $car_id = $car->id;

   // $this->db->where('car',$car_id);

	$complains = $this->Crud->members_complain($car_id);
	$this->load->view('Members/Service',['complains'=>$complains]);	
   }else{
    $this->load->view('error');
  }
	}


  public function history(){

     $login = $this->session->userdata('login');

  if ($login==TRUE) {
 
  
  $user = $this->session->userdata('user');

 


   $driver_id = $this->session->userdata('user');

      $this->db->where('driver',$driver_id);
    $car = $this->db->get('car')->row();


    $car_id = $car->id;

   // $this->db->where('car',$car_id);

  $complains = $this->Crud->members_locations($car_id);
  $this->load->view('Members/history',['complains'=>$complains]); 
   }else{
    $this->load->view('error');
  }
  }

	public function logout(){
	 $this->session->sess_destroy();
	redirect('welcome');
	}

	           public function update_profile(){
            $data = ['name'=>$this->input->post('fname'),
                    //'lname'=>$this->input->post('lname'),
                    'email'=>$this->input->post('email'),
                    'number'=>$this->input->post('mobile'),
                    //'gender'=>$this->input->post('gender'),
                   // 'password'=>$this->input->post('pass')
                    ];
              
                  $id = $this->input->post('id');
                    $this->Crud->update_profile($data,$id);
        }



             public function update_cost(){
            $data = ['cost'=>$this->input->post('cost'),
                      'status'=>'1'             
                    ];

                   
              
                  $id = $this->input->post('car_id');

                    echo $this->input->post('cost').$id;

                    $this->db->where('id',$id);
                    $this->db->update('service',$data);
        }

         public function insert_complain(){
            $data = ['complain'=>$this->input->post('comp'),
                    'c_dept'=>$this->input->post('dept'),
                    'c_date'=>date('d/m/Y'),
                    'u_id'=>$this->session->userdata('user')
                    ];
              
                 
                    $this->Crud->insert_complain($data);





        }

         public function solve_complain(){
            $data = [
                    'solution'=>$this->input->post('comp'),
                    'Status'=>'2'
                    ];

                    $id = $this->input->post('c_id');
                     $solution=$this->input->post('comp');
                 
                    $this->Crud->solve_complain($id,$data);

                   $this->db->where('id',$id);
                   $comp = $this->db->get('complain')->row();


                   $this->db->where('id',$comp->u_id);
                   $user = $this->db->get('registration')->row();


                    mail($user->email,"Grevieances Solution","We had solved your complain. and do ".$solution." to solve it","From:Grevieances@gmail.com");


                    $mailed = ['mail'=>$solution,'date'=>date('d/m/Y'),'solver'=>$this->session->userata('dept'),'user'=>$comp->u_id];

                    $this->db->insert('mail',$mailed);




        }


      

          public function change_profile_pic(){

if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['fileInput']['tmp_name'])) {
$sourcePath = $_FILES['fileInput']['tmp_name'];
$targetPath = "assets/images/".$_FILES['fileInput']['name'];

$target_file = $targetPath . basename($_FILES["fileInput"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if ($imageFileType!='jpg' && $imageFileType!='jpeg' && $imageFileType!='png' && $imageFileType!='gif') {
  echo "Some Error Occured while uploading this file";
}else{
  

  move_uploaded_file($sourcePath,$targetPath);

  $id = $this->input->post('id');

  $data = ['img'=>
  $img = $_FILES['fileInput']['name']

];

  $this->Crud->update_pic($id,$data);

}

}
}
            
        }


         public function update_bill(){

if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['fileInput']['tmp_name'])) {
$sourcePath = $_FILES['fileInput']['tmp_name'];
$targetPath = "assets/images/".$_FILES['fileInput']['name'];

$target_file = $targetPath . basename($_FILES["fileInput"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if ($imageFileType!='jpg' && $imageFileType!='jpeg' && $imageFileType!='png' && $imageFileType!='gif') {
  echo "Some Error Occured while uploading this file";
}else{
  

  move_uploaded_file($sourcePath,$targetPath);

  $id = $this->input->post('id');

  $data = ['bill'=>
  $img = $_FILES['fileInput']['name']

];

  $this->db->where('id',$id);
  $this->db->update('service',$data);

}

}
}
            
        }


        
          public function user_detail(){

            //$login = $this->session->has_userdata('login');

           
               $user = $this->session->userdata('user');
                $data = $this->Crud->get_my_profile($user);

                foreach($data as $d):{
                  
                   ?>

                   <div class="image">
                    <img src="<?= base_url('assets/images/'.$d->img); ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="email" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $d->name; ?> <?php

                    $this->db->where('id',$d->zone);
                  $design =   $this->db->get('city')->result();

                  foreach($design as $e):{
                    echo '('.$e->zone.')';
                  }endforeach;
                    ?></div>
                    <div class="email"><?= $d->email; ?> </div>

                   

                <?php

                }endforeach;
                
                      
          }

      
         public function ajax_profile_pic(){
          $user =$this->session->userdata('user');
            $data = $this->Crud->get_my_profile($user);


    foreach($data as $d):
    {

        ?>
        <img src="<?= base_url('assets/images/'.$d->img); ?>" onclick="chooseFile()" style="cursor: pointer; height: 300px;width:300px;margin-left:50px;" class="image" >
    <input type="text" value="<?=$d->id?>" name="id" class="sr-only">

        <input type="submit" name="upload" id="upload" value="UPLOAD" class="btn btn-primary">
        <?php

    }
endforeach;
  

        }


}
?>
