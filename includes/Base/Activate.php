<?php

/**
 * @package currency conversion
 */

namespace Includes\Base;

class Activate
{
    public static function activate()
    {
        //rewrite or refresh the db so wordpress knows somethings has changed.
        flush_rewrite_rules();
    }
}
