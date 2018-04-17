<?php


class Addoffer extends Controller {

  function __construct() {

    parent::__construct();
  }

  public function newOffer() {

    $this->model->newOffer();
  }

  public function getCategories() {

    $this->model->getCategories();
  }

  public function getTest() {

    $this->model->test1();
  }
}
