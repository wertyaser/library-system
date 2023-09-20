<?php
session_start();
include "../db_connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/my-account.css">
    <link rel="stylesheet" href="../pico-master/css/pico.min.css" />
    <title>My Account</title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <img src="../logo.png" alt="logo" width="100" height="100" style="margin-right: 10px;">
                LOBOT
            </li>
        </ul>
        <ul>
            <a href="../logout.php" role="button">Log out</a>
        </ul>
    </nav>
    <main>
        <div class="header">
            <h1>MY ACCOUNT</h1>
            <h4>Student details</h4>
        </div>
        <div class="container">
            <?php
            $authEmail = $_GET['email'];
            // console.log(authEmail);

            // echo "Email: " . ;


            $sql = 'SELECT * FROM `users` WHERE email = \'' . $authEmail . '\'';
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['student_id'];
                    $name = $row['name'];
                    $birthday = $row['birthday'];
                    $course = $row['course'];
                    $email = $row['email'];
                    $password = $row['password'];
                    echo '<article>
                    <h2 style="margin: 0;">Name: ' . $name . '</h2>
                    <h2 style="margin: 0;">Birthday: ' . $birthday . '</h2>
                    <h2 style="margin: 0;">Course: ' . $course . '</h2>
                    <h2 style="margin: 0;">Email: ' . $email . '</h2>
                    <h2 style="margin: 0;">Password: ' . $password . '</h2>
                    <br><br>
                    <a href="../update.php?update_id=' . $id . '" role="button" >Update</a>
                    </article>
                    ';
                }
            }
            ?>
        </div>
    </main>

    <script>
        const email = JSON.parse(localStorage.getItem("lobotAuth"))

        location.href = "http://localhost/lobo/pages/my-account.php?email=" + email

    </script>
</body>
</html>