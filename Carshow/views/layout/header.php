<!DOCTYPE html>
<html>
<head>
	<title><?= Tittle ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/carshow.css" />
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Open+Sans+Condensed:300|Quicksand|Titillium+Web" rel="stylesheet">
</head>
<body>

		<nav class="navbar navbar-expand-lg navbar-dark fixed-top nav-bg">
      <div class="container">
        <a class="navbar-brand nav-bar-homepage" href="<?= URL ?>"><?= Header ?></a>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="btn btn-nav-login" href="<?php echo URL; ?>login">Zaloguj<span class="sr-only">(current)</span></a>
            </li>
          </ul>
      </div>
    </nav>

<div id="content">
