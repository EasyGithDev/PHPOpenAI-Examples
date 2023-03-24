# PHPOpenAI-Examples
Examples for the project PHPOpenAI

Welcome to the GitHub project page for "PHPOpenAI-Examples", a project that enables the use of the OpenAI API in PHP.

The main project is hosted here :

[https://github.com/EasyGithDev/PHPOpenAI](https://github.com/EasyGithDev/PHPOpenAI).

## System Requirements

This project is based on PHP version 8.1 in order to use features such as enumerations. This project does not require any external dependencies. However, you must have the cURL extension installed for it to work properly.

- PHP version >= 8.1
- cURL extension

## Installation

The project uses Composer to manage dependencies. If you haven't already installed Composer, you can do so by following the instructions on the official Composer website.

### Github install

#### Clone the project

To install the project, you can clone it from GitHub using the following Git command:

```bash
git clone git@github.com:EasyGithDev/PHPOpenAI-Examples.git
```

#### Install the project

```bash
composer install
```

## Writing a first example

To use the OpenAI API, you need to sign up on their website and obtain an API key. Once you have your API key, you can use it in your PHP code to send requests to the OpenAI API.

Here's an example code that shows you how to use the OpenAI API in PHP:

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use EasyGithDev\PHPOpenAI\Models\ModelEnum;
use EasyGithDev\PHPOpenAI\OpenAIApi;

$response = (new OpenAIApi("YOUR_KEY"))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
);

var_dump($response);
```

This code instantiates a new `OpenAIApi` object with an API key, and then creates a new `Completion` object to perform text completion with the GPT-3 AI language model provided by OpenAI.

The `create()` method is called on the `Completion` object to generate a new text completion. It takes two parameters:

- the first parameter is the ID of the GPT-3 model to use for completion. In this case, it uses the TEXT_DAVINCI_003 model.
- the second parameter is the prompt or input text for which the completion will be generated. In this case, the prompt is "Say this is a test".

The result of the completion is returned in the `$response` variable. The result can then be used for further processing, such as displaying the completed text or feeding it into another part of the program for additional processing.


## Manage the API Key

### First possibility

You can use an environment variable to store your key. You can then use this variable as in the following example:

```bash
export OPENAI_API_KEY="sk-xxxxxxxxxxx"
```

```php
<?php
$response = (new OpenAIApi(getenv('OPENAI_API_KEY')))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
);
```

### Second possibility

You can create a file containing the key. By default, you should use the folder named "config" to place your file. However, you can modify this behavior as follows:

```php
<?php
Configuration::$_configDir = '/YOUR/PATH/TO/THE/FILE';
```

The contents of the "key.php" file are as follows:

```php
<?php
return 'API_KEY';
```

You can then use this variable as in the following example:

```php
<?php
$apiKey = '';
if (file_exists(Configuration::$_configDir . '/key.php')) {
    $apiKey = require Configuration::$_configDir . '/key.php';
}

$response = (new OpenAIApi($apiKey))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
);
```