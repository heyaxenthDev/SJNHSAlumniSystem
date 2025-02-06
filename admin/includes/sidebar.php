<?php
// Define the current page by checking the URL
$current_page = basename($_SERVER['PHP_SELF'], ".php");

// Function to determine if a page is active
function is_active($page, $current_page)
{
    return $page === $current_page ? '' : 'collapsed';
}
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?= $current_page == 'dashboard' ? '' : 'collapsed'; ?>" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link <?= $current_page == 'juniorhs-faculty' || $current_page == 'seniorhs-faculty' ? '' : 'collapsed'; ?>"
                data-bs-toggle="collapse" href="#faculty-nav">
                <i class="bi bi-person-badge"></i><span>Faculty Directory</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="faculty-nav"
                class="nav-content collapse <?= $current_page == 'juniorhs-faculty' || $current_page == 'seniorhs-faculty' ? 'show' : ''; ?>"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="juniorhs-faculty.php" <?= $current_page == 'juniorhs-faculty' ? 'class="active"' : ''; ?>>
                        <i class="bi bi-circle"></i><span>Junior High</span>
                    </a>
                </li>
                <li>
                    <a href="seniorhs-faculty.php" <?= $current_page == 'seniorhs-faculty' ? 'class="active"' : ''; ?>>
                        <i class="bi bi-circle"></i><span>Senior High</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Faculty Nav -->

        <li class="nav-item">
            <a class="nav-link <?= $current_page == 'events' ? '' : 'collapsed'; ?>" href="events.php">
                <i class="bi bi-calendar-week"></i>
                <span>Events</span>
            </a>
        </li><!-- End Events Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?= $current_page == 'news-and-updates' ? '' : 'collapsed'; ?>"
                href="news-and-updates.php">
                <i class="bi bi-newspaper"></i>
                <span>News &amp; Updates</span>
            </a>
        </li><!-- End News & Updates Page Nav -->

        <li class="nav-heading">Alumni</li>

        <li class="nav-item">
            <a class="nav-link <?= $current_page == 'juniorhs-alumni' || $current_page == 'seniorhs-alumni' ? '' : 'collapsed'; ?>"
                data-bs-toggle="collapse" href="#alumni-nav">
                <i class="bi bi-gem"></i><span>Alumni Yearbook</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="alumni-nav"
                class="nav-content collapse <?= $current_page == 'juniorhs-alumni' || $current_page == 'seniorhs-alumni' ? 'show' : ''; ?>"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="juniorhs-alumni.php" <?= $current_page == 'juniorhs-alumni' ? 'class="active"' : ''; ?>>
                        <i class="bi bi-circle"></i><span>Junior High</span>
                    </a>
                </li>
                <li>
                    <a href="seniorhs-alumni.php" <?= $current_page == 'seniorhs-alumni' ? 'class="active"' : ''; ?>>
                        <i class="bi bi-circle"></i><span>Senior High</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Alumni Nav -->
    </ul>

</aside><!-- End Sidebar-->