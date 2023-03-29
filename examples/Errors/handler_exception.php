<?php

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

try {
    $response = (new OpenAIClient('BAD KEY'))
        ->Completion()
        ->create(
            ModelEnum::TEXT_DAVINCI_003,
            "Say this is a test",
        )
        ->toObject();
} catch (Throwable $t) {
    echo nl2br($t->getMessage());
    die;
}
