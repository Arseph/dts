 <?php
  #session_start();
  include_once 'login_code.php';
  //check if can login again
  if(isset($_SESSION['attempt_again'])){
    $now = time();
    if($now >= $_SESSION['attempt_again']){
      unset($_SESSION['attempt']);
      unset($_SESSION['attempt_again']);
    }
  }

  //set disable if three login attempts has been made
  $disable = '';
  if(isset($_SESSION['attempt']) && $_SESSION['attempt'] >= 3)
  {
    $disable = 'disabled';
    $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 60; URL=$url1");
  }
  
?>


<!DOCTYPE html>
<html>
<head>
  <script> window.history.forward(); </script>
  <meta charset="utf-8">
  <title>Employee Login | Document Tracking System</title>
  <link rel="stylesheet" href="navbar.css">
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <script src="js/scripts.js"></script> 
</head>
<body style="background-color: #0062CC; position: fixed;">

    <!-- Preloader -->
  <!--<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>-->
    <!-- end of preloader -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <a href="">
            <img src="img/logo1.png" class="logo" style="width: 24%; margin-left: -10%; margin-top: -2%; margin-bottom: -3.5%;">
        </a>
        <div class="container">
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="home.html#header">HOME <span class="sr-only">(current)</span></a>
                    </li>
                              
                    <!--<li class="nav-item dropdown">
                        <a class="nav-link page-scroll" href="#video" role="button" aria-haspopup="true" aria-expanded="false">VIDEO TUTORIALS</a>
                    </li>-->
                    
                </ul>
                <span class="nav-item">
                    <a class="btn-outline-sm" href="index.php">LOG IN</a>
                </span>
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header" style="background-color: none;">
        <label style="font-size: 25px; font-weight: 500; color: white; margin-left: 40%; margin-top: 7%;">Document Tracking System</label>
        <div class="header-content">

            <div class="container">
                <form method="POST" onsubmit="required()" name="form1">
                  <div class="card shadow rounded-0" style="width:380px; margin-top: -15%;margin-left: 35%; border: none">

                  <div class="card-header" style="background-color: white; border: none;">
                     <!--<h6 style="text-align: center; font-size: 15px; margin-top: -1%; color: #fff; text-shadow: 2px 2px 1px #2679D3;"><i class="fas fa-user"></i> &nbsp;Employee Log in</h6>-->

                     <img src="img/dtslogo.png" width="110px" height="100px" style="margin-left: 35%; margin-top: 2%; margin-bottom: -5%">
                     <h6 style="text-align: center; font-size: 15px; margin-top: 5%; "> &nbsp;DTS Login</h6>

                      <?php
                          if(isset($_SESSION['error'])){
                            ?>
                            <div class="alert text-center" style="margin-top: 15px;">
                              <?php echo $_SESSION['error']; ?>
                            </div>
                            <?php

                            unset($_SESSION['error']);
                          }

                          if(!empty($error)) {
                            echo "<p style='color: red; padding: 2px;'>".$error."</p>";
                          }
                        ?>
                  </div>

                    <div class="card-body" style="height: auto; background-color: white;">
                      <div class="container" style="margin-top: -5%">
                        <div class="form-group input-icons" >
                          <!--<i class="fa fa-user-circle icon"></i>-->
                          <input type="type" name="username" class="form-control fields" placeholder="Username" style="width: 100%; height: 45px; border: 1.2px solid #0062CC; background-color: none; font-size: 14px;" <?php echo $disable; ?> required>
                        </div>
                        <div class="form-group input-icons" >
                          <i toggle="#password-field" class="fa fa-fw fa-eye icon toggle-password" style="cursor: pointer;"></i>
                          <input type="password" name="password" id="pass_log_id" class="form-control fields" placeholder="Password" style="width: 100%; height: 45px; border: 1.2px solid #0062CC; background-color: none; font-size: 14px;" <?php echo $disable; ?> required>
                        </div>
                         <div class="" style="margin-top: -3%; margin-bottom: 10%; font-size: 12px; font-weight: 600; margin-left: 65%;">
                          <a href="password-reset.php" class="forgot">Forgot Password?</a><br>
                         </div>
                      </div>
                      <div class="" style="background-color: white;">
                              <button type="submit" name="btnLogin" class="btnLogin form-control" style="background-color: #3993DE; color: white; border-radius: 50px;" <?php echo $disable; ?>>Log in</button>  
                      </div>
                    </div>

                    <!--<div class="card-footer" style="height: 40px; background-color: #3993DE; border: none;">
                      <a href="http://localhost/dts/dts-sms/Admin_dashboard/index.php" style="text-decoration: none">
                        <h6 style="text-align: left; font-size: 13px; margin-top: -1%; font-weight: 500; color: #fff; text-shadow: 2px 2px 1px #2679D3;">Admin Log in
                        <span style="float: right; font-size: 18px"><i class="fas fa-angle-right"></i></span>
                      </h6>
                      </a>
                    </div>-->
                  </div>
              </form>
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    
    <!-- end of header -->


</body>
 

 


<style>
  .btnLogin
  {
    width: 91%;
    margin-top: -6%;
    margin-left: 4.6%;
    height: 47px;
    font-size: 15px;/.,6j5h4g1
    font-weight: 600;
    background-color: #86ABF9;
    border-radius: 0px;
    border: none;
    color: white;
    box-shadow: rgba(0, 0, 0, .1) 0 2px 4px 0;
    box-sizing: border-box;
    transform: translateY(0);
    transition: transform 150ms, box-shadow 150ms;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
  }
  .btnLogin:hover
  {
    box-shadow: rgba(0, 0, 0, .15) 0 3px 9px 0;
    transform: translateY(-2px);
  }
  @media (min-width: 768px) {
  .button-37 {
    padding: 10px 30px;
  }
  .forgot
  {
    color: #485D88;
  }
    .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 5px;
            font-size: 12px;
            border-radius: 1px;
            margin: 20px 0px;
            
          }
  .alert{
    padding: 5px;
    margin-bottom: -4px;
    text-align: center;
    margin-left: 10px;
    margin-right: 14.5px;
    font-size: 12px;
    color: red;
    font-weight: 550;
    line-height: 1.2;

  }
        .input-icons i {
            position: absolute;
        }
          
        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }
          
        .icon {
            padding: 10px;
            min-width: 40px;
            margin-left: 87%;
            margin-top: 1%;
            color: #0181CA;
        }
          
        .fields {
            width: 100%;
            padding: 10px;
            text-align: left;
        }
        .field_icon {
          float: right;
          margin-left: -20%;
          margin-top: -13%;
          margin-right: -8%;
        }

body,
html {
    width: 100%;
    height: 100%;
}

body, p {
    color: #555; 
    font: 400 1rem/1.625rem "Open Sans", sans-serif;;
}

.p-large {
    font: 400 1.125rem/1.75rem "Open Sans", sans-serif;
}

.p-small {
    font: 400 0.875rem/1.5rem "Open Sans", sans-serif;
}

h1 {
    color: #333;
    font: 700 2.5rem/3.125rem "Open Sans", sans-serif;
    letter-spacing: -0.2px;
}

h2 {
    color: #333;
    font: 700 2rem/2.625rem "Open Sans", sans-serif;
    letter-spacing: -0.2px;
}

h3 {
    color: #333;
    font: 700 1.625rem/2.125rem "Open Sans", sans-serif;
    letter-spacing: -0.2px;
}

h4 {
    color: #333;
    font: 700 1.375rem/1.75rem "Open Sans", sans-serif;
    letter-spacing: -0.1px;
}

h5 {
    color: #333;
    font: 700 1.125rem/1.5rem "Open Sans", sans-serif;
    letter-spacing: -0.1px;
}

h6 {
    color: #333;
    font: 700 1rem/1.375rem "Open Sans", sans-serif;
    letter-spacing: -0.1px;
}

.above-heading {
    color: #5f4dee;
    font: 700 0.75rem/0.875rem "Open Sans", sans-serif;
    text-align: center;
}

.p-heading {
    margin-bottom: 3.25rem;
}

.testimonial-text {
    font: italic 400 1rem/1.625rem "Open Sans", sans-serif;
}

.testimonial-author {
    font: 700 1rem/1.625rem "Open Sans", sans-serif;
    letter-spacing: -0.1px;
}

.li-space-lg li {
    margin-bottom: 0.375rem;
}

.indent {
    padding-left: 1.25rem;
}

a {
    color: #555;
    text-decoration: underline;
}

a:hover {
    color: #555;
    text-decoration: underline;
}

a.white {
    color: #fff;
}

.decorative-line {
    display: block;
    width: 5rem;
    height: 0.5rem;
    margin-right: auto;
    margin-left: auto;
}

.blue {
    color: #;
}

.btn-solid-reg {
    display: inline-block;
    padding: 1.1875rem 2.125rem 1.1875rem 2.125rem;
    border: 0.125rem solid #0062CC;
    border-radius: 2rem;
    background-color: #0062CC;
    color: #fff;
    font: 700 0.875rem/0 "Open Sans", sans-serif;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-solid-reg:hover {
    background-color: transparent;
    color: #0062CC;
    text-decoration: none;
}

.btn-solid-lg {
    display: inline-block;
    padding: 1.375rem 2.625rem 1.375rem 2.625rem;
    border: 0.125rem solid #0062CC;
    border-radius: 2rem;
    background-color: #0062CC;
    color: #fff;
    font: 700 0.875rem/0 "Open Sans", sans-serif;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-solid-lg:hover {
    background-color: transparent;
    color: #0062CC;
    text-decoration: none;
}

.btn-outline-reg {
    display: inline-block;
    padding: 1.1875rem 2.125rem 1.1875rem 2.125rem;
    border: 0.125rem solid #0062CC;
    border-radius: 2rem;
    background-color: transparent;
    color: #0062CC;
    font: 700 0.875rem/0 "Open Sans", sans-serif;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-outline-reg:hover {
    background-color: #0062CC;
    color: #fff;
    text-decoration: none;
}

.btn-outline-lg {
    display: inline-block;
    padding: 1.375rem 2.625rem 1.375rem 2.625rem;
    border: 0.125rem solid #0062CC;
    border-radius: 2rem;
    background-color: transparent;
    color: #0062CC;
    font: 700 0.875rem/0 "Open Sans", sans-serif;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-outline-lg:hover {
    background-color: #0062CC;
    color: #fff;
    text-decoration: none;
}

.btn-outline-sm {
    display: inline-block;
    padding: 0.875rem 1.5rem 0.875rem 1.5rem;
    border: 0.125rem solid #0062CC;
    border-radius: 2rem;
    background-color: transparent;
    color: #0062CC;
    font: 700 0.875rem/0 "Open Sans", sans-serif;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-outline-sm:hover {
    background-color: #0062CC;
    color: #fff;
    text-decoration: none;
}

.form-group {
    position: relative;
    margin-bottom: 1.25rem;
}

.form-group.has-error.has-danger {
    margin-bottom: 0.625rem;
}

.form-group.has-error.has-danger .help-block.with-errors ul {
    margin-top: 0.375rem;
}

.label-control {
    position: absolute;
    top: 0.87rem;
    left: 1.25rem;
    color: #555;
    opacity: 1;
    font: 400 0.875rem/1.375rem "Open Sans", sans-serif;
    cursor: text;
    transition: all 0.2s ease;
}

/* IE10+ hack to solve lower label text position compared to the rest of the browsers */
@media screen and (-ms-high-contrast: active), screen and (-ms-high-contrast: none) {  
    .label-control {
        top: 0.9375rem;
    }
}

.form-control-input:focus + .label-control,
.form-control-input.notEmpty + .label-control,
.form-control-textarea:focus + .label-control,
.form-control-textarea.notEmpty + .label-control {
    top: 0.125rem;
    opacity: 1;
    font-size: 0.75rem;
    font-weight: 700;
}

.form-control-input,
.form-control-select {
    display: block; /* needed for proper display of the label in Firefox, IE, Edge */
    width: 100%;
    padding-top: 1.0625rem;
    padding-bottom: 0.0625rem;
    padding-left: 1.25rem;
    border: 1px solid #c4d8dc;
    border-radius: 0.25rem;
    background-color: #fff;
    color: #555;
    font: 400 0.875rem/1.875rem "Open Sans", sans-serif;
    transition: all 0.2s;
    -webkit-appearance: none; /* removes inner shadow on form inputs on ios safari */
}

.form-control-select {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    height: 3rem;
}

/* IE10+ hack to solve lower label text position compared to the rest of the browsers */
@media screen and (-ms-high-contrast: active), screen and (-ms-high-contrast: none) {  
    .form-control-input {
        padding-top: 1.25rem;
        padding-bottom: 0.75rem;
        line-height: 1.75rem;
    }

    .form-control-select {
        padding-top: 0.875rem;
        padding-bottom: 0.75rem;
        height: 3.125rem;
        line-height: 2.125rem;
    }
}

select {
    /* you should keep these first rules in place to maintain cross-browser behavior */
    -webkit-appearance: none;
    -moz-appearance: none;
    -ms-appearance: none;
    -o-appearance: none;
    appearance: none;
    background-image: url('../images/down-arrow.png');
    background-position: 96% 50%;
    background-repeat: no-repeat;
    outline: none;
}

select::-ms-expand {
    display: none; /* removes the ugly default down arrow on select form field in IE11 */
}

.form-control-textarea {
    display: block; /* used to eliminate a bottom gap difference between Chrome and IE/FF */
    width: 100%;
    height: 8rem; /* used instead of html rows to normalize height between Chrome and IE/FF */
    padding-top: 1.25rem;
    padding-left: 1.3125rem;
    border: 1px solid #c4d8dc;
    border-radius: 0.25rem;
    background-color: #fff;
    color: #555;
    font: 400 0.875rem/1.75rem "Open Sans", sans-serif;
    transition: all 0.2s;
}

.form-control-input:focus,
.form-control-select:focus,
.form-control-textarea:focus {
    border: 1px solid #a1a1a1;
    outline: none; /* Removes blue border on focus */
}

.form-control-input:hover,
.form-control-select:hover,
.form-control-textarea:hover {
    border: 1px solid #a1a1a1;
}

.checkbox {
    font: 400 0.75rem/1.25rem "Open Sans", sans-serif;
}

input[type='checkbox'] {
    vertical-align: -15%;
    margin-right: 0.375rem;
}

/* IE10+ hack to raise checkbox field position compared to the rest of the browsers */
@media screen and (-ms-high-contrast: active), screen and (-ms-high-contrast: none) {  
    input[type='checkbox'] {
        vertical-align: -9%;
    }
}

.form-control-submit-button {
    display: inline-block;
    width: 100%;
    height: 3.125rem;
    border: 1px solid #0062CC;
    border-radius: 1.5rem;
    background-color: #0062CC;
    color: #fff;
    font: 700 0.875rem/0 "Open Sans", sans-serif;
    cursor: pointer;
    transition: all 0.2s;
}

.form-control-submit-button:hover {
    background-color: transparent;
    color: #0062CC;
}

/* Form Success And Error Message Formatting */
#smsgSubmit.h3.text-center.tada.animated,
#lmsgSubmit.h3.text-center.tada.animated,
#nmsgSubmit.h3.text-center.tada.animated,
#pmsgSubmit.h3.text-center.tada.animated,
#smsgSubmit.h3.text-center,
#lmsgSubmit.h3.text-center,
#nmsgSubmit.h3.text-center,
#pmsgSubmit.h3.text-center {
    display: block;
    margin-bottom: 0;
    color: #555;
    font-size: 1.125rem;
    line-height: 1rem;
}

.help-block.with-errors .list-unstyled {
    color: #555;
    font-size: 0.75rem;
    line-height: 1.125rem;
    text-align: left;
}

.help-block.with-errors ul {
    margin-bottom: 0;
}
/* end of form success and error message formatting */

/* Form Success And Error Message Animation - Animate.css */
@-webkit-keyframes tada {
    from {
        -webkit-transform: scale3d(1, 1, 1);
        -ms-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
    10%, 20% {
        -webkit-transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
        -ms-transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
    }
    30%, 50%, 70%, 90% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
        -ms-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
    }
    40%, 60%, 80% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
        -ms-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
    }
    to {
        -webkit-transform: scale3d(1, 1, 1);
        -ms-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
}

@keyframes tada {
    from {
        -webkit-transform: scale3d(1, 1, 1);
        -ms-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
    10%, 20% {
        -webkit-transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
        -ms-transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
    }
    30%, 50%, 70%, 90% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
        -ms-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
    }
    40%, 60%, 80% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
        -ms-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
    }
    to {
        -webkit-transform: scale3d(1, 1, 1);
        -ms-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
}

.tada {
    -webkit-animation-name: tada;
    animation-name: tada;
}

.animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
/* end of form success and error message animation - Animate.css */

/* Fade-move Animation For Details Lightbox - Magnific Popup */
/* at start */
.my-mfp-slide-bottom .zoom-anim-dialog {
    opacity: 0;
    transition: all 0.2s ease-out;
    -webkit-transform: translateY(-1.25rem) perspective(37.5rem) rotateX(10deg);
    -ms-transform: translateY(-1.25rem) perspective(37.5rem) rotateX(10deg);
    transform: translateY(-1.25rem) perspective(37.5rem) rotateX(10deg);
}

/* animate in */
.my-mfp-slide-bottom.mfp-ready .zoom-anim-dialog {
    opacity: 1;
    -webkit-transform: translateY(0) perspective(37.5rem) rotateX(0); 
    -ms-transform: translateY(0) perspective(37.5rem) rotateX(0); 
    transform: translateY(0) perspective(37.5rem) rotateX(0); 
}

/* animate out */
.my-mfp-slide-bottom.mfp-removing .zoom-anim-dialog {
    opacity: 0;
    -webkit-transform: translateY(-0.625rem) perspective(37.5rem) rotateX(10deg); 
    -ms-transform: translateY(-0.625rem) perspective(37.5rem) rotateX(10deg); 
    transform: translateY(-0.625rem) perspective(37.5rem) rotateX(10deg); 
}

/* dark overlay, start state */
.my-mfp-slide-bottom.mfp-bg {
    opacity: 0;
    transition: opacity 0.2s ease-out;
}

/* animate in */
.my-mfp-slide-bottom.mfp-ready.mfp-bg {
    opacity: 0.8;
}
/* animate out */
.my-mfp-slide-bottom.mfp-removing.mfp-bg {
    opacity: 0;
}
/* end of fade-move animation for details lightbox - magnific popup */

/* Fade Animation For Image Lightbox - Magnific Popup */
@-webkit-keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.fadeIn {
    -webkit-animation: fadeIn 0.6s;
    animation: fadeIn 0.6s;
}

@-webkit-keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}

.fadeOut {
    -webkit-animation: fadeOut 0.8s;
    animation: fadeOut 0.8s;
}
/* end of fade animation for image lightbox - magnific popup */


/*************************/
/*     02. Preloader     */
/*************************/
.spinner > div {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border-radius: 100%;
            background-color: #0062CC;
            -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
            animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        }

.spinner-wrapper {
    position: fixed;
    z-index: 999999;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: #fff;
}

.spinner {
    position: absolute;
    top: 50%; /* centers the loading animation vertically one the screen */
    left: 50%; /* centers the loading animation horizontally one the screen */
    width: 3.75rem;
    height: 1.25rem;
    margin: -0.625rem 0 0 -1.875rem; /* is width and height divided by two */ 
    text-align: center;
}

.spinner .bounce1 {
    -webkit-animation-delay: -0.32s;
    animation-delay: -0.32s;
}

.spinner .bounce2 {
    -webkit-animation-delay: -0.16s;
    animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
    0%, 80%, 100% { -webkit-transform: scale(0); }
    40% { -webkit-transform: scale(1.0); }
}

@keyframes sk-bouncedelay {
    0%, 80%, 100% { 
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
    } 40% { 
        -webkit-transform: scale(1.0);
        -ms-transform: scale(1.0);
        transform: scale(1.0);
    }
}


/**************************/
/*     03. Navigation     */
/**************************/
.navbar-custom {
    background-color: #0062CC;
    box-shadow: 0 0.0625rem 0.375rem 0 rgba(0, 0, 0, 0.1);
    font: 700 0.875rem/0.875rem "Open Sans", sans-serif;
    transition: all 0.2s;
}

.navbar-custom .container {
    max-width: 87.5rem;
}

.navbar-custom .navbar-brand.logo-image img {
    width: 4.4375rem;
    height: 1.75rem;
}

.navbar-custom .navbar-brand.logo-text {
    font: 700 2rem/1.5rem "Open Sans", sans-serif;
    color: #fff;;
    text-decoration: none;
}

.navbar-custom .navbar-nav {
    margin-top: 0.75rem;
    margin-bottom: 0.5rem;
}

.navbar-custom .nav-item .nav-link {
    padding: 0.625rem 0.75rem 0.625rem 0.75rem;
    color: #f7f5f5;
    opacity: 0.8;
    text-decoration: none;
    transition: all 0.2s ease;
}

.navbar-custom .nav-item .nav-link:hover,
.navbar-custom .nav-item .nav-link.active {
    color: #fff;
    opacity: 1;
}

/* Dropdown Menu */
.navbar-custom .dropdown:hover > .dropdown-menu {
    display: block; /* this makes the dropdown menu stay open while hovering it */
    min-width: auto;
    animation: fadeDropdown 0.2s; /* required for the fade animation */
}

@keyframes fadeDropdown {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.navbar-custom .dropdown-toggle:focus { /* removes dropdown outline on focus */
    outline: 0;
}

.navbar-custom .dropdown-menu {
    margin-top: 0;
    border: none;
    border-radius: 0.25rem;
    background-color: #0062CC;
}

.navbar-custom .dropdown-item {
    color: #f7f5f5;
    opacity: 0.8;
    font: 700 0.875rem/0.875rem "Open Sans", sans-serif;
    text-decoration: none;
}

.navbar-custom .dropdown-item:hover {
    background-color: #0062CC;
    color: #fff;
    opacity: 1;
}

.navbar-custom .dropdown-items-divide-hr {
    width: 100%;
    height: 1px;
    margin: 0.75rem auto 0.725rem auto;
    border: none;
    background-color: #0062CC;
    opacity: 0.2;
}
/* end of dropdown menu */

.navbar-custom .nav-item .btn-outline-sm {
    margin-top: 0.25rem;
    margin-bottom: 1.375rem;
    margin-left: 0.5rem;
    border: 0.125rem solid #fff;
    color: #fff;     
}

.navbar-custom .nav-item .btn-outline-sm:hover {
    background-color: #fff;
    color: #0062CC;
}

.navbar-custom .navbar-toggler {
    padding: 0;
    border: none;
    color: #fff;
    font-size: 2rem;
}

.navbar-custom button[aria-expanded='false'] .navbar-toggler-awesome.fas.fa-times{
    display: none;
}

.navbar-custom button[aria-expanded='false'] .navbar-toggler-awesome.fas.fa-bars{
    display: inline-block;
}

.navbar-custom button[aria-expanded='true'] .navbar-toggler-awesome.fas.fa-bars{
    display: none;
}

.navbar-custom button[aria-expanded='true'] .navbar-toggler-awesome.fas.fa-times{
    display: inline-block;
    margin-right: 0.125rem;
}


/*********************/
/*    04. Header     */
/*********************/
.header {
    background-color: #0062CC;
}

.header .header-content {
    padding-top: 8rem;
    padding-bottom: 4rem;
    text-align: center;
}

.header .text-container {
    margin-bottom: 3rem;
}

.header h1 {
    margin-bottom: 1rem;
    color: #fff;
    font-size: 2.5rem;
    line-height: 3rem;
}

.header .p-large {
    margin-bottom: 2rem;
    color: #f3f7fd;
}

.header .btn-solid-lg {
    margin-right: 0.5rem;
    margin-bottom: 1.125rem;
    margin-left: 0.5rem;
    border-color: #f3f7fd;
    background-color: #f3f7fd;
    color: #0062CC;
}

.header .btn-solid-lg:hover {
    background: transparent;
    color: #f3f7fd;
}

.header .btn-outline-lg {
    border-color: #f3f7fd;
    color: #f3f7fd;
}

.header .btn-outline-lg:hover {
    background-color: #f3f7fd;
    color: #0062CC;
}

.header-frame {
    margin-top: -1px; /* To remove white margin in FF */
    width: 100%;
    height: 2.25rem;
}


/*************************/
/*     05. Customers     */
/*************************/
.slider-1 {
    padding-top: 5rem;
    padding-bottom: 3.25rem;
}

.slider-1 .slider-container {
    text-align: center;
}


/***************************/
/*     06. Description     */
/***************************/
.cards-1 {
    padding-top: 3.25rem;
    padding-bottom: 3rem;
    text-align: center;
}

.cards-1 .h2-heading {
    margin-bottom: 3.5rem;
}

.cards-1 .card {
    max-width: 21rem;
    margin-right: auto;
    margin-bottom: 3.5rem;
    margin-left: auto;
    padding: 0;
    border: none;
}

.cards-1 .card-image {
    max-width: 16rem;
    margin-right: auto;
    margin-bottom: 2rem;
    margin-left: auto;
}

.cards-1 .card-title {
    margin-bottom: 0.5rem;
}

.cards-1 .card-body {
    padding: 0;
}


/************************/
/*     07. Features     */
/************************/
.tabs {
    padding-top: 8rem;
    padding-bottom: 8.125rem;
    background-color: #f3f7fd;
}

.tabs .h2-heading,
.tabs .p-heading {
    text-align: center;
}

.tabs .nav-tabs {
    display: block;
    margin-bottom: 2.25rem;
    border-bottom: none;
}

.tabs .nav-link {
    padding: 0.375rem 1rem 0.375rem 1rem;
    border: none;
    color: #86929b;
    font-weight: 700;
    font-size: 1.25rem;
    line-height: 1.75rem;
    text-align: center;
    text-decoration: none;
    transition: all 0.2s ease;
}

.tabs .nav-link:hover,
.tabs .nav-link.active {
    background: transparent;
    color: #0062CC;
}

.tabs .nav-link .fas {
    margin-right: 0.625rem;
}

.tabs .image-container {
    margin-bottom: 2.75rem;
}

.tabs .list-unstyled .fas {
    color: #0062CC;
    font-size: 0.5rem;
    line-height: 1.625rem;
}

.tabs .list-unstyled .media-body {
    margin-left: 0.625rem;
}

.tabs #tab-1 h3 {
    margin-bottom: 0.75rem;
}

.tabs #tab-1 .list-unstyled {
    margin-bottom: 1.5rem;
}

.tabs #tab-2 h3 {
    margin-bottom: 0.75rem;
}

.tabs #tab-2 .list-unstyled {
    margin-bottom: 1.5rem;
}

.tabs #tab-3 h3 {
    margin-bottom: 0.75rem;
}

.tabs #tab-3 .list-unstyled {
    margin-bottom: 1.5rem;
}


/***********************************/
/*     08. Features Lightboxes     */
/***********************************/
.lightbox-basic {
    margin: 2.5rem auto;
    padding: 2rem 1.5rem 2rem 1.5rem;
    border-radius: 0.25rem;
    background: #fff;
    text-align: left;
}

.lightbox-basic .container {
    padding-right: 0;
    padding-left: 0;
}

.lightbox-basic .image-container {
    max-width: 33.75rem;
    margin-right: auto;
    margin-bottom: 3rem;
    margin-left: auto;
}

.lightbox-basic h3 {
    margin-bottom: 0.5rem;
}

.lightbox-basic hr {
    width: 2.5rem;
    height: 0.125rem;
    margin-top: 0;
    margin-bottom: 0.875rem;
    margin-left: 0;
    border: 0;
    background-color: #0062CC;
    text-align: left;
}

.lightbox-basic h4 {
    margin-bottom: 1rem;
}

.lightbox-basic .list-unstyled .fas {
    color:#0062CC;
    font-size: 0.5rem;
    line-height: 1.625rem;
}

.lightbox-basic .list-unstyled .media-body {
    margin-left: 0.625rem;
}

.lightbox-basic .btn-outline-reg,
.lightbox-basic .btn-solid-reg {
    margin-top: 0.75rem;
}

/* Signup Button */
.lightbox-basic .btn-solid-reg.mfp-close {
    position: relative;
    width: auto;
    height: auto;
    color: #fff;
    opacity: 1;
}

.lightbox-basic .btn-solid-reg.mfp-close:hover {
    color: #0062CC;
}
/* end of signup Button */

/* Back Button */
.lightbox-basic a.mfp-close.as-button {
    position: relative;
    width: auto;
    height: auto;
    margin-left: 0.375rem;
    color: #0062CC;
    opacity: 1;
}

.lightbox-basic a.mfp-close.as-button:hover {
    color: #fff;
}
/* end of back button */

.lightbox-basic button.mfp-close.x-button {
    position: absolute;
    top: -0.125rem;
    right: -0.125rem;
    width: 2.75rem;
    height: 2.75rem;
    color: #707984;
}


/***********************/
/*     09. Details     */
/***********************/
.basic-1 {
    padding-top: 7.5rem;
    padding-bottom: 8rem;
}

.basic-1 .text-container {
    margin-bottom: 3.75rem;
}

.basic-1 .list-unstyled {
    margin-bottom: 1.375rem;
}

.basic-1 .list-unstyled .fas {
    color: #0062CC;
    font-size: 0.5rem;
    line-height: 1.625rem;
}

.basic-1 .list-unstyled .media-body {
    margin-left: 0.625rem;
}


/*********************/
/*     10. Video     */
/*********************/
.basic-2 {
    padding-top: 8rem;
    padding-bottom: 6.75rem;
    background-color: #f3f7fd;
    text-align: center;
}

.basic-2 .image-container {
    margin-bottom: 2rem;
}

.basic-2 .image-container img {
    border-radius: 0.75rem;
}

.basic-2 .video-wrapper {
    position: relative;
}

/* Video Play Button */
.basic-2 .video-play-button {
    position: absolute;
    z-index: 10;
    top: 50%;
    left: 50%;
    display: block;
    box-sizing: content-box;
    width: 2rem;
    height: 2.75rem;
    padding: 1.125rem 1.25rem 1.125rem 1.75rem;
    border-radius: 50%;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
}
  
.basic-2 .video-play-button:before {
    content: "";
    position: absolute;
    z-index: 0;
    top: 50%;
    left: 50%;
    display: block;
    width: 4.75rem;
    height: 4.75rem;
    border-radius: 50%;
    background: #0062CC;
    animation: pulse-border 1500ms ease-out infinite;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
}
  
.basic-2 .video-play-button:after {
    content: "";
    position: absolute;
    z-index: 1;
    top: 50%;
    left: 50%;
    display: block;
    width: 4.375rem;
    height: 4.375rem;
    border-radius: 50%;
    background: #0062CC;
    transition: all 200ms;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
}
  
.basic-2 .video-play-button span {
    position: relative;
    display: block;
    z-index: 3;
    top: 0.375rem;
    left: 0.25rem;
    width: 0;
    height: 0;
    border-left: 1.625rem solid #fff;
    border-top: 1rem solid transparent;
    border-bottom: 1rem solid transparent;
}
  
@keyframes pulse-border {
    0% {
        transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
        opacity: 1;
    }
    100% {
        transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
        opacity: 0;
    }
}
/* end of video play button */  

.basic-2 .p-heading {
    margin-bottom: 1rem;
}



/**************************/
/*     13. Newsletter     */
/**************************/
.form {
    padding-top: 4rem;
    padding-bottom: 6rem;
}

.form .text-container {
    margin-bottom: 3.5rem;
    padding: 3.5rem 1rem 2.5rem 1rem;
    border-radius: 0.5rem;
    background-color: #f3f7fd;
}

.form h2 {
    margin-bottom: 2.75rem;
    text-align: center;
}

.form .icon-container {
    text-align: center;
}

.form .fa-stack {
    width: 2em;
    margin-bottom: 0.75rem;
    margin-right: 0.375rem;
    font-size: 1.5rem;
}

.form .fa-stack .fa-stack-1x {
    color: #fff;
    transition: all 0.2s ease;
}

.form .fa-stack .fa-stack-2x {
    color: #0062CC;
    transition: all 0.2s ease;
}

.form .fa-stack:hover .fa-stack-1x {
    color: #0062CC;
}

.form .fa-stack:hover .fa-stack-2x {
    color: #f3f7fd;
}


/**********************/
/*     14. Footer     */
/**********************/
.footer-frame {
    width: 100%;
    height: 1.5rem;
}

.footer {
    padding-top: 3rem;
    padding-bottom: 0.5rem;
    background-color: #0062CC;
}

.footer .footer-col {
    margin-bottom: 2.25rem;
}

.footer h4 {
    margin-bottom: 0.625rem;
    color: #fff;
}

.footer .list-unstyled,
.footer p {
    color: #f3f7fd;
}

.footer .footer-col.middle .list-unstyled .fas {
    color: #fff;
    font-size: 0.5rem;
    line-height: 1.5rem;
}

.footer .footer-col.middle .list-unstyled .media-body {
    margin-left: 0.5rem;
}

.footer .footer-col.last .list-unstyled .fas {
    color: #fff;
    font-size: 0.875rem;
    line-height: 1.5rem;
}

.footer .footer-col.last .list-unstyled .media-body {
    margin-left: 0.625rem;
}

.footer .footer-col.last .list-unstyled .fas.fa-globe {
    margin-left: 1rem;
    margin-right: 0.625rem;
}


/**********************************/
/*     16. Back To Top Button     */
/**********************************/
/*a.back-to-top {
    position: fixed;
    z-index: 999;
    right: 0.75rem;
    bottom: 0.75rem;
    display: none;
    width: 2.625rem;
    height: 2.625rem;
    border-radius: 1.875rem;
    background: #4f3cda url("../images/up-arrow.png") no-repeat center 47%;
    background-size: 1.125rem 1.125rem;
    text-indent: -9999px;
}

a:hover.back-to-top {
    background-color: #4332c5; 
}*/


/***************************/
/*     17. Extra Pages     */
/***************************/
.ex-header {
    padding-top: 8rem;
    padding-bottom: 5rem;
    background-color: #0062CC;
    text-align: center;
}

.ex-header h1 {
    color: #fff;
}

.ex-basic-1 {
    padding-top: 2rem;
    padding-bottom: 0.875rem;
    background-color: #f3f7fd;
}

.ex-basic-1 .breadcrumbs {
    margin-bottom: 1.125rem;
}

.ex-basic-1 .breadcrumbs .fa {
    margin-right: 0.5rem;
    margin-left: 0.625rem;
}

.ex-basic-2 {
    padding-top: 4.75rem;
    padding-bottom: 4rem;
}

.ex-basic-2 h3 {
    margin-bottom: 1rem;
}

.ex-basic-2 .text-container {
    margin-bottom: 3.625rem;
}

.ex-basic-2 .text-container.last {
    margin-bottom: 0;
}

.ex-basic-2 .text-container.dark {
    padding: 1.625rem 1.5rem 0.75rem 2rem;
    background-color: #f3f7fd;
}

.ex-basic-2 .image-container-large {
    margin-bottom: 4rem;
}

.ex-basic-2 .image-container-large img {
    border-radius: 0.25rem;
}

.ex-basic-2 .image-container-small img {
    border-radius: 0.25rem;
}

.ex-basic-2 .list-unstyled .fas {
    color: #0062CC;
    font-size: 0.5rem;
    line-height: 1.625rem;
}

.ex-basic-2 .list-unstyled .media-body {
    margin-left: 0.625rem;
}

.ex-basic-2 .form-container {
    margin-top: 3rem;
}

.ex-basic-2 .btn-outline-reg {
    margin-top: 1.75rem;
}

.ex-footer-frame {
    width: 100%;
    height: 2.75rem;
    background-color: #f3f7fd;
}


/****************************************/
/*     18. Sign Up and Log In Pages     */
/****************************************/
.ex-2-header {
    padding-top: 9rem;
    background-color: #0062CC;
    text-align: center;
    min-height: 100vh;
}

.ex-2-header h1,
.ex-2-header p {
    color: #fff;
}

.ex-2-header p {
    max-width: 24rem;
    margin-right: auto;
    margin-bottom: 2.5rem;
    margin-left: auto;
}

.ex-2-header .form-container {
    max-width: 26rem;
    margin-right: auto;
    margin-left: auto;
    padding: 2.25rem 1.25rem 1.25rem 1.25rem;
    border-radius: 0.5rem;
    background-color: #f3f7fd;
}

.ex-2-header .checkbox {
    text-align: left;
}


/*****************************/
/*     19. Media Queries     */
/*****************************/ 
/* Min-width width 768px */
@media (min-width: 768px) {
    
    /* General Styles */
    .p-heading {
        width: 85%;
        margin-right: auto;
        margin-left: auto;
    }

    .h2-heading {
        width: 80%;
        margin-right: auto;
        margin-left: auto;
    }
    /* end of general styles */


    /* Header */
    .header .text-container {
        margin-bottom: 4rem;
    }

    .header h1 {
        font-size: 3.5rem;
        line-height: 4.125rem;
    }

    .header .btn-solid-lg {
        margin-bottom: 0;
        margin-left: 0;
    }

    .header-frame {
        height: 5.5rem;
    }
    /* end of header */


    /* Testimonials */
    .slider-2 .swiper-button-prev {
        width: 1.375rem;
        background-size: 1.375rem 2.125rem;
    }
    
    .slider-2 .swiper-button-next {
        width: 1.375rem;
        background-size: 1.375rem 2.125rem;
    }
    /* end of testimonials */


    /* Newsletter */
    .form .text-container {
        padding: 4rem 2.5rem 3rem 2.5rem;
    }

    .form form {
        margin-right: 4rem;
        margin-left: 4rem;
    }
    /* end of newsletter */


    /* Footer */
    .footer-frame {
        height: 5rem;
    }
    /* end of footer */


    /* Extra Pages */
    .ex-header {
        padding-top: 11rem;
        padding-bottom: 9rem;
    }

    .ex-basic-2 .text-container.dark {
        padding: 2.5rem 3rem 2rem 3rem;
    }

    .ex-basic-2 .form-container {
        margin-top: 0;
    }
    /* end of extra pages */


    /* Sign Up And Log In Pages */
    .ex-2-header {
        padding-top: 11rem;
    }

    .ex-2-header .form-container {
        padding: 2.25rem 1.75rem 1.25rem 1.75rem;
    }
    /* end of sign up and log in pages */
}
/* end of min-width width 768px */


/* Min-width width 992px */
@media (min-width: 992px) {
    
    /* Navigation */
    .navbar-custom {
        padding: 2.125rem 1.5rem 2.125rem 2rem;
        background: transparent;
        box-shadow: none;
    }

    .navbar-custom .navbar-nav {
        margin-top: 0;
        margin-bottom: 0;
    }

    .navbar-custom .nav-item .nav-link {
        padding: 0.25rem 0.75rem 0.25rem 0.75rem;
    }
    
    .navbar-custom .nav-item .nav-link:hover,
    .navbar-custom .nav-item .nav-link.active {
        opacity: 1;
    }

    .navbar-custom.top-nav-collapse {
        padding: 0.5rem 1.5rem 0.5rem 2rem;
        background-color: #0062CC;
        box-shadow: 0 0.0625rem 0.375rem 0 rgba(0, 0, 0, 0.1);
    }

    .navbar-custom.top-nav-collapse .nav-item .nav-link:hover,
    .navbar-custom.top-nav-collapse .nav-item .nav-link.active {
        color: #fff;
    }

    .navbar-custom .dropdown-menu {
        padding-top: 1rem;
        padding-bottom: 1rem;
        border-top: 0.25rem solid rgba(0, 0, 0, 0);
        border-radius: 0.25rem;
    }

    .navbar-custom.top-nav-collapse .dropdown-menu {
        border-top: 0.25rem solid rgba(0, 0, 0, 0);
        box-shadow: 0 0.375rem 0.375rem 0 rgba(0, 0, 0, 0.02);
    }

    .navbar-custom .dropdown-item {
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
    }

    .navbar-custom .dropdown-items-divide-hr {
        width: 84%;
    }

    .navbar-custom .nav-item .btn-outline-sm {
        margin-top: 0;
        margin-bottom: 0;
        margin-left: 1rem;
    }
    /* end of navigation */


    /* General Styles */
    .p-heading {
        width: 65%;
    }

    .h2-heading {
        width: 60%;
    }
    /* end of general styles */


    /* Header */
    .header .header-content {
        text-align: left;
    }

    .header .text-container {
        margin-top: 4rem;
        margin-bottom: 0;
    }

    .header .image-container {
        position: relative;
        margin-top: 3rem;
    }
    
    .header .image-container .img-wrapper {
        position: absolute;
        display: block;
        width: 470px;
    }

    .header-frame {
        height: 8rem;
    }
    /* end of header */


    /* Description */
    .cards-1 .card {
        display: inline-block;
        width: 17rem;
        max-width: 100%;
        margin-right: 1rem;
        margin-left: 1rem;
        vertical-align: top;
    }

    .cards-1 .card-image {
        width: 9rem;
    }
    /* end of description */


    /* Features */
    .tabs .nav-tabs {
        display: flex;
        justify-content: center;
        margin-bottom: 2.75rem;
    } 

    .tabs .nav-link {
        padding-right: 1.25rem;
        padding-left: 1.25rem;
        border-bottom: 2px solid rgb(202, 202, 202);
    }
    
    .tabs .nav-link:hover,
    .tabs .nav-link.active {
        border-bottom: 2px solid #0062CC;
    }

    .tabs .image-container {
        margin-bottom: 0;
    }
    /* end of features */


    /* Features Lightboxes */
    .lightbox-basic {
        max-width: 62.5rem;
        padding: 2.5rem 2.5rem 2.5rem 2.5rem;
    }

    .lightbox-basic .image-container {
        max-width: 100%;
        margin-right: 2rem;
        margin-bottom: 0;
        margin-left: 0.5rem;
    }
    
    .lightbox-basic h3 {
        margin-top: 0.5rem;
    }
    /* end of features lightboxes */


    /* Details */
    .basic-1 {
        padding-top: 8rem;
    }

    .basic-1 .text-container {
        margin-bottom: 0;
    }
    /* end of details */


    /* Video */
    .basic-2 .image-container {
        max-width: 53.125rem;
        margin-right: auto;
        margin-left: auto;
    }

    .basic-2 p {
        width: 65%;
        margin-right: auto;
        margin-left: auto;
    }
    /* end of video */


    /* Pricing */
    .cards-2 .card {
        display: inline-block;
        margin-right: 0.5rem;
        margin-left: 0.5rem;
        vertical-align: top;
    }
    /* end of pricing */


    /* Testimonials */
    .slider-2 .swiper-container {
        width: 92%;
        text-align: left;
    }

    .slider-2 .image-wrapper {
        float: left;
        width: 10rem;
        margin-bottom: 0;
    }

    .slider-2 .text-wrapper {
        max-width: 100%;
        margin-top: 1.25rem;
        margin-left: 13rem;
    }

    .slider-2 .swiper-button-prev {
        left: -0.75rem;
    }
    
    .slider-2 .swiper-button-next {
        right: -0.75rem;
    }
    /* end of testimonials */


    /* Newsletter */
    .form .text-container {
        width: 55rem;
        margin-right: auto;
        margin-left: auto;
        padding-top: 5rem;
        padding-bottom: 4.5rem;
    }

    .form h2 {
        margin-right: 7rem;
        margin-left: 7rem;
    }

    .form form {
        margin-right: 9rem;
        margin-left: 9rem;
    }
    /* end of newsletter */


    /* Extra Pages */
    .ex-header h1 {
        width: 80%;
        margin-right: auto;
        margin-left: auto;
    }

    .ex-basic-2 {
        padding-bottom: 5rem;
    }
    /* end of extra pages */
}
/* end of min-width width 992px */


/* Min-width width 1200px */
@media (min-width: 1200px) {
    
    /* General Styles */
    .h2-heading {
        width: 50%;
    }
    /* end of general styles */


    /* Header */
    .header .header-content {
        padding-top: 11rem;
        padding-bottom: 5rem;
    }

    .header .text-container {
        margin-top: 5.5rem;
        margin-right: 0.5rem;
    }

    .header .image-container {
        margin-top: 1rem;
        margin-left: 1.5rem;
    }

    .header .image-container .img-wrapper {
        width: 630px;
    }

    .header-frame {
        height: 9.375rem;
    }
    /* end of header */
    

    /* Customer */
    .slider-1 .slider-container {
        margin-right: 3rem;
        margin-left: 3rem;
    }
    /* end of customer */


    /* Description */
    .cards-1 .card {
        width: 18.875rem;
        margin-right: 2rem;
        margin-left: 2rem;
    }

    .cards-1 .card-image {
        width: 12.5rem;
    }
    /* end of description */


    /* Features */
    .tabs .image-container {
        margin-right: 1.5rem;
        margin-left: 1rem;
    }
    
    .tabs .text-container {
        margin-top: 1.5rem;
        margin-right: 1rem;
        margin-left: 1.5rem;
    }
    /* end of features */


    /* Details */
    .basic-1 .image-container {
        margin-right: 1rem;
        margin-left: 1.5rem;
    }
    
    .basic-1 .text-container {
        margin-top: 1rem;
        margin-right: 1.5rem;
        margin-left: 1rem;
    }

    .basic-1 h2 {
        margin-bottom: 1rem;
    }
    /* end of details */


    /* Pricing */
    .cards-2 .card {
        width: 19.375rem;
        max-width: 100%;
        margin-right: 1.75rem;
        margin-left: 1.75rem;
    }

    .cards-2 .card .card-body {
        padding-right: 2.25rem;
        padding-left: 2.25rem;
    }
    /* end of pricing */


    /* Testimonials */
    .slider-2 .slider-container {
        width: 64.125rem;
        margin-right: auto;
        margin-left: auto;
    }
    /* end of testimonials */


    /* Newsletter */
    .form .text-container {
        width: 64.75rem;
        padding-top: 6rem;
        padding-bottom: 5.5rem;
    }

    .form h2 {
        margin-right: 12rem;
        margin-left: 12rem;
    }

    .form form {
        margin-right: 15rem;
        margin-left: 15rem;
    }
    /* end of newsletter */


    /* Footer */
    .footer .footer-col.first {
        margin-right: 1.5rem;
    }

    .footer .footer-col.middle {
        margin-right: 0.75rem;
        margin-left: 0.75rem;
    }

    .footer .footer-col.last {
        margin-left: 1.5rem;
    }
    /* end of footer */


    /* Extra Pages */
    .ex-header h1 {
        width: 60%;
        margin-right: auto;
        margin-left: auto;
    }

    .ex-basic-2 .form-container {
        margin-left: 1.75rem;
    }

    .ex-basic-2 .image-container-small {
        margin-left: 1.75rem;
    }
    /* end of extra pages */
}
</style>

 <script>
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 15000);

 //show password


 $("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye  fa-eye-slash");
  var input = $("#pass_log_id");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>
