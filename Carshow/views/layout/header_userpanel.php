<!doctype html>
<html>
<head>
	<title><?= Tittle ?></title>

    <link rel="stylesheet" href="<?= URL; ?>public/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?= URL; ?>public/css/carshow.css" />
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Open+Sans+Condensed:300|Quicksand|Titillium+Web" rel="stylesheet">

  <script src="<?= URL ?>public/js/ajaxMessage.js"></script>
  <script>
   unreadMessages("<?=URL?>");
  </script>  

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
        <a class="navbar-brand nav-bar-homepage" href="<?= URL ?>"><?= Header ?></a>


          <ul class="navbar-nav ml-auto">    
            <li class="nav-item active">
              <div class="dropdown" style="width: 200px;">
                <button class="btn btn-secondary dropdown-toggle btn-nav-usermenu" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><div id="message_img" style="float: left; padding-left: 10%;"><img src="<?= URL ?>public/images/msg1.png" width="40"></div>
                  <?php
                    $login = Session::get('login');
                    echo $login;
                   ?>
                </button>
                <div class="dropdown-menu dropdown-menu-userpanel" style="position:absolute; width: 200px;" aria-labelledby="dropdownMenuButton">
                   <a class="dropdown-item dropdown-item-nav-userpanel" href="<?= URL ?>userpanel/messages"><div id="messages"></div></a><hr class="hr-style-userpanel"/>
                  <a class="dropdown-item dropdown-item-nav-userpanel" href="<?= URL ?>userpanel/addOffer">Wystaw ogłoszenie</a><hr class="hr-style-userpanel"/>
                  <a class="dropdown-item dropdown-item-nav-userpanel" href="#">Pokaż ulubione</a><hr class="hr-style-userpanel"/>
                  <a class="dropdown-item dropdown-item-nav-userpanel" href="<?= URL ?>userpanel/settings">Ustawienia</a><hr class="hr-style-userpanel"/>

                  <?php if(View::showArrayValue('log',7) == 1) 
                    echo ' <a class="dropdown-item dropdown-item-nav-userpanel" href="'.URL.'admin">Panel Administracyjny</a><hr class="hr-style-userpanel"/>'; ?>

                  <a class="dropdown-item dropdown-item-nav-userpanel" href="<?= URL ?>logout/logOut">Wyloguj</a><hr class="hr-style-userpanel"/>
                </div>
              </div>
            </li>
          </ul>

      </div>
    </nav>

<div id="content">
