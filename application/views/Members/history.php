<?php include 'header.php'; ?>
<head>

  <link href="<?=base_url('assets/plugins/bootstrap-select/css/bootstrap-select.css');?>" rel="stylesheet" />

  
     <!-- Sweetalert Css -->
    <link href="<?=base_url('assets/plugins/sweetalert/sweetalert.css');?>" rel="stylesheet" />

<style type="text/css">
      #error_notify{
            animation-duration: 1s;
            animation-name: bounceInDown;
        }

        #error_notify2{
            animation-duration: 1s;
            animation-name: bounceInDown;
        }
         #success_notify{
            animation-duration: 1s;
            animation-name: bounceInDown;
        }
</style>
</head>
    <section class="content" >
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Driver / History
                </h2>
            </div>

             <div class="col-lg-4 " id="success_notify" style="cursor: pointer;float: right;margin-top: -50px;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:10px;">
                            <h4>Complain Added Successfully...</h4> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

                   <div class="col-lg-4 " id="error_notify" style="cursor: pointer;float: right;margin-top: -50px;display: none;">
                    <div class="info-box bg-red hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">remove</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:10px;">
                            <h4>Can't add empty Cost</h4> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>


  <div class="col-lg-4 " id="error_notify2" style="cursor: pointer;float: right;margin-top: -50px;display: none;">
                    <div class="info-box bg-red hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">remove</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:10px;">
                            <h4>Please Choose Bill </h4> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

  <div class="row clearfix">
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12" >
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                               <i class="material-icons" style="margin-top:-3px;float:left">person_pin_circle</i> CURRENT LOCATION
                            </h2>
                            
                        </div>
                        <div class="body">


<div id="map" style="width:100%;height:300px"></div>

<?php
    function getaddress($lat,$lng)
{
$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
$json = @file_get_contents($url);
$data=json_decode($json);
$status = $data->status;
if($status=="OK")
return $data->results[0]->formatted_address;
else
return false;
}
?>
 <?php
 

   $driver_id = $this->session->userdata('user');

      $this->db->where('driver',$driver_id);
    $car = $this->db->get('car')->result();
 foreach($car as $cr):{
    

$lat= 26.754347; //latitude
$lng= 81.001640; //longitude
$address= getaddress($cr->slet,$cr->slon);
if($address)
{
$d =  $address;
}
else
{
$d =  "Not found";
}

?>
<input type="text" class="sr-only" value="<?=$d?>" name="" id="data">
    <?php

}endforeach;

?>
<script>
function myMap() {
  <?php
 

   $driver_id = $this->session->userdata('user');

      $this->db->where('driver',$driver_id);
    $car = $this->db->get('car')->result();
 foreach($car as $cr):{
    ?>

    var myCenter = new google.maps.LatLng(<?=$cr->slet?>,<?=$cr->slon?>);


    <?php
 }endforeach;   
 
  ?>


  var mapCanvas = document.getElementById("map");
  var data = $("#data").val();
  var mapOptions = {center: myCenter, zoom: 8};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  google.maps.event.addListener(marker,'click',function() {
    var infowindow = new google.maps.InfoWindow({
        
      content:data

    
    });
  infowindow.open(map,marker);
  });
}
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5qO_RW-Cdss7x23G0rIL_3rmCbz3QNB4&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->



				</div>
                    </div>
                </div>
           




    
        
                       <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                HISTORY
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                           
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>KM</th>
                                            <th>Address</th>
                                            <th>Map</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>KM</th>
                                            <th>Address</th>
                                            <th>Map</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>



                                       <?php

                                        foreach($complains as $c):{
                                            
                                         /*   $this->db->where('id',$c->u_id);
                                            $user = $this->db->get('registration')->row(); */

                                            //Getting Department


                                           // $c->status;

                                      



                                            ?>

                                             <tr>
                                            
                                            
                                            <td><?=$c->date ?></td>
                                            <td><?=$c->time ?></td>

                                            <td>
                                          <div class="col-md-12">
                                    <input type="text" class="knob" value="<?=$c->km/100?>" data-width="60" data-height="60" data-thickness="0.16" data-fgColor="#9C27B0">

                                      <strong><?=$c->km?> KM</strong>
                                </div>
                                            </td>
                                            <td>
                                                

                                    <strong><?=$d?></strong>
                                </div>
                                            </td>
                                            <td>

                                                <button data-toggle="modal" data-target="defaultModa<?=$c->id?>" class="btn btn-default"><i class="material-icons">place</i></button>
                                                
                                                <input type="text" id="id<?=$c->id?>" class="sr-only" name="" value="<?=$c->id?>">
                                            </td>

                                            <td>
                                                <div class="js-sweetalert">
                                                <button class="btn bg-red btn-xs waves-effect" data-type="confirm" id="Remove<?=$c->id?>" ><i class="material-icons">remove</i></button>
                                            </div>

                                              
                                            </td>

                                          
                                        </tr>

                                        <script type="text/javascript">
    $(document).ready(function() {

         $("#Remove<?=$c->id?>").click(function(){
            var id = $("#id<?=$c->id?>").val();

            $.ajax({
                url:'<?= site_url("Admin/remove_complain"); ?>',
                type:'post',
                  data:'comp_id='+id,
                success:function(msg){
                   // location.reload(true);
                }
            })
        });
    });
</script>


<!-- Default Size -->
            <div class="modal fade" id="defaultModa<?=$c->id?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                            vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                            Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                            nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                            Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

                                       
                                       <?php
                                        }endforeach;
                                       ?>
                                    </tbody>

         
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
      <script src="<?= base_url('assets/plugins/jquery/jquery.min.js');?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.js');?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?= base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js');?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js');?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/plugins/node-waves/waves.js');?>"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-datatable/jquery.dataTables.js');?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js');?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js');?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js');?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/extensions/export/jszip.min.js');?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js');?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js');?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js');?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js');?>"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/js/admin.js');?>"></script>
    <script src="<?= base_url('assets/js/pages/tables/jquery-datatable.js');?>"></script>


      <script src="<?=base_url('assets/plugins/sweetalert/sweetalert.min.js');?>"></script>

    <!-- Custom Js -->
    
    <script src="<?=base_url('assets/js/pages/ui/dialogs.js')?>"></script>

    <!-- Demo Js -->
    <script src="<?=base_url('assets/js/demo.js');?>"></script>

   
<script type="text/javascript">
   function showConfirmMessage() {
    swal({
        title: "Oops !",
        text: "You Dont have right to remove it...",
        type: "warning",
        showCancelButton: false,
        confirmButtonColor: "#03A9F4",
        confirmButtonText: "OK",
        closeOnConfirm: true
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");

        location.reload(true);
    });
}
   </script>
   <script type="text/javascript">
       $(function () {
    $('.js-sweetalert button').on('click', function () {
        var type = $(this).data('type');
        if (type === 'basic') {
            showBasicMessage();
        }
        
        else if (type === 'success') {
            showSuccessMessage();
        }
       
         });
});
   </script>

    <script type="text/javascript">
    $(document).ready(function() {
       

            
        $("#login").click(function(){
           var c = $("#comp").val();

           if (c=='') {

                $("#error_notify").fadeIn();

               setInterval(function(){$("#error_notify").fadeOut('slow')},6000);
           }else{
             $.ajax({
                url:'<?= site_url("Members/insert_complain"); ?>',
                type:'post',
                data:$("form").serialize(),
                success:function(msg){
                    
                     //window.location.replace("<?= site_url('Members/Complains'); ?>");        
                   location.reload(true);

                  
                }
            });
           }
        });
    });


  
</script>

 <script type="text/javascript">
    $(document).ready(function() {
       

            
        $("#upload_bill").click(function(){
           var c = $("#bill").val();

           if (c=='') {

                $("#error_notify2").fadeIn();

               setInterval(function(){$("#error_notify2").fadeOut('slow')},6000);
           }else{
             $.ajax({
                url:'<?= site_url("Members/insert_complain"); ?>',
                type:'post',
                data:$("form").serialize(),
                success:function(msg){
                    
                     //window.location.replace("<?= site_url('Members/Complains'); ?>");        
                   location.reload(true);

                  
                }
            });
           }
        });
    });


  
</script>


    <script src="<?= base_url('assets/js/pages/ui/modals.js')?>"></script>

      <!-- Jquery Knob Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>

    <!-- Custom Js -->
   
    <script src="<?= base_url('assets//js/pages/charts/jquery-knob.js');?>"></script>

</script>
</body>

</html>
