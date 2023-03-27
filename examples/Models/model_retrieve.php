<?php


use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIApi($apiKey))->Model()->retrieve('text-davinci-001')->getResponse();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Model retrieve</title>
</head>

<body>

    <div>
        <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
    </div>

    <?= $response->toObject()->id ?>


</body>

</html>