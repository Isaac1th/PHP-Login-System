<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <nav>
            <div>
                <h3>Isaac</h3>
                <ul class="menu-main">
                    <li><a href="./index.php">HOME</a></li>
                    <li><a href="a">PRODUCTS</a></li>
                    <li><a href="a">CURRENT SALES</a></li>
                    <li><a href="a">MEMBER+</a></li>
                </ul>
            </div>
            <ul class="menu-member">
                <?php
                    if (isset($_SESSION["userid"]))
                    {
                ?>
                    <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
                    <li><a href="./includes/logout.inc.php" class="header-login-a">LOGOUT</a></li>
                <?php
                    }
                    else
                    {
                ?>
                    <li><a href="a">SIGN UP</a></li>
                    <li><a href="a" class="header-login-a">LOGIN</a></li>
                <?php
                    }
                ?>
            </ul>
        </nav>
    </header>

    <section class="index-intro">
        <div class="index-intro-bg">
            <div class="wrapper">
                <div class="index-intro-cl">
                    <div class="video"></div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, libero.</p>
                </div>
                <div class="index-intro-c2">
                    <h2>We make<br>professional<br>gear</h2>
                    <a href="#">FIND OUR GEAR HERE</a>
                </div>
            </div>
        </div>
    </section>

    <section class="index-login">
        <div class="wrapper">

            <!-- Signup -->
            <div  class="index-login-signup">
                <h4>SIGN UP</h4>
                <P>Don't have an account yet? Sign up here!</P>
                <form method="post" action="./includes/signup.inc.php">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                    <input type="text" name="email" placeholder="E-mail">
                    <br>
                    <button type="submit" name="submit">SIGN UP</button>
                </form>
            </div>
            
            <!-- Login -->
            <div class="index-login-login">
                <h4>LOGIN</h4>
                <P>Don't have an account yet? Sign up here!</P>
                <form action="./includes/login.inc.php" method="post">
                    <input type="text" name="uid" placeholder="username">
                    <input type="password" name="pwd" placeholder="password">
                    <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                    <input type="text" name="email" placeholder="E-mail">
                    <br>
                    <button type="submit" name="submit">SIGN UP</button>
                </form>
            </div>
                    
        </div>
    </section>
    
</body>
</html>