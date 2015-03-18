      <?php include "../config/config.php"; ?>
      
      <?php if(empty($_SESSION['admin'])){
		header('location:../error.php?q=404');
		} ?>
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Capture The Flag,CTF,Challange CTF,Hacking,Forensic,Reversing">
    <meta name="author" content="Indonesian Backtrack Team">
    <meta property="fb:admins" content="19908503" />
    <meta property="fb:app_id" content="112989545392380" /> 
    <meta property="og:title" content="Capture The Flag : Indonesian Backtrack Team" />
    <meta property="og:type" content="website" />
    <meta property="twitter:account_id" content="786331568" />
    <meta property="og:url" content="http://indonesianbacktrack.or.id" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@ibteam">
    <meta name="twitter:title" content="Capture The Flag : Indonesian Backtrack Team">
    <meta name="twitter:description" content="Capture The Flag,CTF,Challange CTF,Hacking,Forensic,Reversing">
    <meta name="twitter:creator" content="@ibteam">
    <meta name="twitter:image:src" content="http://indonesianbacktrack.or.id/forum/images/alphagamingv1.8/mainpic.png">
    <meta property="og:image" content="http://indonesianbacktrack.or.id/forum/images/alphagamingv1.8/mainpic.png" />
    <meta property="og:site_name" content="indonesianbacktrack.or.id" />
    <meta property="og:description" content="Capture The Flag,CTF,Challange CTF,Hacking,Forensic,Reversing" />
    <link rel="shortcut icon" href="http://www.indonesianbacktrack.or.id/wp-content/themes/ibtrevolution/favicon.ico" title="Favicon" />
    <title>IBTEAM : CTF</title>

   <!--Font Awesome -->
   <link href="<?php echo $url;?>assets/css/font-awesome.min.css" rel="stylesheet">
   
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $url;?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $url;?>assets/css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    </head>
    
