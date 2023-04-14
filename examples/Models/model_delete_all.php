<?php


use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');
$client = new OpenAIClient($apiKey);

if (isset($_POST['submit'])) {
    try {

        $files = $client->FineTune()
            ->list()
            ->toObject();

        foreach ($files->data as $file) {
            $id = $file->fine_tuned_model;

            if (empty($id) or is_null($id)) {
                continue;
            }

            $response = $client->Model()
                ->delete($id)
                ->toObject();

            echo ($response->deleted) ? "$id is deleted<br>" : "$id not deleted<br>", '<br>';
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
    WARNING it will delete all your models !!!!
    <form action="<?= $_SERVER['PHP_SELF']  ?>" method="POST">
        <input type="submit" name='submit'>
    </form>
</body>

</html>