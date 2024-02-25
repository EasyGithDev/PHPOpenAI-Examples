<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\Helpers\ImageResponseEnum;
use EasyGithDev\PHPOpenAI\Helpers\ImageSizeEnum;
use EasyGithDev\PHPOpenAI\Helpers\ImageStyleEnum;
use EasyGithDev\PHPOpenAI\Helpers\ImageQualityEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

function displayImg($data)
{
    return '<img src="data:image/png;base64, ' . $data . '" />';
}

$apiKey = getenv('OPENAI_API_KEY');

try {

    $response = (new OpenAIClient($apiKey))
        ->Image()
        ->addCurlParam('timeout', 60)
        ->createWithDalle3(
            "A woman and a cat, in the style of Charley Harper",
            n: 1,
            size:ImageSizeEnum::is1792x1024,
            style: ImageStyleEnum::VIVID,
            quality: ImageQualityEnum::HIGH_DEF,
            response_format: ImageResponseEnum::B64_JSON
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
    <title>Image using b64 format</title>
</head>

<body>

    <?php foreach ($response->data as $image) : ?>
        <div> <?= displayImg($image->b64_json) ?> </div>
    <?php endforeach; ?>

</body>

</html>