    <?php
    include('config.php');
    session_start();
    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        header('Location: signin.php');
        exit();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recet Password</title>
    <style>

.container-fluid {
    max-width: 600px;
    margin-top: 0px;
    margin-left: 300px;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.card-header {
    background-color: #4e73df;
    padding: 15px;
    border-bottom: none;
    border-radius: 8px 8px 0 0;
}

.card-header h6 {
    color: #fff;
    margin: 0;
    font-size: 18px;
}

.card-body {
    padding: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.form-group input {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f8f9fc;
}

.btn {
    padding: 10px 20px;
    font-size: 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
}

.btn-danger {
    background-color: #e74a3b;
    color: #fff;
}

.btn-primary {
    background-color: #4e73df;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c7321a;
}

.btn-primary:hover {
    background-color: #365ebf;
}

.alert {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.alert-danger {
    background-color: #e74a3b;
    color: #fff;
    text-decoration: none;
}

h3 {
    margin-bottom: 20px;
}

h3[color="green"] {
    color: green;
}

h3[color="red"] {
    color: red;
}

    </style>
</head>
<body>
    <?php include('navigation.php');?>
    <div class="details">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
            </div>

            <div class="card-body">
                <?php
                $connection = new mysqli("localhost", "root", "", "car_users");
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_SESSION['username'];
                    $old_password = $_POST['edit_old_password'];
                    $new_password = $_POST['edit_new_password'];
                    $confirm_password = $_POST['edit_con_password'];

                    if ($new_password !== $confirm_password) {
                        echo "<div class='alert alert-danger'>New passwords do not match.</div>";
                    } else {
                        $query = "SELECT * FROM users WHERE UserName = ?";
                        $stmt = $connection->prepare($query);
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            if (password_verify($old_password, $row['Password'])) {
                                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                                $update_query = "UPDATE users SET Password = ? WHERE UserName = ?";
                                $update_stmt = $connection->prepare($update_query);
                                $update_stmt->bind_param("ss", $hashed_password, $username);

                                if ($update_stmt->execute()) {
                                    $_SESSION['success'] = "Password updated successfully.";
                                } else {
                                    $_SESSION['status'] = "Password update failed.";
                                }
                                $update_stmt->close();
                            } else {
                                echo "<div class='alert alert-danger'>Old password is incorrect.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>User not found.</div>";
                        }
                        $stmt->close();
                    }
                }

                $connection->close();
                ?>

                <?php
                if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                    echo '<h3 style="color:green"> ' . $_SESSION['success'] . ' </h3>';
                    unset($_SESSION['success']);
                }

                if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    echo '<h3 style="color:red"> ' . $_SESSION['status'] . ' </h3>';
                    unset($_SESSION['status']);
                }
                ?>

                <form action="reset_password.php" method="post">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" name="edit_old_password" class="form-control" placeholder="Enter Old Password" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="edit_new_password" class="form-control" placeholder="Enter New Password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="edit_con_password" class="form-control" placeholder="Re-Enter New Password" required>
                    </div>
                    <a href="home.php" class="btn btn-danger">Back To Home</a>
                    <!-- <a href="register.php" class="btn btn-danger">CANCEL</a> -->
                    <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <?php
    include('admin/includes/scripts.php');
    include('admin/includes/footer.php');
    ?>
