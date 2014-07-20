<!DOCTYPE HTML> 

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") file_put_contents('data.json', json_encode($_POST)); ?>

<html>
<head>
	<link href="CSS/style.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">
		(function check(){
			$.getJSON( "data.json", function(data) {
		        if(data.set1 <=10) $('#set1').attr( 'data-percentage', data.set1);
		        if(data.set2 <=10) $('#set2').attr( 'data-percentage', data.set2);
		        if(data.set3 <=10) $('#set3').attr( 'data-percentage', data.set3);
		        		        
		        $("#bars li .bar").each( function( key, bar ) {
				    var percentage = $(this).attr('data-percentage');
				    $(this).animate({'height' : percentage * 10 + '%'}, 10);
				});
		    })
		    .always(function(){
		        setTimeout(check, 100);
		    });
		})();
	</script>
</head>

<body>
	<img style="display: block; margin: 40px auto;" src="CSS/gymbot_header.png">
	<img style="display: block; margin: 40px auto;" src="CSS/latpulldown.png">

	<div id="chart">	
		<ul id="bars">
		<li><div id="set1" data-percentage="0" class="bar"></div><span>Set 1</span></li>
		<li><div id="set2" data-percentage="0" class="bar"></div><span>Set 2</span></li>
		<li><div id="set3" data-percentage="0" class="bar"></div><span>Set 3</span></li>
		</ul>
	</div>
</body>
</html>