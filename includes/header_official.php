<?php include "activities/variables.php" ?>
<nav class="navigation max-width-1 ">
        <div class="nav-left">
            <a href="/blog/">
                <span><img src="<?php echo $home_url; ?>img/logo.png" width="94px" alt="" style="margin-bottom: 10px;"></span>
            </a>
            <ul style="padding: 0px;margin: 0px;">
                <ul>
                    <li><a href="<?php echo $home_url; ?>">Home</a></li>
                    <li><a href="<?php echo $home_url; ?>blog">Blog</a></li>
                    <li><a href="<?php echo $home_url; ?>video">Video</a></li>
                    <li><a href="<?php echo $home_url; ?>contact">Contact</a></li>
                </ul>
            </ul>
        </div>

        <div style="text-align: center" class="nav-right ">
            <form action="/blog/search.php" method="get">
                <input pattern="[^*()/><\][\\\x22,;.|]+" required class="form-input" type="text" name="search_query" placeholder="Video Search">
                <button class=" button">Search</button>
            </form>

        </div>
        <div style="text-align: center" class="nav-right">
            <form action="/blog/bsearch.php" method="get">
                <input pattern="[^*()/><\][\\\x22,;.|]+" required class="form-input" type="text" name="search_query" placeholder="Article Search">
                <button class="button">Search</button>
            </form>

        </div>

    </nav>