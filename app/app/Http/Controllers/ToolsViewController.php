<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use Illuminate\Http\Request;

class ToolsViewController extends Controller
{
    public function index(){
        return "API Runnig Normally.";
    }

    public function load($locale, $id) {
        $tool = Tools::find( $id );

        if ( ! exist( $tool ) ) return abort( 404 );

        //switch tools by type
        switch( $tool->type ) {
            case 1: // creator
                return abort( 403 );
            case 2: // viewer
                return $this->_loadViewerTool( $tool );
            case 3: // game
                return abort( 403 );
        }
    }

    private function _loadViewerTool( $tool ) {
        return view( "tools.$tool->key.main", $tool );
    }
}
