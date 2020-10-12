<?php

    // Path settings
    define("SITE_ROOT", __DIR__);

    // DB Settings
    $settings = json_decode(file_get_contents(SITE_ROOT . "/config.json"), true);
    define("DB", $settings);
