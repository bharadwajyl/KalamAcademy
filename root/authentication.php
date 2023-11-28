<?php
switch ($formtype){
    case "registration":
        
        //Assign user inputs to variables
        $inputs = array("fname" => ''.$_POST['fname'].'', "lname" => ''.$_POST['lname'].'', "contact" => ''.mysqli_real_escape_string($conn, $_POST['mob']).'', "email" => ''.mysqli_real_escape_string($conn, $_POST['email']).'', "pssd" => ''.$_POST['pssd'].'');
        
        //Check for empty fields
        foreach ($inputs as $values){
            if (empty($values)) { error("All fields are mandatory"); return 1; }
        }
        
        //Remove all special chars from name
        $inputs["fname"] = preg_replace('/[^\da-z ]/i', '', mysqli_real_escape_string($conn, $_POST['fname']));
        $inputs["lname"] = preg_replace('/[^\da-z ]/i', '', mysqli_real_escape_string($conn, $_POST['lname']));
        
        //Validate mobile number
        if (!preg_match('/^[0-9]{10}+$/', $inputs["contact"]) || $inputs["contact"] == "0123456789" || $inputs["contact"] == "1234567890"){
            error("Invalid mobile number");
            return 1;
        }
        
        //Validate email address
        $domains = array('gmail.com', 'outlook.com', 'yahoo.in', 'yahoo.com', 'hotmail.com');
        $pattern = "/^[a-z0-9._%+-]+@[a-z0-9.-]*(" . implode('|', $domains) . ")$/i";
        if (!filter_var($inputs["email"], FILTER_VALIDATE_EMAIL)) { error("Invalid email address"); return 1; }
        if (!preg_match($pattern, $inputs["email"])) { error("Please use gmail, yahoo, outlook, hotmail"); return 1; }
        
        //Validate password
        if (!preg_match('@[A-Z]@', $inputs["pssd"]) || !preg_match('@[a-z]@', $inputs["pssd"]) || !preg_match('@[0-9]@', $inputs["pssd"]) || !preg_match('@[^\w]@', $inputs["pssd"])){
            error("Password should contain atleast 8 chars in length with atleast one upper case letter, one number, and one special character");
                return 1;
        }
        $inputs["pssd"] = password_hash(mysqli_real_escape_string($conn, $_POST['pssd']), PASSWORD_DEFAULT);
            
        //Check if details already in DB
        $result = $conn->query("SELECT * FROM registration WHERE email = '".$inputs['email']."' OR mobile = '".$inputs['contact']."'");
            if ($result->num_rows > 0) {
                error("error: Email or contact no is already in use");
                return 1;
            }
        
        //If error free then push to DB
        if ($error <= 0){
            if ($conn->query("INSERT INTO registration (fname, lname, mobile, email, pssd, date, time, auth) VALUES ('".$inputs['fname']."', '".$inputs['lname']."', '".$inputs['contact']."', '".$inputs['email']."', '".$inputs['pssd']."', '$date', '$time', '0')") === TRUE){
                print("success: Registration successfull");
            } else {
                error("error: registration failed");
                return 1;
            }
        }
        
    break;
    case "login":
        
        //Assign user inputs to variables
        $inputs = array("uname" => ''.mysqli_real_escape_string($conn, $_POST['uname']).'', "pssd" => ''.password_hash(mysqli_real_escape_string($conn, $_POST['pssd']), PASSWORD_DEFAULT).'');
        
        //Check for empty fields
        foreach ($inputs as $values){
            if (empty($values)) { error("All fields are mandatory");return 1; }
        }
        
        //If error free then fetch from DB
        if ($error <= 0){
            $result = $conn->query("SELECT * FROM registration WHERE email = '".$inputs['uname']."' OR mobile = '".$inputs['uname']."' AND pssd = '".$inputs['pssd']."'");
            if ($result->num_rows > 0) {
                session_start();
                $auth_id = "KA_".date(d)."_".date(Hi);
                
                //Update DB
                if ( $conn->query("UPDATE registration SET auth = '$auth_id' WHERE email = '".$inputs['uname']."'") === TRUE ){
                    print("loggedin");
                    $_SESSION["auth_id"] = $auth_id;
                } else {
                    error("error:". $conn->error);
                    return 1;
                }
            } else {
                error("error: Credentials unfound");
                return 1;
            }
        }
        
    break;
    case "logout":
        session_start();
        session_unset();
        print("loggedout");
    break;
    default:
        die("error: not allowed");
    break;
}
?>
