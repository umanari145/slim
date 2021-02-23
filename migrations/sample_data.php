<?php

require_once 'load_setting.php';

//faker使う。普通に使う場合と同じ。
$faker = Faker\Factory::create('ja_JP');

for ($i=0; $i<10; $i++)
{
    $sample = [
        'name' => $faker->name(),
        'email' => $faker->email(),
    ];
    $db->table('users')->insert($sample);
}
