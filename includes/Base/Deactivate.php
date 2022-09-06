<?php

/**
 * @package currency conversion
 */

namespace Includes\Base;

class Deactivate
{
    public static function deactivate()
    {
        //rewrite or refresh the db so wordpress knows somethings has changed.
        flush_rewrite_rules();
    }
}
