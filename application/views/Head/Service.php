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
                   Head / Services
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


                 <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SERVICES
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Date</th>
                                            <th>Vehicle</th>
                                            <th>Estimate Cost</th>
                                            <th>KM</th>
                                            <th>Total KM</th>
                                            <th>Status</th>
                                            <th>Bill</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                             
                                            <th>Date</th>
                                               <th>Vehicle</th>
                                            <th>Estimate Cost</th>
                                            <th>KM</th>
                                            <th>Total KM</th>
                                            <th>Status</th>

                                             <th>Bill</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>



                                       <?php

                                        foreach($complains as $c):{



                                            
                                           $this->db->where('id',$c->car);
                                            $car = $this->db->get('car')->row(); 

                                            //Getting Department


                                           // $c->status;


                                            switch ($c->status) {
                                                case '0':
                                                    $status = 'Pending';
                                                    $color = 'danger';
                                                    break;

                                                   case '1':
                                                    $status = 'In Progress';
                                                    $color = 'warning';

                                                    break;

                                                       case '2':
                                                    $status = 'Completed';
                                                    $color = 'info';

                                                    break;
                                                
                                              
                                            }

                                      



                                            ?>

                                             <tr>
                                            
                                            
                                            <td><?=$c->date ?></td>
                                            <td><?=$car->number?></td>
                                            <td><?php 
                                            if ($c->cost=='') {
                                                echo "<strong>Not Available</strong>";
                                            }else{
                                               echo  $c->cost;
                                            }
                                            ?></td>
                                            <td>
                                          <div class="col-md-12">
                                    <input type="text" class="knob" value="<?=$c->current_distance/5?>" data-width="60" data-height="60" data-thickness="0.16" data-fgColor="#9C27B0">

                                      <strong><?=$c->current_distance?> KM</strong>
                                </div>
                                            </td>
                                            <td>
                                                

                                    <strong><?=$c->total_distance?> KM</strong>
                                </div>
                                            </td>
                                            <td>

                                                <button class="btn bg-light-green"  data-toggle="modal" data-target="#myModal<?=$c->id?>"><i class="material-icons">map</i></button>

                                                <strong><?=$status?></strong>
                                                
                                                <input type="text" id="id<?=$c->id?>" class="sr-only" name="" value="<?=$c->id?>">
                                            </td>

                                            <td>
                                                <?php

                                                if ($c->bill=='') {
                                                    echo "Not Available";
                                                }else{
                                                    ?>
                                                    <button class="btn btn-warning"   data-toggle="modal" data-target="#bill<?=$c->id?>" ><i class="material-icons">assignment_turned_in</i></button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="js-sweetalert">
                                                <button class="btn bg-red btn-xs waves-effect" data-type="confirm" id="Remove<?=$c->id?>" ><i class="material-icons">remove</i></button>
                                            </div>

                                              
                                            </td>

                                          
                                        </tr>

                                        <!-- Modal -->
  <div class="modal fade" id="myModal<?=$c->id?>" role="dialog">
    <div class="modal-dialog modal-sm" style="margin-top: 200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Status</h4>
        </div>
        <div class="modal-body">
          <p style="align-items: center;">
                     <div class="js-sweetalert">

                          <button class="btn btn-warning"  data-type="aproove" id="aproove<?=$c->id?>" >Aprooved</button>
                <button class="btn btn-success"  data-type="complete" id="complete<?=$c->id?>" >Completed</button>
                                                
             
          </p>
        </div>
       
      </div>
      
    </div>
  </div>



</div>
  


  <!--MODAL BILL-->

    <div class="modal fade" id="bill<?=$c->id?>" role="dialog">
    <div class="modal-dialog modal-sm" style="margin-top: 200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body" style="padding: 0px;">
         <img src="<?=base_url('assets/images/'.$c->bill);?>" style="height: 100%;width: 100%;">
        </div>
       
      </div>
      
    </div>
  </div>
  




                                        <script type="text/javascript">
    $(document).ready(function() {

         $("#Remove<?=$c->id?>").click(function(){
            var id = $("#id<?=$c->id?>").val();

            $.ajax({
                url:'<?= site_url("Head/remove_complain"); ?>',
                type:'post',
                  data:'comp_id='+id,
                success:function(msg){
                   // location.reload(true);
                }
            })
        });
    });
</script>




 <script type="text/javascript">
    $(document).ready(function() {

         $("#aproove<?=$c->id?>").click(function(){
            var id = $("#id<?=$c->id?>").val();
            var status = '1';
            $.ajax({
                url:'<?= site_url("Head/update_status"); ?>',
                type:'post',
                   data:'status='+status+id,
                success:function(msg){
                   // location.reload(true);
                }
            })
        });
    });
</script>

 <script type="text/javascript">
    $(document).ready(function() {

         $("#complete<?=$c->id?>").click(function(){
            var id = $("#id<?=$c->id?>").val();
            var status = '2';

            $.ajax({
                url:'<?= site_url("Head/update_status"); ?>',
                type:'post',
                  data:'status='+status+id,
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
        text: "Service deleted Successfully...",
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

    function showAprooveMessage() {
    swal({
        title: "Aprooved !",
        text: "Service Aprooved Successfully...",
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

    function showCompleteMessage() {
    swal({
        title: "Completed !",
        text: "Service Completed Successfully...",
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
        
        else if (type === 'aproove') {
            showAprooveMessage();
        }
          else if (type === 'complete') {
            showCompleteMessage();
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
