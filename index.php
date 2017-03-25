<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>專題</title>
        <!-- JS -->
        <script src="//connect.facebook.net/en_US/all.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="assets/messenger.min.js"></script>
        <script src="assets/semantic.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="assets/semantic.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
        <link rel="stylesheet" href="assets/messenger.css" media="screen" title="no title">
        <link rel="stylesheet" href="assets/messenger-theme-future.css" media="screen" title="no title">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="//i.imgur.com/WN0FROO.png">
    </head>
    <body>

        <?php require 'nav.php'; ?>

        <div class="ui grid">

            <div class="four wide column"></div>
            <div class="eight wide column" id="result_data"></div>
            <div class="four wide column" id="test"></div>

        </div>

        <script>

            FB.init({
                appId: "1708325876106482",
                xfbml      : true,
                version    : 'v2.8',
                status     : true, // check login status
                cookie     : true, // enable cookies to allow the server to access the session
                oauth      : true, // enable OAuth 2.0
                frictionlessRequests: true
            });

            var access_token;

            // 取得登入狀態
            FB.getLoginStatus(function(response) {
                if (response.status === "connected") {
                    var uid = response.authResponse.userID;
                    access_token = response.authResponse.accessToken;
                }
                else if (response.status === "not_authorized") {

                }
                else {

                }
            });

            // $("#show").click(function(){
            //     var data = {"id": "273272719684605","name": "Guanxing Wu","gender": "male","cover": {"id": "365619077116635","offset_y": 89,"source": "https://scontent.xx.fbcdn.net/t31.0-8/s720x720/15123352_365619077116635_5798336922525289640_o.jpg"}};
            //     var response = $.parseJSON(JSON.stringify(data));
            //     alert(data[0].id);
            // });

            $("#fb-login").click(function() {

                $("#result_data").text("");

                FB.login(function(response) {

                    if (response.authResponse) {

                        FB.api("/me/likes", function(details) {

                            var response = $.parseJSON(JSON.stringify(details));

                            $.each(response.data, function(i){

                                // 顯示出來
                                $("#result_data").append(
                                        '<p>' +
                                            '<a class="ui basic brown label">' + response.data[i].name + '</a>' +
                                            '<a class="ui basic teal label">' + response.data[i].id + '</a>' +
                                            '<a class="ui basic blue label">' + response.data[i].created_time + '</a>'
                                        + '</p>'
                                );

                                // 存到芒果資料庫
                                $.ajax({
                            		type: 'post',
                            		url: '//localhost/meet/meet/likes/save',
                            		dataType: 'json',
                                    data: {
                            			name : response.data[i].name,
                            			id : response.data[i].id,
                                        time : response.data[i].created_time,
                            		},
                            		error: function (xhr) {
                            			errorMsg();
                            		},
                            		success: function (response) {
                            			var response = $.parseJSON(JSON.stringify(response));

                            			if (response.status == true) {

                                        	Messenger().post({
                                        		message: "插入成功",
                                        		type: "info",
                                        		showCloseButton: true,
                                        		hideAfter: 1
                                        	});

                            			}
                            			else{
                                            Messenger().post({
                                                message: "失敗",
                                                type: "error",
                                                showCloseButton: true,
                                                hideAfter: 1
                                            });
                            			}
                            		}
                            	});

                            });

                        });
                    }
                });
            });

            // posts
            $("#posts").click(function() {

                $("#result_data").text("");

                FB.login(function(response) {

                    if (response.authResponse) {

                        FB.api("/me/posts", function(details) {

                            var response = $.parseJSON(JSON.stringify(details));

                            $.each(response.data, function(i){

                                $("#result_data").append(
                                        response.data[i].message + '<br />'
                                );

                            });

                        });
                    }
                });
            });

            // 個人資料
            $("#profile").click(function() {

                $("#result_data").text("");
                $("#account").text("");

                FB.login(function(response) {

                    if (response.authResponse) {

                        FB.api("/me?fields=name,cover,last_name,first_name,gender,education,location,birthday&access_token=" + access_token, function(details) {

                            var response = $.parseJSON(JSON.stringify(details));

                            var user_pic = 'https://graph.facebook.com/'+ response.id +'/picture';
                            var gender   = response.gender == "male" ? "男孩" : "女孩";

                            $("#result_data").append(

                                '<div class="ui segment basic">' +
                                    '<div class="ui card centered">' +
                                        '<a class="image" href="#">' +
                                            '<img src="' + user_pic + '?width=300&height=300"/>' +
                                        '</a>' +
                                        '<div class="content">' +
                                            '<a class="header center aligned" href="#">' + response.name + '&nbsp;' + gender + '</a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +

                                '<table class="ui fixed table">' +
                                    '<thead><tr>' +
                                        '<th>就讀學校</th><th>現居</th><th>生日</th>' +
                                    '</tr></thead>' +
                                    '<tbody><tr>'
                                        + '<td>' + '<a href="https://fb.com/' + response.education[1].school.id + '">' + response.education[1].school.name + '</a></td>' +
                                        '<td>' + '<a href="https://fb.com/' + response.location.id + '">' + response.location.name + '</a></td>' +
                                        '<td>' + response.birthday + '</td>' +
                                    '</tr></tbody>' +
                                '</table>' +

                                '<img src="' + response.cover.source + '"/>'
                            );


                            $("#account").append(
                                '<a href="profile.php"><img src="' + user_pic +'?width=30&height=30" />' + '&nbsp;&nbsp;' + response.name + '</a>'
                            );
                        });
                    }
                });
            });

            // 我的相簿
            $("#albums").click(function() {

                $("#result_data").text("");

                FB.login(function(response) {

                    if (response.authResponse) {

                        FB.api("/279421685736375/photos", function(details) {

                            var response = $.parseJSON(JSON.stringify(details));

                            $.each(response.data, function(i){


                                FB.api(response.data[i].id + '?fields=images', function(details_img) {

                                    var result = $.parseJSON(JSON.stringify(details_img));

                                    $("#result_data").append(

                                        '<div class="ui segment basic">' +
                                            '<div class="ui card centered">' +
                                                '<a class="image" href="#">' +
                                                    '<img src="' + result.images[0].source + '" />' +
                                                '</a>' +
                                            '</div>' +
                                        '</div>'

                                    );

                                });

                            });

                        });
                    }
                });
            });

            // 我的動態
            $("#feed").click(function() {

                $("#result_data").text("");

                FB.login(function(response) {

                    if (response.authResponse) {

                        FB.api("/me/feed", function(details) {

                            var response = $.parseJSON(JSON.stringify(details));

                            $.each(response.data, function(i){

                                if (response.data[i].story.split("中原大學").length-1) {

                                    $("#result_data").append(
                                        '<div class="ui segment yellow">' +
                                            response.data[i].story +
                                            response.data[i].message +
                                            '<div class="ui right aligned segment basic"><a class="ui red basic label">' + response.data[i].created_time + '</a></div>' +
                                        '</div>'

                                    );

                                }
                                else{

                                    $("#result_data").append(
                                        '<div class="ui segment blue">' +
                                            response.data[i].story +
                                            response.data[i].message +
                                            '<div class="ui right aligned segment basic"><a class="ui red basic label">' + response.data[i].created_time + '</a></div>' +
                                        '</div>'

                                    );

                                }

                            });

                        });
                    }
                });
            });

            // 我的標記
            $("#tags").click(function() {

                $("#result_data").text("");

                FB.login(function(response) {

                    if (response.authResponse) {

                        FB.api("/me/tagged", function(details) {

                            var response = $.parseJSON(JSON.stringify(details));

                            $.each(response.data, function(i){


                                if (response.data[i].story.split("中原大學").length-1) {

                                    $("#result_data").append(
                                        '<div class="ui segment yellow">' +
                                            response.data[i].story +
                                            response.data[i].message +
                                            '<div class="ui right aligned segment basic"><a class="ui red basic label">' + response.data[i].created_time + '</a></div>' +
                                        '</div>'
                                    );

                                }
                                else{

                                    $("#result_data").append(
                                        '<div class="ui segment blue">' +
                                            response.data[i].story +
                                            response.data[i].message +
                                            '<div class="ui right aligned segment basic"><a class="ui red basic label">' + response.data[i].created_time + '</a></div>' +
                                        '</div>'
                                    );

                                }

                            });

                        });
                    }
                });
            });


        </script>

    </body>
</html>
