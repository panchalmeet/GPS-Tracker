<?php include 'header.php'; ?>
<head>
     <!-- Sweetalert Css -->
    <link href="<?=base_url('assets/plugins/sweetalert/sweetalert.css');?>" rel="stylesheet" />
</head>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Admin / Complains
                </h2>
            </div>
                       <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                      
                            <h2>
                                COMPLAINS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Dept</th>
                                            <th>Complain</th>
                                            <th>Status</th>
                                             <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Dept</th>
                                            <th>Complain</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>



                                       <?php

                                        foreach($complains as $c):{
                                            
                                            $this->db->where('id',$c->u_id);
                                            $user = $this->db->get('registration')->row();

                                            //Getting Department

                                            $this->db->where('id',$c->c_dept);
                                            $department = $this->db->get('department')->row();

                                            $type = $user->type;

                                           // $c->status;


                                            switch ($c->Status) {
                                                case '0':
                                                    $status = 'Pending';
                                                    break;

                                                   case '1':
                                                    $status = 'In Progress';
                                                    break;

                                                       case '2':
                                                    $status = 'Solved';
                                                    break;
                                                
                                              
                                            }

                                            switch ($type) {
                                                case '1':
                                                    $type = 'User';
                                                    break;
                                                case '3':
                                                    $type = 'Principal';
                                                    break;    
                                               
                                            }



                                            ?>

                                             <tr>
                                            <td><?=$user->fname." ".$user->lname?></td>
                                            <td><?=$type?></td>
                                            
                                            <td><?=$department->name?></td>
                                            <td><?=$c->complain?></td>
                                            <td><?=$status?></td>
                                            <td><?=$c->c_date?></td>
                                            <td>


                                                             <a data-toggle="modal" data-target="#smallModal<?=$c->id?>" class="btn btn-info btn-xs waves-effect"><i class="material-icons">check</i></a>


                                                                  <a data-toggle="modal" data-target="#smallModal2<?=$c->id?>" class="btn btn-danger btn-xs waves-effect"><i class="material-icons">remove</i></a>
                                                         </td>

                                                       
                                                        <input type="text" class="sr-only" id="id<?=$c->id?>" name="comp_id" value="<?=$c->id?>">
                                                   
                                                     
                                        </tr>
                                            

                                      


                                              <!-- Small Size -->
            <div class="modal fade" id="smallModal<?=$c->id?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Aproove Complain</h4>
                        </div>
                        <div class="modal-body">
                           <h3 class="text-center">Are You Sure !</h3>
                        </div>
                        <div class="modal-footer  js-sweetalert">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancle</button>
                           
                                
                            
                                    <button class="btn btn-primary waves-effect" id="Accept<?=$c->id?>" data-type="success" data-dismiss="modal">Sure</button>
                    
                                            
                        </div>
                    </div>
                </div>
            </div>


                                  <!-- Small Size -->
            <div class="modal fade" id="smallModal2<?=$c->id?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Remove Complain</h4>
                        </div>
                        <div class="modal-body">
                           <h3 class="text-center">Are You Sure !</h3>
                        </div>
                        <div class="modal-footer  js-sweetalert">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancle</button>
                           
                                
                            
                                    <button class="btn btn-primary waves-effect" id="Remove<?=$c->id?>" data-type="delete" data-dismiss="modal">Sure</button>
                    
                                            
                        </div>
                    </div>
                </div>
            </div>


<script type="text/javascript">
    $(document).ready(function() {
            var id = $("#id<?=$c->id?>").val();
        $("#Accept<?=$c->id?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/accept_complain"); ?>',
                type:'post',
                data:'comp_id='+id,
                success:function(msg){
                    
  
                }
            })
        });



         $("#Remove<?=$c->id?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/remove_complain"); ?>',
                type:'post',
                  data:'comp_id='+id,
                success:function(msg){
                
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

      <script src="<?=base_url('assets/plugins/sweetalert/sweetalert.min.js');?>"></script>

    <!-- Custom Js -->
    
    <script src="<?=base_url('assets/js/pages/ui/dialogs.js')?>"></script>
    <script src="<?= base_url('assets/js/admin.js');?>"></script>
    <script src="<?= base_url('assets/js/pages/tables/jquery-datatable.js');?>"></script>

    <!-- Demo Js -->
    <script src="<?=base_url('assets/js/demo.js');?>"></script>

            
   <script type="text/javascript">
       function showSuccessMessage() {
    swal("Good job!", "Complain Aprooved Successfully!", "success");

     
}

function showSuccessMessage2() {
    swal("Good job!", "Complain Deleted Successfully!", "success");
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
        else if (type === 'delete') {
            showSuccessMessage2();
        }
         });
});
   </script>
    <script src="<?base_url('assets/js/pages/ui/modals.js')?>"></script>
</body>     

</html>
