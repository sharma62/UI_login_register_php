<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets2/css/login.css">
</head>
<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'ice');

    if (!$conn) {
        die("Sorry, we failed to connect: " . mysqli_connect_error());
    } else {
        echo "Page connected successfully";
    }
    $success_message = '';
    $error_message = '';
if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
                // Check if Password and Confirm Password match
        if ($password === $confirm_password) {
            $sql = "INSERT INTO `register` (`name`, `email`, `phone`, `password`) 
                    VALUES ('$name', '$email', '$phone', '$password')";
    if (mysqli_query($conn, $sql)) {
                // Set success message
                $success_message = 'Record added successfully!';
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Set error message
            $error_message = 'Password and Confirm Password do not match.';
        }
    }

    mysqli_close($conn);
    ?>

    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="assets2/images/login.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <h1>Register Now</h1>
                            </div>
                            <p class="login-card-description">Set up your account</p>
                            <form action="register.php" method="post">
                                <div class="form-group">
                                    <label for="name" class="sr-only">Full-Name</label>
                                    <input type="name" name="name" id="name" class="form-control" placeholder="Enter Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="Phone" class="sr-only">Phone no.</label>
                                    <input type="number" name="phone" id="Phone" class="form-control" placeholder="Enter Phone number">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="*****Password******">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="confirm_password" class="sr-only">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="****Confirm Password*******">
                                </div>
                                <input name="submit" id="submit" class="btn btn-block login-btn mb-4" type="submit" value="Register">
                            </form>
                            <?php
                            if (!empty($success_message)) {
                                echo '<div id="alert-success" class="alert alert-success">' . $success_message . '</div>';
                            }
                            if (!empty($error_message)) {
                                echo '<div id="alert-error" class="alert alert-danger">' . $error_message . '</div>';
                            }
                            ?>
                            <p class="login-card-footer-text">I have an account? <a href="Login.html" class="text-reset">Login here</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
