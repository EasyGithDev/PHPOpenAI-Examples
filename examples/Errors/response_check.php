<?php

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;
use EasyGithDev\PHPOpenAI\Validators\ValidatorBuilder;

require __DIR__ . '/../../vendor/autoload.php';

$handler = (new OpenAIClient('BAD KEY'))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
);

$response = $handler->getResponse();
$contentTypeValidator = $handler->getContentTypeValidator();

if (
    !ValidatorBuilder::create('status', $response)->validate() or
    !ValidatorBuilder::create($contentTypeValidator, $response)->validate()
) {
    echo $response->getBody();
}
