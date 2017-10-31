<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Select' => $baseDir . '/plugins/select2/',
        'ImageUpload' => $baseDir . '/plugins/imageUpload/',
        'Sweetalert' => $baseDir . '/plugins/Sweetalert/',
        'Icheck' => $baseDir . '/plugins/icheck/',
        'Colorpicker' => $baseDir . '/plugins/colorpicker/'
    ]
];