<!doctype html>
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
            Kategorie pojazdów
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a><hr class="hr-style"/>
            <a class="dropdown-item" href="#">Another action</a><hr class="hr-style"/>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
        <a class="navbar-brand nav-bar-homepage" href="#">Carshow</a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        Lista rozwijana
      -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <div class="dropdown" style="width: 200px;">
                <button class="btn btn-secondary dropdown-toggle btn-nav-usermenu" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php
                    $login = Session::get('login');
                    echo $login;
                   ?>
                </button>
                <div class="dropdown-menu dropdown-menu-userpanel" style="position:absolute;" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item dropdown-item-nav-userpanel" href="#">Wystaw ogłoszenie</a><hr class="hr-style-userpanel"/>
                  <a class="dropdown-item dropdown-item-nav-userpanel" href="#">Pokaż ulubione</a><hr class="hr-style-userpanel"/>
                  <a class="dropdown-item dropdown-item-nav-userpanel" href="#">Ustawienia</a><hr class="hr-style-userpanel"/>
                  <a class="dropdown-item dropdown-item-nav-userpanel" href="#">Wyloguj</a><hr class="hr-style-userpanel"/>
                </div>
              </div>
            </li>
          </ul>

      </div>
    </nav>

<div id="content">
