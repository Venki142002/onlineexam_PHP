<?php 

session_start();

?>

<html lang="en">
<head>
	<title>PHP Quiz</title>
	<link rel="stylesheet" type="text/css" href="question.css">
</head>
<body>

	<header>
		<div class="heading">
			<p>PHP Quiz</p>
		</div>
	</header>
			<div class="welcome">
				<h2><?php echo $_SESSION['user']." "?>Your Result</h2>
				<p>Congratulation You have completed this test succesfully.</p>
				<p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?>  </p>
				<?php unset($_SESSION['score']); session_destroy();?>
                <a href="index.php"> <button type="button" class="but" >  login </button></a>
			</div>
    <script type="text/javascript" >
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    </script>
</body>
</html>