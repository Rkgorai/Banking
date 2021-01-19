<?php 
  require_once "pdo.php";
  require_once "util.php";
    session_start();
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Transactions</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php require_once "head.php"; ?>
    <?php require_once "nav.php"; ?>
</head>
<body>
  <div class="jumbotron">
        <form method="post" class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                  <input type="text" name="search" placeholder="Search for Customers" class="form-control" >
                  <select  id = "se"name="se" value = "se" class="form-control">
                    <option value="sender"> Sender</option>
                    <option value="Reciever"> Reciever</option>
                  </select>
                  <input type="submit" class="btn btn-primary" value="Search" name="submit"></i>
        </form>
  </div>
  <?php 
    if(isset($_POST['submit'])){
      $val = $_POST['se'];
      $searchq = $_POST['search'];
      $qu = "SELECT * FROM transactions WHERE  $val LIKE '%$searchq%'";
      $stmt = $pdo->query($qu);
      echo ("<h4>Search result for : '".$searchq."' in '".$val."' </h4>");
        echo('<table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Sender</th>
                        <th scope="col">Reciever</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead><tbody>');
       while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo('<tr>
                <th scope="row">');
        echo(htmlentities($row['transaction_id']));
        echo('</th><td>');
        echo($row['sender']);
        echo('</td><td>');
        echo(htmlentities($row['reciever']));
        echo('</td><td>');
        echo(htmlentities($row['amount']));
        echo('</td><td>');
        echo(htmlentities($row['date']));
        echo('</td></tr>');
    }
    echo('</tbody></table>'); 

    }
    $sql = "SELECT * FROM transactions ORDER BY transaction_id DESC";
    $stmt = $pdo->query($sql);
        echo('<table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Transaction ID</th>
                        <th scope="col">Sender</th>
                        <th scope="col">Reciever</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead><tbody>');
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo('<tr>
                <th scope="row">');
                echo(htmlentities($row['transaction_id']));
        echo('</th><td>');
        echo($row['sender']);
        echo('</td><td>');
        echo(htmlentities($row['reciever']));
        echo('</td><td>');
        echo(htmlentities($row['amount']));
        echo('</td><td>');
        echo(htmlentities($row['date']));
                echo('</td></tr>');
    }
    echo('</tbody><table>'); 

  ?>
    <?php require_once "footer.php";?>
</body>
</html>