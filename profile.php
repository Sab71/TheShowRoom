<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            text-align: center;
            margin-top: 50px;
        }
        table {
            margin-left: 5%;
            width:90%;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome <?php 
        session_start();
        echo $_SESSION['un']; ?></h1>
        <br>
        <a href='select.php'>View Records</a>
        <br>
        <a href='logout.php'>Logout</a>

        

    </div>

    <table>
            <tr>
                <th>Car class</th>
                <th>Model</th>
                <th> Avilable </th>
            </tr>
            <?php
            include 'dbc.php';
            $sql = "   SELECT model, cname , COUNT(*) as count
            FROM cars
            GROUP BY model, cname";
         

            $stmt = $conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $n = $stmt->rowCount();
            if ($n > 0) {
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>{$row['cname']}</td>";
                    echo "<td>{$row['model']}</td>";
                    echo"<td>{$row['count']}</td>";
                }}
                    ?>
    </table>
</body>
</html>
