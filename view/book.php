<?php !$_SESSION['token'] ? $this->redirect('main') : NULL; ?>
<h3 class="border-bottom border-dark">návštěvní kniha</h3>
<div class="container">
<form class="form" method="post">
    <div class="form-group">
        <label for="title">Nadpis:</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="article"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Odešli" name="articleSend" class="form-control btn btn-primary">
    </div>
</form>
</div>
<ul class="container">
    <li class="row border-dark border-top"><h5>Název</h5><hr><p>příspěvek</p></li>
<?php foreach($articles as $article) { ?>
    <li class="row border-dark border-top">
        <h5><?= $article['title'] ?></h5>
        <hr>
        <p><?= $article['text'] ?></p>
    </li>
<?php
}
?>
</ul>

