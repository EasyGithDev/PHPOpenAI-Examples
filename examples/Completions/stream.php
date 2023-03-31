<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

(new OpenAIClient($apiKey))->Completion()->create(
    model: "text-davinci-003",
    prompt: 'Writing a dissertation on "the meaning of life in the 21st century" as Barack Obama',
    temperature: 0.5,
    max_tokens: 2048,
    top_p: 1.0,
    frequency_penalty: 0.3,
    presence_penalty: 0.0,
    echo: true,
    stream: true
)->getResponse();
