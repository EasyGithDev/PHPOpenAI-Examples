<?php

use EasyGithDev\PHPOpenAI\Helpers\AudioResponseEnum;
use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIClient($apiKey))->Audio()
    ->addCurlParam('timeout', 30)
    ->transcription(
        __DIR__ . '/../../assets/openai.mp3',
        ModelEnum::WHISPER_1,
        response_format: AudioResponseEnum::SRT
    )->toObject();

echo '<pre>', var_dump($response), '</pre>';
