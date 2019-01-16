<?php include 'header.php'; ?>

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
                                        </tr>
                                       
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

    <!-- Demo Js -->
    <script src="<?=base_url('assets/js/demo.js');?>"></script>
</body>

</html>
