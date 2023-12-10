<?php
namespace core;
use controllers\HomeController;
class Router
{
          private $uri;
          private $method;

          public function __construct()
          {
                    $this->uri = $_SERVER['REQUEST_URI'];
                    $this->method = $_SERVER['REQUEST_METHOD'];
          }

          // getters
          public function getUri()
          {
                    return $this->uri;
          }

          public function getMethod()
          {
                    return $this->method;
          }

          // setters
          public function setUri($uri)
          {
                    $this->uri = $uri;
          }

          public function setMethod($method)
          {
                    $this->method = $method;
          }
public function routing($uri, $method)
          {
// routing
$homeController = new HomeController();
                    switch ($uri) {
                              case '/':
                                        $homeController->index($method);
                                        break;

}
          }
}
