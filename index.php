<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            height: 100vh;
        }

        form {
            width: 300px;
            border: 2px solid #ccc;
            padding: 30px;
            border-radius: 15px;
            margin: auto;
        }

        input {
            border: 2px solid #ccc;
            width: 100%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 15px;
        }

        button {
            float: right;
        }

        p {
            color: salmon;
        }

    </style>
</head>
<body>
    <form action="login.php" method="post">
        <h2><center>Login</center></h2>
        <?php
            if(isset($_GET['error'])) {
                echo "<p>Maaf Anda salah memasukkan user atau password, silahkan login kembali</p>";
            }

        ?>
        <label>User Name : </label>
        <input type="text" name="username" placeholder="User Name"><br>
        <label>Password : </label>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit" class="btn btn-success btn-sm">Login</button>
    </form>
</body>
</html>