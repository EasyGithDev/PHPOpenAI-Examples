<?php

use EasyGithDev\PHPOpenAI\Models\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIApi($apiKey))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
)->getResponse();

// Response as a string
echo $response;

// Response as associative array
echo '<pre>', print_r($response->toArray(), true), '</pre>';

// Response as stClass object
echo '<pre>', print_r($response->toObject(), true), '</pre>';
