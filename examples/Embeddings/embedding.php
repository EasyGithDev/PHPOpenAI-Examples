<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

try {

    $response = (new OpenAIClient($apiKey))->Embedding()->create(
        ModelEnum::TEXT_EMBEDDING_ADA_002,
        "The food was delicious and the waiter...",
    )->toObject();

    echo '<pre>', var_dump($response), '</pre>';
    
} catch (ApiException $e) {
    echo nl2br($e->getMessage());
}
