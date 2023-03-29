<?php

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$response = (new OpenAIClient('BAD KEY'))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
)->getResponse();

if (!$response->isStatusOk() or !$response->isContentTypeOk()) {
    echo $response->getBody();
}
