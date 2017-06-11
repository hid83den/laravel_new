<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.06.17
 * Time: 12:33
 */
echo 'href_mod';
echo '<pre>';
print_r($_ENV);
echo '<pre>';

Config::set('app.locale', 'ru');
echo Config::get('app.locale');