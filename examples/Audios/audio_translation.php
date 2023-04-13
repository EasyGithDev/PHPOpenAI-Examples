<?php

use EasyGithDev\PHPOpenAI\Helpers\AudioResponseEnum;
use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIClient($apiKey))->Audio()
    ->addCurlParam('timeout', 30)
    ->translation(
        __DIR__ . '/../../assets/openai_fr.mp3',
        ModelEnum::WHISPER_1,
        response_format: AudioResponseEnum::TEXT
    )->toObject();

echo '<pre>', var_dump($response), '</pre>';
