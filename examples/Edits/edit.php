<?php


use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIClient($apiKey))->Edit()->create(
    "What day of the wek is it?",
    ModelEnum::TEXT_DAVINCI_EDIT_001,
    "Fix the spelling mistakes",
)->toObject();

echo '<pre>', var_dump($response), '</pre>';
