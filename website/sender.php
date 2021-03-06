<?php
session_start();
// if ($_SESSION['account'] != "sender"){
//   header('Location: ' . $_SERVER['HTTP_REFERER']);
// }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blueprint: Multi-Level Menu</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.1.9/jquery.datetimepicker.min.js"></script>
  <!-- demo styles -->
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <!-- menu styles -->
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <script src="js/modernizr-custom.js"></script>
</head>

<body>
  <!-- Main container -->
  <div class="container">
    <!-- Blueprint header -->
    <header class="bp-header cf">
      <div class="bp-header__main">
        <span class="bp-header__present">Bridging33</span>
        <h1 class="bp-header__title">Who are you missing?</h1><br>
      </div>
    </header>
    <button class="action action--open" aria-label="Open Menu"><span class="glyphicon glyphicon-align-justify" style="color: grey;"></span></button>
    <nav id="ml-menu" class="menu">
      <button class="action action--close" aria-label="Close Menu"><span class="glyphicon glyphicon-remove"></span></button>
      <div class="menu__wrap">
        <ul data-menu="main" class="menu__level" tabindex="-1" role="menu" aria-label="Menu">
          <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-1" aria-owns="submenu-1" href="home.php">Home</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2" aria-owns="submenu-2" href="sender.php">Contact</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-3" aria-owns="submenu-3" href="receive.php">My Invitation</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-4" aria-owns="submenu-4" href="senderre.php">My Schedule</a></li>
        </ul>
        
    </nav>
  </div>
   <table style="width:100%">
    <tr>
      <td align="center"><img src="img/1.jpg" width="100px"> <br>Dad<br><button class="btn btn-primary space" onclick="ajax()"> Invite</button></td>
      <td align="center"><img src="img/mum.jpeg" width="100px"> <br>Mum<br><button class="btn btn-primary space" onclick="ajax()"> Invite</button></td>

    </tr>
    <tr>
      <td align="center"><img src="img/3.jpg" width="100px"> <br>Kelvin<br><button class="btn btn-primary space" onclick="ajax()"> Invite</button></td>
      <td align="center"><img src="img/4.jpg" width="100px"> <br>James<br><button class="btn btn-primary space" onclick="ajax()"> Invite</button></td>
    </tr>
  </table>
  <!-- /view -->
  <script src="js/classie.js"></script>

  <script src="js/main.js"></script>
  <script>
  (function() {
    var menuEl = document.getElementById('ml-menu'),
      mlmenu = new MLMenu(menuEl, {
        // breadcrumbsCtrl : true, // show breadcrumbs
        // initialBreadcrumb : 'all', // initial breadcrumb text
        backCtrl : false, // show back button
      });

    // mobile menu toggle
    var openMenuCtrl = document.querySelector('.action--open'),
      closeMenuCtrl = document.querySelector('.action--close');

    openMenuCtrl.addEventListener('click', openMenu);
    closeMenuCtrl.addEventListener('click', closeMenu);

    function openMenu() {
      classie.add(menuEl, 'menu--open');
      closeMenuCtrl.focus();
    }

    function closeMenu() {
      classie.remove(menuEl, 'menu--open');
      openMenuCtrl.focus();
    }

    // simulate grid content loading
    var gridWrapper = document.querySelector('.content');

    function loadDummyData(ev, itemName) {
      ev.preventDefault();

      closeMenu();
      gridWrapper.innerHTML = '';
      classie.add(gridWrapper, 'content--loading');
      setTimeout(function() {
        classie.remove(gridWrapper, 'content--loading');
        gridWrapper.innerHTML = '<ul class="products">' + dummyData[itemName] + '<ul>';
      }, 700);
    }
  })();

    function ajax() {
      $.ajax({
           type: "POST",
           url: 'send.php',
           data:{action:'send'},
           success:function(html) {
             alert("Your have successfully sent the invitation!");
           }

      });
  } 
  </script>
</body>

</html>
