<?php

    require_once __DIR__ . "/../../config.php";
    require_once SITE_ROOT . "/services/SourcesService.php";

    // Headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: "
           . "Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");

    try
    {
        $data =
          json_decode(file_get_contents("php://input"), true, 512, JSON_THROW_ON_ERROR);

        $service = new SourcesService();
        $service->Add($data["type"], $data["author"], $data["title"], $data["publisher"], $data["date"]);

        http_response_code(204);
    }
    catch (Exception $e)
    {
        http_response_code(500);
        echo json_encode($e->getMessage(), JSON_THROW_ON_ERROR);
    }
