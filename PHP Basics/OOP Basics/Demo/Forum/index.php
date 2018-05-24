<?php

spl_autoload_register(
    function ($class) {
        $class = $class . ".php";
        require_once $class;
    }
);

$forum = new Forum();
$forum->start();

