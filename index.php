<?php
    session_start();
    include('backend/admin/assets/inc/config.php');//get configuration file
  
    if(isset($_POST['admin_login']))
    {
        $ad_email=$_POST['ad_email'];
        $ad_pwd=$_POST['ad_pwd'];//double encrypt to increase security
        $stmt=$mysqli->prepare("SELECT ad_fname ,ad_pwd , ad_id FROM his_admin WHERE ad_fname=? AND ad_pwd=? ");//sql to log in user
        $stmt->bind_param('ss',$ad_email,$ad_pwd);//bind fetched parameters
        $stmt->execute();//execute bind
        $stmt -> bind_result($ad_email,$ad_pwd,$ad_id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['ad_id']=$ad_id;//assaign session to admin id
        //$uip=$_SERVER['REMOTE_ADDR'];
        //$ldate=date('d/m/Y h:i:s', time());
        if($rs)
            {//if its sucessfull
                header("location:./backend/admin/add_ILine.php");
            }

        else
            {
            #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
            echo 'diconnect';    
            $err = "Access Denied Please Check Your Credentials";
            }
    }
?>
<!--End Login-->
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>SPARKMINDA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="MartDevelopers" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="backend/doc/assets/images/favicon.ico">

        <!-- App css -->
        <link href="backend/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="backend/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="backend/admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!--Load Sweet Alert Javascript-->
        
        <script src="backend/admin/assets/js/swal.js"></script>
        <!--Inject SWAL-->
        <?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed","<?php echo $err;?>","error");
                            },
                                100);
                </script>

        <?php } ?>

<style>

body{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
body.BODY {
    max-width: 100vw;
    height: 100%;
    z-index: 0;
    text-align: center;
    
}

.account-pages{
    
    position: fixed;    
    font-weight: bold;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    width: 35%;
    height: auto;
    background-color: white;
    top: 10%;
    right: 35%;
    z-index: 4;
    padding-block: 35px;
    padding-inline: 30px;
    -webkit-backdrop-filter: blur(8px);
    backdrop-filter: blur(8px);
    background:transparent;
    border-radius: 20px;
}
.CARD2{

    
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    
    -webkit-backdrop-filter: blur(8px);
    backdrop-filter: blur(8px);
    

}
form input{
    margin-top: 15px;
    padding: 8px;
    padding-inline: 10px;
    border: 1px solid black;
    border-radius: 20px;
    text-align: center;

}
video{ 
    width: 100%;
    height: auto;
}


form button{
    margin-left: 2%;
    margin-top: 15px;
    padding-block: 5px;
    padding-inline: 35px;
    background: black;
    color: white;
    border-radius: 20px;

}

</style>

    </head>

    <body class=".BODY">
    
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" id = "theplayer">
            <source src="./assets/images/bg.mp4" type="video/mp4">

        </video>
        <div class="account-pages ">
            <div class="container">
                <div class="">
                    <div class="">
                        <div class="CARD1" >

                            <div class="CARD2">
                                
                                <div class="">
                                    <a href="index.php">
                                        <span><img src="./assets/images/logo.png" alt=""  height="60"></span>
                                    </a>
                                    <p style="color:white; margin:0 auto; margin-top: 10px; margin-left: 15px; font-size: 15px;"class="">Welcome To SPARKMINDA </p>
                                </div>

                                <form method='post' >

                                    <div class="">
                                        <label for="emailaddress"> </label>
                                        <input class="" name="ad_email" type="text"  required="" placeholder="Enter User-Id">
                                    </div>

                                    <div class=" ">
                                        <label for="password"></label>
                                        <input  class="" name="ad_pwd" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="">
                                        <button class="" name="admin_login" type="submit"> Log In </button>
                                    </div>

                                </form>

                                <!--
                                For Now Lets Disable This 
                                This feature will be implemented on later versions
                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div> 
                                -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a style="text-decoration: none; color: white; margin-left: 5%;" href="his_doc_reset_pwd.php" class="text-white-50 ml-1">Forgot your password?</a></p>
                               <!-- <p class="text-white-50">Don't have an account? <a href="his_admin_register.php" class="text-white ml-1"><b>Sign Up</b></a></p>-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <?php include ("footer.php");?>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        
    </body>

</html>