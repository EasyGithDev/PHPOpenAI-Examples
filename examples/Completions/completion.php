<?php

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIClient($apiKey))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
)->getResponse();

// Response as a string
echo $response;

// Response as associative array
echo '<pre>', print_r($response->toArray(), true), '</pre>';

// Response as stClass object
echo '<pre>', print_r($response->toObject(), true), '</pre>';

$response = (new OpenAIClient($apiKey))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
)->toObject();

// Response as stClass object
echo '<pre>', print_r($response, true), '</pre>';

$response = (new OpenAIClient($apiKey))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
)->toArray();

// Response as associative array
echo '<pre>', print_r($response, true), '</pre>';
