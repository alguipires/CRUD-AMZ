<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

use App\Controllers\BaseController;
use App\Models\User;
use PHPUnit\Util\Xml\Validator;

class Login extends BaseController
{

    public function index($page = 'login')
    {
        if (!is_file(APPPATH . 'Views/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view($page, $data);
    }

    public function store()
    {
        $validated = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);

        if(!$validated) {
            return redirect()->route('login')->with('errors', $this->validator->getErrors());
        }

        $user = new User();
        $userFound = $user->select('id, name, email, password')->where('email', $this->request->getPost('email'))->first();

        if(!$userFound) {
            return redirect()->route('login')->with('error', 'Email ou senha incorretos');
        }
        if(!password_verify($this->request->getPost('password'), $userFound->password)){
            return redirect()->route('login')->with('error', 'Email ou senha incorretos');
        }

        unset($userFound->password);
        session()->set('user', $userFound);
        return redirect()->route('users');
    }

    public function destroy(){
        session()->destroy();
        return redirect()->route('home');
    }
}
