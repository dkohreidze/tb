<?php

include 'TBDB_info.php';

function add_writer($email,$fname,$lname,$aboutMe,$sampleArticle) {

	$link = mysqli_connect("localhost","dk1_tbDBuser","v1nd@l00","dk1_tbreakDB") or die("Error " . mysqli_error($link)); 

	$query = "INSERT INTO WRITERS VALUES ('$email','$fname','$lname','$aboutMe','$sampleArticle')";

	if(mysqli_query($link,$query)){
		$successful = TRUE;
	}else{
		echo "error adding writer!" . mysqli_error();
		$successful = FALSE;
	}

	mysqli_close($link);
	return $successful;
}


function email_exists($email) {

	$link = mysqli_connect("localhost","dk1_tbDBuser","v1nd@l00","dk1_tbreakDB") or die("Error " . mysqli_error($link)); 

	$query = "SELECT * FROM WRITERS WHERE email='$email'";

	$result = mysqli_query($link,$query);

	if (!$result){
        die('Error: ' . mysqli_error($link));
    }

	if(mysqli_num_rows($result) > 0){
		return 1;
	}else{
    // do something
    	return 0;
	}

}

?>