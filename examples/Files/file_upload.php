<?php


use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIApi($apiKey))
    ->File()
    ->create(
        __DIR__ . '/../../assets/mydata.jsonl',
        'fine-tune',
    )->getResponse();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>File upload</title>
</head>

<body>

    <div>
        <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
    </div>

    <?= $response->toObject()->filename ?>

</body>

</html>