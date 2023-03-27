<?php


use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

if (isset($_POST['submit'])) {
    try {


        $files = (new OpenAIApi($apiKey))
            ->FineTune()
            ->list()
            ->getResponse()
            ->toObject();

        foreach ($files->data as $file) {
            $id = $file->fine_tuned_model;
            if (empty($id) or is_null($id)) continue;
            $response = (new OpenAIApi($apiKey))
                ->Model()
                ->delete($id)
                ->getResponse();
                
            if ($response->isOk()) {
                echo ($response->toObject()->deleted) ? "$id is deleted" : "$id not deleted", '<br>';
            }
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
    WARNING !!!!
    <form action="<?= $_SERVER['PHP_SELF']  ?>" method="POST">
        <input type="submit" name='submit'>
    </form>
</body>

</html>