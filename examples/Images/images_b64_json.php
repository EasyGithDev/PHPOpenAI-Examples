<?php

use EasyGithDev\PHPOpenAI\Helpers\ImageResponseEnum;
use EasyGithDev\PHPOpenAI\Helpers\ImageSizeEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

function displayImg($data)
{
    return '<img src="data:image/png;base64, ' . $data . '" alt="DALL-E 2" />';
}

$apiKey = getenv('OPENAI_API_KEY');

$response = (new OpenAIClient($apiKey))
    ->Image()
    ->create(
        "An old poster with a woman and a cat, in the style of Charley Harper",
        n: 2,
        size: ImageSizeEnum::is256,
        response_format: ImageResponseEnum::B64_JSON
    )->toObject();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Image using b64 format</title>
</head>

<body>

    <?php foreach ($response->data as $image) : ?>
        <div> <?= displayImg($image->b64_json) ?> </div>
    <?php endforeach; ?>

</body>

</html>