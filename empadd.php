<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[name="reg"] {
            background-color: #28a745;
        }

        input[type="submit"]:hover,
        input[name="reg"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post">
        <label>Admin Authentication </label>
        <input type="text" name="un"><br><br>
        <label>Password</label>
        <input type="password" name="pass"><br><br>
        <input type="submit" name="submit" value="Login">
        <input type="hidden" name="cid" value="<?php echo isset($_SESSION['cid']) ? $_SESSION['cid'] : 0; ?>">
    </form>
</body>
</html>

<?php
session_start();
include 'dbc.php';

if (isset($_POST['submit'])) {
    if (!empty($_POST['un']) && !empty($_POST['pass'])) {
        $un = $_POST['un'];
        $pass = $_POST['pass'];
        $stmt = $conn-> query("SELECT * FROM user WHERE un='$un'");
       //  if ($un == "admin" && $pass == "112233") {
            
          
        // read form onwe table 
                header("Location: empreg.php");
            }
        } else {
            echo "Wrong username or password";
        }
    // }
    // else {
        // echo "Please fill in the username and password";
    // }

?>


