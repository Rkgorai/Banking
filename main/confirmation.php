<?php 
  require_once "pdo.php";
  require_once "util.php";
    session_start();
    
    if ( isset($_POST['cancel']) ) {
        header('Location: search_cust.php');
        return;
    }

    $sender = $_GET['sender'];
    $reciever = $_GET['reciever'];

    if(isset($_POST['amount']) && isset($_POST['check'])){
        $msg = validateamount();
        if (is_string($msg)){
            $_SESSION['error'] = $msg;
            header("Location: confirmation.php?sender=".$sender."&reciever=".$reciever);
            return;
        }
        $amount = $_POST['amount'];
        $msg = updateSen($pdo,$sender,$amount);

        if (is_string($msg)){
            $_SESSION['error'] = $msg;
            header("Location: confirmation.php?sender=".$sender."&reciever=".$reciever);
            return;
        }

        $msg = insertTra($pdo,$sender,$reciever,$amount);

        if (is_string($msg)){
            $_SESSION['error'] = $msg;
            header("Location: confirmation.php?sender=".$sender."&reciever=".$reciever);
            return;
        }

        $msg = updateRec($pdo,$reciever,$amount);

        if (is_string($msg)){
            $_SESSION['error'] = $msg;
            header("Location: confirmation.php?sender=".$sender."&reciever=".$reciever);
            return;
        }
        echo '<script>alert("Money Successfully Transferred");
              window.location.replace("search_cust.php");
            </script>';
        return;
    }
?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>Viewing Profile</title>
 	<?php require_once "head.php"; ?>
     <?php require_once "nav.php"; ?>
 </head>
 <body>
    <div class="container" id="confirmation">
        <div class="row row-content">
            <div class="col-12">
                <h1>Transfer Money</h1>
            </div>
            <div class="col-12 col-md-6">
                <?php

                    //Sender Details Display
                    $stmt = $pdo->prepare("SELECT * FROM members where account_no = :xyz");
                    $stmt->execute(array(":xyz" =>$sender));
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo '<h5><b>Sender Details</b></h5>';
                    echo '<p>Name : '.$row['FirstName'].' '.$row['LastName'];
                    echo '</p><p>Gender : '.$row['Gender'];
                    echo '</p><p>DOB : '.$row['DOB'];
                    echo '</p><p>Mobile : '.$row['Mobile'];
                    echo '</p><p>Email : '.$row['Email'];
                    echo "</p><p></div>";

                    echo '<div class="col-12 col-md-6">';

                    //Reciever Details Display
                    $stmt = $pdo->prepare("SELECT * FROM members where account_no = :xyz");
                    $stmt->execute(array(":xyz" =>$reciever));
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo '<h5><b>Reciever Details</b></h5>';
                    echo '<p>Name : '.$row['FirstName'].' '.$row['LastName'];
                    echo '</p><p>Gender : '.$row['Gender'];
                    echo '</p><p>DOB : '.$row['DOB'];
                    echo '</p><p>Mobile : '.$row['Mobile'];
                    echo '</p><p>Email : '.$row['Email'];
                    echo "</p><p>";

                ?>
            </div>
        </div>   

        <center>
            <form method="POST">
                <div class="form-group row">
                    <label for="acc_no" class="col-md-2 col-form-label">Amount</label>
                    <div class="col-md-5">
						<input type="text" name="amount" id="amount" class="form-control">
					</div>
				</div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="Checkbox" name="check">
                    <label class="form-check-label" for="defaultCheck1">
                    I want to Send the mentioned Amount to mentioned Reciever from the mentioned Sender
                    </label>
                </div>

                <div class="form-group row">
                    <div class="col-md-5">
                    <input type="submit" class="btn btn-success" value="Send Now">
                    <input type="submit" class="btn btn-secondary" name="cancel" value="Cancel">
                    </div>
                </div>
            </form>
        </center>

    </div>
 </body>
 </html>
