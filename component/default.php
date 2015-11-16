<script>
T.SetComponent(function(name){
  // Component Active
  $('div#panel-component>div').hide();
  $('div#panel-component>div#panel-'+name).show();

  // Nav-menu Active
  $('ul.navbar-nav>li:not(.dropdown)>a[component]').removeAttr('class');
  $('ul.navbar-nav>li:has(a[component="'+name+'"])').addClass('active');

  return $('div#panel-component>div#panel-'+name).length > 0;
});

$(function(){
  // Component
  $('ul.navbar-nav>li:not(.dropdown)>a[component]').each(function(i, e) {
    if($(e).attr('component') === window.State.Component) {
      $(e).parent().addClass('active');
    }

    $(e).click(function(event){
      event.preventDefault();
      var com = $(e).attr('component');
      
      $('ul.navbar-nav>li:not(.dropdown)').removeAttr('class');
      $('ul.navbar-nav>li:has(a[component="'+com+'"])').addClass('active');
      T.SetState($(e).attr('component'));
    });
  });
});
</script>
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
  		<li><a component="home" href="#" lang="_HOME">HOME</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">PRODUCT<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a component="shop" module="list" href="#">All</a></li>
	        <?php 
            foreach($base->fetch("SELECT category_id, name FROM category WHERE sub_id = 0 ORDER BY name ASC;") as $dRow):
            $dtCategory = $base->fetch("SELECT category_id, name FROM category WHERE sub_id = $dRow[category_id] ORDER BY name ASC;");
            if(count($dtCategory)) { 
              echo '<li class="divider"></li>'; 
            } else {            
          ?>
            <li><a component="shop" module="list"  href="#">
              <?php
                $enName = $dRow['name'];
                $thName = NULL;
                if (preg_match("/(.*)#(.*)/i", $enName, $arr_name)) {
                  $enName = $arr_name[1];
                  $thName = $arr_name[2];
                }
                // echo '<b>'.$enName.'</b>'.($thName ? '<br>'.$thName : '');
                echo $enName;
              ?>
            </a></li>
            <?php
              }
              foreach($base->fetch("SELECT category_id, name FROM category WHERE sub_id = $dRow[category_id] ORDER BY name ASC;") as $dSub):
            ?>
              <li><a component="shop" module="list"  href="#">
                <?php 
                  $enName = $dSub['name'];
                  $thName = NULL;
                  if (preg_match("/(.*)#(.*)/i", $enName, $arr_name)) {
                    $enName = $arr_name[1];
                    $thName = $arr_name[2];
                  }
                  // echo '<b>'.$enName.'</b>'.($thName ? '<br>'.$thName : '');
                  echo $enName;
                ?>
              </a></li>
            <?php 
            endforeach; 
            if(count($dtCategory) > 2) { echo '<li class="divider"></li>'; }
            ?>
          <?php endforeach; ?>
        </ul>
      </li>
  		<li><a component="about-us" href="#" lang="_ABOUT">ABOUT US</a></li>
  		<li><a component="contact-us" href="#" lang="_CONTACT">CONTACT US</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
      <li><a action="login" href="#" lang="_LOGIN">LOGIN</a></li>
      <!-- <li><a action="logout" href="#" lang="_LOGOUT">LOGOUT</a></li> -->
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
    try {
      include_once($_SERVER["DOCUMENT_ROOT"].'/lib/init.php');
      foreach (Component::load() as $key => $value)
      {
        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/component/$value[com]/index.php")) {
          echo '<div id="panel-'.$value['com'].'" style="display:none">';
          include($_SERVER["DOCUMENT_ROOT"]."/component/$value[com]/index.php");
          echo '</div>';
        }
      }
    } catch(Exception $ex) {
      echo 'ERROR::'+$ex->getMessage();
    }

?>
</div><div class="panel-footer navbar-fixed-bottom">
  <div class="container">
    <div>Copyright <i class="fa fa-copyright" style="font-size: 12px;"></i> 2015 raannuch.co.uk All rights reserved.</div>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-70130307-1', 'auto');
      ga('send', 'pageview');

    </script>
  </div>
</div>