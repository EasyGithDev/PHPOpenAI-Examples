<?php


use EasyGithDev\PHPOpenAI\Models\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIApi($apiKey))->Edit()->create(
    "What day of the wek is it?",
    ModelEnum::TEXT_DAVINCI_EDIT_001,
    "Fix the spelling mistakes",
)->getResponse();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit</title>
</head>

<body>

    <div>
        <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
    </div>
 
</body>

</html>