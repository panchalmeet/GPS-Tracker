<?php include 'header.php'; ?>
<head>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js'); ?>"></script>
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
        #alert_notify{
            animation-duration: 1s;
            animation-name: bounceInDown;
        }

        #share_notify{
            animation-duration: 1s;
            animation-name: bounceInDown;
        }
        
        #profile_notify{
    animation-name: bounceInDown;
    animation-duration: 1s;
}

    #rename_notify{
    animation-name: bounceInDown;
    animation-duration: 1s;
}


    #move_notify{
    animation-name: bounceInDown;
    animation-duration: 1s;
}



    #copress_notify{
    animation-name: bounceInDown;
    animation-duration: 1s;
}


#share_user{
      margin: 16px;
    width: 58%;
    height: 44px;
    border-bottom: solid 2px blue;
    animation-name: bounceInDown;
    animation-duration: 1s;
    border-top: none;
    border-left: none;
    border-right: none;
    cursor: pointer;
}

    </style>
  

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DASHBOARD / MEDIA 


                </h2>

                 <div class="row clearfix">
                 <div class="col-lg-3" id="insert_notify" style="cursor: pointer;float: right;margin-top: -20px;margin-right:20px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">library_add</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:4px;">
                            <h4>File Created Successfully..</h4> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>


            <div class="row clearfix">
                 <div class="col-lg-3" id="update_notify" style="cursor: pointer;float: right;margin-top: -20px;margin-right:20px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:20px;">
                            <h5>File Uploaded Successfully..</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>


                <div class="row clearfix">
                 <div class="col-lg-3" id="share_notify" style="cursor: pointer;float: right;margin-top: -20px;margin-right:20px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:20px;">
                            <h5 id="share_msg">Shared Success..</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>


                <div class="row clearfix">
                 <div class="col-lg-3" id="rename_notify" style="cursor: pointer;float: right;margin-top: -20px;margin-right:20px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:20px;">
                            <h5 id="share_msg">File name changed..</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

                   <div class="row clearfix">
                 <div class="col-lg-3" id="alert_notify" style="cursor: pointer;float: right;margin-top: -20px;position: relative;display: none;margin-right: 20px;">
                    <div class="info-box bg-red hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">error</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:10px;">
                            <h5>No file selected to upload</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

                 <div class="row clearfix">
                 <div class="col-lg-3" id="alert_file_notify" style="cursor: pointer;float: right;margin-top: -20px;position: relative;display: none;margin-right: 20px;">
                    <div class="info-box bg-red hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">error</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:20px;">
                            <h5>File name can't be empty</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>


                   <div class="row clearfix">
                 <div class="col-lg-3" id="alert_folder_notify" style="cursor: pointer;float: right;margin-top: -20px;position: relative;display: none;margin-right: 20px;">
                    <div class="info-box bg-red hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">error</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:20px;">
                            <h5>Folder name can't be empty</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

                          <div class="row clearfix">
                 <div class="col-lg-3" id="move_notify" style="cursor: pointer;float: right;margin-top: -20px;position: relative;display: none;margin-right: 20px;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">error</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:20px;margin-right: 40px;">
                            <h5 id="move_msg">File Moved Successfully...</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>


                          <div class="row clearfix">
                 <div class="col-lg-3" id="compress_notify" style="cursor: pointer;float: right;margin-top: -20px;position: relative;display: none;margin-right: 20px;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">error</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:20px;margin-right: 40px;">
                            <h5 id="compress_msg">File Compressed Successfully...</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

                  <div class="row clearfix">
                 <div class="col-lg-3" id="delete_notify" style="cursor: pointer;float: right;margin-top: -20px;margin-right:40px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">delete</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:20px;">
                            <h5>File Trashed Successfully..</h5> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                 <div class="col-lg-4 " id="profile_notify" style="cursor: pointer;float: right;margin-top: -20px;position: relative;background: #fff;margin-bottom: 20px;display: none;">
                     <li style="list-style: none;">
                                       
                                            <h6>
                                               <strong class="msg">Progress</strong>
                                                <big class="pull-right" id="status">0%</big>
                                            </h6>
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-teal" id="myBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                </div>
                                            </div>
                                        
                                    </li>
                </div>

                        <div class="row clearfix">
                 <div class="col-lg-3" id="update_notify" style="cursor: pointer;float: right;margin-top: -50px;position: relative;display: none;">
                    <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="txt" style="padding: 2px;margin-top:4px;">
                            <h4>File Uploaded Successfully..</h4> 

                                      

                            </div>
                           
                        </div>
                    </div>
                </div>

                 

            </div>
        </div>
    </div>
            <!-- Basic Validation -->



 <div class="row clearfix">
                <div class="col-lg-10 col-sm-12 col-xs-12 col-md-12" style="margin-top: 20px;margin-left: 60px;">
                    <div class="card">
                        <div class="header">
                            <!-- Trigger the modal with a button -->
<button type="button" class="btn bg-light-blue pull-right" style="margin-right: 10px;margin-top: -4px;margin-left: 0px;" data-toggle="modal" data-target="#newfile"><i class="material-icons">note_add</i></button>
<button type="button" class="btn bg-light-blue pull-right" style="margin-right: 10px;margin-top: -4px;margin-left: 10px;" data-toggle="modal" data-target="#myModal"><i class="material-icons">create_new_folder</i></button>

<!-- Modal -->
 <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create New Folder</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="folderForm">
              <input type="text" class="form-control" name="folder" style="border-radius: 0px;" id="folder">
              <br>
              <button type="button" id="createfolder" data-dismiss="modal" class="btn btn-info">Create</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<div id="newfile" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New File</h4>
      </div>
      <div class="modal-body">
       <form action="" method="post" id="createfile">
           <input type="text" class="form-control col-lg-3" id="filename" name="filename" style="border-radius: 0px;"><br><br>
    <textarea name="content" class="form-control"></textarea>
           <br><br>
           <button type="button" class="btn btn-default" data-dismiss="modal" id="create">Create</button>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



  <script type="text/javascript">
      $(document).ready(function(){
              //AJAX FOR Deletion

    $("#create").click(function(){
           
           var s = $("#filename").val();

           if (s!='') {
             $.ajax({
                url:'<?= site_url("Admin/create_file"); ?>',
                type:'post',
                data:$("#createfile").serialize(),
                success:function(){
                     $("#ajaxdata").load('<?= site_url("Admin/ajax_media") ?>');
                     $("#insert_notify").fadeIn('slow');
                setInterval(function(){$("#insert_notify").fadeOut('slow');},6000);

                }
            });
         }else{
             $("#alert_file_notify").fadeIn('slow');
                setInterval(function(){$("#alert_file_notify").fadeOut('slow');},6000);

         }
        }); 


          $("#createfolder").click(function(){
           
           var s = $("#folder").val();

           if (s!='') {
             $.ajax({
                url:'<?= site_url("Admin/create_folder"); ?>',
                type:'post',
                data:$("#folderForm").serialize(),
                success:function(){
                     $("#ajaxdata").load('<?= site_url("Admin/ajax_media") ?>');
                     $("#insert_notify").fadeIn('slow');
                setInterval(function(){$("#insert_notify").fadeOut('slow');},6000);

                }
            });
         }else{
             $("#alert_folder_notify").fadeIn('slow');
                setInterval(function(){$("#alert_folder_notify").fadeOut('slow');},6000);

         }
        });       
    });
  </script>



<!--END-->
                            <h2 class="">  DETAILS
                                    <form id="uploadForm" action="upload.php" method="post" style="float: right;margin-top: -20px;">
<div id="uploadFormLayer">
<input name="userImage" type="file" class="inputFile sr-only" /><br/>
<input type="submit" value="Upload" class="btnSubmit btn bg-light-blue"  />
</form>
                            <button class="btn bg-light-blue pull-right" onclick="chooseFile()" id="open" style="margin-left: 20px;margin-top: -3px;"> <i class="material-icons">attach_file</i> </button>   

                          

                                </h2> 
                                
      
                                <script type="text/javascript">
$(document).ready(function (e) {
    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('Admin/insert_media'); ?>",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                if (data!='uploaded') {
                    
                    //$("#ajaxdata").load('<?= site_url("Admin/ajax_media"); ?>');
                    $("#alert_notify").fadeIn('slow');
                    $(".inputFile").val('');

                    setInterval(function(){$("#alert_notify").fadeOut();},6000);

                }else{
                    $("#ajaxdata").load('<?= site_url("Admin/ajax_media") ?>');
                    $("#update_notify").fadeIn('slow');
                    $(".inputFile").val('');

                    setInterval(function(){$("#update_notify").fadeOut();},6000);
                }
            },
            error: function() 
            {
            }           
       });
    }));

    $("#open").click(function(){
        $(".inputFile").click();    
    });

});



</script>



                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table " style="overflow: scroll;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Size</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ajaxdata">
            
                                          

                                         <?php
                                         $i = 1;
                                         foreach($files as $file):
                                            {


                                              if ($file->folder!='0') {
                                               
                                              }else{



                                                switch ($file->color) {
                                                    case '1':
                                                        $color = 'red';
                                                        break;

                                                        case '2':
                                                        $color = 'green';
                                                        break;
                                                        case '3':
                                                        $color = 'light-blue';
                                                        break;
                                                        case '4':
                                                        $color = 'orange';
                                                        break;
                                                        case '5':
                                                        $color = 'pink';
                                                        break;
                                                        case '6':
                                                        $color = 'purple';
                                                        break;
                                                        case '7':
                                                        $color = 'light-green';
                                                        break;
                                                        case '8':
                                                        $color = 'blue';
                                                        break;
                                                        case '9':
                                                        $color = 'indigo';
                                                        break;
                                                    
                                                    default:
                                                        # code...
                                                        break;
                                                }

                                                switch ($file->type) {
                                                    case 'pdf':
                                                $data = '<div class="btn  bg-'.$color.'" style:"cursor:context-menu;" ><i class="material-icons">picture_as_pdf</i></div>';
                                                        
                                                  $change = ' <li><a href=""><i class="material-icons">library_books</i>

                                <form method="post" action="'.site_url('Admin/download').'" >
                                                <input type="text" value="'.$file->id.'" name="id" class="sr-only">
                                             <button type="submit" class="btn btn-primary btn-xs"> Download  </button>
                                            </form>
                            </li>';     
                                                        break;

                                                        case 'folder':
                                                 $data = '<div class="btn  bg-'.$color.'" data-toggle="modal" data-target="#img'.$file->id.'"  style:"cursor:context-menu;" ><i class="material-icons">folder</i></div>';
                                            
                                                   $change = ' <li><a href="#"><i class="material-icons">library_books</i>

                                
                                                

                                             <button type="button" data-toggle="modal" data-target="#compress'.$file->id.'"  class="btn btn-primary btn-xs"> Compress  </button></a>
                                        
                            </li>';    
                                                        break;
                                                        
                                                case 'other':
                                                $data = '<div class="btn  bg-'.$color.'" style:"cursor:context-menu;" ><i class="material-icons">message</i></div>';
                                   
                                                  $change = ' <li><a href=""><i class="material-icons">library_books</i>

                                <form method="post" action="'.site_url('Admin/download').'" >
                                                <input type="text" value="'.$file->id.'" name="id" class="sr-only">
                                             <button type="submit" class="btn btn-primary btn-xs"> Download  </button>
                                            </form>
                            </li>';     
                                                        break;

                                                         case 'txt':
                                                $data = '<div class="btn  bg-'.$color.'" style:"cursor:context-menu;"  data-toggle="modal" data-target="#img'.$file->id.'" ><i class="material-icons">insert_drive_file</i></div>';
                                   
                                                  $change = ' <li><a href=""><i class="material-icons">library_books</i>

                                <form method="post" action="'.site_url('Admin/download').'" >
                                                <input type="text" value="'.$file->id.'" name="id" class="sr-only">
                                             <button type="submit" class="btn btn-primary btn-xs"> Download  </button>
                                            </form>
                            </li>';
                                                        break; 

                                                         case 'video':
                                                $data = '<div class="btn  bg-'.$color.'" style:"cursor:context-menu;" data-toggle="modal" data-target="#img'.$file->id.'"  ><i class="material-icons">video_library</i></div>';
                                                        
                                                 $change = ' <li><a href=""><i class="material-icons">library_books</i>

                                <form method="post" action="'.site_url('Admin/download').'" >
                                                <input type="text" value="'.$file->id.'" name="id" class="sr-only">
                                             <button type="submit" class="btn btn-primary btn-xs"> Download  </button>
                                            </form>
                            </li>';
                                                        break;     

                                                         case 'audio':
                                                $data = '<div class="btn  bg-'.$color.'" style:"cursor:context-menu;"  data-toggle="modal" data-target="#img'.$file->id.'" ><i class="material-icons">library_music</i></div>';
                                                    
                                                 $change = ' <li><a href=""><i class="material-icons">library_books</i>

                                <form method="post" action="'.site_url('Admin/download').'" >
                                                <input type="text" value="'.$file->id.'" name="id" class="sr-only">
                                             <button type="submit" class="btn btn-primary btn-xs"> Download  </button>
                                            </form>
                            </li>';   
                                                        break;                                                        
                                                    
                                                        case 'zip':
                                                $data = '<div class="btn bg-'.$color.'" style:"cursor:context-menu"><i class="material-icons">message</i></div>';
                                            

                                                 $change = ' <li><a href=""><i class="material-icons">library_books</i>

                               
                                <form method="post" action="'.site_url('Admin/download').'" >
                                                <input type="text" value="'.$file->id.'" name="id" class="sr-only">
                                             <button type="submit" class="btn btn-primary btn-xs"> Download  </button>
                                            </form>
                            </li>';  
                                                            break;
                                                    default:



                                                     case 'img':
                                                $data = '<img src="'.base_url($file->file).'" data-toggle="modal" data-target="#img'.$file->id.'" style="height:50px;width:50px;cursor:pointer">';
                                                  $change = ' <li><a href=""><i class="material-icons">library_books</i>

                               
                                <form method="post" action="'.site_url('Admin/download').'" >
                                                <input type="text" value="'.$file->id.'" name="id" class="sr-only">
                                             <button type="submit" class="btn btn-primary btn-xs"> Download  </button>
                                            </form>
                            </li>';  
                                                        
                                                        break;                                                        
                                                    default:


                                                        # code...
                                                        break;
                                                }




                                                    ?>


                                                <tr>
                                            <td>
                                                

                                    <?=$i ?>
                                            </td>
                                            <td><?= $data ?></td>
                                            <td><?= substr($file->title,0,32) ?></td>
                                            <td><?= formatSizeUnits($file->size); ?></td>
                                            <td><?= $file->date ?></td>
                                        

                                            <td>
                                          
  
                                    

                                         <div class="btn-group">
                        <button class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" style="cursor: pointer;" aria-expanded="true"><i class="material-icons" d>view_week</i></button>
                        <ul class="dropdown-menu pull-right">
                           <?= $change ?>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">share</i><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#share<?= $file->id ?>" >Share</button></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">font_download</i><button data-toggle="modal" data-target="#rename<?= $file->id ?>" class="btn btn-warning btn-xs">Rename</button></a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">move_to_inbox</i><button data-toggle="modal" data-target="#move<?= $file->id ?>" class="btn btn-xs btn-info">Move</button></a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">delete</i><button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#delete<?= $file->id ?>" >Trash</button></a></li>
                        </ul>
                    </div>
                                       
                               
</td>
                                            
                                        </tr>

                                         



  <!-- Modal -->
  <div class="modal fade" id="delete<?= $file->id ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Trash <?= $file->title?></h4>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Are You Sure ?</h3><br>
        <form method="post" action="" id="delete_form<?= $file->id ?>">
              <input type="text" value="<?= $file->id ?>" name="id" class="sr-only">
              <input type="text" value="<?= $file->file ?>" name="path" class="sr-only">

          <button class="btn btn-success" id="delete_level<?= $file->id ?>" data-dismiss="modal"  type="button" style="margin-left: 35%;">Yeah Sure !</button>
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
  <div class="modal fade" id="compress<?= $file->id ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-archive"></i> Compress <?= $file->title?></h4>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Are You Sure ?</h3><br>
        <form method="post" action="" id="compress_form<?= $file->id ?>">
              <input type="text" value="<?= $file->id ?>" name="id" class="sr-only">
              <input type="text" value="<?= $file->file ?>" name="path" class="sr-only">
               <input type="text" value="<?= $file->title ?>" name="title" class="sr-only">

          <button class="btn btn-success" id="compress<?= $file->id ?>" data-dismiss="modal"  type="button" style="margin-left: 35%;">Yeah Sure !</button>
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
  <div class="modal fade" id="img<?= $file->id ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="material-icons"> pageview</i> View <?= $file->title?></h4>
        </div>
        <div class="modal-body">
          <?php

              if ($file->type=='img') {
                
                ?>


         <img src="<?= base_url($file->file); ?>" class="img-thumbnail">

         <?php
              }else if($file->type=='audio'){
                ?>

<audio controls>
  <source src="<?= base_url($file->file); ?>" type="audio/mp3">
</audio>
                <?php
              }else if($file->type=='txt'){
                $myfile = fopen($file->file, "r") or die("Unable to open file!");
                echo '<p>'.fread($myfile,filesize($file->file)).'</p>';
                fclose($myfile);
              }else if($file->type=='video'){
                ?>

<video width="100%" height="240" controls class="card">
  <source src="<?= base_url($file->file) ?>" type="video/mp4" style="width: 100%; margin: 10px;">
</video>
          <?php
              }else if($file->type=='folder'){


                $this->db->where('folder',$file->id);
                $inner_data = $this->db->get('files');

                $inner_data = $inner_data->result();

                foreach($inner_data as $inner):{

                  switch ($inner->type) {
                    case 'folder':
                    $icon = '<i class="material-icons">folder</i>';
                      break;

                      case 'pdf':
                    $icon = '<i class="material-icons">picture_as_pdf</i>';
                      break;

                      case 'zip':
                    $icon = '<i class="material-icons">message</i>';
                      break;

                      case 'txt':
                    $icon = '<i class="material-icons">insert_drive_file</i>';
                      break;

                      case 'video':
                    $icon = '<i class="material-icons">video_library</i>';
                      break;


                      case 'audio':
                    $icon = '<i class="material-icons">library_music</i>';
                      break;
                    
                     case 'other':
                    $icon = '<i class="material-icons">library_books</i>';
                      break;
                    
                    default:
                      # code...
                      break;
                  }


                                                switch ($inner->color) {
                                                    case '1':
                                                        $color = 'red';
                                                        break;

                                                        case '2':
                                                        $color = 'green';
                                                        break;
                                                        case '3':
                                                        $color = 'light-blue';
                                                        break;
                                                        case '4':
                                                        $color = 'orange';
                                                        break;
                                                        case '5':
                                                        $color = 'pink';
                                                        break;
                                                        case '6':
                                                        $color = 'purple';
                                                        break;
                                                        case '7':
                                                        $color = 'light-green';
                                                        break;
                                                        case '8':
                                                        $color = 'blue';
                                                        break;
                                                        case '9':
                                                        $color = 'indigo';
                                                        break;
                                                    
                                                    default:
                                                        # code...
                                                        break;
                                                }

                  ?>
                  <div class="col-lg-5 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-<?= $color; ?>">
                        <div class="icon">
                        <?= $icon ?>

                                                 </div>
                        <div class="content">
                            <div class="text"><?= $inner->title ?></div>
                            <div class="number count-to" style="font-size: 20px;"><?= formatSizeUnits($inner->size); ?></div>
                        </div>
                    </div>
                </div>

                <?php

                }endforeach;

              }
          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!--Delete End-->


  <!--SHARE Modal -->
  <div class="modal fade" id="share<?= $file->id ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-share"></i> Share <?= $file->title?></h4>
        </div>
        <div class="modal-body">
       <form method="post" id="shareForm<?= $file->id ?>">
         
          <select id="share_user" name="share_user">
            <?php

                foreach($users as $u): {
                  ?>

                  <option value="<?= $u->id ?>" ><?= $u->fname.' '.$u->lname; ?></option>
                  <?php
                } 
              endforeach;
            ?>

          </select>
          <input type="text" name="title" value="<?= $file->title ?>" class="sr-only" >
          <input type="text" name="size" value="<?= $file->size ?>" class="sr-only" >
          <input type="text" name="file" value="<?= $file->file ?>" class="sr-only" >
          <input type="text" name="color" value="<?= $file->color ?>" class="sr-only" >
          <input type="text" name="type" value="<?= $file->type ?>" class="sr-only" >



        <div>
          <br>
          <button type="button" id="shareto<?= $file->id ?>" class="btn btn-info" data-dismiss="modal" >Share</button>
        </div>
       </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!--SHARE End-->


  <!--Rename Modal -->
  <div class="modal fade" id="rename<?= $file->id ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content"> 
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-share"></i> Rename </h4>
        </div>
        <div class="modal-body">
       <form method="post" id="renameForm<?= $file->id ?>">
         
          <input type="text" id="share_user" name="filename" value="<?= $file->title?>">
          

          <input type="text" name="fileid" value="<?= $file->id ?>" class="sr-only">
        <div>
          <br>
          <button type="button" id="renameto<?= $file->id ?>" class="btn btn-info" data-dismiss="modal" >Save</button>
        </div>
       </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!--SHARE End-->




  <!--Move Modal -->
  <div class="modal fade" id="move<?= $file->id ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-share"></i> Move <?= $file->title?></h4>
        </div>
        <div class="modal-body">
       <form method="post" id="moveForm<?= $file->id ?>">
         <input type="text" name="file" value="<?= $file->file ?>" class="sr-only">


          <select id="share_user" name="folder">
            <?php

                foreach($files as $u): {
                   $type = $u->type;
                  if ($type=='folder' && $u->folder=='0') {
                    ?>

                  <option value="<?= $u->file.':'.$u->id ?>" ><?= $u->title ?>
                    
                    
                  </option>

                  <?php


                  }else{


                  } 
                } 
              endforeach;
            ?>

          </select>
          <input type="text" name="id" value="<?= $file->id ?>" class="sr-only" >
          <input type="text" name="title" value="<?= $file->title ?>" class="sr-only" >
          



        <div>
          <br>
          <button type="button" id="moveto<?= $file->id ?>" class="btn btn-info" data-dismiss="modal" >Move</button>
        </div>
       </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!--SHARE End-->

  <script type="text/javascript">
      $(document).ready(function(){
              //AJAX FOR Deletion

    $("#delete_level<?= $file->id ?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/send_trash") ?>',
                type:'post',
                data:$("#delete_form<?= $file->id ?>").serialize(),
                success:function(){
                     $("#ajaxdata").load('<?= site_url("Admin/ajax_media") ?>');
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

    $("#moveto<?= $file->id ?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/move_file") ?>',
                type:'post',
                data:$("#moveForm<?= $file->id ?>").serialize(),
                success:function(data){
                     $("#ajaxdata").load('<?= site_url("Admin/ajax_media") ?>');

                      $("#move_notify").fadeIn('slow');
                setInterval(function(){$("#move_notify").fadeOut('slow');},6000);

                }
            });
        });       
    });
  </script>



  <script type="text/javascript">
      $(document).ready(function(){
              //AJAX FOR Deletion

    $("#compress<?= $file->id ?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/compress_file") ?>',
                type:'post',
                data:$("#compress_form<?= $file->id ?>").serialize(),
                success:function(data){
                   $("#ajaxdata").load('<?= site_url("Admin/ajax_media") ?>');

                      $("#compress_notify").fadeIn('slow');
                setInterval(function(){$("#compress_notify").fadeOut('slow');},6000);

                }
            });
        });       
    });
  </script>


  <script type="text/javascript">
      $(document).ready(function(){
              //AJAX FOR Deletion

    $("#shareto<?= $file->id ?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/share_media") ?>',
                type:'post',
                data:$("#shareForm<?= $file->id ?>").serialize(),
                success:function(data){
                    $("#ajaxdata").load('<?= site_url("Admin/ajax_media") ?>');

                      $("#share_notify").fadeIn('slow');
                      
                setInterval(function(){$("#share_notify").fadeOut('slow');},6000);

                }
            });
        });       
    });
  </script>



  <script type="text/javascript">
      $(document).ready(function(){
              //AJAX FOR Deletion

    $("#renameto<?= $file->id ?>").click(function(){
            $.ajax({
                url:'<?= site_url("Admin/file_rename") ?>',
                type:'post',
                data:$("#renameForm<?= $file->id ?>").serialize(),
                success:function(data){
                     $("#ajaxdata").load('<?= site_url("Admin/ajax_media") ?>');
                      $("#rename_notify").fadeIn('slow');
                      
                setInterval(function(){$("#rename_notify").fadeOut('slow');},6000);

                }
            });
        });       
    });
  </script>




                                     
                                                <?php
                                                $i = $i+1;
                                            }


                                          }
                                        endforeach;
                                         ?>






</tbody>

</table>
</div>
</div>
</div>


   <script src="<?= base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
            
  

            </div>
    </section>



    <!-- Jquery Core Js -->

    <!-- Bootstrap Core Js -->

    <!-- Select Plugin Js -->

    <!-- Slimscroll Plugin Js -->

      <!--                    

</html> -->

<?php
   function formatSizeUnits($bytes)
    

    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        echo $bytes;
}

?>

