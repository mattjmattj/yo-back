yo-back
=======

Yo-back is a mini-framework written in PHP. It will allow you to deploy a Yo-enabled
service in minutes.

## Usage

1. Clone this repository somewhere on your web server
2. Run `composer update`
3. Make sure your web server is configured to expose the www folder
4. Go to your [Yo dashboard](https://dev.justyo.co/) and grap your API token.
5. Configure a callback URL for your account, routing to the www folder
6. Rename the file `config/config.php.dist` in `config/config.php`
7. Open it and paste your API token
8. Write an "handler" closure as indicated in the header. This IS the only logic required. The handler is used to create a payload to send with your Yo.

Done! You're welcome.

## Demo

A demo YoApp is available, courtesy of [Emmanuel Pelletier](https://github.com/Leimi).
If you Yo to **JEDEPRIME**, it will Yo you back a random page from http://jedepri.me.
jedepri.me is a French site which will definitely cheer you up when you feel a little
bit depressed.

The demo consists in the following configuration:
```php
return [
	'api_token'	=> 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
	'http' => new \Yo\HTTP\Client\LightCurl(),
	'handler' => function($username, \Yo\Payload $payload = null) {
		return new \Yo\Link('http://jedepri.me/toujours/');
	}
];
```

## License

Yo-back is licensed under BSD-2-Clause.