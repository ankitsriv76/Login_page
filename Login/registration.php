
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
  
    <title>Register</title>
    <style>
        .button{
            width: 50%;
            margin-left: 100px;
            background: aqua;
        }
    </style>
</head>
<body>
<main>
<div class="container">
 
</div>
    <form action="upload.php" method="post"enctype="multipart/form-data">
    <?php if (isset($_GET['error'])) { ?>

<p class="error" style="width: 100%;" ><?php echo $_GET['error']; ?></p>

<?php } ?>
        <h1>Sign Up</h1>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name"  required >
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password">Location</label>
           <select name="location" id="">
            <option value="Delhi">Delhi</option>
            <option value="Bengaluru">Bengaluru</option>
            <option value="Bhopal">Bhopal</option>
           </select>
        </div>
        <div>
            <label for="date">Date:</label>
            <input type="date" name="date" >
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" name="imagee" >
        </div>
        
        
        <button type="submit" class="button" name="upload">upload </button>
        
        
        <footer>Already a member? <a href="login.php">Login here</a></footer>
        
    </form>
</main>
</body>
</html>