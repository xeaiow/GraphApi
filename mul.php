<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>專題</title>
        <!-- JS -->
        <script src="https://connect.facebook.net/en_US/all.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="assets/semantic.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="assets/semantic.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
    </head>
    <body>

        <?php require 'nav.php'; ?>

        <div class="ui grid">

            <div class="one wide column"></div>
            <div class="seven wide column" id="result_data"></div>

            <div class="seven wide column">

            </div>
            <div class="one wide column"></div>

        </div>

        <script>

            show();
            FB.init({
                appId: "1708325876106482",
                status: true,
                cookie: true,
                xfbml: true,
                oauth: true
            });

            // 取得登入狀態
            FB.getLoginStatus(function(response) {
                if (response.status === "connected") {
                    var uid = response.authResponse.userID;
                    var accessToken = response.authResponse.accessToken;

                }
                else if (response.status === "not_authorized") {

                // the user is logged in to Facebook,
                // but has not authenticated your app
                }
                else {
                    // the user isn't logged in to Facebook.
                }
            });

            $("#fb-login").click(function() {

                FB.login(function(response) {

                    if (response.authResponse) {

                        FB.api("/me/likes", function(details) {

                            var response = $.parseJSON(JSON.stringify(details));

                            $.each(response.data, function(i){

                                $.ajax({

                                    url: 'insert.php',
                                    type: "POST",
                                    data: {
                                        code : response.data[i].id,
                                        name : response.data[i].name,
                                        created_time : response.data[i].created_time
                                    },

                                    success: function(data){
                                    },
                                });

                            });

                            setTimeout(function(){ show(); }, 500);
                        });
                    }
                },{
                    scope: "user_likes"
                });
            });

            function show() {

                $.ajax({

                    async: false,
            		type: 'post',
            		dataType: 'json',
            		url: 'list.php',

                    error: function (xhr) {
            		},
                    success: function (response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        $.each(response.data, function(i) {

                            $("#result_data").append(

                                '<p>' + response.data[i].name + ' => ' + response.data[i].code + '</p>'

                            );

                        });
                    }

                });

            }
        </script>

    </body>
</html>
