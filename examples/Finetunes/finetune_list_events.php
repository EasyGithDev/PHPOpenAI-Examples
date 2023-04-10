<?php


use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

if (isset($_POST['submit'])) {
    try {
        $response = (new OpenAIClient($apiKey))
            ->FineTune()
            ->listEvents(
                $_POST['fine_tune_id']
            )
            ->toObject();
    } catch (ApiException $e) {
        echo nl2br($e->getMessage());
        die;
    }
}



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Finetune list events</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF']  ?>" method="POST">
        <input type="text" name='fine_tune_id' value="ft-">
        <input type="submit" name='submit'>
    </form>
    <?php if (isset($_POST['submit'])) : ?>
        <div>
            <pre><?= var_dump($response) ?></pre>
        </div>
    <?php endif ?>

</body>

</html>