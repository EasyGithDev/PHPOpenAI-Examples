<?php


use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


$response = (new OpenAIClient($apiKey))->Edit()->create(
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