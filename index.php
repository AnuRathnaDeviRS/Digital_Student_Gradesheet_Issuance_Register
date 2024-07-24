<html>
<head>
    <meta charset="utf-8">
    <title>Digital Gradesheet Issuance Register</title>
    <!-- <link rel="stylesheet" type="text/css"href="style.css"> -->

    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style>
    *
 {
    padding: 0;
    margin:0;
 }

.section1
{
    position:absolute;
    
}

nav
{   position:fixed;
    background-color: skyblue;
    height: 70px;
    width: 100%;
    z-index: 1;
}

.logo
{
    font-size: 25px;
    position: relative ;
    left:5%;
    color: white;
    font-weight: bold;
    line-height:70px ;
}

ul
{
    position: relative;
    float: right;
    margin-right: 20px;
}
ul li
{
    display: inline-block;
    line-height: 70px;
    margin:0 5px;

}

ul li a
{
    text-decoration: none;
    color: white;
    font-size:17px;
}

.main_img
{
    width: 100%;
    height: 100%;
}

.form_deg
{
    padding-top: 200px;
}
/* .label_deg
{
    display: inline-block;
    color: skyblue;
    width: 100px;
    text-align: right;
    padding-top: 10px;
    padding-bottom: 10px;
} */
.label_deg {
        display: inline-block;
        color:black;
        width: 100px;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;
    }
.login_form {
        background-color: white;
        width: 400px;
        padding-top: 70px;
        padding-bottom: 70px;
        margin: 0 auto; 
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }
    
/* .login_form
{
    background-color: black;
    width: 400px;
    padding-top: 70px;
    padding-bottom: 70px;
} */

.title_deg
{
    background-color: #4db8ff;
    color: white;
    text-align: center;
    margin-bottom:20px;
    font-weight: bold;
    width: 400px;
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 20px;
    border-radius:20px;
    margin-top:20px;
}

body
{
    background-image: url('kct.jpeg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}

</style>
</head>
<body>
    <nav>
        <label class="logo">
            Kumaraguru College of Technology
        </label>
        <!-- <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul> -->
    </nav>
    <div class="section1">
        <!-- <img class="main_img" src="kct.jpeg"> -->
    </div>
    <center>
            <div class="form_deg">
            <center class="title_deg">
                        Login Form
                        <h4>
                            <?php
                            error_reporting(0);
                            session_start();
                            session_destroy();
                            echo $_SESSION['loginMessage'];
                            ?>
                        </h4>
                    </center>
                <form action="login_check.php" method="POST" class="login_form">
                    
                    <div>
                        <label class="label_deg">Username</label>
                        <input type="text" name="username">
                    </div>

                    <div>
                        <label class="label_deg">Password</label>
                        <input type="Password" name="password">
                    </div>

                    <div style="margin-left:30px;margin-top:20px">
                        <input class="btn btn-primary" type="submit" name="submit" value="login">
                    </div>

                </form>
            </div>
        </center>
</body>
</html>