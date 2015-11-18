<?php
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Origin: *');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>PHP TOUNO TEMPLATE 2.0</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0" />

        <meta name="description" content="">
        <meta name="abstract" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Mr. Kananek Thongkam (Touno.K)">
        <meta name="copyright" content="Touno.K">
        <meta name="creation_Date" content="01/11/2015">

        <link rel="shortcut icon" href="/resources/icon/icon-16.png">
        <link rel="apple-touch-icon" sizes="57x57" href="/resources/icon/icon-57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/resources/icon/icon-72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/resources/icon/icon-144.png">
        <link rel="stylesheet" href="/public/css/raannuch/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="/public/css/materialPreloader.min.css" type="text/css" />
        <link href="/public/touno.engine.css" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
          <script src="/public/js/html5shiv.min.js"></script>
          <script src="/public/js/respond.min.js"></script>
        <![endif]-->

        <script type="text/javascript" src="/public/js/db.js"></script>
        <script type="text/javascript" src="/public/js/URI.min.js"></script>
        <script type="text/javascript" src="/public/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="/public/js/jquery.dynatable.js"></script>
        <script type="text/javascript" src="/public/js/materialPreloader.min.js"></script>
        <script type="text/javascript" src="/public/js/queryloader2.min.js"></script>
        <script type="text/javascript" src="/public/js/moment.min.js"></script>
        <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/public/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/public/js/bootstrap-notify.min.js"></script>
        <script type="text/javascript" src="/public/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="/public/touno.engine.js"></script>
    </head>




<body>
<script type="text/javascript">
    var host = '';
    window.loader = new $.materialPreloader({ position: 'top', height: '5px', col_1: '#159756', col_2: '#da4733', col_3: '#3b78e7', col_4: '#fdba2c', fadeIn: 0, fadeOut: 200 });
    loader.on();

    $.when(
        (function(){
            window.indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
            window.origin = host || window.location.origin;

            var CheckSupportModule = $.Deferred();
            if (localStorage == undefined) {
                CheckSupportModule.reject(new CallbackException("LocalStorage Support", "Browser your not support 'localStorage'.<br> Please contact the system administrator."));
            } else if (console == undefined) {
                CheckSupportModule.reject(new CallbackException("Log Support", "Browser your not support 'log'.<br> Please contact the system administrator."));
            } else if (document.cookie == undefined) {
                CheckSupportModule.reject(new CallbackException("Cookie Support", "Browser your not support 'Cookie'.<br> Please contact the system administrator."));
            } else if (window.indexedDB == undefined) {
                CheckSupportModule.reject(new CallbackException("IndexedDB Support", "Browser your not support 'indexedDB'.<br> Please contact the system administrator."));
            } else if (History == undefined) {
                CheckSupportModule.reject(new CallbackException("History Support", "Browser your not support 'History'.<br> Please contact the system administrator."));
            } else if (/MSIE 5.0|MSIE 5.5|MSIE 6.0|MSIE 7.0|MSIE 8.0/g.exec(navigator.userAgent)) {
                CheckSupportModule.reject(new CallbackException("Internet Explorer Support", "Browser your not support 'Internet Explorer 8 and below'.<br> Please contact the system administrator."));
            } else {
                CheckSupportModule.resolve(true);

                // if(T.Storage('version') && T.Storage('dbname') && T.Storage('theme'))
                // {

                // } else {
                //     $.ajax({ url: window.origin+"/lib/init.php", dataType : 'JSON', type: "POST", data: { config: 'initial' } }).done(function(init) {
                //         T.Storage('version', init.version); 
                //         T.Storage('dbname', init.db.name);
                //         T.Storage('theme', init.default.theme);
                //         db.open({
                //             server: init.db.name, version: 1,
                //             schema: { initial: { key: { keyPath: 'version' }}}
                //         }).then( function (s) {
                //             console.log(init);
                //             s.add('initial', init);
                //             s.close();
                //             location.reload();
                //         });
                //     });
                // } 
            }
            return CheckSupportModule.promise();
        })()
    ).fail(function (ex) {
        loader.off();
        if (ex instanceof CallbackException) {
            alert(ex.exMessage);
        } else {
            alert(ex);
        }
    }).done(function (data) {
        console.log('done.');
        var onCompleteLoaded = function () {
            loader.off();
        }
        var body = document.querySelector("body");
        var ql = new QueryLoader2(body, { backgroundColor: "#fcfcfc", percentage: false, barHeight: 0, minimumTime: 200, fadeOutTime: 300, onComplete: onCompleteLoaded });
    });
        

</script>
<?php 
try
{
    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once($root."/lib/init.php"); 
    include_once($root."/component/default.php"); 
} catch(Exception $ex) {
  echo '<div class="alert alert-dismissible alert-danger navbar-fixed-top">';
  echo '<strong>Oh snap!</strong> '.$ex->getMessage().'</div>';
}
?>
</body>
</html>