<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');



try {

    $response = (new OpenAIClient($apiKey))->Edit()->create(
        "What day of the wek is it?",
        ModelEnum::TEXT_DAVINCI_EDIT_001,
        "Fix the spelling mistakes",
    )->toObject();

    echo '<pre>', var_dump($response), '</pre>';
    
} catch (ApiException $e) {
    echo nl2br($e->getMessage());
}
