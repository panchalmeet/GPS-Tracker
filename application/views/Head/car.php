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
                   Head / Car
                </h2>
            </div>

             <div class="col-lg-4 " id="success_notify" style="cursor: pointer;float: right;margin-top: -50px;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:10px;">
                            <h4>Vehicle Added Successfully...</h4> 

                                      

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
                            <h4>Provide All Data</h4> 

                                      

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
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                               <i class="material-icons" style="margin-top:-3px;float:left">add</i> ADD VEHICLE
                            </h2>
                            
                        </div>
                        <div class="body">

                          <form id="myForm">
                <label>Vehicle No</label>
                 <div class="row clearfix">
                                <div class="col-lg-12">
                
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="number" class="form-control" id="number" placeholder="number" />
                                        </div>
                                    </div>

                                          <label>Type</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="type" class="form-control" id="type" placeholder="type" />
                                        </div>
                                    </div>

                                      <label>Vehicle IP</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="ip" class="form-control" id="ip" placeholder="ip" />
                                        </div>
                                    </div>
                               

                <label>Driver</label>
                   
                                    <select class="" name="driver">
                               
                                      <?php

                                      $this->db->where('type','1');
                                      $data  = $this->db->get('registration')->result();

                                      foreach($data as $d):{

                                        ?>

                                        <option value="<?=$d->id?>"><?=$d->name?></option>
                                        <?php

                                      }endforeach;

                                      ?>
                                    </select>

                                    </form>
                              


                                    </div>

    
 </div>
<button class="btn btn-primary  btn-sm" id="login">SUBMIT</button>
                        </div>
                    </div>
                </div>
           



          
                       <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VEHICLES
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                           
                                          
                                            <th>Number</th>
                                            <th>KM</th>
                                            <th>Total Km</th>
                                             <th>Services</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                        
                                            <th>Number</th>
                                            <th>KM</th>
                                            <th>Total Km</th>
                                             <th>Services</th>
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
                                            
                                            
                                            
                                            <td><?=$c->number?></td>
                                            <td>
                                          <div class="col-md-12">
                                    <input type="text" class="knob" value="<?=$c->km/5?>" data-width="60" data-height="60" data-thickness="0.16" data-fgColor="#9C27B0">

                                      <strong><?=$c->km?> KM</strong>
                                </div>
                                            </td>
                                            <td>
                                                

                                    <strong><?=$c->total?> KM  </strong>
                                </div>

                                <input type="text" class="sr-only" name="id" value="<?=$c->id?>" id="id<?=$c->id?>">
                                            </td>
                                            <td><?=$c->service?></td>
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
                url:'<?= site_url("Head/remove_vehicle"); ?>',
                type:'post',
                  data:'comp_id='+id,
                success:function(msg){
                   // location.reload(true);
                }
            })
        });
    });
</script>
                                       
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
        title: "Deleted !",
        text: "Vehicle deleted Successfully...",
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#03A9F4",
        confirmButtonText: "OK",
        closeOnConfirm: true
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");

        location.reload(true);

    });
}


 function showAdd() {
    swal({
        title: "Good Job !",
        text: "Vehicle added Successfully...",
        type: "success",
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

        else if (type === 'add') {
            showAdd();
        }
       
         });
});
   </script>

    <script type="text/javascript">
    $(document).ready(function() {
       

            
        $("#login").click(function(){
           var n = $("#number").val();
           var t = $("#type").val();
           var ip = $("#ip").val();

           if (n==''||t==''||ip=='') {

                $("#error_notify").fadeIn();

               setInterval(function(){$("#error_notify").fadeOut('slow')},6000);
           }else{
             $.ajax({
                url:'<?= site_url("Head/insert_vehicle"); ?>',
                type:'post',
                data:$("#myForm").serialize(),
                success:function(msg){
                    
                     //window.location.replace("<?= site_url('Members/Complains'); ?>");        
                   //location.reload(true);
                   showAdd();

                  
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
