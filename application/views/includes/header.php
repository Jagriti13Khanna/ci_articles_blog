<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if(APP_NAME)
            { 
                $title = APP_NAME; 
            } 
            if(isset($heading))
            { 
                $title = $title . " - " . $heading; 
            } 
            echo $title; 
        ?>
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>js/navbar.js"></script>
</head>
<!-- <script>
    document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

                });
            });
        }

    });

</script> -->
<body>
    <!-- a class="navbar-brand" href="<?php echo base_url()?>">Home</a> -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="<?php echo base_url()?>home">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu" id="navMenu">
            <div class="navbar-start">
            <a class="navbar-item" href="http://jkhanna1.dmitstudent.ca/dmit2503/ci_articles_blog/">
                Home
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                Admin
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item" href="<?php echo base_url()?>home">
                    Read
                    </a>
                    <a class="navbar-item" href="<?php echo base_url()?>home/write">
                    Write
                    </a>
                </div>
            </div>
        </div>

            <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                <a class="button is-primary" href="<?php echo base_url()?>register">
                    <strong>Sign up</strong>
                </a>
                <a class="button is-light" href="<?php echo base_url()?>auth/login">
                    Log in
                </a>
                </div>
            </div>
            </div>
        </div>
    </nav>
</body>
</html>
