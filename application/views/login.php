<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
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
            background: #003355;
        }
    </style>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">ADMIN  <b>AIM</b></a>
            <small>Sign In To Advance Industery Maintainance</small>
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
                        <h4> Invalid Username Password...</h4>
                    </div>
             </div>
            <div class="body">
                <form id="sign_in" method="post">
                    <div class="msg">Sign in to start your session</div>


                   
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-teal waves-effect" id="login" type="button"><i class="material-icons" style="float: left;font-size: 15px;">input</i> SIGN IN</button>
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
            
        $("#login").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/member_login"); ?>',
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
        $(".msg").html('Welcome '+msg);
       
            window.location.href="<?= site_url('Admin/dashboard'); ?>";        
                    

      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%';
      $("#status").html(elem.style.width); 

    }

    if(width>=0){
        $(".msg").html('Accont Found');
    }
     if(width>=45){
        $(".msg").html('Fetching Details');
    }
     if(width>=75){
        $(".msg").html('Logging In');

    }
     if(width>=95){
        $(".msg").html('Welcome '+msg);

    }
  }

                    }
                }
            })
        });
    });
</script>

</body>




</html>