<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

try {
    $response = (new OpenAIClient($apiKey))
        ->FineTune()
        ->list()
        ->toObject();

    echo '<pre>', var_dump($response), '</pre>';
} catch (ApiException $e) {
    echo nl2br($e->getMessage());
}
