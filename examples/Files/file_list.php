<?php


use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIClient($apiKey))
    ->File()
    ->list()
    ->getResponse();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>File list</title>
</head>

<body>

    <div>
        <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
    </div>

</body>

</html>