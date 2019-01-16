<head>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<div id="service">
	
</div>


<div id="location">
	
</div>

<script type="text/javascript">

	//Get services ajax page
	
               setInterval(function(){$("#service").load('<?=base_url("Ajax/check_for_service");?>')},1000);

                setInterval(function(){$("#location").load('<?=base_url("Ajax/check_for_location");?>')},10000);
</script>