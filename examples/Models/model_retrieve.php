<?php


use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIClient($apiKey))
    ->Model()
    ->retrieve('text-davinci-001')
    ->toObject();

echo '<pre>', var_dump($response), '</pre>';
