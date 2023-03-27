<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');


if (isset($_POST['submit'])) {
    try {
        $response = (new OpenAIApi($apiKey))
            ->File()
            ->download($_POST['file_id'])->getResponse()->throwable();
    } catch (ApiException $e) {
        echo nl2br($e->getMessage());
        die;
    }
}

// Unable to test at this moment
// "error": {
//     "message": "To help mitigate abuse, downloading of fine-tune training files is disabled for free accounts.",
//     "type": "invalid_request_error",
//     "param": null,
//     "code": null
//   }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>File download</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF']  ?>" method="POST">
        <input type="text" name='file_id'>
        <input type="submit" name='submit'>
    </form>
    <?php if (isset($_POST['submit'])) : ?>
        <div>
            <label>Response :
                <textarea name="response" id="response" cols="100" rows="30"><?= $response ?></textarea>
            </label>
        </div>
    <?php endif ?>
</body>

</html>