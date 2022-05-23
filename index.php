<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="style_basic.css">
</head>
<body>
<div class="heading">
ONLINE EXAMINATION PORTAL
    <div class="hom">
<a href="../../index.html" >Home</a>
    </div>
</div>

    <div class="login-box">
        <form method="post" class="form">
        <h1>User Login</h1>
        <div class="textbox">
        <i class="fas fa-user"></i>
        <label><input type="text" name="user" placeholder="USERNAME" style="color: white" required></label>
        </div>

    <div class="textbox">
        <i class="fas fa-lock"></i>
        <label>
            <input type="password" name="pass" placeholder="Password" required>
        </label>
    </div>
        <input type="submit" class="btn" value="Sign in" style="width: 49%">
            <a  href="registration.php"> <button type="button" class="but" style="width: 49%"> Sign up</button></a>
            <a  href="admin.php"> <button type="button" class="but" > ADMIN</button></a>
        </form>




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['user']) && !empty($_POST['pass']))
    {
        if(@!$conn = mysqli_connect("localhost","id16687733_venki142002","Venki14_2002","id16687733_onexam"))
        {
            echo "<h4 style='color: yellow'>COULDN'T CONNECT TO DATABASE☹<h1>";
            }
        else
            {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $query = ("SELECT * FROM exam WHERE USERNAME='" . $user . "' AND PASSWORD='" . $pass . "'");
            $RESULT = $conn->query($query);
            if ($RESULT != null) {
                while ($row = $RESULT->fetch_assoc()) {
                    $dbusername = $row['USERNAME'];
                    $dbpassword = $row['PASSWORD'];
                    session_start();
                    $_SESSION['user'] = $dbusername;
                }
                if ($user == $dbusername && $pass == $dbpassword) {
                    header("LOCATION: exam.php");
                } else {
                    echo "<h3 style='text-align:center;color: gold'>Invalid username or password!☹</h3>";
                }
            }
        }
    }
}
?>
    </div>
<script type="text/javascript" >
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
</body>
</html>