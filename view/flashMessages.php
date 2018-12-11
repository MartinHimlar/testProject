<?php
if (count($_SESSION['flashMessages']) > 0) {
    foreach ($_SESSION['flashMessages'] as $message) {
        ?><div class="alert text-center alert-<?= $message['type'] ?>"><?= $message['text'] ?></div><?php
    }
    unset($_SESSION['flashMessages']);
}
