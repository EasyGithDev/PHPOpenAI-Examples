<?php


use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

function normalize($str)
{
    $str =  str_replace(['-', '.', ':'], ['_', '_', '_'], $str);
    return mb_strtoupper($str);
}

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIClient($apiKey))
    ->Model()
    ->list()
    ->toObject();

echo '<pre>', var_dump($response), '</pre>';
