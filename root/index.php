<?php
//Check the type of the form posted
switch ($_POST["FormType"]) {
    case "registration": case "login": case "logout":
        Operations::Authentication(''.$_POST['FormType'].'');
    break;
    default:
        die("error:" .$_POST["FormType"]);
    break;
}

class Operations{
    public function Authentication($formtype){
        try {
            if (! @include_once( 'db.php' )) {
                throw new Exception ('error: Database connection error');
            }
            if (!file_exists('db.php' ) || !file_exists('authentication.php' )){
                throw new Exception ('error: Files doesn\'t exists');
            } else {
                
                //Custom date & time
                date_default_timezone_set("Asia/Kolkata");
                $date = date("d/m/Y");
                $time = date("H:i a");
                
                 //Global variables
                $error = 0;
                
                //Default functions
                function error($mssg){
                    print("error: $mssg");
                    $error++;
                    return 1;
                }
                
                @require("db.php");
                @include("authentication.php");
            }
        }
        catch(Exception $e) {
            print_r('error: ' .$e->getMessage());
        }
    }
}
?>
