<?php 
require_once "pdo.php";
require_once "util.php";
session_start();
if ( isset($_POST['cancel']) ) {
    header('Location: search_cust.php');
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
 <div class="container">
 <h1>Profile Information</h1>
 <div id="profile" class="jumbotron">
<?php 
$arr = array();
$stmt = $pdo->prepare("SELECT * FROM members  where account_no = :xyz");
$stmt->execute(array(":xyz" => $_GET['account_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo '<center><h4><p>Name: '.$row['FirstName'].' '.$row['LastName'];
echo '</p><p>Account No: '.$row['account_no'];
echo '</p><p>Nationality: '.$row['Nationality'];
echo '</p><p>Gender: '.$row['Gender'];
echo '</p><p>Date of Birth:  '.$row['DOB'];
echo '</p><p>Mobile: '.$row['Mobile'];
echo '</p><p>Email:  '.$row['Email'];
echo '</p><p>Address: '.$row['Address'];

echo '</p><p></h4><h3>Balance:  &#8377 '.$row['balance'];
echo "</h3></p><p></center>";

?>
</div>
<div class="continer" id="transfer-form">
    <form method="POST">
    <div class="form-group row">
        <div class="col-md-8">
        <input type="submit" class="btn btn-primary btn-lg" value="Transfer Money" id="add_transact_form">
        <input type="submit" class="btn btn-secondary btn-lg" name="cancel" value="Cancel">
        <div id="transact_fields"></div>
    </div>
    </div>

</form>

    
</div>
 </div>
<?php require_once "tail.php"?>
 <script>
     countf=1;
     $(document).ready(function(){
		window.console && console.log('Document ready called');
        $('#add_transact_form').click(function(event){
            event.preventDefault();
            if (countf>1){
                alert('Maximum 1 entry is allowed');
				return;
            }
            countf++;
            window.console && console.log('Adding Form');

            $('#transact_fields').append(
                '<div class="form-group row">\
                    <label for="acc_no" class="col-md-2 col-form-label">Account no</label>\
                    <div class="col-md-10">\
							<input type="text" name="email" id="email" class="form-control">\
					</div>\
				</div>\
                <div class="form-group row">\
                    <div class="col-md-8">\
                        <input type="submit" class="btn btn-primary btn-lg" value="Transfer" name="transfer">\
                        <input type="submit" class="btn btn-secondary btn-lg" name="cancel" value="Cancel">\
                </div>'
            );
        });
     });
 </script>
 </body>
 </html>
