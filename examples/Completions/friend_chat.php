<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

try {

    $response = (new OpenAIClient($apiKey))->Completion()->create(
        model: "text-davinci-003",
        prompt: "You: What have you been up to?\nFriend: Watching old movies.\nYou: Did you watch anything interesting?\nFriend:",
        temperature: 0.5,
        max_tokens: 60,
        top_p: 1.0,
        frequency_penalty: 0.5,
        presence_penalty: 0.0,
        stop: ["You:"]
    )->toObject();

    foreach ($response->choices as $choice) {
        echo nl2br(trim($choice->text));
    }
} catch (ApiException $e) {
    echo nl2br($e->getMessage());
}
