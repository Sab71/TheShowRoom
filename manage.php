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
<div class="container">
        <br>
        <a href='rgstr.php'><button type="button" class="btn btn-primary">Insert Admin</button></a>|
      
        <a href='login.php'><button type="button" class="btn btn-primary">logout</button></a>
    </div>
<body>
    <div class="container">
        <h1>Employee list</h1>
        <br>
        <table>
            <tr>
                <th>Name</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Phone</th>
                <th> last login </th>
                <th>Moadify</th>
            </tr>
            <?php
            include 'dbc.php';
            $sql = "select * from emp";
            $stmt = $conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $n = $stmt->rowCount();
            if ($n > 0) {
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['un']}</td>";
                    echo "<td>{$row['pass']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    // echo "<td>{$row['ll']}</td>";
                    echo "<td>" . (isset($row['ll']) ? $row['ll'] :'N/A') . "</td>";
                    echo "<td class='action-links'>
                            <a href='DeleteE.php?id={$row['un']}' 
                            onclick=\"return confirm('Are you sure want to delete this user?');\">
                            Delete</a></td>";
                    echo "</tr>";
                }
            }
            ?>
            
        </table>
    <br>
    
  
        </div>
        <div class="container">
        <h1>Admin list</h1>
<br>
        <table>
            <tr>
                <th>Name</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Phone</th>
                <th> last login </th>
                <th>Modify</th>
            </tr>
            <?php
            include 'dbc.php';
            $sql = "select * from user";
            $stmt = $conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $n = $stmt->rowCount();
            if ($n > 0) {
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['un']}</td>";
                    echo "<td>{$row['pass']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td>" . (isset($row['ll']) ? $row['ll'] :'N/A') . "</td>";
                    echo "<td class='action-links'>                       
                        <a href='deletea.php?id={$row['un']}' 
                        onclick=\"return confirm('Are you sure want to delete this user?');\">
                        Delete</a></td>";
                    echo "</tr>";
                }
            }
            ?>
            
        </table>
    <br>
    
  
        </div>
        </div>

</body>
</html>
