<?php

class Dto
{
    /**
     * Translates type
     * @param $destination Object destination
     * @param stdClass $source Source
     */
    public static function Cast($destination, array $source)
    {
        foreach ($source as $k => $v) {
            // echo "$k => $v<br>";
            // var_dump($destination->$k);
            if (!is_array($v))
                $destination->$k = $v;
            else {
                // echo $k;
                var_dump($v);
                if (isset($v[0]) && is_array($v[0])) {
                    foreach ($v as $elt) {
                        $obj = new ($destination::class . $k);
                        self::Cast($obj, $elt);
                        $destination->$k[] = $obj;
                    }
                } else {
                    $obj = new ($destination::class . $k);
                    self::Cast($obj, $v);
                    $destination->$k = $obj;
                }
            }
        }
    }
}


class CreateResponse
{
    /**
     * List of required property names.
     *
     * These properties must all be set when this Model is instantiated.
     */
    protected const REQUIRED = ['id', 'object', 'created', 'model', 'choices'];

    /** @var string */
    public $id;

    /** @var string */
    public $object;

    /** @var int */
    public $created;

    /** @var string */
    public $model;

    /** @var \Tectalic\OpenAi\Models\Completions\CreateResponseChoicesItem[] */
    public $choices;

    /** @var \Tectalic\OpenAi\Models\Completions\CreateResponseUsage */
    public $usage;
}

class CreateResponseChoices
{
    /** @var string */
    public $text;

    /** @var int */
    public $index;

    /** @var \Tectalic\OpenAi\Models\Completions\CreateResponseChoicesItemLogprobs|null */
    public $logprobs;

    /** @var string */
    public $finish_reason;
}

class CreateResponseUsage
{
    /**
     * List of required property names.
     *
     * These properties must all be set when this Model is instantiated.
     */
    protected const REQUIRED = ['prompt_tokens', 'completion_tokens', 'total_tokens'];

    /** @var int */
    public $prompt_tokens;

    /** @var int */
    public $completion_tokens;

    /** @var int */
    public $total_tokens;
}

use EasyGithDev\PHPOpenAI\Helpers\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIClient;

require __DIR__ . '/../../vendor/autoload.php';

$apiKey = getenv('OPENAI_API_KEY');

$handler = (new OpenAIClient($apiKey))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
);

// Response as stClass object
$source = $handler->toArray();

echo '<pre>', var_dump($source), '</pre>';

$cr = new CreateResponse;

// echo '<pre>', var_dump($cr), '</pre>';

Dto::Cast($cr, $source);

echo '<pre>', var_dump($cr), '</pre>';

echo $cr->usage->total_tokens;