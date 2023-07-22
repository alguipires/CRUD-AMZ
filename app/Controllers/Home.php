<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
   /*  public function index()
    {
        return view('welcome_message');
    } */

    public function index($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        } 

        $data['title'] = ucfirst('Home CRUD-AMZ'); // Capitalize the first letter

        return view($page, $data);

    }

    // public function index($page = 'home')
    // {
    //     if (! is_file(APPPATH . 'Views/' . $page . '.php')) {
    //         // Whoops, we don't have a page for that!
    //         throw new PageNotFoundException($page);
    //     } 

    //     $data['title'] = ucfirst($page); // Capitalize the first letter

    //     // return view($page, ['title' => 'Home']);
    //     return view($page, $data);

    //     //retornando varias views
    //     // return view('templates/header', $data)
    //     //     . view($page)
    //     //     . view('templates/footer');
    // }
}
