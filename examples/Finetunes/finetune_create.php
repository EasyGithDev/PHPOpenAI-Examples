<?php


use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

if (isset($_POST['submit'])) {
    $response = (new OpenAIClient($apiKey))
        ->FineTune()
        ->create(
            $_POST['file_id']
        )->getResponse();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Finetune create</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF']  ?>" method="POST">
        <input type="text" name='file_id' value="file-">
        <input type="submit" name='submit'>
    </form>
    <?php if (isset($_POST['submit'])) : ?>
        <div>
            <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
        </div>
        <?= $response->toObject()->id ?>
    <?php endif ?>

</body>

</html>