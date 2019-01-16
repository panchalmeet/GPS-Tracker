<?php include 'header.php'; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DASHBOARD / USER
                   
                </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>  ADD USER</h2>
                            
                        </div>
                        <div class="body">
                            <form id="form_validation" method="post" action="<?= site_url('Admin/insert_user'); ?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="fname" required>
                                        <label class="form-label">First Name</label>
                                    </div>
                                </div>


                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="lname" required>
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>

                                   <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label>Department</label>
                                                    <select name="dept" required id="dept">
                                                        <?php 
                                                        foreach($depts as $d):
                                                        {
                                                        ?>
                                                        <option value="<?= $d->id ?>" ><?= $d->title ?></option>


                                                            <?php
                                                        }
                                                    endforeach;
                                                        ?>
                                                    </select>

                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line" id="level">
                                      
                                            </div>
                                </div>


                                 
                                   <div class="form-group">
                                    <input type="radio" name="gender" id="male" class="with-gap" value="male"  required>
                                    <label for="male">Male</label>

                                    <input type="radio" name="gender" id="female" class="with-gap" value="female"  required>
                                    <label for="female" class="m-l-20">Female</label>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="mobile" required>
                                        <label class="form-label">Mobile</label>
                                    </div>
                                </div>

                                     <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="pass" required>
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>


                              

                                <button class="btn btn-primary waves-effect" type="submit"> SUBMIT  </button>
                            </form>
                        </div>
                    </div>
                </div>

                 <script type="text/javascript">
                                    $(document).ready(function(){
                                        $("#dept").change(function(){
                                          var data = $("#dept").val();
                                          $.ajax({
                                              url:'<?=site_url("Admin/choose_desg");?>',
                                              type:'post',
                                              data:'data='+data,
                                              success:function(data){
                                                $("#level").html(data);
                                              }
                                          });
                                        });
                                    });
                                </script>

            
            <!-- #END# Basic Validation -->

 <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>  USERS</h2>
                           
                        </div>
                        <div class="body">
                            <div class=" table-responsive">
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>UserName</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Profile</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                                    
                                            <?php 
                                            $i=1;
                                            foreach($users as $u):
                                            {
                                                ?>

                                         <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $u->fname.' '.$u->lname ?></td>
                                            <td><?= $u->email ?></td>
                                            <td><?= $u->mobile ?></td>
                                            <td> <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#view<?= $u->id ?>"> <i class="material-icons">account_box</i> </button>
</td>
                                            <td><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $u->id ?>" ><i class="material-icons" >delete</i></button></td>
                                            
                                        </tr>






  <!-- Modal -->
  <div class="modal fade" id="delete<?= $u->id ?>" role="dialog">
    <div class="modal-dialog" style="    margin-left: 629px;
    width: 22%;
    margin-top: 131px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header btn-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove <?= $u->fname.' '.$u->lname?></h4>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Are You Sure ?</h3><br>
        <form method="post" action="<?= site_url('Admin/remove_user') ?>">
              <input type="text" value="<?= $u->id ?>" name="id" class="sr-only">
          <button class="btn btn-success" style="margin-left: 60px;">Yeah Sure !</button>
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


  <!-- Modal -->
  <div class="modal fade" id="view<?= $u->id ?>" role="dialog">
    <div class="modal-dialog" style="    margin-left: 629px;
    width: 22%;
    margin-top: 131px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i>  <?= $u->fname.' '.$u->lname; ?></h4>
        </div>
        <div class="modal-body">
           <div class="col-lg-4"> <img src="<?= base_url('assets/images/'.$u->img)?>" class="img-thumbnail"  ></div> 
            <div class="col-lg-7">
                 <div>
            Department : 
            <br><label class="" > 
            <?php
                $this->db->where('id',$u->department_id);
                $data = $this->db->get('department');


                $sql = $data->result();

                    foreach($sql as $dept):
                        {
                            echo $dept->title;
                        }
                    endforeach;
            ?>
            </label>
            </div><br>
              <div>
                Designation :
                <br>
            <label class="" >
                
                 <?php
                $this->db->where('id',$u->designation_id);
                $data = $this->db->get('designation_level');


                $sql = $data->result();

                    foreach($sql as $dept):
                        {
                            echo $dept->title;
                        }
                    endforeach;
            ?>
            </label>
          
                </div><br>
             <div>
                Gender  
                <br>
            <label class="" ><?=$u->gender?></label>
            
                </div>
            </div>
          <br>
            
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!--Delete End-->


                                                <?php
                                            
                                            $i = $i+1;

                                            }
                                             endforeach;
                                            ?>

                                        




                                    <tbody>
                                        
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



    <!-- Jquery Core Js -->

    <!-- Bootstrap Core Js -->

    <!-- Select Plugin Js -->

    <!-- Slimscroll Plugin Js -->

<?php include 'footer.php'; ?>
</body>

</html>