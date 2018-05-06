<?php 

ini_set('display_errors', 1);
	$db = mysqli_connect('localhost','root','asdf','hhDemo');

$query = "SELECT used from responses";
$res = mysqli_query($db,$query);
while ($row = $res->fetch_assoc()) {
    echo $row['used']."<br>";
}

$arr = array(1,2,3,4,5);

	print json_encode($arr);

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<<script type="text/javascript" src="https://www.google.com/jsapi?autoload= 
{'modules':[{'name':'visualization','version':'1.1','packages':
['corechart']}]}"></script>
    <script type="text/javascript">
	  
	  function getData() {
			jQuery.ajax({
				url: 'ajax.php',
				type: 'GET',
				dataType: 'json',
				success: function( data ) {
				console.log(data)
					if( data == "null" ) {
						// just in case
					} else {
						drawGraph( data );
					}
				},
				error: function( textStatus ) {
					console.log(" error. damm. ");
				}
			});
		}
      google.setOnLoadCallback( getData );


      function drawGraph( data ) {
		
			for( var i = data.length; i > 0; i-- ) {
				data[i] = Object.values(data[i - 1]).map(Number);
			}
			
			data[0] = ['Date'];
			
			console.log(Object.values(data[0]));
			
		
			var chartData = google.visualization.arrayToDataTable( data );
		
			var options = {
				title: ' Time - User Graph '
			};

			var chart = new google.visualization.Histogram( document.getElementById( 'piechart' ) );

			chart.draw( chartData , options );
		}	
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
	<script src="assets/js/jquery.min.js"></script>
  </body>
</html>
