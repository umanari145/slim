<?php
namespace App\Exceptions;

use Throwable;
use Psr\Container\ContainerInterface;
use Slim\Interfaces\ErrorRendererInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Exception\HttpForbiddenException;
use Slim\Exception\HttpInternalServerErrorException;

class CustomErrorRenderer implements ErrorRendererInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * invokeはPHPのマジックメソッドでインスタンスを関数として使う場合に呼び出される
     * 例
     *  $is = new InvokeSample();  //（1）
     *  $ans = $is("test"); //もしInvokeSampleに__invokeが書かれていれば呼び出される
     *  https://atmarkit.itmedia.co.jp/ait/articles/1804/05/news008_2.html
     *
     */
    public function __invoke(Throwable $exception, bool $displayErrorDetails): string
    {
        //var_dump($exception);
        //exit();
        $twig = $this->container->get("template");
        //エラーごとにページや分岐を分ける

        if ($exception instanceof HttpNotFoundException) {
            $errorVars = [];
            $returnHtml = $twig->fetch("exceptions/error404.html", $errorVars);
        } elseif ($exception instanceof HttpForbiddenException) {
            $errorVars = [];
            $returnHtml = $twig->fetch("exceptions/error403.html", $errorVars);
        } elseif ($exception instanceof HttpInternalServerErrorException) {
            $errorVars = [];
            $returnHtml = $twig->fetch("exceptions/error500.html", $errorVars);
        } else {
            $errorVars = [];
            $returnHtml = $twig->fetch("exceptions/other_error.html", $errorVars);
        }
        return $returnHtml;
    }
}