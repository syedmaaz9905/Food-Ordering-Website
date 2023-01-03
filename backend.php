<?php

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // DATABASE CONNECTION

    $conn = new mysqli('localhost', 'root', '','registerformecommerce');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
    else {
    $stmt = $conn->prepare("insert into register (email, password, confirmpassword)
    values(?, ?, ?)");
    $stmt->bind_param("sss", $email, $password, $confirmpassword);
    $stmt->execute();
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
    }

?>
