<?php

function config($const)
{
    require_once('./config/db.php');
    require_once('./config/app.php');
    $val = constant($const);
    return $val;
}

function base_url()
{
    require_once('./config/app.php');
    return BASE_URL;
}

function back()
{
    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function unsetSessionFlashMsg()
{
    unset($_SESSION['errors']);
    unset($_SESSION['old']);
    unset($_SESSION['success']);
}
