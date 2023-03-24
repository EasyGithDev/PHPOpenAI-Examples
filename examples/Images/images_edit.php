<?php


use EasyGithDev\PHPOpenAI\Images\ImageSize;
use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

function displayUrl($url)
{
    return '<img src="' . $url . '" />';
}

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIApi($apiKey))->Image()->createEdit(
    image: __DIR__ . '/../../assets/image_edit_original.png',
    mask: __DIR__ . '/../../assets/image_edit_mask2.png',
    prompt: 'a sunlit indoor lounge area with a pool containing a flamingo',
    size: ImageSize::is512,
);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Image mask</title>
</head>

<body>

    <div>
        <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
    </div>

    <?php foreach ($response->urlImages() as $image) : ?>
        <div> <?= displayUrl($image) ?> </div>
    <?php endforeach; ?>

</body>

</html>