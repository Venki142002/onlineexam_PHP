<html lang="en">
<head>
    <meta charset="UTF-8">
        <title>WELCOME</title>
    <link rel="stylesheet" href="exam.css">
</head>
<body>
<div class="heading">
    ONLINE EXAMINATION PORTAL
</div>
<div class="welcome">
    <i class="fas fa-user fa-10x" style="margin-left: 30%"></i><BR><BR><BR><BR>
    <?php
    session_start();
    $user =$_SESSION['user'];
    echo "<center><h1>WELCOME $user</h1></center>";
    ?>
</div>

<a class="EXAM" href="question.php?n=1"> START EXAM </a>

<script type="text/javascript" >
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
</body>
</html>