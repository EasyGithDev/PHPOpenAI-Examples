<?php

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;
use EasyGithDev\PHPOpenAI\OpenAIConfiguration;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');
$org = getenv('OPENAI_API_ORG');

// Create a new configuration object
// with the key and the organization
$config = new OpenAIConfiguration($apiKey, $org);

// Passing the configuration to the client
$response = (new OpenAIClient($config))
    ->Completion()
    ->create(
        ModelEnum::TEXT_DAVINCI_003,
        "Say this is a test",
    )->toObject();

echo $response->choices[0]->text;
