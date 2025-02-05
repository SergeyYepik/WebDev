<header>
    <span class="logo"><a href="<?=SITE_ROOT?>" class="nav-menu">DO MORE...</a></span>
    <nav>
        <a href="<?=SITE_ROOT?>index.php" class="nav-menu">Main</a>
        <a href="<?=SITE_ROOT?>phpinfo.php" class="nav-menu">PhpInfo</a>
        <a href="<?=SITE_ROOT?>usefull.php" class="nav-menu">Usefull</a>
        <a href="<?=SITE_ROOT?>patterns.php" class="nav-menu">Patterns</a>
        <a href="<?=SITE_ROOT?>contacts.php" class="nav-menu">Contacts</a>
        <?php if (!(isset($_COOKIE['isSignedIn']) &&  $_COOKIE['isSignedIn'])) : ?>
            <a href="<?=SITE_ROOT?>login.php" class="nav-menu">Login</a>    
            <a href="<?=SITE_ROOT?>reg.php" class="nav-menu">Register</a>
        <?php else: ?> 
            <a href="<?=SITE_ROOT?>newpost.php" class="nav-menu">Blog</a>    
            <a href="<?=SITE_ROOT?>users.php" class="nav-menu">Users</a>    
            <a href="<?=SITE_ROOT?>login.php" class="nav-menu">Account</a>    
        <?php endif; ?>    
    </nav>
</header>
