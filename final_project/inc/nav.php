<?php session_start() ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Look at Paintings</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <?php // Change login section to logout if session['admin'] is present
                if (!$_SESSION['user']){
                    echo "<li class='nav-item'>";
                    echo     "<a class='nav-link' href='login.php'>Admin Login</a>";
                    echo "</li>";
                }
                else {
                    echo '<li class="nav-item">';
                    echo     '<a class="nav-link" href="archive.php">Archive</a>';
                    echo '</li>';
                    echo "<li class='nav-item'>";
                    echo     "<a class='nav-link' href='inc/logout.php'>Logout</a>";
                    echo "</li>";
                }
            ?>
        </ul>
    </div>
</nav>