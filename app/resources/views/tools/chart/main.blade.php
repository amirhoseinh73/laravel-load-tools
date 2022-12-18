<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="preload" href="{{ asset( "assets/tools/$key/deploy_data/assets/fonts/switzerland_uni_arab_bold.ttf" ) }}" as="font" />
    <link rel="preload" href="{{ asset( "assets/tools/$key/deploy_data/assets/fonts/switzerland_uni_arab.ttf" ) }}" as="font" />
    <link rel="stylesheet" type="text/css" href="{{ asset( "assets/tools/global/css/alertify.rtl.min.css" ) }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset( "assets/tools/global/css/alertify.default.rtl.min.css" ) }} "/>

    <link rel="stylesheet" type="text/css" href="{{ asset( "assets/tools/$key/css/grafikon_20200908104211.css" ) }} " />

    <script type="text/javascript" src="{{ asset( "assets/tools/global/js/lib/jquery-3.2.0.min.js" ) }}"></script>
    <script type="text/javascript" src="{{ asset( "assets/tools/global/js/lib/polyfill.min.js" ) }}"></script>
    <script type="text/javascript" src="{{ asset( "assets/tools/global/js/lib/Chart.bundle.js" ) }}"></script>
    <script type="text/javascript" src="{{ asset( "assets/tools/global/js/lib/chartjs-plugin-piechart-outlabels.js" ) }}"></script>
    
    <script type="text/javascript" src="{{ asset( "assets/tools/global/js/alertify.js" ) }}"></script>

    <script type="text/javascript">
        const url = "{{ url( '/' ) }}"
        const key = "{{ $key }}"

        let update_check;
        let student = false;
    </script>

    @if ( isset( $_GET['update'] ) && ! empty( $_GET[ 'update' ] ) )
    <script>
        update_check = '<?= $_GET['update'] ?>';
        let saved_item_number = '<?= $_GET['saved_item'] ?>';
        update_check = update_check.trim();
    </script>
    @endif

    <script defer type="text/javascript" src="{{ asset( "assets/tools/$key/js/grafikon_obfusc_20200908104211.js" ) }}"></script>
    @if(isset($is_tool_api) && $is_tool_api)
        <script src="<?=base_url()?>/inc/js/ibv_vt_r_main_api.js"></script>
    @endif
</head>
<body>
    <div id="grafikon" class="mainFrame">
        <div class="fontClass" id="SwitzerlandBold" style="opacity: 0">font</div>
        <div class="fontClass" id="Switzerland" style="opacity: 0">font</div>
        <div id="PageContainer"></div>
        <div id="PanelContainer"></div>
        <div id="DialogContainer"></div>
    </div>
</body>
</html>