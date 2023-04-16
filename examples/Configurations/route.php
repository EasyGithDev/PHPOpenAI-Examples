<?php

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;
use EasyGithDev\PHPOpenAI\OpenAIRoute;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

// Create a new router, with origine url and version
$route = new OpenAIRoute(
    'https://api.openai.com',
    'v1'
);

// Get a specific Url
echo $route->completionCreate() , '<br>';

// Passing the router to the client
$response = (new OpenAIClient($apiKey))
    ->setRoute($route)
    ->Completion()
    ->create(
        ModelEnum::TEXT_DAVINCI_003,
        "Say this is a test",
    )->toObject();

echo $response->choices[0]->text;
