<?php

class Admin extends CI_Controller{

	public function dashboard(){
		
  $login = $this->session->userdata('login');

  if ($login==TRUE) {
    //$this->db->where('car',$car_id);
    $this->db->where('status','2');

    $completed = $this->db->get('service')->result();


    // $this->db->where('car',$car_id);
    $this->db->where('status','0');

    $pending = $this->db->get('service')->result();


     //$this->db->where('car',$car_id);
    $this->db->where('status','1');

    $aprooved = $this->db->get('service')->result();
 
  $this->load->view('Admin/dashboard',['completed'=>$completed,'pending'=>$pending,'aprooved'=>$aprooved]);
   
    
  }else{
    $this->load->view('error');
  }

	}



  public function head(){

     $login = $this->session->userdata('login');

  if ($login==TRUE) {
 
  
  $user = $this->session->userdata('user');

 

   $driver_id = $this->session->userdata('user');

    
  $complains = $this->db->get('registration')->result();
  $this->load->view('Admin/head',['complains'=>$complains]); 
   }else{
    $this->load->view('error');
  }
  }


	public function users(){
     $login = $this->session->userdata('login');

  if ($login==TRUE) {
	
	$this->load->view('Admin/users');

   }else{
    $this->load->view('error');
  }

	}

	public function members(){

       $login = $this->session->userdata('login');

  if ($login==TRUE) {
	
	$members = $this->Crud->get_members();
	$this->load->view('Admin/members',['members'=>$members]);

   }else{
    $this->load->view('error');
  }

	}


	public function verify_complains(){

         $login = $this->session->userdata('login');

  if ($login==TRUE) {
  
	$complains = $this->Crud->admin_verify_complain();
	$this->load->view('Admin/verify_complain.php',['complains'=>$complains]);
   }else{
    $this->load->view('error');
  }

	}

	public function profile(){

       $login = $this->session->userdata('login');

  if ($login==TRUE) {
  
	
	$data = $this->session->userdata('user');
	$user = $this->Crud->get_my_profile($data);	
	$this->load->view('Admin/profile.php',['data'=>$user]);
   }else{
    $this->load->view('error');
  }

	}

	public function message(){

      $login = $this->session->userdata('login');

  if ($login==TRUE) {
  
	 $data = $this->session->userdata('user');
	$message = $this->Crud->get_message($data);	
	$this->load->view('Admin/message',['message'=>$message]);
   }else{
    $this->load->view('error');
  }

	}

	public function complains(){
	
      $login = $this->session->userdata('login');

  if ($login==TRUE) {
  
	$complains = $this->Crud->admin_complain();
	$this->load->view('Admin/Complain',['complains'=>$complains]);
   }else{
    $this->load->view('error');
  }	
	}

	public function logout(){
	 $this->session->sess_destroy();
	redirect('welcome');

	}

	             public function update_profile(){
            $data = ['fname'=>$this->input->post('fname'),
                    'lname'=>$this->input->post('lname'),
                    'email'=>$this->input->post('email'),
                    'number'=>$this->input->post('mobile'),
                    //'gender'=>$this->input->post('gender'),
                    'pass'=>$this->input->post('pass')
                    ];
              
                  $id = $this->input->post('id');
                    $this->Crud->update_profile($data,$id);
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

  $data = ['profile'=>
  $img = $_FILES['fileInput']['name']

];

  $this->Crud->update_pic($id,$data);

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
          $user = $this->session->userdata('user');
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



        public function accept_complain(){


          $data = ['Status'=>'2'];

          $id = $this->input->post('comp_id');
          $this->Crud->accept_complain($id,$data);

          echo $id."hello";
        }

        public function remove_complain(){
          $id = $this->input->post('comp_id');
          $this->Crud->remove_complain($id);
        }


        public function remove_member(){
          $id = $this->input->post('user_id');
          $this->Crud->remove_member($id);
        }


}
?>
