<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/icon.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/icon2.css'); ?>">
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js'); ?>"></script>

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/plugins/node-waves/waves.css'); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/plugins/animate-css/animate.css'); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <style type="text/css">
        #error_notify{
            animation-duration: 1s;
            animation-name: bounceInDown;
        }
         #success_notify{
            animation-duration: 1s;
            animation-name: bounceInDown;
        }
        .login-page{
            background: #03A9F4;
        }
    </style>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">MEMBER  <b>Register</b></a>
            <small>Register To L.D.C.E</small>
        </div>
        <div class="card">
             
                                               
                                          <div id="success_notify" style="display: none;" >
                                                <div class="progress" style="height: 10px;" >
                                                <div id="myBar" class="progress-bar bg-deep-orange progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
                                                </div>
                                            </div>
                                            
                                          </div>
                                      
                                    

             <div id="error_notify" style="display: none;" >
                 <div class="panel-heading bg-red">
                        <h4> Invalid Data...</h4>
                    </div>
             </div>
            <div class="body">
                <form id="sign_in" method="post">
                    <div class="msg">Sign up to start your session</div>


                   
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="FirstName" required >
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="LastName" required >
                        </div>
                    </div>

                     <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control" name="mobile" id="number" placeholder="Number" required >
                        </div>
                    </div>
                    
                  
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <select name="dept" class="col-lg-12" id="checker">
                               
                                    <option value="1">Student</option>
                                    <option value="2">Faculty</option>
                                    <option value="3">Other</option>
                            </select>
                        </div>
                        </div>
                    
                    <div class="input-group" id="selector">
                        <span class="input-group-addon">
                            <i class="material-icons">person_pin</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control" name="enroll" id="enroll" placeholder="Enrollment" required >
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">mail</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                        </div>
                    </div>

                     <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">archive</i>
                        </span>
                        <div class="form-line">
                            <select name="dept" class="col-lg-12">
                                <?php
                                $dept = $this->db->select('*')->get('department')->result();

                                foreach($dept as $d):{
                                    ?>
                                    <option value="<?=$d->id?>"><?=$d->name?></option>
                                    <?php
                                }endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-teal waves-effect" id="login" type="button">REGISTER</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                      
                     


                    </div>
                </form>
            </div>

        </div>
    </div>

                                       
    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.js'); ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/plugins/node-waves/waves.js'); ?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-validation/jquery.validate.js'); ?>"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/js/admin.js'); ?>"></script>
    <script src="<?= base_url('assets/js/pages/examples/sign-in.js'); ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {

       
        //var a = $("#fname").val();

            
        $("#login").click(function(){
             var a = $("#fname").val();
        var b = $("#lname").val();
        var c = $("#email").val();
        var d = $("#pass").val();
        var e = $("#number").val();
            if (c==''||d==''||a==''||b==''||e=='') {
               
                $("#error_notify").fadeIn();
                        setInterval(function(){$("#error_notify").fadeOut();},4000);
            }else{
                $.ajax({
                url:'<?= site_url("Member_login/client_register"); ?>',
                type:'post',
                data:$("#sign_in").serialize(),
                success:function(msg){
                    if (msg=='Failed') {
                        $("#error_notify").fadeIn();
                        setInterval(function(){$("#error_notify").fadeOut();},4000);
                    }else{
                        $("#success_notify").fadeIn();
                        setInterval(function(){$("#success_notify").fadeOut();},6000);

var elem = document.getElementById("myBar");
var status = document.getElementById("status");   

  var width = 1;
  var id = setInterval(frame, 30);

  $(".msg").css('font-size','20px');

  function frame() {
    if (width >= 100) {
        $(".msg").html('Verifying Email');
       
            window.location.href="<?= site_url('Member_login/authenticate'); ?>";        
                    

      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%';
      $("#status").html(elem.style.width); 

    }

    if(width>=0){
        $(".msg").html('Verifying details');
    }
     if(width>=45){
        $(".msg").html('Verifying details');
    }
     if(width>=75){
        $(".msg").html('Please wait...');

    }
     if(width>=95){
        $(".msg").html('Verifying Email ');

    }
  }

                    }
                }
            })
            }
        });
        
        
       
    });
    
    
    $(document).ready(function(){

       $("#checker").change(function(){
           var checker = $("#checker").val();
            
            if(checker=='1'){
                $("#selector").show();
                
            }else if(checker=='2'){
                    $("#selector").hide();
                
            }else if(checker=='3'){
                    $("#selector").hide();
                
            }
       });
    });
</script>

</body>




</html>