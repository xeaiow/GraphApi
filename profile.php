<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>專題</title>
        <!-- JS -->
        <script src="//connect.facebook.net/en_US/all.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="assets/semantic.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="assets/semantic.min.css" />
        
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="//i.imgur.com/WN0FROO.png">
        <style>

        .node circle {
          cursor: pointer;
          stroke: #3182bd;
          stroke-width: 1.5px;
        }

        .node text {
          font: 10px sans-serif;
          pointer-events: none;
          text-anchor: middle;
        }

        line.link {
          fill: none;
          stroke: #9ecae1;
          stroke-width: 1.5px;
        }

        </style>

    </head>
    <body>

        <?php require 'nav.php'; ?>

        <div class="ui grid">
            <div class="four wide column"></div>

            <div class="eight wide column" id="result">

                <div class="ui card centered">
                    <div class="image">
                        <img src="//i.imgur.com/bWVckBp.jpg">
                    </div>
                    <div class="content">
                        <a class="header center aligned">吳冠興</a>
                    <div class="meta center aligned">
                        <span class="date">1995/06/01</span>
                    </div>
                    <div class="description center aligned">
                        中原大學 資訊管理學系
                    </div>
                    </div>
                    <div class="extra content center aligned">
                        <a>
                            <i class="lab icon"></i>
                            分析出 6 種興趣
                        </a>
                    </div>
                </div>

                <div class="ui card vertical segment centered" id="me">

                </div>

            </div>

            <div class="three wide column" id="test">

            </div>
            <div class="one wide column"></div>
        </div>

        <script>

            // 我的標記
            $("#send").click(function() {

                submit_text();

            });

            $("#say_text").keypress(function(e){

                code = (e.keyCode ? e.keyCode : e.which);

                if (code == 13 && $("#say_text").val() != "") {

                    submit_text();

                }

            });

            function submit_text () {

                $("#result_data").append(

                    '<div class="ui segment clearing basic">' +

                        '<div class="ui left floated button blue">' + $("#say_text").val() + '</div>' +

                    '</div>'

                );

                $("#say_text").val("");

                setTimeout(function () {

                    $("#result_data").append(

                        '<div class="ui segment clearing basic">' +

                            '<div class="ui right floated button grey">對啊夏天超熱的</div>' +

                        '</div>'

                    );

                }, 1200);

            }

            // 自動輸入
            $("#auto_say").click(function(){

                $("#say_text").val("你想去墾丁玩唷?");
                $("#say_text").focus();

            });

            function re () {

                // $("#result").text("");

                // $("#result").append(
                //     '<div class="ui card centered">' +
                //         '<div class="image">' +
                //             '<img src="//i.imgur.com/bWVckBp.jpg">' +
                //         '</div>' +
                //         '<div class="content">' +
                //             '<a class="header center aligned">吳冠興</a>' +
                //         '<div class="meta center aligned">' +
                //             '<span class="date">1995/06/01</span>' +
                //         '</div>' +
                //         '<div class="description center aligned">' +
                //             '中原大學 資訊管理學系' +
                //         '</div>' +
                //         '</div>' +
                //         '<div class="extra content center aligned">' +
                //             '<a>' +
                //                 '<i class="lab icon"></i>' +
                //                 '分析出 6 種興趣' +
                //             '</a>' +
                //         '</div>' +
                //     '</div>' +
                //     '<div class="ui card vertical segment centered" id="me">'
                // );

                // $.getScript("assets/d3.js");

                $("#test").append(

                    '<div class="ui positive message">' +
                        '<i class="close icon"></i>' +
                        '<div class="header">你們成為朋友囉！</div>' +
                    '</div>'

                );

                setTimeout(function () {

                    window.location.href = 'chat.php';

                }, 1200);

            }

            function show() {

                $("#result").text("");

                $("#result").append(

                    '<div class="ui icon message">' +
                      '<i class="notched circle loading icon"></i>' +
                      '<div class="content">' +
                        '<div class="header">' +
                          '正在尋覓...' +
                        '</div>' +
                      '</div>' +
                    '</div>'

                );

                setTimeout(function () {

                    $("#result").text("");
                    $("#result").append(

                        '<div class="ui card centered">' +
                            '<div class="image">' +
                                '<img src="//i.imgur.com/e59AtlQ.jpg">' +
                            '</div>' +
                            '<div class="content">' +
                                '<a class="header center aligned">賈伯斯</a>' +
                            '<div class="meta center aligned">' +
                                '<span class="date">1955/02/24</span>' +
                            '</div>' +
                            '<div class="description center aligned">' +
                                '美國波特蘭里德學院' +
                            '</div>' +
                            '</div>' +
                            '<div class="extra content center aligned">' +
                                '<a class="header ui label red basic center aligned">也喜歡 Meet 覓</a>' +
                            '</div>' +
                            '<a class="ui pointing grey basic label center aligned">程式設計</a>' +
                            '<a class="ui pointing grey basic label center aligned">素描</a>' +
                            '<a class="ui pointing grey basic label center aligned">UI 設計</a><hr/>' +
                            '<div class="ui bottom attached green button" onclick="re()">' +
                                '<i class="add icon"></i>' +
                                '想認識' +
                            '</div>' +
                        '</div>'

                    );

                }, 800);
            }

        </script>
        <script src="//d3js.org/d3.v3.min.js"></script>
        <script src="assets/d3.js"></script>

    </body>
</html>
