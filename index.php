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
        <title><?php echo $meta->title; ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0" />
        <meta name="description" content="<?php echo $meta->description; ?>">
        <meta name="abstract" content="<?php echo $meta->abstract; ?>">
        <meta name="keywords" content="<?php echo $meta->keywords; ?>">
        <meta name="author" content="<?php echo $meta->author; ?>">
        <meta name="copyright" content="<?php echo $meta->copyright; ?>">
        <meta name="creation_Date" content="<?php echo $meta->creation; ?>">

        <link rel="shortcut icon" href="/public/icon/icon-16.png">
        <link rel="apple-touch-icon" sizes="57x57" href="/public/icon/mbos-icon-57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/public/icon/mbos-icon-72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/public/icon/mbos-icon-144.png">

        <link href="/public/css/<?php echo $meta->theme; ?>/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/public/touno.engine.css" rel="stylesheet" type="text/css" />

        <!--[if lt IE 9]>
          <script src="/public/js/html5shiv.min.js"></script>
          <script src="/public/js/respond.min.js"></script>
        <![endif]-->

        <!--[if IE 7]><link href="/public/css/fixed-ie7.css" rel="stylesheet" type="text/css" /><![endif]-->

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
        <script type="text/javascript" src="/public/touno.engine.js"></script>
    </head>
<body>
<script type="text/javascript">
    $(function(){
        loader.on();
    });
    var onCompleteLoaded = function () {
        var engine = new Template();
        $.when(
            engine.init
        ).fail(function () {
            console.log('ERROR MESSAGE');
        }).done(function () {
            loader.off();
            try {
                if (localStorage == undefined) {
                    throw new CallbackException("LocalStorage Support", "Browser your not support 'localStorage'.<br> Please contact the system administrator.");
                } else if (document.cookie == undefined) {
                    throw new CallbackException("Cookie Support", "Browser your not support 'Cookie'.<br> Please contact the system administrator.");
                } else if (History == undefined) {
                    throw new CallbackException("History Support", "Browser your not support 'History'.<br> Please contact the system administrator.");
                } else if (window.indexedDB == undefined) {
                    throw new CallbackException("IndexedDB Support", "Browser your not support 'indexedDB'.<br> Please contact the system administrator.");
                } else if (/MSIE 5.0|MSIE 5.5|MSIE 6.0|MSIE 7.0|MSIE 8.0/g.exec(navigator.userAgent)) {
                    throw new CallbackException("Internet Explorer Support", "Browser your not support 'Internet Explorer 8 and below'.<br> Please contact the system administrator.");
                } else {

                }
            } catch (e) {
                if (e instanceof CallbackException) {
                    console.log(e);
                } else {
                    console.error(e);
                }
            }
        });
    }

</script>
<?php include_once("component/main.php"); ?>

<script type="text/javascript">
    window.indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
    window.loader = new $.materialPreloader({ position: 'top', height: '5px', col_1: '#159756', col_2: '#da4733', col_3: '#3b78e7', col_4: '#fdba2c', fadeIn: 0, fadeOut: 200 });
    window.addEventListener('DOMContentLoaded', function () {
        var ql = new QueryLoader2(document.querySelector("body"), { backgroundColor: "#fcfcfc", percentage: false, barHeight: 0, minimumTime: 200, fadeOutTime: 300, deepSearch: true, onComplete: onCompleteLoaded });
    });
</script>

</body>
</html>