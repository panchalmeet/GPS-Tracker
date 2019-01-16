<?php include 'header.php'; ?>
<head>
     <!-- Sweetalert Css -->
    <link href="<?=base_url('assets/plugins/sweetalert/sweetalert.css');?>" rel="stylesheet" />
</head>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Admin / Members
                </h2>
            </div>
                       <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                MEMBERS
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
                                            <th>Sr No</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Role</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Role</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php

                                       $i = 1;

                                       foreach($members as $m):
                                        {

                                            $this->db->where('dept_code',$m->branch_id);

                                           $department =  $this->db->get('department')->row();
                                            
                                            switch ($m->type) {
                                                case '3':
                                                    $role = 'Principal';
                                                    break;

                                                      case '4':
                                                    $role = 'Comitee Member';
                                                    break;

                                                      case '2':
                                                    $role = 'Admin';
                                                    break;

                                                      case '1':
                                                    $role = 'User';
                                                    break;
                                                
                                               
                                            }

                                        ?>

                                         <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$m->fname." ".$m->lname?></td>
                                            <td><?=$department->name?></td>
                                            <td><?=$role?></td>
                                            <td><?=$m->number?></td>
                                            <td><?=$m->email?></td>
                                            <td>

                                                  <input type="text" class="sr-only" id="id<?=$m->id?>" value="<?=$m->id?>">

                                               
                                               
                                                             <a data-toggle="modal" data-target="#smallModal<?=$m->id?>" class="btn btn-danger btn-xs waves-effect"><i class="material-icons">remove</i></a>


                                                              
                                                         </td>
                                                     
                                        </tr>
                                            

                                      


                                              <!-- Small Size -->
            <div class="modal fade" id="smallModal<?=$m->id?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Remove User</h4>
                        </div>
                        <div class="modal-body">
                           <h3 class="text-center">Are You Sure !</h3>
                        </div>
                        <div class="modal-footer  js-sweetalert">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancle</button>
                           
                                
                            
                                    <button class="btn btn-primary waves-effect" id="Remove<?=$m->id?>" data-type="success" data-dismiss="modal">Sure</button>
                    
                                            
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript">
    $(document).ready(function() {
           
       

         $("#Remove<?=$m->id?>").click(function(){
             var id = $("#id<?=$m->id?>").val();
            $.ajax({
                url:'<?= site_url("Admin/remove_member"); ?>',
                type:'post',
                  data:'user_id='+id,
                success:function(msg){
                    //alert(id);
                
                }
            })
        });
    });
</script>


                                        </tr>

                                        <?php
                                        $i = $i+1;
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
    swal("Good job!", "User Removed Successfully!", "success");

     
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
