<?php 

session_start(); 

include "connection.php";

if (isset($_POST['upload']) && isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['location']) && isset($_POST['date'])  && isset($_FILES['imagee']) ) {

    
    $name = $_POST['name'];
    $uname = $_POST['username'];
    $email=$_POST['email'];
    $usertype="user";
    $pass = $_POST['password'] ;
    $location=$_POST['location'];
    $date=$_POST['date'];
    $img_name = $_FILES['imagee']['name'];
	$img_size = $_FILES['imagee']['size'];
	$tmp_name = $_FILES['imagee']['tmp_name'];
    if ($img_size > 1000000)
    {
       $em = "Sorry, your file is too large.";
       header("Location: registration.php?error=$em");
    }
    else
        {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png","pdf"); 

			if (in_array($img_ex_lc, $allowed_exs)) 
            {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'image/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
                $SQL="INSERT INTO student VALUES ('','$uname','$pass','$name','$usertype','$email','$location','$date','$new_img_name')";
                $result=mysqli_query($conn,$SQL);
                $em = "Registration Successful.";
                header("Location: registration.php?error=$em");
            
            }
            else 
            {
                $em = "You can't upload files of this type";
                header("Location: registration.php?error=$em");
            }
        }
       
        
        
      
    
}
    
    ?>