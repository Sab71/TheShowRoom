<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Car List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 80px  auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width:100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .action-links a {
            margin-right: 5px;
        }

        .search-form {
            text-align: center;
            margin: 20px 0;
        }

        .search-form input[type=text] {
            width: 60%;
            padding: 8px;
        }

        .search-form input[type=submit] {
            padding: 8px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Car List</h1>
        <a href="profile.php">profile </a>|
        <a href="insert.php">Insert data</a> |
        <!-- <button type="button" class="btn btn-primary">Insert data</button></a>| -->
        <a href="logout.php">Logout</a>|
        <a href="empadd.php"> Add employee </a>
        <table>
            <tr>
                <th>Car class</th>
                <th>Model</th>
                <th>Color</th>
                <th>Price</th>
                <th>V Number</th>
                <th>Replaced Prats</th>
                <th>Parking</th>
                <th>Action</th>
            </tr>
            <?php
            include 'dbc.php';
            $sql = "select * from cars";
            $stmt = $conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $n = $stmt->rowCount();
            if ($n > 0) {
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>{$row['cname']}</td>";
                    echo "<td>{$row['model']}</td>";
                    echo "<td>{$row['color']}</td>";
                    echo "<td>{$row['price']}</td>";
                    echo "<td><a href='https://en.bidfax.info/search?q={$row['vn']}' target='_blank'>{$row['vn']}</td>";
                    echo "<td>{$row['damg']}</td>";
                    echo "<td>{$row['prk']}</td>";
                    echo "<td class='action-links'>
                    
                    <a href ='print.php?id={$row['cid']}'>Print</a>|
                        <a href='adminup.php?id={$row['cid']}'>Update</a> |
                        <a href='delete.php?id={$row['cid']}' onclick=\"return confirm('Are you sure want to delete this car?');\">Delete</a></td>";
                    echo "</tr>";
                }
            }
            ?>
            
        </table>
    <br>
    <div class="container">
        <br>
        <h3>Search </h3>
        <form class="search-form" method="post">
            <input type="text" name="searchInput" placeholder="Search via model and car class">
            <input type="submit" value="Search">

        </form>
    </div>
    <table comtant-align="center">
    
    
        
            <tr>
                <th>Car class</th>
                <th>Model</th>
                <th>Color</th>
                <th>Price</th>
                <th>V Number</th>
                <th>Replaced Prats</th>
                <th>Parking</th>
                <th>Action</th>
            </tr>
    
<?php 

        include "dbc.php";
        
    
    if(isset($_POST['searchInput'])) {
        $searchInput = $_POST['searchInput'];
        
        $sql = "SELECT * FROM cars WHERE cname LIKE '%$searchInput%' OR model LIKE '%$searchInput%'";
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $n = $stmt->rowCount();

        if ($n > 0) {
            echo "<h2>Search Results:</h2>";
            
            
            foreach ($rows as $row)
            {
                echo "<tr>";
                echo "<td>{$row['cname']}</td>";
                echo "<td>{$row['model']}</td>";
                echo "<td>{$row['color']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td><a href='https://en.bidfax.info/search?q={$row['vn']}' target='_blank'>{$row['vn']}</td>";
                echo "<td>{$row['damg']}</td>";
                echo "<td>{$row['prk']}</td>";
                echo "<td class='action-links'>
                <a href ='soled.php?id={$row['cid']}'>Soled</a>|
                    <a href ='print.php?id={$row['cid']}'>Print</a>|
                    <a href='update.php?id={$row['cid']}'>Update</a> |
                    <a href='delete.php?id={$row['cid']}'
                     onclick=\"return confirm('Are you sure want to delete this car?');\">
                    Delete</a></td>";
                echo "</tr>";    
            }

        } 

        else {
        echo "No results found.";
        }
    }
    ?>
    </table>
        </div>
        </div>

</body>
</html>
