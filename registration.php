
<?php 
include 'header.php'; 
include 'connect.php';
if (isset($_POST['submit'])){
$username=mysqli_real_escape_string($conn,$_POST['username']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$pass=mysqli_real_escape_string($conn,$_POST['password']);
$cpass=mysqli_real_escape_string($conn,$_POST['cpassword']);
// $pass =password_hash($password,PASSWORD_BCRYPT);
// $cpass =password_hash($cpassword,PASSWORD_BCRYPT);
$emailquery="SELECT * from registration WHERE email='$email' ";
$result = mysqli_query($conn,$emailquery);
$emailcount =mysqli_num_rows($result);
if($emailcount>0)
{
    echo "Email already exist!!";
}
else{
    if($pass===$cpass){
       $insertquery= "INSERT INTO `registration` (`username`, `email`, `password`, `cpassword`)
        VALUES ('$username', '$email', '$pass', '$cpass')";
         $result = mysqli_query($conn,$insertquery);
         if ($result) {
            echo "
            <div class='alert alert-success' role='alert'>
        User has been successfully registered!
      </div>
      
            ";
          } else {
            echo "Error registering User ". mysqli_error($conn);
          }
    }else{
        echo "passwords are not matching!!";
    }
}

    }



?>

 <div id="page-wrapper">
            <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4>Register New User</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        </div> -->
                                        <div class="form-group">
                                            <label>Username:</label>
                                            <input class="form-control" name="username" required>
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail:</label>
                                            <input class="form-control" type="email" name="email" required>
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input class="form-control" type="password" name="password" required>
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password:</label>
                                            <input class="form-control" type="password" name="cpassword" required>
                                        </div>
                                        <button type="submit" class="btn btn-success" value="submit" name="submit" class="btn btn-default">Regsiter</button>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="login.php"><button type="button" class="btn btn-primary">Already have an account? Sign In Now</button></a>
                                        
                                    </form>
                                </div>
                               