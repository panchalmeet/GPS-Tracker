<?php

class Comitee extends CI_Controller{

	public function dashboard(){
		

  $login = $this->session->userdata('login');

  if ($login==TRUE) {
 
    $this->load->view('Comitee/dashboard');
  }else{
    $this->load->view('error');
  }

	}

	
	
	public function profile(){
     $login = $this->session->userdata('login');

  if ($login==TRUE) {
 	
	$data = $this->session->userdata('user');
	$user = $this->Crud->get_my_profile($data);	
	$this->load->view('Comitee/profile.php',['data'=>$user]);

    }else{
    $this->load->view('error');
  }

	}

	public function message(){
     $login = $this->session->userdata('login');

  if ($login==TRUE) {
 
	$data = $this->session->userdata('user');
	$message = $this->Crud->get_message($data);	
	$this->load->view('Comitee/message',['message'=>$message]);

    }else{
    $this->load->view('error');
  }
	}

	public function complains(){
	 $login = $this->session->userdata('login');

  if ($login==TRUE) {
	$department = $this->session->userdata('dept');
	$complains = $this->Crud->comitee_complain($department);
	$this->load->view('Comitee/Complain',['complains'=>$complains]);	
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
                    <img src="<?= base_url('assets/images/'.$d->profile); ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="email" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $d->fname.' '.$d->lname; ?> <?php

                    $this->db->where('dept_code',$d->branch_id);
                  $design =   $this->db->get('department')->result();

                  foreach($design as $e):{
                    echo '('.$e->name.')';
                  }endforeach;
                    ?></div>
                    <div class="email"><?= $d->email; ?> </div>

                   

                <?php

                }endforeach;
                
                      
          }

      
         public function ajax_profile_pic(){
          $user =  $this->session->userdata('user'); //$this->session->userdata('user');
            $data = $this->Crud->get_my_profile($user);


    foreach($data as $d):
    {

        ?>
        <img src="<?= base_url('assets/images/'.$d->profile); ?>" onclick="chooseFile()" style="cursor: pointer; height: 300px;width:300px;margin-left:50px;" class="image" >
    <input type="text" value="<?=$d->id?>" name="id" class="sr-only">

        <input type="submit" name="upload" id="upload" value="UPLOAD" class="btn btn-primary">
        <?php

    }
endforeach;
  

        }


}
?>
