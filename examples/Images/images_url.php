<?php

use EasyGithDev\PHPOpenAI\Helpers\ImageSizeEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

function saveImg($url)
{
    $content =  file_get_contents($url);
    file_put_contents('dall-e.png', $content);
}

function displayUrl($url)
{
    return '<img src="' . $url . '" />';
}

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIClient($apiKey))->Image()->create(
    "a rabbit inside a beautiful garden, 32 bit isometric",
    n: 2,
    size: ImageSizeEnum::is256,
)->toObject();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Image using url format</title>
</head>

<body>

    <?php foreach ($response->data as $image) : ?>
        <div> <?= displayUrl($image->url) ?> </div>
    <?php endforeach; ?>

</body>

</html>