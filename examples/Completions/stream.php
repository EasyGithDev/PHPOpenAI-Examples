<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

(new OpenAIApi($apiKey))->Completion()->create(
    model: "text-davinci-003",
    prompt: "Translate this into 1. French, 2. Spanish and 3. Japanese:\n\nWhat rooms do you have available?\n\n1.",
    temperature: 0.3,
    max_tokens: 100,
    top_p: 1.0,
    frequency_penalty: 0.0,
    presence_penalty: 0.0,
    stream: true
)->getResponse();
