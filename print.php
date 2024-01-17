<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Print</title>
    <!DOCTYPE html>
<html>
<head>
<style>
  .container {
    width: 4cm;
    height: 3cm;
  border: 1px solid black; 
  margin: 0 auto; 
  position: absolute;
  top: 50%; 
  left: 50%;
  transform: translate(-50%, -50%); 
}
@media print{
    body *{display:inline;}
    .container{
        display: block;
    }}
  
</style>
</head>
<body>
  <div class="container">
 


  
  <div class="container">
    <?php
    include 'dbc.php';
     if (isset($_GET['id'])) {
        $cid = $_GET['id'];
    
        $stmt = $conn->query("SELECT * FROM cars WHERE cid='$cid'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $n = $stmt->rowCount();
    
        if ($n > 0) {
            
           echo "<strong>Car:</strong> {$row['cname']}</br>";
            echo "<strong>Model:</strong> {$row['model']}</br>";
            echo "<strong>Color:</strong> {$row['color']}</br>";
            echo "<strong>Parking:</strong> {$row['prk']}</br>";
        } else {
            echo "<p>NO AVAILABLE DETAILS</p>";
           
        }
      
    }

        
        
        
?></div>
 
    
</body>

<br><br><br> <br><br><br><a href='select.php'>View Records</a>
</html>