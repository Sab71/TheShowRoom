<!DOCTYPE html PUBLIC  utf-8>
<html>

<!DOCTYPE html>
<html xmlns>

<head>
    <meta content="en-us" http-equiv="Content-Language" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Register New User</title>
    <style type="text/css">
        .auto-style1 {
            text-decoration: underline;
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

        .error {
            color: red;
        }
    </style>
</head>

<body>

<form action="" method="post">
    <h1>Register New User</h1>
    <label>Name</label>
    <input name="name" type="text" required><br>
    <label>Username</label>
    <input name="un" type="text" required><br>
    <label>Password</label>
    <input name="pass" type="password" required><br>
    <label>Confirm Password</label>
    <input name="pw1" type="password" required><br>
    <label>Phone</label>
    <input name="phone" type="text" required><br><br>
    <input name="regstr" type="submit" value="Register">
</form>

</body>

</html>
 <?php
 
 
 if (isset($_POST['regstr']))
 {
	 if(!empty($_POST['name']&&
	 !empty($_POST['un']&&
	 !empty($_POST['pass']&&
	 !empty($_POST['pw1']&&
	 !empty($_POST['phone']))))))

	{

 $un=$_POST['un'];
 $name =$_POST['name'];
 $pass =$_POST['pass'];
 $pw1 =$_POST['pw1'];
 $phone =$_POST['phone'];
  
 
		if ($pass==$pw1 and (preg_match("/^[9|7]{1}[0-9]{7}$/",$_POST['phone']))) //pregmatch
			{
		 include "dbc.php";
		 $sql="insert into user(name ,un,pass,phone)values (:name,:un,:pass,:phone)";
		 $stmt=$conn ->prepare ($sql);
		 $stmt ->execute (array(
		 ':name'=>$name,
		 ':un'=>$un,
		 ':pass'=>$pass,
		 ':phone'=>$phone));
		 header ("location:manage.php");


 
				echo"enter correct password ";
			}
			else 
			{
				echo"enter valid phone number |try unique User name ";
			}
		}
	}
 
	 
?>