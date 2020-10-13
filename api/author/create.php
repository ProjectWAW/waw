<?php


    require_once __DIR__ . "/../../config.php";
    require_once SITE_ROOT . "/services/AuthorsService.php";

    // Headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: POST");
    header(
      "Access-Control-Allow-Headers: "
      . "Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With"
    );

    try {
        $data =
          json_decode(file_get_contents("php://input"), true, 512, JSON_THROW_ON_ERROR);

        $service = new AuthorsService();
        $service->Add($data["name"]);

        http_response_code(204);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode($e->getMessage(), JSON_THROW_ON_ERROR);
    }
