<?php 
namespace controllers;
class HomeController
{
    public function index($method)
          {


                    $loader = new \Twig\Loader\FilesystemLoader("../app/views/");
                    $twig = new \Twig\Environment($loader);
                    $template = $twig->load("index.html.twig");
echo $template->render(array(
                              'myvar' => 'test'

                    ));
                }
            }
            