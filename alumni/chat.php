<?php
include 'includes/conn.php';
include 'authentication.php';
include 'alert.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SJNHS - Alumni &amp; Yearbook System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/chat-style.css" rel="stylesheet">
</head>

<body>
    <?php
    $alumni_id = $_SESSION['user_cred']['alumni_id'];
    $id = $_SESSION['user_cred']['id'];
    $table = $_SESSION['user_cred']['table'];
    $type = ($_SESSION['user_cred']['type'] == "SHS") ? "SHS" : "JHS";

    $query = "SELECT *, upper(left(firstname,1)) AS initialF, upper(left(middlename,1)) AS initialM FROM `$table` WHERE alumni_id = '$alumni_id' AND id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            // Access data from the row
            $user = $row['initialF'] . ". " . $row['lastname'];
            $idNum = $row['id'];
            $picture = $row['profile_picture'];
            $name = $row['firstname'] . " " . $row['initialM'] . ". " . $row['lastname'];
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $mname = $row['middlename'];
            $email = $row['email'];
            $profession = $row['profession'];
            $company = $row['current_company_bus'];
            $contact = $row['phone_num'];
            $year = $row['year_graduated'];
            $sec_track = ($type == "SHS") ? $row['track'] . " " . $row['section'] : $row['section'];
            $address = $row['address'];
            $hs = $type;
            // Add more assignments as needed for other columns
        }
    } else {
        echo "0 results";
    }
    ?>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="feed.php" class="logo d-flex align-items-center">
                <img src="assets/img/SJNHS-logo.png" alt="">
                <span class="d-none d-lg-block">SJNHS Alumni</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn d-md-none"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="feed.php">
                        <i class="bi bi-newspaper"></i>
                    </a><!-- End Feed Icon -->

                </li><!-- End Feed Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...
                                    </p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...
                                    </p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...
                                    </p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?= $picture ?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?= $user ?>
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $name ?></h6>
                            <span><?= $profession ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="user-profile.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="user-profile.php">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/SJNHSAlumniSystem/logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header><!-- End Header -->

    <?php
      $table = $_SESSION['user_cred']['table'];

      $select_id = "SELECT id AS selectID FROM batchyear WHERE batch_year = '$year' AND hs_type = '$type'";
      $result = $conn->query($select_id);
      $select = $result->fetch_assoc();


      $sql = "SELECT chat.msg_id, chat.conversationID, chat.outgoing_msg_id, chat.msg_content, chat.timestamp, $table.profile_picture 
              FROM chat 
              JOIN $table ON chat.outgoing_msg_id = $table.alumni_id 
              WHERE chat.conversationID IN (SELECT id FROM batchyear WHERE batch_year = '$year' AND hs_type = '$type')";
      $result = $conn->query($sql);
      
      
      $chatData = array();
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $chatData[] = $row;
          }
      }
      $conn->close();
      ?>

    <script>
    const chatData = <?php echo json_encode($chatData); ?>;
    const currentAlumniId = <?php echo json_encode($alumni_id); ?>;
    </script>

    <main class="main" id="main">
        <section class="section">
            <div class="row dashboard">
                <!-- Left side columns -->
                <div class="col-lg-3 d-none d-md-block sidebar">

                    <ul class="sidebar-nav " id="sidebar-nav">
                        <!-- Profile Info -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="user-profile.php">
                                <div class="row">
                                    <div class="col-auto user-picture">
                                        <img src="<?= $picture ?>" alt="User Picture" class="img-fluid">
                                        <div class="user-name"><?= $name ?></div>
                                    </div>
                                </div>
                            </a>
                        </li><!-- End Profile Info -->

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="feed.php">
                                <i class="bi bi-newspaper"></i>
                                <span>Feed</span>
                            </a>
                        </li><!-- End Feed Nav -->

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="yearbook.php">
                                <i class="bi bi-book-fill"></i>
                                <span>Year Book</span>
                            </a>
                        </li><!-- End Year Book Nav -->

                        <li class="nav-item">
                            <a class="nav-link" href="chat.php">
                                <i class="bi bi-chat-left-text-fill"></i>
                                <span>Chat</span>
                            </a>
                        </li><!-- End Messages Nav -->

                    </ul>

                </div><!-- End Left side columns -->

                <div class="col-lg-9">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md">
                            <!-- Card with header and footer -->
                            <div class="card">
                                <div class="card-header chat">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/img/user.png" class="rounded-circle me-2"
                                                alt="Profile Picture" style="width: 40px; height: 40px;">
                                            <div>
                                                <h5 class="card-title mb-0">Batch <?=$year?></h5>
                                                <small>Online</small>
                                            </div>
                                        </div>
                                        <div class="text-end m-2 icon">
                                            <a href=""><i class="bx bxs-user-account"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body chat-box" id="chatBox">
                                    <!-- Chat messages will be populated here -->
                                </div>
                                <div class="card-footer">
                                    <form id="sendMessageForm" method="POST" action="send_message.php">
                                        <input type="hidden" name="conversationID" value="<?=$select['selectID']?>">
                                        <!-- Replace with the actual conversation ID -->
                                        <input type="hidden" name="outgoing_msg_id" value="<?= $alumni_id ?>">
                                        <!-- Replace with the actual alumni ID -->
                                        <textarea name="msg_content" cols="30" rows="2" class="form-control"
                                            placeholder="Type a message..."></textarea>
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <div class="extra-button">
                                                <button class="btn" type="button"><i class="bi bi-image"></i></button>
                                                <button class="btn" type="button"><i
                                                        class="bi bi-paperclip"></i></button>
                                            </div>
                                            <button type="submit" class="btn btn-sm text-white"
                                                style="background-color: #013220;">Send <i
                                                    class="bi bi-send"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- End Card with header and footer -->
                        </div>
                    </div>
                </div>

                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const chatBox = document.getElementById('chatBox');

                    chatData.forEach(chat => {
                        let chatDiv = document.createElement('div');
                        chatDiv.classList.add('chat', chat.outgoing_msg_id === currentAlumniId ?
                            'outgoing' : 'incoming');

                        let detailsDiv = document.createElement('div');
                        detailsDiv.classList.add('details');
                        detailsDiv.innerHTML = `<p>${chat.msg_content}</p>`;

                        if (chat.outgoing_msg_id !== currentAlumniId) {
                            let img = document.createElement('img');
                            img.src = chat.profile_picture ? chat.profile_picture :
                                'assets/img/user.png'; // Default profile picture
                            img.alt = 'Profile Picture';
                            chatDiv.appendChild(img);
                        }

                        chatDiv.appendChild(detailsDiv);
                        chatBox.appendChild(chatDiv);
                    });

                    chatBox.scrollTop = chatBox.scrollHeight;
                });

                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.getElementById('sendMessageForm');
                    const textarea = form.querySelector('textarea');

                    textarea.addEventListener('keydown', function(event) {
                        if (event.key === 'Enter' && !event.shiftKey) {
                            event.preventDefault(); // Prevents new line
                            form.submit(); // Submits the form
                        }
                    });
                });
                </script>


            </div>
        </section>
    </main>
    <?php
    include 'includes/footer.php';
    ?>