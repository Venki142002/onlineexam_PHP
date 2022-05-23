<?php
$conn = mysqli_connect("localhost","id16687733_venki142002","Venki14_2002","id16687733_onexam");
	session_start();
	$number = $_GET['n'];
	$query = "SELECT * FROM questions WHERE question_number = $number";
	$result = mysqli_query($conn,$query);
	$question = mysqli_fetch_assoc($result);
	$query = "SELECT * FROM OPTIONS WHERE question_number = $number";
	$choices = mysqli_query($conn,$query);
	// Get Total questions
	$query = "SELECT * FROM questions";
	$total_questions = mysqli_num_rows(mysqli_query($conn,$query));
?>
<html lang="en">
<head>
	<title>PHP Quiz</title>
	<link rel="stylesheet" type="text/css" href="question.css">
</head>
<body>
		<div class="heading">
			<p>PHP Quiz</p>
		</div>

			<div class="welcome">
				<div class="current">Question <?php echo $number; ?> </div>
				<p class="question"><?php echo $question['question_text']; ?> </p>
				<form method="POST" action="process.php">
					<ul class="choicess">
						<?php while($row=mysqli_fetch_assoc($choices)){ ?>
						<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['ooption']; ?></li>
						<?php } ?>
					</ul>
					<input type="hidden" name="number" value="<?php echo $number; ?>">
					<input type="submit" name="submit" value="Submit" style="margin-left: 35%;background-color: darkblue;color: yellow;font-size: xx-large">
				</form>
			</div>
    <script type="text/javascript" >
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    </script>
</body>
</html>