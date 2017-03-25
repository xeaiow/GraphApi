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
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="//i.imgur.com/WN0FROO.png">
    </head>
    <body>

        <?php require 'nav.php'; ?>

        <div class="ui grid">
            <div class="four wide column"></div>
            <div class="eight wide column" id="result_data">
                
            </div>
            <div class="three wide column" id="test">
                
                <div class="ui card centered">
                    <div class="image">
                        <img src="//i.imgur.com/5omjKRK.png">
                    </div>
                    <div class="content">
                        <a class="header center aligned">費歐娜</a>
                    <div class="meta center aligned">
                        <span class="date">1997/08/06</span>
                    </div>
                    <div class="description center aligned">
                        中原大學 攝影學系
                    </div>
                    </div>
                    <div class="extra content center aligned">
                        <a class="header ui label blue basic center aligned">也喜歡攝影</a> 
                    </div>
                    <div class="ui segments">
                    <div class="ui segment red inverted center aligned">
                        <h1 class="ui header" id="auto_say">墾丁玩水</h1>
                    </div>
                    <div class="ui segment center aligned">
                        <h1 class="ui header">旅行</h1>
                    </div>
                    <div class="ui segment center aligned">
                        <h1 class="ui header">圍棋</h1>
                    </div>
                </div>
                </div>

            </div>
            <div class="one wide column"></div>
        </div>

        <div class="ui grid">
            <div class="four wide column"></div>
            <div class="eight wide column">
                <div class="ui icon input fluid">
                    <input type="text" placeholder="說些什麼呢..." id="say_text" data-content="墾丁玩水、旅行、圍棋">
                    <i class="send link icon" id="send"></i>

                </div>
            </div>
            <div class="four wide column"></div>
        </div>

        <script>

            $('#say_text').popup();

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


        </script>

    </body>
</html>
