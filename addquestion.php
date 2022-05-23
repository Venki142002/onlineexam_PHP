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
    <div class="welcome" style="margin-top: 10%">
        <h2>Add A Question</h2>

        <form method="POST">
            <p>
                <label>Question Number:</label>
                <input type="number" name="question_number" style="margin-left: 10%">
            </p>
            <p>
                <label>Question Text:</label>
                <input type="text" name="question_text" style="margin-left: 16%">
            </p>
            <p>
                <label>Choice 1:</label>
                <input type="text" name="choice1" style="margin-left: 24%">
            </p>
            <p>
                <label>Choice 2:</label>
                <input type="text" name="choice2" style="margin-left: 24%">
            </p>
            <p>
                <label>Choice 3:</label>
                <input type="text" name="choice3" style="margin-left: 24%">
            </p>
            <p>
                <label>Choice 4:</label>
                <input type="text" name="choice4" style="margin-left: 24%">
            </p>
            </p>
            <p>
                <label>Correct Option Number</label>
                <input type="number" name="correct_choice" style="margin-left: 2%">
            </p>
            <input type="submit" name="submit" style="margin-left: 40%">
            <a href="index.php" style="color: red;margin-left: 10%;">user_login</a>
        </form>

        <?php
        $conn = mysqli_connect("localhost","id16687733_venki142002","Venki14_2002","id16687733_onexam");
        $query = "SELECT * FROM questions";
        $questions = mysqli_query($conn,$query);
        $total = mysqli_num_rows($questions);
        echo "<h2 style='color: red;text-align: center'>$total Questions are Avalable in DB</h2>";
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $question_number = $_POST['question_number'];
            $question_text = $_POST['question_text'];
            $correct_choice = $_POST['correct_choice'];
            // Choice Array
            $choice = array();
            $choice[1] = $_POST['choice1'];
            $choice[2] = $_POST['choice2'];
            $choice[3] = $_POST['choice3'];
            $choice[4] = $_POST['choice4'];

            // First Query for Questions Table
            $query = "INSERT INTO questions (question_number, question_text) values ($question_number,'$question_text')";


            $result = $conn->query($query);

            //Validate First Query
            if($result){
                foreach($choice as $option => $value){
                    if($value != ""){
                        if($correct_choice == $option){
                            $is_correct = 1;
                        }else{
                            $is_correct = 0;
                        }

                        //Second Query for Choices Table
                        $query = "INSERT INTO OPTIONS (question_number,is_correct,ooption) values ($question_number,$is_correct,'$value')";
                        $insert_row =  $conn->query($query);

                        // Validate Insertion of Choices
                        if($insert_row){
                            continue;
                        }
                        else{
                            die("2nd Query for Choices could not be executed" . $query);
                        }

                    }
                }
                echo "Question has been added successfully";
                header("LOCATION: addquestion.php");
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
