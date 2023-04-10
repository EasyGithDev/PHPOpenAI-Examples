<?php

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;
use EasyGithDev\PHPOpenAI\Validators\StatusValidator;

require __DIR__ . '/../../vendor/autoload.php';

/*

// Depreciate, it will removed in the next step

$response = (new OpenAIClient('BAD KEY'))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
)->getResponse();

if (!$response->isStatusOk() or !$response->isContentTypeOk()) {
    echo $response->getBody();
}
*/

$handler = (new OpenAIClient('BAD KEY'))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
);

$response = $handler->getResponse();
$contentTypeValidator = $handler->getContentTypeValidator();

if (!(new StatusValidator($response))->validate() or !(new $contentTypeValidator($response))->validate()) {
    echo $response->getBody();
}
