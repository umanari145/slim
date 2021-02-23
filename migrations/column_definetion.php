<?php

require_once 'load_setting.php';

//column definishon
$db->schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email');
    $table->timestamps();
});

