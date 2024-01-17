<?php
session_start();
include 'dbc.php';

if (isset($_SESSION['cid'])) {
    $cid = $_SESSION['cid'];

    $stmt = $conn->query("SELECT * FROM cars WHERE cid='$cid'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $cname = $row['cname'];
        $model = $row['model'];
        $color = $row['color'];
        $price = $row['price'];
        $vn = $row['vn'];
        $damg = $row['damg'];
        $prk = $row['prk'];
    } else {
        echo "Error: Unable to fetch data for the given ID";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type=text], input[type=password] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type=submit] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1>Update Data</h1>
    <form method="post">
        <label>Car Name:</label>
        <input type="text" name="cname" value="<?php if (!empty($cname)) echo $cname; ?>" />
        <br><br>
        <label>Model:</label>
        <input type="text" name="model" value="<?php if (!empty($model)) echo $model; ?>" />
        <br><br>
        <label>Color:</label>
        <input type="text" name="color" value="<?php if (!empty($color)) echo $color; ?>" />
        <br><br>
        <label>Price:</label>
        <input type="text" name="price" value="<?php if (!empty($price)) echo $price; ?>" />
        <br><br>
        <label>V Number </label>
        <input type="text" name="vn" value="<?php if (!empty($vn)) echo $vn ; ?>" placeholder="17 digits"/><br><br>
        <label>Replaced Prats:</label>
        <input type="text" name="damg" value="<?php if (!empty($damg)) echo $damg; ?>" /><br><br>
        <label>Parking:</label>
        <input type="text" name="prk" value="<?php if (!empty($prk)) echo $prk; ?>"  placeholder="eg,c1r2, C3R4"/><br><br>
        <input type="submit" name="submit" value="Save Now">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="select.php">Back to data</a>
    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['cname']) &&
        !empty($_POST['model']) &&
        !empty($_POST['color']) &&
        !empty($_POST['price']) &&
        !empty($_POST['vn']) &&
        !empty($_POST['damg'])&&
        !empty ($_POST['prk']))
        {
        $sql = "update cars set
            cname=:cn,
            model = :om, 
            color = :cl,
            price = :pr,
            vn = :vn,
            damg= :damg,
            prk =:prk 
            where cid='$cid'";
            $stmt1 = $conn->prepare($sql);
            $stmt1->execute([
            ':cn' => $_POST['cname'],
            ':om' => $_POST['model'],
            ':cl' => $_POST['color'],
            ':pr' => $_POST['price'],
            ':vn' => $_POST['vn'],
            ':damg' => $_POST['damg'],
            'prk' => $_POST['prk']
        ]);
        header("Location:select.php");
        }
}
?>