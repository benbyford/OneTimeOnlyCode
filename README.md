# OneTimeOnlyCode 

Module for Processwire CMS - OneTimeOnlyCode creates one time only codes that can be used to access specific content. Module by [Ben Byford](https://www.benbyford.com) licensed under GNU GENERAL PUBLIC LICENSE.

## Installation

PW module installation: [https://processwire.com/docs/modules/intro/](https://processwire.com/docs/modules/intro/)

## Usage

Get module

`$otoc = $this->modules->get("OneTimeOnlyCode");`

Create codes with the url to check

returns an array of codes to then distribute

`$otocCodes = $otoc->createCodes($page->url, $count);`

Check a code against a url

returns a bool if code found and urls match

`$check = $otoc->checkCode($code, $page->url);`
