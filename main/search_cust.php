<?php 
  require_once "pdo.php";
  require_once "util.php";
    session_start();
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Customers</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php require_once "head.php"; ?>
    <?php require_once "nav.php"; ?>
</head>
<body>
  <div class="jumbotron">
        <form method="post" class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                  <input type="text" name="search" placeholder="Search for Customers" class="form-control" >
                  <select  id = "se"name="se" value = "se" class="form-control">
                    <option value="FirstName"> First Name</option>
                    <option value="Mobile"> Mobile</option>
                    <option value="Email">Email </option>
                    <option value="account_no" >Account No</option>
                  </select>
                  <input type="submit" class="btn btn-primary" value="Search" name="submit"></i>
        </form>
  </div>
  <?php 
    if(isset($_POST['submit'])){
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
        echo('</th><td>');
        echo($row['FirstName']." ".$row['LastName']);
        echo('</td><td>');
        echo(htmlentities($row['Gender']));
        echo('</td><td>');
        echo(htmlentities($row['Mobile']));
        echo('</td><td>');
        echo(htmlentities($row['Email']));
        echo('</td><td>');
        echo('<a class="btn btn-primary" href="view_profile.php?account_no='.$row['account_no'].'"role="button">View</a>');
        echo('</td></tr>');
    }
    echo('</tbody></table>'); 

    }
    $sql = "SELECT * FROM members";
    $stmt = $pdo->query($sql);
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
                echo('</th><td>');
                echo($row['FirstName']." ".$row['LastName']);
                echo('</td><td>');
                echo(htmlentities($row['Gender']));
                echo('</td><td>');
                echo(htmlentities($row['Mobile']));
                echo('</td><td>');
                echo(htmlentities($row['Email']));
                echo('</td><td>');
                echo('<a class="btn btn-primary" href="view_profile.php?account_no='.$row['account_no'].'"role="button">View</a>');
                echo('</td></tr>');
    }
    echo('</tbody><table>'); 

  ?>
    <?php require_once "footer.php";?>
</body>
</html>