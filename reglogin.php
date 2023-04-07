<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Template Stylesheet -->
    <link href="bootstrap/css/reglog.css" rel="stylesheet">
 
   <!-- Icon Font Stylesheet -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
     
   <style>
   
   </style>
    <title>Signin-Signup</title>
</head>
<body >
    <div class="reglogcontainer">
        <div class="signin-signup">

            <form action="" class="signInForm">
                <h2 class="title">Sign-In</h2>
                <div class="inputField">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="inputField">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" value="Login" class="btnr">
                
                <p class="socialText"> Or sign in with social platform</p>
                
                <div class="socialMedia">
                    <a href="" class="socialIcon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                </div>
                <p class="accountText">Don't have an account? <a href="#" id="signUpBtn2">Sign Up</a></p>
                    
            </form>

            <form action="" class="signUpForm">
                <h2 class="title">Sign-Up</h2>
                <div class="inputField">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="inputField">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email">
                </div>
                <div class="inputField">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" value="SignUp" class="btnr">

                <p class="socialText"> Or sign up with social platform</p>
                
                <div class="socialMedia">

                    <a href="" class="socialIcon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                </div>
                <p class="accountText">Already have an account? <a href="#" id="signInBtn2">Sign In</a></p>    
            </form>
            
        </div>

        <div class="panelsContainer"> 
            <div class="panel left-panel">
                <div class="content">
                    <h3>Member of CateringFinds?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur sapiente, ea doloremque unde similique numquam?</p>
                    <button class="btnr" id="signInBtn">Sign-In</button>
                </div>
                <img src="img/reglog/signin.svg" alt="" class="image">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>New to CateringFinds?</h3>
                    <p>Loresm ipsum dolor sit amet consectetur adipisicing elit. Aspernatur sapiente, ea doloremque unde similique numquam?</p>
                    <button class="btnr" id="signUpBtn">Sign-Up</button>
                </div>
                <img src="img/reglog/signup.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="bootstrap/js/reglog.js"></script>
</body>
</html>