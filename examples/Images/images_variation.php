<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\Helpers\ImageSizeEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

function displayUrl($url)
{
    return '<img src="' . $url . '" />';
}

$apiKey = getenv('OPENAI_API_KEY');

try {
    $response = (new OpenAIClient($apiKey))->Image()->createVariation(
        __DIR__ . '/../../assets/image_variation_original.png',
        n: 2,
        size: ImageSizeEnum::is256
    )->toObject();
} catch (ApiException $e) {
    echo nl2br($e->getMessage());
    die;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Image variation</title>
</head>

<body>


    <?php foreach ($response->data as $image) : ?>
        <div> <?= displayUrl($image->url) ?> </div>
    <?php endforeach; ?>

</body>

</html>