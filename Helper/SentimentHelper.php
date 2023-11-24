<?php

class SentimentHelper
{
    public static function GetSentiment($text){
        $apiURL = "http://127.0.0.1:5000/process_data";
        $text = array('text'=> $text);

        $client = curl_init($apiURL);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, json_encode($text));
        curl_setopt($client, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($client);

        if ($response === FALSE) {
            throw new Exception("Error in predicting sentiment");
        }
        $sentiment = json_decode($response, true);
        curl_close($client);

        return $sentiment['result'];
    }
}
