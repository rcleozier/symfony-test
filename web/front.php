<?php
 
// example.com/web/front.php
 
// ...
 
$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';
 
$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$resolver = new HttpKernel\Controller\ControllerResolver();
 
$framework = new Simplex\Framework($matcher, $resolver);
$response = $framework->handle($request);
 
$response->send();
 