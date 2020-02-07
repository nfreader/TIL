<?php

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Twig\Extra\Markdown\MarkdownExtension;
use Twig\Extra\Markdown\DefaultMarkdown;
use Twig\Extra\Markdown\MarkdownRuntime;
use Twig\RuntimeLoader\RuntimeLoaderInterface;;

// Set view in Container
$container->set('view', function() {
  $twig =  Twig::create(__DIR__ . '/../../views', [
    'cache' => '/tmp',
    'debug' => DEBUG
  ]);

  $twig->getEnvironment()->addGlobal('environment', [
    'banner'     => ENV_BANNER,
    'env_string' => ENV_STRING,
    'app'  => [
      'name'    => getenv('APP_NAME'),
      'version' => getenv('VERSION')
    ]
  ]);

  $twig->addExtension(new MarkdownExtension());
  $twig->addExtension(new \Twig\Extension\DebugExtension());

  $twig->addRuntimeLoader(new class implements RuntimeLoaderInterface {
    public function load($class) {
      if (MarkdownRuntime::class === $class) {
        return new MarkdownRuntime(new DefaultMarkdown());
      }
    }
  });

  return $twig;
});

$app->add(TwigMiddleware::createFromContainer($app));
$app->addRoutingMiddleware();