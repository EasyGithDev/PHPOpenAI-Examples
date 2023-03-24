<?php

use EasyGithDev\PHPOpenAI\Models\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIApi($apiKey))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
);

// Response as a string
echo $response;

// Response as associative array
echo '<pre>', print_r($response->toArray(), true), '</pre>';

// Response as stClass object
echo '<pre>', print_r($response->toObject(), true), '</pre>';

///////////////////////////////////////////////
// Methods specific to the completion object.
///////////////////////////////////////////////

// Get all choices as stClass object
foreach ($response->choices() as $choice) {
    echo '<pre>', print_r($choice, true), '</pre>';
}

// Get one choice as stClass object
echo $response->choice(0)->text;

// Get all text as string array
echo '<pre>', print_r($response->fetchAll(), true), '</pre>';
