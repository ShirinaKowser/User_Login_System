<?php session_start(); 
include_once('includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];
$ret= mysqli_query($con,"SELECT id,fname FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
header("location:welcome.php");

}
else
{
echo "<script>alert('Invalid username or password');</script>";
}
}
?>
<? include('includes/header.php');?>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card bg-light shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                       <h3 class="text-center font-weight-light my-4">User Login</h3></div>
                                            <div class="card-body">
                                                <form method="post">                                               
                                                        <div class="form-floating mb-3">
                                                        <input class="form-control" name="uemail" type="email" placeholder="name@example.com" required/>
                                                        <label for="inputEmail">Email address</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                        <input class="form-control" name="password" type="password" placeholder="Password" required />
                                                        <label for="inputPassword">Password</label>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                        <a class="small" href="password-recovery.php">Forgot Password?</a>
                                                        <button class="btn btn-primary" name="login" type="submit">Login</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            <div class="card-footer text-center py-3">
                                                <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                                                <div class="small"><a href="index.php">Back to Home</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
            </div>
<?php include('includes/footer.php');?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
