<?php

namespace App\Traits;

use Carbon\Carbon;

trait FormatDatetime {
    public function getCreatedAtAttribute( $value ) {
        $date = new Carbon( $value );
        return $date->format( "Y-m-d H:i:s" );
    }

    public function getUpdatedAtAttribute( $value ) {
        $date = new Carbon( $value );
        return $date->format( "Y-m-d H:i:s" );
    }

    public function getDeletedAtAttribute( $value ) {
        if ( $value === null ) return $value;
        $date = new Carbon( $value );
        return $date->format( "Y-m-d H:i:s" );
    }
}