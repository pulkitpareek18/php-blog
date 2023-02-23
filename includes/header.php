    <nav>
        <div id="nav">
            <span id="openSidebar">&#9776;</span>
            <img style="cursor: pointer;" onclick="window.location.href='<?php echo $home_url; ?>/video'" src="<?php echo $home_url; ?>img/logo.png" width="94px" alt="" style="margin-bottom: 10px;">
            <?php include "search_html.php"; ?>
            <div class="navInside" id="navInside">
                <a href="<?php echo $home_url ?>">
                    <li>Home</li>
                </a>
                <a href="<?php echo $home_url ?>video">
                    <li>Courses</li>
                </a>
                <a href="<?php echo $home_url ?>play/terms-and-conditions">
                    <li>Terms & Conditions</li>
                </a>
                <a href="<?php echo $home_url ?>play/privacy-policy">
                    <li>Privacy Policy</li>
                </a>
            </div>
        </div>
    </nav>