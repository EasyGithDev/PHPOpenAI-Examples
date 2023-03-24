<?php


use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIApi($apiKey))
    ->Moderation()
    ->create('I want to kill them.');

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Moderation</title>
</head>

<body>

    <div>
        <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
    </div>

    <?php var_dump($response->categories()) ?>

    <?php var_dump($response->scores()) ?>

</body>

</html>