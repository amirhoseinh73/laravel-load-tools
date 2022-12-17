<!DOCTYPE html><html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">

        <link rel="stylesheet" type="text/css" href="{{ asset("assets/tools/$key/css/nasakepek.css") }}" />
        
        <script type="text/javascript">
            const key = "{{$key}}"
        </script>

        <script type="text/javascript" src="{{ asset( "assets/tools/global/js/lib/jquery-3.1.0.min.js" ) }}"></script>
        <script type="text/javascript" src="{{ asset( "assets/tools/global/js/lib/hammer.min.js" ) }}"></script>
        <script type="text/javascript" src="{{ asset( "assets/tools/$key/js/nasakepek_obfusc_20191011145003.js" ) }}"></script>
    </head>
    <body>
        <div id="nasakepek" basewidth="720" baseheight="520">
            <div id="playground">
                <div id="pageContainer"></div>
                <div id="panelContainer"></div>
            </div>
            <div id="controllPanel">
                <div class="controllPanelBtn floatLeft" id="homeBtn"></div>
                <div class="separator floatLeft">
                    <div class="separator_color1"></div>
                    <div class="separator_color2"></div>
                </div>
                <div id="mozaikIcon"></div>
                <div class="separator floatLeft">
                    <div class="separator_color1"></div>
                    <div class="separator_color2"></div>
                </div>
                <div class="controllPanelBtn floatLeft titleBtnUp" id="titleBtn"></div>
                <div class="controllPanelBtn floatLeft labelBtnUp" id="labelBtn"></div>

                <div class="controllPanelBtn floatRight" id="insertIntoMb"></div>
                <div class="separator floatRight">
                    <div class="separator_color1"></div>
                    <div class="separator_color2"></div>
                </div>
                <div class="controllPanelBtn floatRight" id="nextBtn"></div>
                <div class="controllPanelBtn floatRight" id="prevBtn"></div>
                <div class="separator floatRight">
                    <div class="separator_color1"></div>
                    <div class="separator_color2"></div>
                </div>
                <div class="controllPanelBtn floatRight thumbnailBtnUp" id="thumbnailBtn"></div>
                <div class="controllPanelBtn floatRight listBtnUp" id="listBtn"></div>

                <div id="zoomSlider">
                    <div id="zoomSliderBg"></div>
                    <div id="zoomSliderArea"></div>
                    <div id="zoomSliderBtn">
                        <div id="zoomSliderBtnView">
                            <div id="zoomSliderBtnDraw"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="infoPanel">2019.10.11. 14:50:03</div>
    </body>
</html>