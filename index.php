<?php
    session_start();

    include ("db.php");

    $errors = [];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            $errors[] = "Username and password cannot be empty";
        }

        $result = pg_query_params($conn, 'SELECT * FROM users WHERE username = $1', [$username]);
        $user = pg_fetch_assoc($result);

        if ($user) {
             if(password_verify($password, $user['password'])){
                $_SESSION['username'] = $user['username'];
                header("Location: dashboard.php");
                exit();
             }       
        }
        if (empty($errors)){

        }
    }
        

        // if($result->num_rows == 1){
        //     $user = mysqli_fetch_assoc($result);

            // if(password_verify($password, $user['password'])){
            //     $_SESSION['username'] = $username;
            //     header("Location: dashboard.php");
            //     exit();
        //     } else{
        //         $errors[] = "Incorrect Credentials";
        //     }
        // }
    //     if($name == $username && $password == $password){
    //         $_SESSION['username'] = $username;
        
    //         header("Location: dashboard.php");
    //         exit();
    //     } else {
    //         $text = "eeeeeengoooottt";
    //     }
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container">
            <h1>Log In</h1>
            
            <form method="POST">
                <label for="username">Enter username:
                    <input type="text" id="username" name="username" placeholder="Username">
                </label>
                <label for="password">Enter Password:
                    <input type="text" id="password" name="password" placeholder="Password">
                </label>
                <button type="submit">Submit</button>
            </form>
            <a href = "signup.php">Sign Up</a>
            
    </div>
</body>
</html>