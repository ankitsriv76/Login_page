<?php 

session_start(); 

include "connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    

    $uname = $_POST['uname'];

    $pass = $_POST['password'] ;

    if (empty($uname)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM student WHERE userid='$uname' AND pass='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['usertype'] === "user") {

                echo "Logged in!";
              

                $_SESSION['userid'] = $row['userid'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];
                
                $_SESSION['image'] = $row['image'];


                header("Location: userhome.php");

                exit();

            }
            
            elseif($row['usertype'] === "admin") {

                echo "Logged in!";
              

                $_SESSION['userid'] = $row['userid'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];
                $_SESSION['image'] = $row['image'];


                header("Location: adminhome.php");

                exit();

            }
            
            else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}