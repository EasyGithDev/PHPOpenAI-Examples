<?php


use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIClient($apiKey))
    ->FineTune()
    ->list()
    ->toObject();

echo '<pre>', var_dump($response), '</pre>';
