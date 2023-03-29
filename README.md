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

$response = (new OpenAIClient($apiKey))->Completion()->create(
    ModelEnum::TEXT_DAVINCI_003,
    "Say this is a test",
)->toObject();

// Response as stClass object
echo '<pre>', print_r($response, true), '</pre>';
```

The full documentation is here :
[https://github.com/EasyGithDev/PHPOpenAI](https://github.com/EasyGithDev/PHPOpenAI).
