
<?php

//１つ１つuseするのがめんどいのでここで定義
$app->get("/hoge", App\Controller\main\TopController::class . ":showTop");
