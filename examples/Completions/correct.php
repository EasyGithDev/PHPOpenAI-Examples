<?php

use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIClient($apiKey))->Completion()->create(
    model:"text-davinci-003",
    prompt:"Correct this to standard English:\n\nShe no went to the market.",
    temperature:0,
    max_tokens:60,
    top_p:1.0,
    frequency_penalty:0.0,
    presence_penalty:0.0
)->toObject();


foreach ($response->choices as $choice) {
    echo nl2br(trim($choice->text));
}
