<?php

    // Path settings
    define("SITE_ROOT", __DIR__);

    // DB Settings
    try {
        $settings = json_decode(
          file_get_contents(SITE_ROOT . "/config.json"),
          true,
          512,
          JSON_THROW_ON_ERROR
        );

        define("config", $settings);
    } catch (JsonException $e) {
        echo "Failed to load config.json: " . $e->getMessage();
    }


