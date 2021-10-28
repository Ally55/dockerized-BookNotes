<header class="row no-gutters logo-section d-flex">
    <div class="col logo-container mb-1 mb-sm-0">
        <a href="/" class="logo">BookNotes</a>
    </div>
<?php $pathInfo = $_SERVER['PATH_INFO']; ?>
    <div class="col buttons-container d-flex align-items-center justify-content-center justify-content-md-end mb-0 mb-md-2">
        <?php if (isAuthenticated()) { ?>
            <a href="
            <?php
            if ($pathInfo === '/create_notes') {
                echo '/library';
            } else {
                echo '/create_notes';
            }?>" class="btn btn-light ml-2 ml-md-4 mr-2 mr-md-4 notes-button">
                <?php if ($pathInfo === '/create_notes') {
                    echo 'ALL NOTES';
                } else {
                    echo 'NEW NOTE' ;
                } ?> </a>

            <a href="<?php if ($pathInfo === '/user_notes') {
                echo '/library';
            } else {
                echo '/user_notes';
            } ?>" class="btn btn-light notes-button"><?php if ($pathInfo === '/user_notes') {
                echo 'ALL NOTES';
            } else {
                echo 'MY NOTES';
            } ?> </a>
        <?php } ?>

        <p class="m-0 d-none d-sm-block">
            <?php
            if ($pathInfo === '/login' || $pathInfo === '/library' && !isAuthenticated()) {
                echo 'Not a member?';
            } elseif ($pathInfo === '/library' || $pathInfo === '/create_notes' || $pathInfo === '/user_notes' || $pathInfo === '/note') {
                echo '';
            } else {
                echo 'Already a member?';
            }
            ?>
        </p>
        <br>
        <?php if (isAuthenticated()) { ?>
            <form action="logout" method="post">
                <button type="submit" class="btn btn-primary ml-2 ml-md-4 mr-2 mr-md-4 auth-button">LOG OUT</button>
            </form>
        <?php } ?>

        <?php if (!isAuthenticated()) { ?>
        <a href="<?php if($pathInfo === '/login' || $pathInfo === '/library') {
            echo '/signup';
        } else {
            echo '/login';
        }
        ?>" class="btn btn-primary ml-2 ml-md-4 mr-2 mr-md-4 auth-button">
            <?php if($pathInfo === '/login' || $pathInfo === '/library') {
                    echo 'SIGN UP';
                } else {
                    echo 'LOG IN';
                }
            ?>
        </a>
        <?php } ?>


    </div>
</header>
