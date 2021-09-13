<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'form_validation', 'ftp', 'upload', 'session', 'encryption', 'cart');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'file', 'webp', 'form', 'html', 'apigallery', 'views', 'session', 'login', 'media', 'variables', 'headers', 'action', 'slug', 'default', 'captcha_secret', 'verify', 'photos', 'text');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('back_m', 'login_m', 'base_m');
