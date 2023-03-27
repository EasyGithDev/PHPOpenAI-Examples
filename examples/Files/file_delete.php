<?php


use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

if (isset($_POST['submit'])) {
    try {
        $response = (new OpenAIApi($apiKey))
            ->File()
            ->delete($_POST['file_id'])->getResponse()->throwable();
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
    <title>File delete</title>
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
        <?= ($response->toObject()->deleted) ? 'file is deleted' : 'not deleted' ?>
    <?php endif ?>

</body>

</html>