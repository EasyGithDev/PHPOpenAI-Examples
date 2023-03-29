<?php

use EasyGithDev\PHPOpenAI\Exceptions\ApiException;
use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

try {
    $response = (new OpenAIClient('BAD KEY'))->Completion()->create(
        ModelEnum::TEXT_DAVINCI_003,
        "Say this is a test",
    )->getResponse()->throwable();
} catch (ApiException $e) {
    echo nl2br($e->getMessage());
    die;
}
