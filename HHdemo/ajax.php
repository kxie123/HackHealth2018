<?php
	ini_set('display_errors', 1);

	$db = mysqli_connect('localhost','root','asdf6245','HHDemo');

	
    $query = "select used from responses";
    $result = mysqli_query( $db,$query );
	
	$data = array();
	while ($row = $result->fetch_assoc()) {
		$data[] = $row;
	}
	
	$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

	echo json_encode($data);
   
	
?>