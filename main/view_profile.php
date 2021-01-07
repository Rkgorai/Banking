<?php 
require_once "pdo.php";
require_once "util.php";
session_start();
if ( isset($_POST['cancel']) ) {
    header('Location: search_cust.php');
    return;
}
$sender = $_GET['account_no'];

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
 <?php flashMessages(); ?>
 <div id="profile" class="jumbotron">
<?php 

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
                    <label for="acc_no" class="col-md-2 col-form-label">Search for Customers</label>\
                    <div class="col-md-10">\
                    <input type="text" name="search" placeholder="Search for Customers" class="form-control" >\
                    <select  id = "se" name="se" value = "se" class="form-control">\
                    <option value="FirstName"> First Name</option>\
                    <option value="Mobile"> Mobile</option>\
                    <option value="Email">Email </option>\
                    <option value="account_no" >Account No</option>\
                  </select>\
					</div>\
				</div>\
                <div class="form-group row">\
                    <div class="col-md-8">\
                        <input type="submit" class="btn btn-primary btn-lg" value="Search" name="transfer">\
                        <input type="submit" class="btn btn-secondary btn-lg" name="cancel" value="Cancel">\
                </div>'
            );
        });
     });
    
 </script>
 <?php
 if(isset($_POST['transfer'])){
    $val = $_POST['se'];
    $searchq = $_POST['search'];
    $qu = "SELECT * FROM members WHERE  $val LIKE '%$searchq%'";
    $stmt = $pdo->query($qu);
    echo ("<h4>Search result for : '".$searchq."' in '".$val."' </h4>");
      echo('<table class="table table-striped">
              <thead class="thead-dark">
                  <tr>
                      <th scope="col">Account No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Email</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead><tbody>');
     while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo('<tr>
              <th scope="row">');
      echo(htmlentities($row['account_no']));
      $reciever = $row['account_no'];
      echo('</th><td>');
      echo($row['FirstName']." ".$row['LastName']);
      echo('</td><td>');
      echo(htmlentities($row['Gender']));
      echo('</td><td>');
      echo(htmlentities($row['Mobile']));
      echo('</td><td>');
      echo(htmlentities($row['Email']));
      echo('</td><td>');
      echo('<a class="btn btn-primary" href="confirmation.php?sender='.$sender.'&reciever='.$reciever.'"role="button">Send</a>');
      echo('</td></tr>');
  }
  echo('</tbody></table>'); 

  }
  ?>
 </body>
 </html>
