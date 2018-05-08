<?php

class Index extends Controller {

	function __construct() {
		parent::__construct();
	}

	function sitePatch(){
		$this->model->sitePatch();
	}

	function index() {
		$this->view->render('index/index');
	}

	function details() {
		$this->view->render('index/index');
	}

	function topOffers(){
		$this->model->topOffers();
	}

	function premiumOffers(){
		$this->model->premiumOffers();
	}

	function geoIp(){
		$this->model->geoIp();
	}

	function search(){
		$this->model->search();
	}
}
