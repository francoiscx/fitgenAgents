<?php

/**
 * @param $required_fields_array, n array containing the list of all required fields
 * @return array, containing all errors
 */
function check_empty_fields($required_fields_array){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd populate the form error array
    foreach($required_fields_array as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field . " is a required field<br>";
        }
    }

    return $form_errors;
}


function check_if_empty($required){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd populate the form error array
    foreach($required as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field . " & Conditions need to be accepted before you can make use of our services.";
        }
    }

    return $form_errors;
}


function check_if_confirmed($required){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd populate the form error array
    foreach($required as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $showReset = 1 ;
            $form_errors[] = "You need to confirm that this is your own account before we can send you a password reset link.";
        }
    }

    return $form_errors;
}



function check_if_phone_at_hand($required){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd populate the form error array
    foreach($required as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $showReset = 1 ;
            $form_errors[] = "Confirm that you have the device with this number at hand?";
        }
    }

    return $form_errors;
}


/**
 * @param $fields_to_check_length, an array containing the name of fields
 * for which we want to check min required length e.g array('username' => 4, 'email' => 12)
 * @return array, containing all errors
 */
function check_min_length($fields_to_check_length){
    //initialize an array to store error messages
    $form_errors = array();

    foreach($fields_to_check_length as $name_of_field => $minimum_length_required){
        if(strlen(trim($_POST[$name_of_field])) < $minimum_length_required && $_POST[$name_of_field] != NULL){
            $form_errors[] = $name_of_field . " is too short, must be {$minimum_length_required} characters long";
        }
    }
    return $form_errors;
}




/**
 * @param $data, store a key/value pair array where key is the name of the form control
 * in this case 'email' and value is the input entered by the user
 * @return array, containing email error
 */
function check_email($data){
    //initialize an array to store error messages
    $form_errors = array();
    $key = 'Email';
    //check if the key email exist in data array
    if(array_key_exists($key, $data)){

        //check if the email field has a value
        if($_POST[$key] != null){

            // Remove all illegal characters from email
            $key = filter_var($key, FILTER_SANITIZE_EMAIL);

            //check if input is a valid email address
            if(filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false){
                $form_errors[] = "<b>" . $_POST[$key] . "</b> does not seem to be a valid email address";
            }
        }
    }
    return $form_errors;
}




/**
 * @param $form_errors_array, the array holding all
 * errors which we want to loop through
 * @return string, list containing all error messages
 */
function show_errors($form_errors_array){
    $errors = " ";

    //loop through error array and display all items in a list
    foreach($form_errors_array as $the_error){
        $errors .= "{$the_error}";
    }
    $errors .= "";
    return $errors;
}

/*
function show_errors($form_erros_array){
    
    $errors = "<p><ul style='color:red'>";
    
    foreach($form_errors_array as $the_error){
    
        $errors .="<li>{the_error}</li>";
        
    }
    
    $errors .= "</ul></p>";
    return $errors;
}
/*






/**
 * echo name_field("john o'grady-smith"); 	returns John O'Grady-Smith
 * change strings to first letter upper case
 * @return array, containing all errors
 */
function name_field($str,$a_char = array("'","-"," ")){   
    //$str contains the complete raw name string
    //$a_char is an array containing the characters we use as separators for capitalization. If you don't pass anything, there are three in there as default.
    $string = strtolower($str);
    foreach ($a_char as $temp){
        $pos = strpos($string,$temp);
        if ($pos){
            //we are in the loop because we found one of the special characters in the array, so lets split it up into chunks and capitalize each one.
            $mend = '';
            $a_split = explode($temp,$string);
            foreach ($a_split as $temp2){
                //capitalize each portion of the string which was separated at a special character
                $mend .= ucfirst($temp2).$temp;
                }
            $string = substr($mend,0,-1);
            }   
        }
    return ucfirst($string);
    }













function report($message, $eval = "Fail"){
	if($eval === "Pass"){
		$data = "<p>{$message}</p>";
	
  	 }else{
		$data = "<p>{$message}</p>";
	}
	return $data;	
}





function denyDuplicate($value, $db){

	try{
		$sqlQuery = "SELECT email FROM users WHERE email=:email";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':email' => $value));
		
		if($row = $statement->fetch()){ 
			return true;
		}
			return false;
	}catch (PDOException $ex){
		//handle exception
	}
	
}




function allowedToReset($email, $first_name, $last_name, $db){

	try{
		$sqlQuery = "SELECT * FROM users WHERE email = :email AND first_name = :first_name AND last_name = :last_name";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':email' => $email, ':first_name' => $first_name, ':last_name' => $last_name));
		
		while($row = $statement->fetch()){
        $id = $row['id'];
        $_SESSION['userID'] = $id;
			return true;
		}
			return false;
	}catch (PDOException $ex){
		//handle exception
	}
	
}







function allowedToSMSGC($userID, $gc_cellArea, $gc_cell, $db){
    
	try{
		$sqlQuery = "SELECT * FROM general_card WHERE userID = :userID AND gc_cellArea = :gc_cellArea AND gc_cell = :gc_cell";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':userID' => $userID , ':gc_cellArea' => $gc_cellArea, ':gc_cell' => $gc_cell));


		while($row = $statement->fetch()){
            
            $_SESSION['dsc_cell'] = $gc_cellArea . $gc_cell;
			return true;
		}

	}catch (PDOException $ex){
		//handle exception
	}
	
}



function allowedToSMSSC($userID, $sc_cellArea, $sc_cell, $db){
    
	try{
		$sqlQuery = "SELECT * FROM social_card WHERE userID = :userID AND sc_cellArea = :sc_cellArea AND sc_cell = :sc_cell";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':userID' => $userID , ':sc_cellArea' => $sc_cellArea, ':sc_cell' => $sc_cell));


		while($row = $statement->fetch()){
            
            $_SESSION['dsc_cell'] = $sc_cellArea . $sc_cell;
			return true;
		}

	}catch (PDOException $ex){
		//handle exception
	}
	
}



function allowedToSMSPC($userID, $pc_cellArea, $pc_cell, $db){
    
	try{
		$sqlQuery = "SELECT * FROM professional_card WHERE userID = :userID AND pc_cellArea = :pc_cellArea AND pc_cell = :pc_cell";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':userID' => $userID , ':pc_cellArea' => $pc_cellArea, ':pc_cell' => $pc_cell));


		while($row = $statement->fetch()){
            
            $_SESSION['dsc_cell'] = $pc_cellArea . $pc_cell;
			return true;
		}

	}catch (PDOException $ex){
		//handle exception
	}
	
}




function SetAsAlreadyUsed($reset, $selector, $token, $db){
    
	try{
		//SQL statement to update info
		$sqlUpdate = "UPDATE account_recovery SET reset = :reset, resetTime = now(), resetIP = '(" . $_SERVER['REMOTE_ADDR'] . ")' WHERE selector = :selector AND token = :token";
        $statement = $db->prepare($sqlUpdate);
        $statement->execute(array(':reset' => $reset, ':selector' => $selector, ':token' => $token));

	}catch (PDOException $ex){
		//handle exception
	}
	return true;
}






function customFilters($userID, $db){

	try{
		$sqlQuery = "SELECT userID FROM customFilters WHERE userID=:userID";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':userID' => $userID));
		
		if($row = $statement->fetch()){
			return true;
		} else {
			return false;
		}
	}catch (PDOException $ex){
		//handle exception
	}
	
}




function existIn_gc($value, $db){

	try{
		$sqlQuery = "SELECT userID FROM general_card WHERE userID=:userID";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':userID' => $value));
		
		if($row = $statement->fetch()){
			return true;
		} else {
			return false;
		}
	}catch (PDOException $ex){
		//handle exception
	}
	
}


function existIn_sc($value, $db){

	try{
		$sqlQuery = "SELECT userID FROM social_card WHERE userID=:userID";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':userID' => $value));
		
		if($row = $statement->fetch()){
			return true;
		}
			return false;
	}catch (PDOException $ex){
		//handle exception
	}
	
}


function existIn_pc($value, $db){

	try{
		$sqlQuery = "SELECT userID FROM professional_card WHERE userID=:id";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':id' => $value));
		
		if($row = $statement->fetch()){
			return true;
		}
			return false;
	}catch (PDOException $ex){
		//handle exception
	}
	
}


?>









