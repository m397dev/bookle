<?php
/**
 * @project     bookle
 * @email       m397.dev@gmail.com
 * @date        10/16/2024
 * @time        1:53 AM
 */

namespace App\Controllers\Shop;

use App\Controllers\Shop;

/**
 * Class Home.
 *
 * This is the default controller of the SHOP module.
 */
class Home extends Shop
{
    /**
     * Default action.
     */
    public function index(): string
    {
        return view('shop/home');
    }
}
