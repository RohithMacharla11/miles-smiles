  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <?php


    $connection = mysqli_connect("localhost", "root", "", "car_users");

    if (isset($_POST['registerbtn'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirmpassword'];

        if ($password === $confirm_password) {
            $query = "INSERT INTO admin_register (username,email,password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                echo "done";
                $_SESSION['success'] =  "Admin is Added Successfully";
                header('Location: register.php');
            } else {
                echo "not done";
                $_SESSION['status'] =  "Admin is Not Added";
                header('Location: register.php');
            }
        } else {
            echo "pass no match";
            $_SESSION['status'] =  "Password and Confirm Password Does not Match";
            header('Location: register.php');
        }
    }

    ?>

    <script>
    function addDetail() {
        var detailsGroup = document.getElementById('details-group');
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'details[]';
        input.className = 'form-control';
        input.placeholder = 'Enter Detail';
        detailsGroup.appendChild(input);
    }

    function addImage() {
        var imagesGroup = document.getElementById('images-group');
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'images[]';
        input.className = 'form-control';
        input.placeholder = 'Enter Image URL';
        imagesGroup.appendChild(input);
    }