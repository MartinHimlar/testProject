<!doctype html>
<html lang="cz">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="guestbook">
    <meta name="author" content="Martin Himlar">

    <title>GuestBook <?= $title ?></title>

    <link href="/libs/bootstrap.min.css" rel="stylesheet">

    <link href="/libs/album.css" rel="stylesheet">
</head>

<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <?php if($_SESSION['token']) { ?><a href="/guestbook" class="text-white">Kniha</a><?php } else echo "&nbsp;" ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main role="main">
    <?php if(!$_SESSION['token']) {
        include('view/login.php');
    } ?>

    <div class="album py-5 bg-light">
        <div class="container">


                <?php include('view/flashMessages.php'); ?>

            <?php $this->controller->render();?>

        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <?php if($_SESSION['token']){ ?><a href="/main/logout" class="btn btn-primary">Logout</a><?php } ?>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../..">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/libs/jquery-slim.min.js"><\/script>')</script>
<script src="/libs/popper.min.js"></script>
<script src="/libs/bootstrap.min.js"></script>
<script src="/libs/holder.min.js"></script>
</body>
</html>
