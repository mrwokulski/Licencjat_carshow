<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/carshow.css" />
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Open+Sans+Condensed:300|Quicksand|Titillium+Web" rel="stylesheet">
</head>
<body>

		<nav class="navbar navbar-expand-lg navbar-dark fixed-top nav-bg">
      <div class="container">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle btn-nav-vehicletype" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Telefony
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a><hr class="hr-style"/>
            <a class="dropdown-item" href="#">Another action</a><hr class="hr-style"/>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
        <a class="navbar-brand nav-bar-homepage" href="<?= URL ?>index/index">Carshow</a>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="btn btn-nav-login" href="<?php echo URL; ?>login">Zaloguj<span class="sr-only">(current)</span></a>
            </li>
          </ul>
      </div>
    </nav>

<div id="content">
