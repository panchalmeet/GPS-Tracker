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
                    DASHBOARD / EMPLOYEE LOG
                   
                </h2>
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
                            <h4>Log Removed Successfully..</h4> 

                                      

                            </div>
                           
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         

 <div class="row clearfix">
                <div class="col-lg-8 ">
                    <div class="card">
                        <div class="header">
                            <h2>  LOG DETAILS</h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Employee</th>
                                                <th>Login Time</th>
                                                <th>Logout Time</th>
                                                <th>Date</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ajaxdata">
                                                
                                            <?php 
                                            $i = 1;
                                            $j = 1;
                                            foreach($logs as $d):
                                            {
                                                switch ($j) {
                                                    case '1':
                                                        $color = 'light-blue';
                                                        break;

                                                         case '2':
                                                        $color = 'red';
                                                        break;

                                                         case '3':
                                                        $color = 'green';
                                                        break;

                                                         case '4':
                                                        $color = 'deep-orange';
                                                        break;

                                                         case '5':
                                                        $color = 'pink';
                                                        break;

                                                         case '6':
                                                        $color = 'teal';
                                                        break;

                                                         case '7':
                                                        $color = 'brown';
                                                        break;

                                                         case '8':
                                                        $color = 'light-green';
                                                        break;

                                                         case '9':
                                                        $color = 'black';
                                                        break;

                                                         case '10':
                                                        $color = 'indigo';
                                                        break;
                                                    
                                                    default:
                                                        # code...
                                                        break;
                                                }
                                                ?>

                                         <tr>   
                                            <td><button class="btn btn-circle bg-<?=$color?>"><?=$i?></button></td>
                                            <td><?php
                                            $this->db->where('id',$d->user);
                                            $user = $this->db->get('user')->result();
                                            foreach($user as $u):{
                                                $abc = $this->db->where('id',$u->designation_id)->get('designation_level')->row();

                                                echo $u->fname.' '.$u->lname.' ('.$abc->title.')';
                                            }endforeach;
                                            ?></td>
                                            <td><?=$d->login?></td>
                                            <td><?=$d->logout?></td>
                                            <td><?=$d->date?></td>



         <td><button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#trash<?= $d->id ?>" ><i class="material-icons">delete</i></button></td>
                                            
                                        </tr>
           





  <!-- Modal -->
  <div class="modal fade" id="trash<?= $d->id ?>" role="dialog">
    <div class="modal-dialog" style="    margin-left: 629px;
    width: 22%;
    margin-top: 131px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Log</h4>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Are You Sure ?</h3><br>
        <form method="post" action="<?= site_url('Admin/remove_log') ?>" id="delete_form<?= $d->id ?>" >
              <input type="text" value="<?= $d->id ?>" name="id" class="sr-only">
          <button class="btn btn-success" style="margin-left: 60px;" type="button" id="delete_dept<?= $d->id ?>" data-dismiss="modal" >Yeah Sure !</button>
        </form>
          <button class="btn btn-danger"  data-dismiss="modal">Cancel</button>
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
                url:'<?= site_url("Admin/remove_log") ?>',
                type:'post',
                data:$("#delete_form<?= $d->id ?>").serialize(),
                success:function(){
                     $("#ajaxdata").load('<?= site_url("Admin/ajax_log") ?>');
                     $("#delete_notify").fadeIn('slow');
                setInterval(function(){$("#delete_notify").fadeOut('slow');},6000);

                }
            });
        });       
    });
  </script>




                                                <?php
                                           
                                                $i = $i+1;

                                                if ($j == '9') {
                                                        $j =1;
                                                }else{
                                                    $j = $j+1;
                                                }
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