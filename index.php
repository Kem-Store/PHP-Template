<?php
include_once("lib/ConfigSite.php");
include_once("lib/VarsSession.php");
include_once("lib/DB.php");

$base = new DB();
$session = new Session();

$meta = json_decode(file_get_contents("lib/bin/init.json"));
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Travox Mid-Back Office 4 build 1001</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0" />
        <meta name="description" content="<?php echo $meta->description; ?>">
        <meta name="abstract" content="<?php echo $meta->abstract; ?>">
        <meta name="keywords" content="<?php echo $meta->keywords; ?>">
        <meta name="author" content="<?php echo $meta->author; ?>">
        <meta name="copyright" content="<?php echo $meta->copyright; ?>">
        <meta name="creation_Date" content="<?php echo $meta->creation; ?>">

        <link rel="shortcut icon" href="/resources/icon/mbos-icon-16.png">
        <link rel="apple-touch-icon" sizes="57x57" href="/resources/icon/mbos-icon-57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/resources/icon/mbos-icon-72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/resources/icon/mbos-icon-144.png">

        <link href="/public/css/normalize.css" rel="stylesheet" type="text/css" />
        <link href="/public/css/<?php echo $meta->theme; ?>/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/public/css/materialPreloader.min.css" rel="stylesheet" type="text/css" />
        <link href="/public/css/thaisans-neue.css" rel="stylesheet" type="text/css" />

        <!--[if lt IE 9]>
          <script src="../public/js/html5shiv.min.js"></script>
          <script src="../public/js/respond.min.js"></script>
        <![endif]-->

        <!--[if IE 7]><link href="/public/css/fixed-ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
        <!--[if IE 8]><![endif]-->

        <script type="text/javascript" src="/public/js/db.js"></script>
        <script type="text/javascript" src="/public/js/URI.min.js"></script>
        <script type="text/javascript" src="/public/js/html5shiv.min.js"></script>
        <script type="text/javascript" src="/public/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="/public/js/materialPreloader.min.js"></script>
        <script type="text/javascript" src="/public/js/queryloader2.min.js"></script>
        <script type="text/javascript" src="/public/js/moment.min.js"></script>
        <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/public/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/public/js/bootstrap-notify.min.js"></script>
    </head>
<body>
<script type="text/javascript">
    window.indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
    window.loader = new $.materialPreloader({
        position: 'top',
        height: '5px',
        col_1: '#159756',
        col_2: '#da4733',
        col_3: '#3b78e7',
        col_4: '#fdba2c',
        fadeIn: 0,
        fadeOut: 200
    });

    window.addEventListener('DOMContentLoaded', function () {
        var ql = new QueryLoader2(document.querySelector("body"), {
            barColor: "#000",
            backgroundColor: "#fcfcfc",
            percentage: false,
            barHeight: 0,
            minimumTime: 200,
            fadeOutTime: 300,
            deepSearch: true,
            onProgress: onProgressLoaded,
            onComplete: onCompleteLoaded
        });
    });

    var onProgressLoaded = function (percentage, imagesLoaded, totalImages) {

    }
    var onCompleteLoaded = function () {
        loader.off();
        // $.when(
        //     $.getScript("/resources/mbos/MBOS-Initialize.js"),
        //     $.getScript("/resources/mbos/MBOS-UI.js"),
        //     $.getScript("/resources/mbos/MBOS-Engine.js")
        // ).fail(function () {
        //     //ERROR MESSAGE
        // }).done(function () {
        //     try {
        //         if (localStorage == undefined) {
        //             throw new CallbackException("LocalStorage Support", "Browser your not support 'localStorage'.<br> Please contact the system administrator.");
        //         } else if (document.cookie == undefined) {
        //             throw new CallbackException("Cookie Support", "Browser your not support 'Cookie'.<br> Please contact the system administrator.");
        //         } else if (History == undefined) {
        //             throw new CallbackException("History Support", "Browser your not support 'History'.<br> Please contact the system administrator.");
        //         } else if (window.indexedDB == undefined) {
        //             throw new CallbackException("IndexedDB Support", "Browser your not support 'indexedDB'.<br> Please contact the system administrator.");
        //         } else if (/MSIE 5.0|MSIE 5.5|MSIE 6.0|MSIE 7.0|MSIE 8.0/g.exec(navigator.userAgent)) {
        //             throw new CallbackException("Internet Explorer Support", "Browser your not support 'Internet Explorer 8 and below'.<br> Please contact the system administrator.");
        //         } else {

        //         }
        //     } catch (e) {
        //         if (e instanceof CallbackException) {
        //             console.log(e);
        //         } else {
        //             console.error(e);
        //         }
        //     }
        // });
    }

    loader.on();
</script>
<style type="text/css">
    #qLtempOverlay { background-color:#F7F7F7 !important; }
    ul.panel-nav li#logout { color:#b42a2a; }
    ul.panel-nav li#logout:active { color:#FFFFFF; background-color:#b42a2a; }

    #navigator-panel #navigator-icon { 
       /*background:url(resources/images/icon/icon-page.png) 12px 6px no-repeat;*/
        font-weight:bold;  
        font-size:18px; 
        padding:10px 0 10px 55px; 
    }
    #navigator-panel #navigator-name { 
        border-bottom:#efefef solid 4px;
        margin:10px 0;  
    }

</style>
<!-- TEMPLATE ALERT CONFRIM -->
<div class="DialogBackground"></div>
<div class="DialogProcess">
    <table style="">
        <div class="DialogTitle"></div>
        <div class="DialogDescription"></div>
        <div class="DialogAction">
            <span id="ActionConfirm" class="DialogConfirm"></span>
            <span id="ActionCancel" class="DialogCancel"></span>
        </div>
    </table>
</div>
<!-- TEMPLATE ALERT CONFRIM -->

<table id="MBOSEngine">
  <thead>
    <tr>
      <td colspan="2">
        <div>
            <div class="mobile-nav">
                <input type="button" value="" id="mobile-menu" />
                <ul class="panel-mobile">
                </ul>
            </div>
        </div>
      </td>
    </tr>
    <tr>
      <td height="100" colspan="2" align="right" class="MBOSLogo">
        <ul class="panel-app">
        </ul>
      </td>
    </tr>
    <tr>
      <td colspan="2">
          <div id="user-panel">
              <div id="company-mobile">&nbsp;</div>
              You are logged in as <span id="username">Guest</span> (<span id="company-web">Unknow</span>)
          </div>
      </td>
    </tr>
    <tr>
      <td><ul class="panel-nav">
          <li state="main" mbos-title="false">
            MAIN
          </li><li class="panel-sub">
            PRELIMINARY
            <div class="menu-sub">
              <div class="arrow up"></div>
              <ul>
                <li state="master-staff">STAFF</li>
                <li state="master-customer">CUSTOMER</li>
                <li state="master-subagent">SUB AGENT</li>
                <li state="master-supplier">SUPPLIER</li>
                <li state="master-product">PRODUCT</li>
                <li state="master-hotel">HOTEL</li>
                <li state="master-grouptour">GROUP TOUR</li>
                <li state="master-point">POINT</li>
              </ul>
            </div>
          </li><li>
            REPORT
          </li><li class="panel-sub">
            SETTING
            <div class="menu-sub">
              <div class="arrow up"></div>
              <ul>
                <li state="config-profile">PROFILE</li>
                <li state="config-systems">SYSTEMS</li>
                <li state="config-admin" txt-desc="System Administrator Admin users are encouraged to run smoothly[br]also contributed to the editing system of Travox midOffice well.">ADMINISTRATOR</li>
              </ul>
            </div>
          </li><li desc="We are friends to help you.">
            HELP
          </li>
        </ul></td>
      <td align="right" width="80">
        <ul class="panel-nav">
          <li id="logout">LOGOUT</li>
        </ul></td>
    </tr>
  </thead>
  <tbody>
    <tr id="navigator-panel">
      <td colspan="2">
          <div id="navigator-name"><div id="navigator-icon">MAIN MENU</div></div>
      </td>
    </tr>
    <tr id="content-panel" style="display:none;">
      <td colspan="2" id="component">&nbsp;</td>
    </tr>
    <tr id="preload-panel">
      <td colspan="2" id="preload">
        <div class="preload">
            <div>Initialize Component...</div>
            <div>MBOSEngine Prepare data, <br>Please wait</div>
        </div>
      </td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td align="center" colspan="2" style="padding-top:10px;">
          <div id="trademark">Travox is a registered trademark of Nippon Sysits Co.,Ltd<br>
          Copyright 2009 Nippon Sysits Co.,Ltd</div>
      </td>
    </tr>
    <tr>
        <td>
            <div class="loader-overlay">
                <div class="loader-footer">
                    <div class="loader-inner ball-grid-pulse"></div>
                    <div class="loader-world"><div class="loader-world-bar"></div></div>
                    <div class="loader-logo"></div>
                    Travox is a registered trademark of Nippon Sysits Co.,Ltd<br>Copyright 2009 Nippon Sysits Co.,Ltd
                    <div id="siteseal" style="height:16px;">
                        <a href="http://www.godaddy.com/ssl/ssl-certificates.aspx" target="_blank">SSL Certificates</a>
                    </div>
                </div>
            </div>
        </td>
    </tr>
  </tfoot>
</table>
</body>
</html>