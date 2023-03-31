<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$isCreated = false;
$cpt = 1;
do {
    $response = (new OpenAIClient($apiKey))
    ->FineTune()
    ->listEvents(
        $_GET['fine_tune_id']
    )->toObject();
    
    $data = $response->data;
    $message = $data[count($data)-1]->message;
    $isCreated = ($message == 'Fine-tune succeeded') ? true : false;
    $cpt++;

    ob_flush();
    flush();
    sleep(30);

} while ($cpt <= 10 && !$isCreated);

echo ($isCreated) ? 'OK fine-tune-created' : 'NO sorry';