<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\OpenAIApi;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

try {

    $response = (new OpenAIApi($apiKey))->Completion()->create(
        model: "code-davinci-002",
        prompt: "### Postgres SQL tables, with their properties:\n#\n# Employee(id, name, department_id)\n# Department(id, name, address)\n# Salary_Payments(id, employee_id, amount, date)\n#\n### A query to list the names of the departments which employed more than 10 employees in the last 3 months\nSELECT",
        temperature: 0,
        max_tokens: 150,
        top_p: 1.0,
        frequency_penalty: 0.0,
        presence_penalty: 0.0,
        stop: ["#", ";"]
    )->getResponse()->throwable();

//echo '<pre>', var_dump($response->getInfos()), '</pre>';

    foreach ($response->toObject()->choices as $choice) {
        echo nl2br(trim($choice->text));
    }
} catch (ApiException $e) {
    echo nl2br($e->getMessage());
}
