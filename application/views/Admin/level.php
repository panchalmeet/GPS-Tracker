
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    
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

</head>
<?php include 'header.php'; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DASHBOARD / DESIGNATION LEVEL
                   
                </h2>
            </div>
            <!-- Basic Validation -->

            <div class="row clearfix">
                 <div class="col-lg-4" id="insert_notify" style="cursor: pointer;float: right;margin-top: -50px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">library_add</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:4px;">
                            <h4>Designation Added Successfully</h4> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>


            <div class="row clearfix">
                 <div class="col-lg-4" id="update_notify" style="cursor: pointer;float: right;margin-top: -50px;position: relative;display: none;">
                    <div class="info-box bg-light-0green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:4px;">
                            <h4>Designation Changed Successfully</h4> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

                  <div class="row clearfix">
                 <div class="col-lg-4" id="delete_notify" style="cursor: pointer;float: right;margin-top: -50px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">delete</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:4px;">
                            <h4>Designation Removed Successfully</h4> 

                                      

                            </div>
                           
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 " style="margin-left: 30px;">
                    <div class="card">
                        <div class="header">
                            <h2>  ADD DESIGNATION LEVEL</h2>

                        </div>
                        <div class="body">
                            <form id="form_validation" method="post" action="">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="level">
                                            <?php
                                            foreach($department as $d):{
                                                ?>

                                            <option value="<?=$d->id ?>"><?= $d->title ?></option>
                                            <?php
                                            }endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" placeholder="Designation Name" id="level" required>
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
                              

                                <button class="btn btn-primary waves-effect" id="insert" type="button"> SUBMIT  </button>
                            </form>
                        </div>
                    </div>
                </div>
            
            <!-- #END# Basic Validation -->

 <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> LEVEL DETAILS</h2>
                           
                        </div>
                        <div class="body">
                            <div class="">
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Designation Name</th>
                                                <th>Department</th>
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
                                            <td><?= $i ?></td>
                                            <td><button class="btn btn-<?= $d->color?>"><?= $d->title ?></button></td>
                                            <td>
                                                
                                                <?php
                                                $this->db->where('id',$d->level);
                                                $datas = $this->db->get('department');
                                                $datas = $datas->result();

                                                foreach($datas as $data):{
                                                        echo $data->title;
                                                     }
                                                endforeach;



                                                ?> 

                                            </td>
                                            <td> <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?= $d->id ?>"> <i class="material-icons">edit</i> </button>
</td>
                                            <td><button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#delete<?= $d->id ?>" ><i class="material-icons">delete</i></button></td>
                                            
                                        </tr>


                                    




  <!-- Modal -->
  <div class="modal fade" id="myModal<?= $d->id?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> <i class="glyphicon glyphicon-edit"></i> Edit <?= $d->title?> </h4>
        </div>
        <div class="modal-body">
         <form id="form_validation" class="update_form<?= $d->id ?>" method="post" action="<?= site_url(''); ?>">
                                <div class="form-group form-float">

                                    <div class="">
                                   <strong> Department :</strong>
                                            <?php
                                            foreach($department as $s):{
                                                ?>

                                                 <input type="radio" name="gender" id="<?= $s->title.$d->id ?>" class="with-gap" value="<?= $s->id ?>"  required>
                                    <label for="<?= $s->title.$d->id ?>" class="m-l-20"><?= $s->title ?></label>
                                            <?php
                                            }endforeach;
                                            ?>
                                    </div>
                                </div>



                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="ename" value="<?= $d->title ?>"  required>
                                    </div>
                                </div>



                                <input type="text" value="<?= $d->id ?>" name="id" class="sr-only">
                                <button class="btn btn-primary waves-effect" data-dismiss="modal" type="button" id="update_level<?= $d->id ?>" > SUBMIT  </button>
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
  <div class="modal fade" id="delete<?= $d->id ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove <?= $d->title?></h4>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Are You Sure ?</h3><br>
        <form method="post" action="" id="delete_form<?= $d->id ?>">
              <input type="text" value="<?= $d->id ?>" name="id" class="sr-only">
          <button class="btn btn-success" id="delete_level<?= $d->id ?>" data-dismiss="modal"  type="button" style="margin-left: 35%;">Yeah Sure !</button>
        </form>
          <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
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

    $("#delete_level<?= $d->id ?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/remove_level") ?>',
                type:'post',
                data:$("#delete_form<?= $d->id ?>").serialize(),
                success:function(){
                     $("#ajaxdata").load('<?= site_url("Admin/ajax_level") ?>');
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

    $("#update_level<?= $d->id ?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/change_level") ?>',
                type:'post',
                data:$(".update_form<?= $d->id ?>").serialize(),
                success:function(){
                     $("#ajaxdata").load('<?= site_url("Admin/ajax_level") ?>');
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

                                        




                                    <tbody>
                                 
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
        var name = $("#name").val();
        var level = $("#level").val();

        if (name == '' || level == '') {
        alert('Please Provide valid Detail');
    }else{
        
        $.ajax({
            url:'<?php echo site_url("Admin/insert_level"); ?>',
            type:'post',
            data:$("#form_validation").serialize(),
            success:function(){
                
                $("#ajaxdata").load('<?= site_url("Admin/ajax_level") ?>');

                $("#insert_notify").fadeIn('slow');

                $("#name").val('');

                $("#level").val('');

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


    <!-- Demo Js -->
    <!-- Jquery Core Js -->
<?php include 'footer.php'; ?>
</body>

</html>