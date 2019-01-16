<?php

    include 'header.php';
 ?>

     <style type="text/css">
        #insert_notify{
            animation-duration: 1s;
            animation-name: bounceInDown;
        }
          #delete_notify{
            animation-duration: 1s;
            animation-name: bounceInDown;
        }
         #update_notify{
            animation-duration: 1s;
            animation-name: bounceInDown;
        }
            </style>

    <!-- Bootstrap Core Css -->

    <!-- Waves Effect Css -->

    <!-- Animation Css -->

    <!-- Custom Css -->

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
   

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DASHBOARD / DEPARTMENT
                   
                </h2>
            </div>
            <!-- Basic Validation -->
              <div class="row clearfix">
                 <div class="col-lg-3" id="insert_notify" style="cursor: pointer;float: right;margin-top: -50px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">library_add</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:4px;">
                            <h4>Department Added Successfully..</h4> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>


            <div class="row clearfix">
                 <div class="col-lg-3" id="update_notify" style="cursor: pointer;float: right;margin-top: -50px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:4px;">
                            <h4>Department Changed Successfully..</h4> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

                   <div class="row clearfix">
                 <div class="col-lg-3" id="alert_notify" style="cursor: pointer;float: right;margin-top: -50px;position: relative;display: none;margin-right: 20px;">
                    <div class="info-box bg-red hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">error</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:4px;">
                            <h5>Please Provide Details..</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

                  <div class="row clearfix">
                 <div class="col-lg-3" id="delete_notify" style="cursor: pointer;float: right;margin-top: -50px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">delete</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:4px;">
                            <h4>Department Removed Successfully..</h4> 

                                      

                            </div>
                           
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="row clearfix">
                <div class="col-lg-5 ">
                    <div class="card">
                        <div class="header">
                            <h2>  ADD DEPARTMENT</h2>
                           
                        </div>
                        <div class="body">
                            <form id="form_validation" method="post" action="">
                               

                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" id="name" required>
                                        <label class="form-label">Department Name</label>
                                    </div>
                                </div>


                                  <div class="form-group form-float">
                                    <div class="form-line">
                                        

                                        <select name="color">
                                            <option class="btn btn-danger" value="danger" >Red</option>
                                            <option class="btn btn-info" value="info"  >Blue</option>
                                            <option class="btn btn-success"  value="success" >Green</option>
                                            <option class="btn btn-default" value="default"  >White</option>
                                            <option class="btn btn-primary" value="primary"  >Violet</option>
                                            <option class="btn btn-warning" value="warning"  >Orange</option>
                                        </select>
                                    </div>
                                </div>
                              

                                <button class="btn btn-primary waves-effect" type="button" id="insert"> SUBMIT  </button>
                            </form>
                        </div>
                    </div>
                </div>
            
            <!-- #END# Basic Validation -->

 <div class="row clearfix">
                <div class="col-lg-6 ">
                    <div class="card">
                        <div class="header">
                            <h2>  DEPARTMENTS</h2>
                           
                        </div>
                        <div class="body">
                            <div class="">
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Department Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ajaxdata">
                                                
                                            <?php 
                                            $i = 1;
                                            foreach($depts as $d):
                                            {
                                                ?>

                                         <tr>
                                            <td><?=$i ?></td>
                                            <td><button class="btn btn-<?= $d->color?>"><?= $d->title ?></button></td>
                                            <td> <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?= $d->id ?>"> <i class="material-icons">edit</i> </button>
</td>
                                            <td><button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#trash<?= $d->id ?>" ><i class="material-icons">delete</i></button></td>
                                            
                                        </tr>
           


  <!-- Modal -->
  <div class="modal fade" id="myModal<?= $d->id?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> <i class="glyphicon glyphicon-edit"></i> Edit <?= $d->title?> </h4>
        </div>
        <div class="modal-body">
         <form id="update_form<?= $d->id ?>" method="post" action="<?= site_url('Admin/change_department'); ?>">
                               

                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="ename" value="<?= $d->title ?>"  required>
                                        <label class="form-label">Department Name</label>
                                    </div>
                                </div>



                                <input type="text" value="<?= $d->id ?>" name="id" class="sr-only">
                                <button class="btn btn-primary waves-effect" type="button" id="update_dept<?= $d->id ?>" data-dismiss="modal" > SUBMIT  </button>
                            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!--EDT END-->



  <!-- Modal -->
  <div class="modal fade" id="trash<?= $d->id ?>" role="dialog">
    <div class="modal-dialog" style="    margin-left: 629px;
    width: 22%;
    margin-top: 131px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header btn-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove <?= $d->title?></h4>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Are You Sure ?</h3><br>
        <form method="post" action="<?= site_url('Admin/remove_department') ?>" id="delete_form<?= $d->id ?>" >
              <input type="text" value="<?= $d->id ?>" name="id" class="sr-only">
          <button class="btn btn-success" style="margin-left: 60px;" type="button" id="delete_dept<?= $d->id ?>" data-dismiss="modal" >Yeah Sure !</button>
        </form>
          <button class="btn btn-danger">Cancel</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!--Delete End-->


  <script type="text/javascript">
      $(document).ready(function(){
              //AJAX FOR Deletion

    $("#delete_dept<?= $d->id ?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/remove_department") ?>',
                type:'post',
                data:$("#delete_form<?= $d->id ?>").serialize(),
                success:function(){
                     $("#ajaxdata").load('<?= site_url("Admin/ajax_dept") ?>');
                     $("#delete_notify").fadeIn('slow');
                setInterval(function(){$("#delete_notify").fadeOut('slow');},6000);

                }
            });
        });       
    });
  </script>



  <script type="text/javascript">
      $(document).ready(function(){
              //AJAX FOR Deletion

    $("#update_dept<?= $d->id ?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/change_department") ?>',
                type:'post',
                data:$("#update_form<?= $d->id ?>").serialize(),
                success:function(){
                     $("#ajaxdata").load('<?= site_url("Admin/ajax_dept") ?>');
                      $("#update_notify").fadeIn('slow');
                setInterval(function(){$("#update_notify").fadeOut('slow');},6000);

                }
            });
        });       
    });
  </script>


                                                <?php
                                           
                                                $i = $i+1;
                                            }
                                             endforeach;
                                            ?>

                                        




                                 
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                
            </div>
            <!-- #END# Basic Validation -->
           
        </div>

 

            </div>
    </section>

<script type="text/javascript">
    $(document).ready(function(){
      
        //AJAX FOR Insertion Level

       $("#insert").click(function(){
        var name = $("#code").val();
        var level = $("#name").val();

        if (name == '' || level == '') {
                $("#alert_notify").fadeIn('slow');
                setInterval(function(){$("#alert_notify").fadeOut('slow');},6000);

        
    }else{
        
        $.ajax({
            url:'<?php echo site_url("Admin/insert_department"); ?>',
            type:'post',
            data:$("#form_validation").serialize(),
            success:function(){
                
                $("#ajaxdata").load('<?= site_url("Admin/ajax_dept") ?>');

                $("#insert_notify").fadeIn('slow');

                $("#code").val('');

                $("#name").val('');

                setInterval(function(){$("#insert_notify").fadeOut('slow');},6000);
            }
        });
    }
       });
    

    }); 
</script>

    <!-- Jquery Core Js -->

    <!-- Bootstrap Core Js -->

    <!-- Select Plugin Js -->

    <!-- Slimscroll Plugin Js -->


   <?php include 'footer.php'; ?>
</body>

</html>