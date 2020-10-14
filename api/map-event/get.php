<?php

    require_once __DIR__ . "/../../config.php";
    require_once SITE_ROOT . "/services/MapEventsService.php";

    // Headers
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json");

    try
    {
        $service = new MapEventsService();

        if (isset($_GET['id']))
        {
            $response = $service->Get($_GET['id']);

            if ($response === null)
            {
                http_response_code(404);
                $response = "";
            }

            echo json_encode($response, JSON_THROW_ON_ERROR);
        }
        elseif (isset($_GET['date']))
        {
            $response = $service->GetByDate($_GET['date']);

            if ($response === null)
            {
                http_response_code(404);
                $response = "";
            }

            echo json_encode($response, JSON_THROW_ON_ERROR);
        }
        else
        {
            $response = $service->GetAll();

            if ($response === null)
            {
                http_response_code(404);
                $response = "";
            }

            echo json_encode($response, JSON_THROW_ON_ERROR);
        }
    }
    catch (Exception $e)
    {
        http_response_code(500);
        echo json_encode($e->getMessage(), JSON_THROW_ON_ERROR);
    }
