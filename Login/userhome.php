<?php 
include "connection.php";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name']) ) {

 ?>

<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  
    <title>HOME</title>
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    
   
    <style type="text/css">
        form {

width: 500px;

border: 3px solid rgb(177, 142, 142);

padding: 20px;

background: rgb(85, 54, 54);

border-radius: 20px;
height: 300px;



}
body {

background: #91a716;

/*display: flex;

justify-content: center;*/

align-items: center;


/* height: 100vh;

flex-direction: column;*/

}
.button {

    float: right;
    width: 15%;
    background: aqua;
    color: blue;
    font-size: 25px;
    margin-right: 90px;



}
.logout{
    color: blue;
    background: aqua;
    font-size: 25px;
    padding: 12px;
    float: right;
    margin-right: 30px;
}
.head{
    color: blue;
   
    text-align: center;
    font-family: serif;
    font-size: 12px;
}




    </style>

</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 head">
                <h1>Hello,<?php echo $_SESSION['name']; ?></h1>
            
                <h1>You are user</h1>
                <img src="image/<?=$_SESSION['image']?> " width="100px" >
                </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
                            <form action="imageupload.php" enctype="multipart/form-data" method="post">
                                <?php if (isset($_GET['error'])) { ?>

                                <p class="error" style="width: 25%;" ><?php echo $_GET['error']; ?></p>

                                <?php } ?>  
                                <h1 style="color:white;">Image Upload</h1>

                                <div>
                                    <label for="image"style="width: 50%;margin-left: 120px;color: azure; font-size: 20px;">Image:</label>
                                    <input type="file" name="image"style="width: 50%;margin-left: 120px" >
                                    
                                </div>
                                <div>
                                <button type="submit" name="upload" class="button" >Upload </button>
                                <a href="logout.php" class=" logout" >Logout</a>
                                </div>
                               
                                
                        
                            </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                        <?php
                        $sql1 = "SELECT * FROM upload";
                        $result1 = mysqli_query($conn,$sql1);
                                            
                                            // Display data in HTML table
                                        
                    if ($result1->num_rows > 0) { ?>
                    <?php   
                        while($row = $result1->fetch_assoc()) { ?>
                   
                        <img src="image/<?php echo $row['image']; ?> " width=100px/>
                    <?php }} ?>
                </div>
            </div>
            
            
                
        </div>
    </div>
</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>