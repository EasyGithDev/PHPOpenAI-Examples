<?php


use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

if (isset($_POST['submit'])) {
    try {


        $files = (new OpenAIClient($apiKey))
            ->File()
            ->list()
            ->getResponse()
            ->toObject();

        foreach ($files->data as $file) {
            $id = $file->id;
            $response = (new OpenAIClient($apiKey))
                ->File()
                ->delete($id)
                ->getResponse()
                ->throwable();

            echo ($response->toObject()->deleted) ? "file $id is deleted<br>" : "$id not deleted<br>";
        }
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
    <strong>WARNING this will delete all your files !!!!</strong>
    <form action="<?= $_SERVER['PHP_SELF']  ?>" method="POST">
        <input type="submit" name='submit'>
    </form>
</body>

</html>