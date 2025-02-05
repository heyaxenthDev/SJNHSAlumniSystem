<?php
include 'authentication.php';
include_once 'includes/header.php';
include_once 'includes/conn.php';

include_once 'includes/sidebar.php';
include "alert.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Junior High Alumni Yearbook</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item">Alumni Yearbook</li>
                <li class="breadcrumb-item active">Junior High</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Batch List -->
                    <div class="col-12">
                        <div class="card batch-list overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Batch List</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Batch Year</th>
                                            <th scope="col">School Type</th>
                                            <th scope="col"># of Members</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Assuming $conn is your database connection
                                        $sql = "SELECT b.batch_year, b.hs_type, COUNT(a.id) AS batch_size
                                                FROM batchyear b
                                                LEFT JOIN alumni_jhs a ON b.batch_year = a.year_graduated WHERE b.hs_type = 'JHS'
                                                GROUP BY b.batch_year ASC";
                                        $result = mysqli_query($conn, $sql);
                                        $count = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<th scope='row'><a href='#'>$count</a></th>";
                                            echo "<td>{$row['batch_year']}</td>";
                                            echo "<td>{$row['hs_type']}</td>";
                                            // You need to fetch the number of members for each batch from your database
                                            echo "<td>{$row['batch_size']}</td>";
                                            echo "<td><a href='alumni-jhs-view.php?batch={$row['batch_year']}' class='btn btn-sm btn-success text-white'>View List</a></td>";
                                            echo "</tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Batch List -->


                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Add New Batch -->
                <div class="card">

                    <div class="card-body m-3">
                        <h5 class="card-title"><i class="bi bi-calendar-plus"></i> New Batch</h5>

                        <form action="code.php" method="POST">
                            <div class="col-12 mt-2">
                                <label for="batchyear" class="form-label">Batch Year</label>
                                <input type="text" name="batchyear" class="form-control" id="batchyear" required>
                            </div>

                            <div class="d-grid gap-2 col-6 mx-auto mt-4">
                                <button class="btn rounded-5 w-100 text-white" type="submit"
                                    style="background-color: #013220;" name="addNewJHSBatch"><i
                                        class="bi bi-plus-circle"></i> Add New Batch</button>
                            </div>
                        </form>

                    </div>
                </div><!-- End Add New Batch -->

            </div><!-- End Right side columns -->

        </div>
    </section>
</main><!-- End #main -->
<?php
include_once 'includes/footer.php';
?>