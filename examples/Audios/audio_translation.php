<?php

use EasyGithDev\PHPOpenAI\Audios\ResponseFormat;

use EasyGithDev\PHPOpenAI\Models\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIApi;


require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIApi($apiKey))->Audio()->translation(
    __DIR__ . '/../../assets/openai_fr.mp3',
    ModelEnum::WHISPER_1,
    responseFormat: ResponseFormat::TEXT
)->getResponse();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Audio transcription</title>
</head>

<body>

    <div>
        <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
    </div>

</body>

</html>