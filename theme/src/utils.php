<?php

function includePartial($partial)
{
    $sep = DIRECTORY_SEPARATOR;
    $themeDirectory = __DIR__ . $sep . "..";

    include $themeDirectory . $sep . "partial" . $sep . $partial;
}