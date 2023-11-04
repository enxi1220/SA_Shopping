<?php

class ResponseHelper
{
    public static function createJsonResponse($message, $url = null)
    {
        $response = array(
            'url' => $url,
            'message' => $message
        );

        return json_encode($response);
    }
}
