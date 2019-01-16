<?php include 'header.php'; ?>
<head>
    <style type="text/css">
        .panel{
    width: 500px;
    border: 1px #A0A0A0 solid;
}

.icon{
    height: 70px;
    padding-top:23px;
    
}
#contact{
    width: 50px;
    height: 50px;
    margin:auto;
    padding:7px 8px 7px 8px;
    background-color :#A4A4A4;
    border-radius: 25px 25px 25px 25px;
}

.glyphicon-info-sign, .glyphicon-chevron-left{
    font-size: 25px;
    color: #37A7FD;
}
.glyphicon-user{
    font-size: 35px;
    color: #FFFFFF;
}

.panel-body{
 height :350px;   
 overflow-y: scroll;
}

.date{
    color: #A4A4A4;
    text-align: center;
    margin-bottom: 5px;
}

.bold{
    font-weight: bold;
}


.message{
    font-size: 1.2em;
    width: auto;
    max-width:300px;
    border-radius: 15px;
    padding: 10px;
    margin-bottom: 10px;
}
.message-in {
    background-color: #E5E5EA;
    margin-left: 20px;

}
.message-out{
    background-color : #22D351;
    margin-right: 20px;
    color: #FFFFFF;
}

.glyphicon-send, .glyphicon-camera{
    color: #848484;
}
    </style>
</head>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Driver / Message
                </h2>
            </div>
                       <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                                Tracker
                            </h2>
                        
                        </div>
                        <div class="body">
                         <!--CHATBOX-->

                          
        <div class="panel-body">
           
            <?php

            if (count($message)<0) {
                echo "<div class='center'>No messages Yet</div>";
            }else{
                

                foreach($message as $m):{

                    ?>
                    <div class="row">
                <div class="message message-in pull-left">
                    <?=$m->msg?>
                </div>
            </div>

            <?php

                }endforeach;


                            }
            ?>
          
            
        </div>
      
    </div>
    
    <div class="modal" id="modal-photo">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">Envoyer une photo</h4>
            </div>
            <div class="modal-body">
                <input type="file" name ="photo" id="photo" accept="image/*">
            </div>
            <div class="modal-footer">
                <button id="validation" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
      </div>
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

    <script type="text/javascript">
        $(function() {
    $('#envoi').on('click', function(){
        var message_text = $('#message-text').val();
        if(message_text !== ''){
            $(".row:last").after('<div class="row"><div class="message message-out pull-right">'+message_text+'</div></div>');
            $('#message-text').val('');
        }
    });
    
    
    $('#validation').on('click', function(){
        $("#modal-photo").hide();
        var file = photo.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".row:last").after('<div class="row"><img src="'+e.target.result+'" class="message pull-right" alt="photo"/></div></div>');
        }        
        reader.readAsDataURL(file);
        $('#photo').val('');
    });
});
    </script>
</body>

</html>
