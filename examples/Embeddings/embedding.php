<?php


use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIClient($apiKey))->Embedding()->create(
    ModelEnum::TEXT_EMBEDDING_ADA_002,
    "The food was delicious and the waiter...",
)->getResponse();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Embedding using short syntaxe</title>
</head>

<body>

    <div>
        <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
    </div>

</body>

</html>