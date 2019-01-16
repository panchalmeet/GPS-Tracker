<?php

class Member_login extends CI_Controller{

  /*public function index(){
    $this->load->view('Member_login');
  }
  
  */

  public function redirect(){
    //redirect('Member_login/index');
    
    $this->load->view('Member_login');
  }
  

  
        
        public function client_login()
        {
          $email = $this->input->post('username');
          $pass = $this->input->post('password');

         // $pass = md5($pass);
          $data = $this->Crud->member_login($email,$pass);

          $count = count($data);

          if ($count>0) {
               
           
           foreach($data as $c):
            {

              
             
              $newdata = array(
                'user'=>$c->id,
                'login' => TRUE,
                'username'=>$c->name,
                'email'=>$c->email,
                'img'=>$c->img,
                'dept'=>$c->zone



            );
             


            $this->session->set_userdata($newdata);


             echo $c->type.$c->name;


            }endforeach;
             
  
           
          }else{
            echo "Failed";
          }

        }


        public function client_register(){

        


                  $number = '0123456789';
                  $convert = str_shuffle($number);
                  $otp = substr($convert,0,6);


                    $data = ['email'=>$this->input->post('email'),
                  'contact'=>$this->input->post('mobile'),
                  'fname'=>$this->input->post('fname'),
                  'lname'=>$this->input->post('lname'),
                  'pass'=>$this->input->post('pass'),
                  'enroll'=>$this->input->post('enroll'),
                  'branch_id'=>$this->input->post('dept'),
                  'otp'=>$otp
                  ];

                  $to = $this->input->post('email');


                  mail($to,"OTP Message",$otp." is your OTP code for Grievance sign up.","From:Grevieances@gmail.com");
                 


                 
                 $this->session->set_userdata($data);




        }


        public function authenticate(){

          $this->load->view('verify');
            
        }


        public function verify(){

          $user_otp = $this->input->post('otp');
          $otp = $this->session->userdata('otp');
          
          $pass = $this->session->userdata('pass');

          if ($user_otp==$otp) {
           
            $data = ['email'=>$this->session->userdata('email'),
                    'fname'=>$this->session->userdata('fname'),
                    'lname'=>$this->session->userdata('lname'),
                    'pass'=>md5($pass),
                    'number'=>$this->session->userdata('contact'),
                    'branch_id'=>$this->session->userdata('branch_id'),
                    ];

                    $this->Crud->register_user($data);

          }else{
            echo "Failed";
            
        }
          }

}



?>