<script type="text/javascript"> 
    // When the document is ready set up our sortable with it's inherant function(s) 
    $(document).ready(function() { 
        $("#test-list").sortable({ 
            handle : '.handle', 
            update : function () { 
                var order = $('#test-list').sortable('serialize'); 
                $("#info").load("process-sortable.php?"+order); 
            } 
        }); 
    }); 
</script>
