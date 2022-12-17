<?php

/**
 * @param array|object|string|int $data
 * @return boolean
 */
function exist( $data ) {
    if( is_object( $data ) ) $data = (array)$data;

    return ( isset( $data ) && ! empty( $data ) );
}

