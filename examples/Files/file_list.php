<?php


use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIApi($apiKey))
    ->File()
    ->list();

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

    <?php foreach ($response->fetchAll() as $id) : ?>
        <div> <?= $id ?> </div>
    <?php endforeach; ?>

</body>

</html>