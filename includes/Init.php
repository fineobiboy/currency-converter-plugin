<?php

namespace Includes;

/**
 * @package Currency Conversion
 */

final class Init
{
    /**
     * Store all the classes in an array
     *
     * @return array list of classes
     */
    public static function get_classes()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\Settings_Link::class
        ];
    }

    /**
     * Loop through the array of classes, initialize them, and call the register() method if it exists.
     *
     * @return void
     */
    public static function register_classes()
    {
        foreach (self::get_classes() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     *
     * @param class $class       class from the classes array
     * @return class instance    new instance of the class
     */
    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}

