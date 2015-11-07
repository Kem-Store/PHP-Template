<div class="navbar navbar-default navbar-fixed-top navbar-gradient">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
  	  <a class="navbar-brand"><b>Raanuuch.co.uk</b></a>
    </div>
	<div class="navbar-collapse collapse" id="navbar-collapse" aria-expanded="false" style="height: 1px;">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="#">HOME</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">PRODUCT<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">อะไรสักอย่าง</a></li>
          </ul>
        </li>
		<li><a href="#">ABOUT US</a></li>
		<li><a href="#">CONTACT US</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
	      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          CART 
          <span id="cart" class="badge money">0</span>
        </a>
	      <ul class="dropdown-menu dropdown-cart" role="menu">
	      	<div style="padding:15px;">
		      <form role="search">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default">Submit</button>
		      </form>
	      	</div>
	      </ul>
        </li>
	  </ul>
    </div>
  </div>
</div>
<div class="page-header" style="border-bottom: none !important;">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="#">Library</a></li>
      <li class="active">Data</li>
    </ul>
  </div>
</div>
<div id="panel-component">
<?php
  include_once('lib/init.php');
  $default_component = 'home';
  foreach (Component::load() as $key => $value)
  {
    echo '<div id="panel-'.$value['com'].($default_component != $value['com'] ? '" style="display:none"' : '"').'>';
    echo file_get_contents($value['path']).'</div>';
  }
?>
</div>