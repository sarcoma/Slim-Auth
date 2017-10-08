<?php

namespace Oacc\Middleware;

class ValidationErrorsMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        if(array_key_exists('errors', $_SESSION)) {
            $this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
            unset($_SESSION['errors']);
        }
        $response = $next($request, $response);
        return $response;
    }
}