
<?php
// session_start();

require "connect.php";

$fname="";
$password="";
$err="";

if(isset($_POST['LOGIN'])){
    $fname=mysqli_real_escape_string($conn,$_POST['fname']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    $sql="select * from adminsystem where username = '".$fname."'  limit 1";
    $result = mysqli_query($conn,$sql);
    
    if ($result) {
        $user = mysqli_fetch_array($result);
        $hashed = $user['password'];
        echo $hashed;
    echo password_verify($password, $hashed);
    echo "</br>";
    echo $password; 
        if ($user) {
            if(password_verify($password, $hashed)) 
            {
                $_SESSION['username']=$user['username'];
                header('Location: home.php');
                exit();
            }
            else {
                $err = "Incorrect password.";
            }
        } else {
            $err = "Username does not exist.";
        }
    } else {
        $err = "Query failed: " . $conn->error;
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="./assets/css/loginstyle.css">
    
</head>
<body>
    <div class="box">
        <h1>Login</h1>
        <div class="err">
            <?php echo $err; ?>
        </div>

        <form action="interface.php" method="post">
            <input type="text" name="fname" placeholder="First Name" required><br><br>
            <input type="password" name="password" placeholder="password" required><br><br>
            <input type="submit" value="LOGIN" placeholder="password" name="LOGIN">
            </p>
        </form>
    </div>
    
</body>
</html>