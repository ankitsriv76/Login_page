<?php 

session_start(); 

include "connection.php";



if (isset($_POST['upload']) && isset($_FILES['image'])) {
	

	
    
    
    
	$img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	//$error = $_FILES['image']['error'];

	//if ($error === 0) 
    
		if ($img_size > 1000000)
         {
			$em = "Sorry, your file is too large.";
		    header("Location: userhome.php?error=$em");
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
                
                $sql = "INSERT INTO upload VALUES ('','$new_img_name')";
                mysqli_query($conn, $sql);   
                header("Location: userhome.php");    
            }
            else 
            {
                $em = "You can't upload files of this type";
                header("Location: userhome.php?error=$em");
            }
        }
        
      
    /*else
    {
    $em = "unknown error occurred!";
    header("Location: userhome.php?error=$em");
    }*/

    

}



?>

    

    

    
    