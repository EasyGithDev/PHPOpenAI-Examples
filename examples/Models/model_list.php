<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

function normalize($str)
{
    $str =  str_replace(['-', '.', ':'], ['_', '_', '_'], $str);
    return mb_strtoupper($str);
}

$apiKey = getenv('OPENAI_API_KEY');
try {
    $response = (new OpenAIClient($apiKey))
        ->Model()
        ->list()
        ->toObject();

    echo '<pre>', var_dump($response), '</pre>';
} catch (ApiException $e) {
    echo nl2br($e->getMessage());
    die;
}
