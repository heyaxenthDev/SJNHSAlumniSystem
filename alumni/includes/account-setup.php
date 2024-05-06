<?php

$username = $_SESSION['admin_cred']['username'];

// Assuming $conn is the database connection object
$check_query = "SELECT * FROM `admin` WHERE username = '$username' AND user_status = 0";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
?>

<script>
$(document).ready(function() {
    $("#setUpModal").modal("show");
});
</script>
<!-- Set up Modal -->
<div class="modal fade" id="setUpModal" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Welcome New user,
                    <span class="fst-italic"
                        style="color: #028505;"><?php echo $_SESSION['admin_cred']['username']; ?>!</span>
                </h1>
            </div>
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <small class="">Complete the set up of your account first to proceed.</small>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5 p-5 shadow">
                                <div class="mb-3 mt-2">
                                    <center class="mb-3">
                                        <img id="profilePicturePreview" src="assets/img/user.png"
                                            alt="Profile Picture Preview"
                                            style="max-width: 100%; max-height: 180px; min-height: 180px; border-radius: 50%;">
                                    </center>
                                    <small class="mt-2">Add Profile Picture</small>
                                    <input type="file" name="profilePicture" class="form-control" id="profilePicture"
                                        onchange="previewProfilePicture();" accept="image/*" required>
                                </div>
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contact" name="contact">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            name="confirmPassword">
                                    </div>
                                </div>
                                <center>
                                    <button type="submit" class="btn w-50 mt-2 mb-5 text-white"
                                        style="background-color: #028505;" name="complete">Complete</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script>
            function previewProfilePicture() {
                var preview = document.getElementById('profilePicturePreview');
                var file = document.getElementById('profilePicture').files[0];
                var reader = new FileReader();

                reader.onloadend = function() {
                    preview.src = reader.result;
                }

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "assets/img/user.png";
                }
            }
            </script>


        </div>
    </div>
</div>
<?php
} else {
?>
<script src="js/sweetalert2.all.min.js"></script>
<?php
    if (isset($_SESSION['logged'])) {
    ?>
<script type="text/javascript">
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

Toast.fire({
    background: '#53a653',
    color: '#fff',
    icon: '<?php echo $_SESSION['logged_icon']; ?>',
    title: '<?php echo $_SESSION['logged']; ?>'
});
</script>
<?php
        unset($_SESSION['logged']);
    }
    ?>
<?php
}
?>