<?php
    include 'includes/dbconnect.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    if (isset($_POST['Submit'])){
        //Enter data into our entries table
        $query = "INSERT INTO entries(fname, lname, email)
                  VALUES('$fname','$lname','$email')";
        
        mysqli_query($conn, $query);
    }

    $last_entry = mysqli_insert_id($conn);

    mysqli_close($conn);

    header("Location: newsletter.php?msg=thankyou&last_entry=" . $last_entry);
?>