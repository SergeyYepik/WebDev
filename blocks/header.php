<header>
    <span class="logo"><a href="<?=SITE_ROOT?>">DO MORE...</a></span>
    <nav>
        <a href="<?=SITE_ROOT?>index.php">Main</a>
        <a href="<?=SITE_ROOT?>contacts.php">Contacts</a>
        <?php if (!(isset($_COOKIE['isSignedIn']) &&  $_COOKIE['isSignedIn'])) : ?>
            <a href="<?=SITE_ROOT?>login.php">Login</a>    
            <a href="<?=SITE_ROOT?>reg.php">Register</a>
        <?php else: ?> 
            <a href="<?=SITE_ROOT?>newpost.php">Blog</a>    
            <a href="<?=SITE_ROOT?>users.php">Users</a>    
            <a href="<?=SITE_ROOT?>login.php">Account</a>    
        <?php endif; ?>    
    </nav>
</header>
