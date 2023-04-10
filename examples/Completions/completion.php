<?php

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$handler = (new OpenAIClient($apiKey))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
);

// Response as a string
echo '<pre>', print_r($handler->getResponse(), true), '</pre>';

// Response as stClass object
echo '<pre>', print_r($handler->toObject(), true), '</pre>';

// Response as associative array
echo '<pre>', print_r($handler->toArray(), true), '</pre>';
