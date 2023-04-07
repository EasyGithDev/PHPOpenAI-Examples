<?php

use EasyGithDev\PHPOpenAI\Helpers\ChatMessage;

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIClient($apiKey))->Chat()->create(
    ModelEnum::GPT_3_5_TURBO,
    [
        new ChatMessage(ChatMessage::ROLE_SYSTEM, "You are a helpful assistant."),
        new ChatMessage(ChatMessage::ROLE_USER, "Who won the world series in 2020?"),
        new ChatMessage(ChatMessage::ROLE_ASSISTANT, "The Los Angeles Dodgers won the World Series in 2020."),
        new ChatMessage(ChatMessage::ROLE_USER, "Where was it played?"),
    ]
)->toObject();

echo '<pre>', var_dump($response), '</pre>';
