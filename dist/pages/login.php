<?php
require_once('../../config.php');
require_once(APP_PATH . '/dist/handler/database.php');

if(isset($_SESSION['admin_email'])){
    header("Location: ".APP_URL."dist/pages/index.php");
}

// Check if the form is submitted
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Prepare the SQL query
    $sql = "SELECT * FROM admin WHERE email = '".$email."'";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("s", $email);
    // $stmt->execute();
    // $result = $stmt->get_result();
    $result = $conn->query($sql);


    // Check if the email exists
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        // Verify the password
        if ($admin['password'] == $password) {
            // Check if the account is active
            if ($admin['status'] == 1) {
                // Set session variables
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_email'] = $admin['email'];

                // Redirect to the admin dashboard
                header("Location: ".APP_URL."dist/pages/index.php");
                exit();
            } else {
                $message =  "Your account is inactive. Please contact the administrator.";
            }
        } else {
            $message =  "Invalid password.";
        }
    } else {
        $message =  "No account found with that email.";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($message != '') : ?>
                            <div class="">
                                <h2 class="alert alert-danger"><?= $message ?></h2>
                            </div>
                        <?php endif ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>