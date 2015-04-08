<?php
/**
 * Entry point of a yo-back application.
 *
 * You must register a callback URL pointing to this file in your Yo dashboard
 * at https://dev.justyo.co/
 *
 */

require_once __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../config/config.php';

try {
    $requestHandler = new \YoBack\RequestHandler();
    $requestHandler->handle($_GET);
} catch (\Exception $e) {
    http_response_code($e->getCode());
    die($e->getMessage());
}

$responsePayload = $config['handler'](
    $requestHandler->getUsername(),
    $requestHandler->getPayload()
);

// the handler could have thrown but did not. Past this point we WILL Yo back

$yo = new \Yo\Client($config['http'], $config['api_token']);
$yo->yo($requestHandler->getUsername(), $responsePayload);
