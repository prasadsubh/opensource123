<?php 
  if(isset($_POST['signup'])){
    $conn = mysqli_connect('localhost','root','','shubham');
    if(!$conn){
        echo "Connection Failed!<br>".mysqli_error($conn);
    }
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $pass = $_POST['pass2'];
    $sql2 = "INSERT INTO user(username,email,password)VALUES('$name','$email','$pass')";   
    if(mysqli_query($conn,$sql2)){
        echo "<script>alert('Registered Successfully!');
        window.location.href='login.html';
        </script>";
    }else{
        echo "Error inserting values " .mysqli_error($conn);
    }
  }
?>
<?php
  if(isset($_POST['login'])){
    $conn = mysqli_connect('localhost','root','','shubham');
    if(!$conn){
        echo "Connection Failed!<br>".mysqli_error($conn);
    }
    $sql3 = "SELECT * FROM user WHERE email='" . $_POST["email"] . "' and password = '". $_POST["pass"]."'";
    $result = mysqli_query($conn, $sql3);
    $row  = mysqli_fetch_array($result);
    if(is_array($row)) {
        echo "<script>alert('Login Success!');window.location.href='signup.html';</script>";
        } else {
            echo "Error " .mysqli_error($conn);
    }
  }
?>