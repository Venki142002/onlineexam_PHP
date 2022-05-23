<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="style_basic.css">
</head>
<body>
<div class="heading">
    ONLINE EXAMINATION PORTAL

</div>

<div class="login-box">
    <form method="post" class="form">
        <h2>REGISTRATION FORM</h2>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <label><input type="text" name="user" placeholder="USERNAME" style="color: white" required></label>
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <label>
                <input type="password" name="pass" placeholder="Password"  required>
            </label>
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <label>
                <input type="password" name="conpass" placeholder="Confirm Password" required>
            </label>
        </div>
        <input type="submit" class="btn" value="Sign up" style="width: 100%">
        <a  href="index.php" > <button type="button"  style="width: 100%"class="btn"> LOGIN</button></a>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST['user']) && !empty($_POST['pass']))
        {
            if(@!$conn = mysqli_connect("localhost","id16687733_venki142002","Venki14_2002","id16687733_onexam"))
            {
                echo "<h4 style='color: red'>COULDN'T CONNECT TO DATABASE☹<h1>";
            }
            else
            {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $conpass = $_POST['conpass'];
                if($pass == $conpass)
                {
                $query = ("INSERT INTO exam (USERNAME,PASSWORD) VALUES ('$user','$pass')");
               if($conn->query($query))
               {
                   echo "ACCOUNT CREATED SUCESSFULLY";
               }
                }
                else{
                    echo ("PASSWORD AND CONFIRM PASSWORD ARE NOT MATCH");
                }
            }
        }
    }
    ?>


