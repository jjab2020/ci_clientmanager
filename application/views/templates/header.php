<html>
<head>
	<?php
	  //add_css(array('bootstrap.min.css'));
	  echo put_headers();

	?>
	<title>ciclient</title>
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">Gestion Client</a>
  
  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>">Acceuil <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>About">A propos</a>
      </li>
    </ul>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">Actions</a>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
      <a class="dropdown-item" href="<?php echo site_url('logout') ?>">Logout</a>
      <a class="dropdown-item" href="<?php echo site_url('dashboard') ?>">Dashboard</a>
    </div>
  </li>
  </div>
</nav>
<div class="container-fluid">