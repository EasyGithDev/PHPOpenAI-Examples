<?php

use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

function gen()
{
    $cpt = 1;
    $isCreated = false;
    $apiKey = getenv('OPENAI_API_KEY');
    $handler = (new OpenAIClient($apiKey))->FineTune();
    do {
        $response = $handler->listEvents(
            'ft-....'
        )->getResponse();

        $data = json_decode($response)->data;
        $message = $data[count($data) - 1]->message;
        $isCreated = ($message == 'Fine-tune succeeded') ? true : false;

        yield $cpt => $message;
        $cpt++;
    } while ($cpt < 20 && !$isCreated);
}

foreach (gen() as $cpt => $msg) {
    echo "$cpt:$msg<br>";
    ob_flush();
    flush();
    sleep(10);
}
