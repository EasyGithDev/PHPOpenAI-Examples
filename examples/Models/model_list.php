<?php


use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

function normalize($str)
{
    $str =  str_replace(['-', '.', ':'], ['_', '_', '_'], $str);
    return mb_strtoupper($str);
}

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIClient($apiKey))->Model()->list()->getResponse();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Model list</title>
</head>

<body>

    <div>
        <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
    </div>

</body>

</html>