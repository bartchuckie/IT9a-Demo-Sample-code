<?php
// require "db_mysqli.php";

// $stmt = $conn->prepare("INSERT INTO students (fullname, course) VALUES (?, ?)");
// $stmt->bind_param("ss", $fullname, $course);

// $fullname = "Maria Clara";
// $course = "BSCS";

// $stmt->execute();

// echo "Student inserted successfully!";


require "db_mysqli.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $course   = $_POST['course'];

    $stmt = $conn->prepare(
        "INSERT INTO students (fullname, course) VALUES (?, ?)"
    );
    $stmt->bind_param("ss", $fullname, $course);
    

    //Redirect after insert. 
    //REDIRECT AFTER INSERT
    //header("Location: success.php");
    //exit();
    
    if ($stmt->execute()) {
        header("Location: form.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}


?>
