<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

try {
    $client = new OpenAIClient($apiKey);
    $handler = $client->Model();

    $models = $handler->list()->toObject();

    foreach ($models->data as $model) {
        $id = $model->id;
        if (empty($id) or is_null($id)) continue;

        $response = $handler->retrieve($id)->toObject();

        echo $response->id, ':', $response->owned_by, '<br>';
    }
} catch (ApiException $e) {
    echo nl2br($e->getMessage());
    die;
}
