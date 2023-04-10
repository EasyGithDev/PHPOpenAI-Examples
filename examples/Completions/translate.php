<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

try {

    $response = (new OpenAIClient($apiKey))->Completion()->create(
        model: "text-davinci-003",
        prompt: "Translate this into 1. French, 2. Spanish and 3. Japanese:\n\nWhat rooms do you have available?\n\n1.",
        temperature: 0.3,
        max_tokens: 100,
        top_p: 1.0,
        frequency_penalty: 0.0,
        presence_penalty: 0.0
    )->toObject();

    foreach ($response->choices as $choice) {
        echo nl2br(trim($choice->text));
    }
} catch (ApiException $e) {
    echo nl2br($e->getMessage());
}
