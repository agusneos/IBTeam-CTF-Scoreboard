
<style>
img {
  -moz-animation-duration: 50ms;
  -moz-animation-name: getar;
  -moz-animation-iteration-count: infinite;
  -moz-animation-direction: alternate;

  -webkit-animation-duration: 50ms;
  -webkit-animation-name: getar;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-direction: alternate;

  animation-duration: 50ms;
  animation-name: getar;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

@-moz-keyframes getar {
  from {
    margin:0 0px 0px 0;
  }

  to {
    margin:0px 15px 0px 15px;
  }
}

@-webkit-keyframes blink {
  from {
    margin:0 0px 0px 0;
  }

  to {
    margin:0px 15px 0px 15px;
  }
}

@keyframes blink {
  from {
    margin:0 0px 0px 0;
  }

  to {
    margin:0px 15px 0px 15px;
  }
}


h1 {
  -moz-animation-duration: 400ms;
  -moz-animation-name: blink;
  -moz-animation-iteration-count: infinite;
  -moz-animation-direction: alternate;

  -webkit-animation-duration: 400ms;
  -webkit-animation-name: blink;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-direction: alternate;

  animation-duration: 400ms;
  animation-name: blink;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

@-moz-keyframes blink {
  from {
    color: #000;
  }

  to {
    color: #eee;
  }
}

@-webkit-keyframes blink {
  from {
     color: #000;

  }

  to {
     color: #eee;
  }
}

@keyframes blink {
  from {
     color: #000;

  }

  to {
     color: #eee;
  }
}
</style>
<?php
// @file error.php
  $error_msg = array();
  if (isset($_GET['q']) && is_numeric($_GET['q'])) {
    $status = array(
      400 => array('400 Bad Request', 'Your syntax is wack.'),
      401 => array('401 Login Error', 'Try again sucka.'),
      403 => array('403 Forbidden', 'This be private homey.'),
      404 => array('404 Missing', "Clearly this doesn't exist."),
      405 => array('405 Method Not Allowed', 'This resource is too good fo yo method.'),
      408 => array('408 Request Timeout', "Upgrade your effin' browser."),
      414 => array('414 URL To Long', "Is that a URL in your pants?"),
      500 => array('500 Internal Server Error', 'AHHHhhh my server is down!'),
      502 => array('502 Bad Gateway', 'The server is acting all crazy.'),
      504 => array('504 Gateway Timeout', "I'm sorry Dave, I'm afraid I can't do that."),
    );
    $error_msg = $status[$_GET['q']];
  }

  if (!empty($error_msg)) {
    foreach ($error_msg as $err) {
        echo "<h1>".$err."</h1>";
   }
        echo "<a href='/'><img src='http://www.quickmeme.com/img/8e/8e0ad64f3427075b6a447143de1242d8a876d4c6b9fe3852711d89cd6c578684.jpg' /></a>";
  }
  else {
    echo 'Something went wrong.';
  }
?>
