<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="en-us" http-equiv="Content-Language" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Add Car</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        form {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .box {
            margin-bottom: 15px;
        }

        .auto-style2 {
            font-size: xx-large;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
        }

        .inputtext{
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type=submit],
        input[type=reset] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type=submit]:hover,
        input[type=reset]:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .success-message {
            text-align: center;
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<form action="insert.php" method="post" enctype="multipart/form-data">
    <div class="fram">
        <div class="box">
            <span class="auto-style2">Add Car to the Showroom</span>
        </div>

        <div class="box">
            <label for="cname">Car Name:</label>
            <input class="inputtext" type="text" name="cname" />
        </div>

        <div class="box">
            <label for="model">Model:</label>
            <input class="inputtext" type="number" name="model" placeholder="" width=150px/>
        </div>

        <div class="box">
            <label for="color">Car Color:</label>
            <input class="inputtext" type="text" name="color" />
        </div>

        <div class="box">
            <label for="price">Price:</label>
            <input class="inputtext" type="number" name="price" placeholder="numbers only " />
        </div>

        <div class="box">
            <label for="vn">V number:</label>
            <input class="inputtext" type="text" name="vn"  placeholder="must be 17 charecters "/>
        </div>

        <div class="box">
            <label for="damg">Damage:</label> 
            <input class="inputtext" type="text" name="damg" />
        </div>
        <div class="box">
            <label for="prk">Park:</label> 
            <input class="inputtext" type="text" name="prk" placeholder=" eg c1r3 ,C1R4"/>
        </div>
    </div>

    <div class="box">
        <input type="submit" name="submit" value="Add New Car" />
        <input type="reset" name="reset" value="Reset" />
    </div>

    <div class="box">
        <br>
        <a href='select.php'>Back to Records</a>
    </div>
</form>
</body>
</html>


<?php

if (isset($_POST['submit'])) {
    if (
        !empty($_POST['cname']) &&
        !empty($_POST['model']) &&
        !empty($_POST['color']) &&
        !empty($_POST['price']) &&
        !empty($_POST['vn']) &&
        !empty($_POST['damg']) &&
        !empty($_POST['prk'])
    ) {
        $cname = $_POST['cname'];
        $model = $_POST['model'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $vn = $_POST['vn'];
        $damg = $_POST['damg'];
        $prk = $_POST['prk'];
        
        // Validate V number and parking using a regular expression
        if (preg_match('/^[A-Z0-9]{17}$/', $vn) ) {
            include "dbc.php";

            $sql = "INSERT INTO cars (cname, model, color, price, vn, damg, prk ) VALUES (:cn, :mo, :cl, :pr, :vn, :damg, :prk)";
            $stmt = $conn->prepare($sql);

            if ($stmt->execute([
                ':cn' => $cname,
                ':mo' => $model,
                ':cl' => $color,
                ':pr' => $price,
                ':vn' => $vn,
                ':damg' => $damg,
                ':prk' => $prk,
            ])) {
                echo "Data inserted successfully";
                header("location: select.php");
            } else {
                echo "Error inserting data into the database";
            }
        } else {
            echo "V number muat be 17 digit";
        }
    } else {
        echo "Please fill out the form completely";
    }
}

?>
</body>
</html>