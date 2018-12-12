# php-random-quotes

[![GitHub tag](https://img.shields.io/github/tag/popoway/php-random-quotes.svg)](https://github.com/popoway/php-random-quotes/tags)
[![GitHub Release Date](https://img.shields.io/github/release-date/popoway/php-random-quotes.svg)](https://github.com/popoway/php-random-quotes/releases)
[![GitHub repo size in bytes](https://img.shields.io/github/repo-size/popoway/php-random-quotes.svg)](https://github.com/popoway/php-random-quotes/releases)
[![GitHub commit activity the past week, 4 weeks, year](https://img.shields.io/github/commit-activity/w/popoway/php-random-quotes.svg)](https://github.com/popoway/php-random-quotes/commits)
[![license](https://img.shields.io/github/license/popoway/php-random-quotes.svg)](https://github.com/popoway/php-random-quotes/blob/master/LICENSE)  
Developed on PHP, `php-random-quotes` is a simple API for querying a quote randomly selected from a JSON quote pile.

## Quick Links

Live Demo: [php-random-quotes](https://php-random-quotes.app.popoway.cloud/)  
Release Notes: [Release Notes](https://github.com/popoway/php-random-quotes/releases)

## Usage

The following parameters are available:

| Parameter     | Value        | Comment| Optional|Default value|
| ------------- |:-------------:| -----:|-----:|-----:|
| base      | URL | Location of the quote pile in JSON format. This will override "lang" parameter. |false|base/en.json|
| lang      | i18n codes defined in RFC 3066 | Specify the language of available quotes. |false|en|
| output      | See below: json/quote-only/double-hyphen/no-hyphen/single-hyphen | Specify the language of available quotes. |false|single-hyphen|
| | json | JSON of a single quote as return value |||
| | quote-only | Quote only as return value|||
| | double-hyphen | Two adjacent hyphens between quote and author as return value|||
| | no-hyphen | Only a space bar between quote and author as return value|||
| | single-hyphen | One hyphen between quote and author as return value|||

Examples:

Requesting URL: _index.php?base=base/en.json&output=json_  
Return: _{"Quote":"Rediscover the world.","Author":"popoway"}_

Requesting URL: _index.php?lang=zh-cn&output=no-hyphen_  
Return: _做菜的人一般吃菜很少。……从这点说起来，愿意做菜给别人吃的人是比较不自私的。 汪曾祺_

## AJAX

This API can be used to inject random quotes in a static web page.

Sample codes:
```JavaScript
var quoteAPIurl = 'https://php-random-quotes.app.popoway.cloud/';

// function to fetch quotes
function fetchQuote(elemId, url) {
  fetch(url)
    .then(function(response) {
      return response.text();
    })
    .then(function(text) {
      var elem = document.getElementById(elemId);
      if (elem) elem.textContent = text;
    })
}

// fetch quotes
fetchQuote('ajaxQuotes', quoteAPIurl);
```
```HTML
<p>Your content goes here</p>
<p>Below is a random quote:</p>
<span id="ajaxQuotes">quote will be injected here</span>
```

## Status

Basic features should work, since it is rather stable.  

## Contributing

Give me [inspiration on quotes](mailto:popoway@popoway.cloud), or help [translate it](mailto:popoway@popoway.cloud).  

## License

[MIT](https://popoway.mit-license.org/)
