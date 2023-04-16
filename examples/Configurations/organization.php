<?php

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;
use EasyGithDev\PHPOpenAI\Curl\CurlOutput;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');
$org = getenv('OPENAI_API_ORG');

// Passing the organization to the client
$response = (new OpenAIClient($apiKey, $org))
    ->Completion()
    ->create(
        ModelEnum::TEXT_DAVINCI_003,
        "Say this is a test",
    )->toObject();

echo $response->choices[0]->text;
