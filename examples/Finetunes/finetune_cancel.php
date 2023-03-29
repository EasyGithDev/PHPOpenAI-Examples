<?php


use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

if (isset($_POST['submit'])) {
    try {
        $response = (new OpenAIClient($apiKey))
            ->FineTune()
            ->cancel(
                $_POST['fine_tune_id']
            )->getResponse()->throwable();
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
    <title>Finetune cancel</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF']  ?>" method="POST">
        <input type="text" name='fine_tune_id' value="ft-">
        <input type="submit" name='submit'>
    </form>
    <?php if (isset($_POST['submit'])) : ?>
        <div>
            <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
        </div>
    <?php endif ?>

</body>

</html>