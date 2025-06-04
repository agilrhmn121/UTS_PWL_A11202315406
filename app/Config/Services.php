<?php
namespace Config;

use CodeIgniter\Config\BaseService;
use CodeIgniterCart\Cart;

class Services extends BaseService
{
    /**
     * Provides a shared instance of the Cart class.
     *
     * @param bool $getShared
     * @return Cart
     */
    public static function cart(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('cart');
        }

        return new Cart();
    }
}
