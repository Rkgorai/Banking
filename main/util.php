<?php 
	require_once "pdo.php";

	function flashMessages() {

		if (isset($_SESSION['success'])) {
		echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
		unset($_SESSION['success']);
		}

		if (isset($_SESSION['error'])) {
		echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
		unset($_SESSION['error']);
		}
    }

    function validateamount() {
        if(strlen($_POST['amount'])<1){
            return "Amount fields are required";
        }

        if(is_numeric($_POST['amount']) != true){
            return "Amount Must be Numeric";
        }

        return true;
    }

    function insertTra($pdo,$sender,$reciever,$amount) {
        $sql="INSERT INTO transactions (sender, reciever, amount, date)
                    VALUES (:se, :re, :am, now())";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':se' => $sender,
            ':re' => $reciever,
            ':am' => $amount)
        );
        return;
    }

    function updateSen($pdo,$sender,$amount) {
        $sql = "SELECT balance FROM members WHERE account_no = :sen";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':sen' => $sender));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['balance']<$amount){
            return "You Don't Have sufficient Funds for this transaction";
        }

        $bal = $row['balance']-$amount;

        $sql = "UPDATE members SET balance = :bal WHERE account_no = :sen";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':bal' => $bal,
            ':sen' => $sender
        ));

        return true;
    }

    function updateRec($pdo,$reciever,$amount) {
        $sql = "SELECT balance FROM members WHERE account_no = :rec";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':rec' => $reciever));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $bal = $row['balance']+$amount;

        $sql = "UPDATE members SET balance = :bal WHERE account_no = :rec";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':bal' => $bal,
            ':rec' => $reciever
        ));

        return true;
    }