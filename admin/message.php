<?php
include 'authentication.php';
include_once 'includes/header.php';
include_once 'includes/conn.php';

include_once 'includes/sidebar.php';
include "alert.php";
?>

<main id="main" class="main">

    <!-- <div class="pagetitle">
        <h1>Message</h1>
    </div> -->
    <!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-3 mt-3">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="message-title">Messages</h5>
                            </div>
                            <div class="col-4 text-end message">
                                <a href="">
                                    <i class="bi bi-plus-circle-fill" style="color: #013220;"></i>
                                </a>
                            </div>
                        </div>
                        <hr>

                        <form class="d-flex mb-3 mt-2">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search messages"
                                    aria-label="Search" id="searchInput">
                            </div>
                        </form>

                        <!-- Chat History -->
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Juan Dela Cruz</h5>
                                    <small>3 days ago</small>
                                </div>
                                <small>And some small print.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Pedro Santa Cruz</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <small class="text-muted">And some muted small print.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Maria Clara</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <small class="text-muted">And some muted small print.</small>
                            </a>
                        </div><!-- End Chat History -->

                    </div>

                    <div class="col-6 mt-3">
                        <div class="chat-box">
                            <div class="message-title p-3">Juan Dela Cruz</div>
                            <hr>
                            <div class="card-body">
                                <!-- Chat messages go here -->
                                <div class="message-bubble other-message mt-3 float-start">Ut in ea error laudantium
                                    quas omnis
                                    officia.
                                </div>
                                <div class="message-bubble my-message float-end text-white">Corrupti inventore
                                    consequatur
                                    nisi
                                    necessitatibus modi consequuntur soluta id.</div>
                            </div>
                            <div class="">
                                <div class="input-group">
                                    <textarea class="form-control message-input"
                                        placeholder="Type your message"></textarea>
                                    <button class="btn text-white" style="background-color: #013220;"><i
                                            class="bi bi-telegram"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 mt-3">
                        <!-- Online Friends here -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
include_once 'includes/footer.php';
?>