<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

use App\Controllers\BaseController;

class Login extends BaseController
{

    public function index($page = 'login')
    {
        if (! is_file(APPPATH . 'Views/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view($page, $data);

    }

    public function store(){
        var_dump('login');
    }
}
