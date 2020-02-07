<?php

namespace TIL\Controller;

class TILController {

  private $view;

  private $db;

  public function __construct(\Slim\Views\Twig $view, \ParagonIE\EasyDB\EasyDB $db){
    $this->view = $view;
    $this->db = $db;
  }

  public function __invoke() {
    var_dump('Hewwo!');
  }

  public function home($request, $response, $args) {
    return $this->view->render($response, 'home.twig');
  }

  public function admin($request, $response, $args) {
    return $this->view->render($response, 'admin/home.twig');
  }


}