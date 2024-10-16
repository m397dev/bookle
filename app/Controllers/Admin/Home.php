<?php
/**
 * @project     bookle
 * @email       m397.dev@gmail.com
 * @date        10/16/2024
 * @time        1:53 AM
 */

namespace App\Controllers\Admin;

use App\Controllers\Admin;

/**
 * Class Home.
 *
 * This is the default controller of the ADMIN module.
 */
class Home extends Admin
{
    /**
     * Default action.
     */
    public function index(): string
    {
        $data = ['message' => 'Welcome to Admin dashboard'];

        return $this->render('admin/home', $data);
    }
}
