<?php include 'header.php'; ?> 
    <style type="text/css">

.image {
  opacity: 1;
  display: block;
    border-radius: 100%; 
  transition: .5s ease;
  backface-visibility: hidden;
  
  animation-duration: 2s;
  animation-name: flash; 
}

.image:hover{
    opacity: 0.3;
}



.text{
    margin-top: -39%;
margin-left: 15%;
opacity: 0;
}
#detail_notify{
    animation-name: bounceInDown;
    animation-duration: 1s;
}
#profile_notify{
    animation-name: bounceInDown;
    animation-duration: 1s;
    cursor: pointer;float: right;margin-top: -50px;position: relative;background: #fff;margin-bottom: 20px;display: none;
}



#alert_notify{
    animation-name: bounceInDown;
    animation-duration: 1s;
}



@media and screen(max-width: 400px) {

}

    </style>
  
</head>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Admin / Profile
                   
                </h2>
            </div>

             <div class="col-lg-4 " id="detail_notify" style="cursor: pointer;float: right;margin-top: -50px;display: none;">
                    <div class="info-box bg-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:10px;">
                            <h4>Profile Updated Successfully...</h4> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

                 <div class="row clearfix">
                 <div class="col-lg-3" id="alert_notify" style="cursor: pointer;float: right;margin-top: -50px;position: fixed;display: none;margin-right: 20px;">
                    <div class="info-box bg-red hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">error</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:4px;">
                            <h5>Please Choose Profile Picture</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>


             <div class="col-lg-4 " id="profile_notify" >
                     <li style="list-style: none;">
                                       
                                            <h6>
                                               <strong class="msg">Progress</strong>
                                                <big class="pull-right" id="status">0%</big>
                                            </h6>
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-green progress-bar-striped active" id="myBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                </div>
                                            </div>
                                        
                                    </li>
                </div>

             <div class="row clearfix">
                <div class="col-lg-5 " style="margin-top: 40px;">
                    <div class="card">
                        <div class="header">
                            <h2>  YOUR PROFILE</h2>
                            
                        </div>
                        <div class="body">
                           
                                                           
                             <div style="height:0px;overflow:hidden">

                                <form id="uploadForm" method="post" action="">
   <input type="file" id="fileInput" name="fileInput" />

   
</div>
<div class="container" id="data">
    <?php

    foreach($data as $d):
    {

        ?>
        <img src="<?= base_url('assets/images/'.$d->img); ?>" onclick="chooseFile()" style="cursor: pointer; height: 300px;width:300px" class="image img-thumbnail" >
    <input type="text" value="<?=$d->id?>" name="id" class="sr-only">

        <input type="submit" name="upload" id="upload" value="UPLOAD" class="btn btn-primary">
        <?php

    }
endforeach;
    ?>
</form>
</div>


<script>
   function chooseFile() {
      $("#fileInput").click();
   }
</script>
<script>
   function chooseFile() {
      document.getElementById("fileInput").click();
   }
</script>
                        </div>  
                    </div>
                </div>
      

      <script type="text/javascript">
$(document).ready(function (e) {
    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();

        if ($("#fileInput").val()=='') {
            $("#alert_notify").fadeIn('slow');
            setInterval(function(){$("#alert_notify").fadeOut('slow')},6000);
        }else{
            $.ajax({
            url: "<?= site_url('Members/change_profile_pic') ?>", 
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(msg)
            {
                if (msg=='Some Error Occured while uploading this file') {
                    alert(msg);
                }else{


                    $("#profile_notify").fadeIn('slow');


                    setInterval(function(){$("#profile_notify").fadeOut('slow');},6000);


var elem = document.getElementById("myBar");
var status = document.getElementById("status");   

  var width = 1;
  var id = setInterval(frame, 40);

  $(".msg").css('font-size','20px');
  function frame() {
    if (width >= 100) {
        $(".msg").html('All Done, Looking Good');
                    $("#data").load("<?= site_url('Members/ajax_profile_pic') ?>");
                      $(".user_data").load('<?= site_url("Members/user_detail"); ?>').fadeIn();
                     

      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%';
      $("#status").html(elem.style.width); 

    }

    if(width>=0){
        $(".msg").html('Uploading');
    }
     if(width>=45){
        $(".msg").html('Setting up');
    }
     if(width>=75){
        $(".msg").html('Almost There');
    }
     if(width>=95){
        $(".msg").html('All Done, Looking good');
    }
  }
                }
            },
            error: function() 
            {
            }           
       });
        }
    }));
});
</script>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-5 " style="margin-top: 40px;">
                    <div class="card">
                        <div class="header">
                            <h2>  DETAILS</h2>
                            
                        </div>
                        <div class="body" id="data">
                           <?php

                            foreach($data as $d):
                            {
                                ?>
                                 <form id="form_validation<?= $d->id  ?>" method="post" action="">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="fname" class="form-control" value="<?= $d->name?>" name="fname" required>
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>


                             

                                   <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?= $d->email ?>" name="email" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>

                                <!--
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label>Department</label>
                                                    <select name="dept" required>
                                                      
                                                        <option value="" ><?= $d->department_id ?></option>


                                                           
                                                    </select>

                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label>Designation</label>
                                                   <select name="level" required>
                                                        
                                                        <option value="" ><?= $d->designation_id?></option>


                                                          
                                                    </select>

                                            </div>
                                </div>

                            -->


                                

                                   <input type="text" name="id" value="<?= $d->id ?>" class="sr-only">
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?= $d->number ?>" name="mobile" required>
                                        <label class="form-label">Mobile</label>
                                    </div>
                                </div>
                                
                              

                                <button class="btn btn-primary waves-effect" type="button" id="submit<?= $d->id ?>"> SUBMIT  </button>
                            </form>
                        </div>
                    </div>
                </div>



<script type="text/javascript">
    $(document).ready(function(){
        $("#submit<?= $d->id ?>").click(function(){

                
            $.ajax({
                    url:'<?= site_url("Members/update_profile") ?>',
                    type:'post',
                    data: $("#form_validation<?= $d->id ?>").serialize(),
                    success:function(msg){
                        
                       // $("#data").load("<= site_url('Member_login/ajax_profile') ?>");
                        $("#detail_notify").fadeIn('slow');

                        setInterval(function(){$("#detail_notify").fadeOut('slow')},6000);
                    }
            });
        });
    });
</script>
                <?php
                            }
                        endforeach;
                           ?>
            
            <!-- #END# Basic Validation -->


 

            </div>
    </section>

<script type="text/javascript">
    $(".image").mouseover(function(){
        $(".middle").show();
    });



</script>

    <!-- Jquery Core Js -->

    <!-- Bootstrap Core Js -->

    <!-- Select Plugin Js -->

    <!-- Slimscroll Plugin Js -->


<?php include 'footer.php'; ?>
</body>

</html>