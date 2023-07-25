<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

use App\Controllers\BaseController;
use App\Models\User as ModelsUser;

class User extends BaseController
{

    public function index($page = 'index')
    {
        $fullpage = 'Views/users/' . $page . '.php';

        if (!is_file(APPPATH . $fullpage)) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $user = new ModelsUser();
        $users = $user->select('id, name, email, phone, cep, street, neighborhood, number_house, city, state, country')->orderBy('id', 'DESC')->findAll();

        $data = [
            'users' => $users,
            'title' => ucfirst('Usuários'), // Capitalize the first letter,
        ];

        return view($fullpage, $data);
    }

    public function form()
    {
        $fullpage = 'Views/users/form.php';

        if (!is_file(APPPATH . $fullpage)) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($fullpage);
        }

        $data['title'] = ucfirst('Formulario'); // Capitalize the first letter
        return view($fullpage, $data);
    }

    public function new()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[3]',
            'phone' => 'required|max_length[11]',
            'cep' => 'required|max_length[8]',
            'street' => 'required',
            'neighborhood' => 'required',
            'number_house' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        if (!$validated) {
            return redirect()->route('users.form')->with('errors', $this->validator->getErrors());
        }

        $user = new ModelsUser();
        $inserted = $user->insert($this->request->getPost());

        if (!$inserted) {
            return redirect()->route('users.form')->with('error', 'Ocorreu um erro ao cadastrar!!');
        }
        return redirect()->route('users')->with('success', 'Cadastrado com sucesso!!');
    }

    public function edit($id = null)
    {
        $fullpage = 'Views/users/edit.php';

        if (!$id) {
            return redirect()->route('users')->with('error', 'Usuario não encontrado!!');
        }
        if ($id) {
            $user = new ModelsUser();
            $users = $user->find($id);
            $data = [
                'users' => $users,
                'title' => ucfirst('Usuários'), // Capitalize the first letter,
            ];

            return view($fullpage, $data);
        }
    }

    public function update($id = null)
    {
        if (!$id) {
            return redirect()->route('users')->with('error', 'Usuário não encontrado!!');
        }

        $data = $this->request->getPost();

        $validated = $this->validate([
            'name' => 'required',
            'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
            // 'password' => 'required|min_length[3]',
            'phone' => 'required|max_length[11]',
            'cep' => 'required|max_length[8]',
            'street' => 'required',
            'neighborhood' => 'required',
            'number_house' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        if (!$validated) {
            return redirect()->route('users.edit', $id)->with('errors', $this->validator->getErrors());
        }

        $user = new ModelsUser();
        $userExists = $user->find($id);

        if (!$userExists) {
            return redirect()->route('users')->with('error', 'Usuário não encontrado!!');
        }

        unset($data['id']);
        $updated = $user->update($id, $data);

        if (!$updated) {
            return redirect()->route('users.edit', $id)->with('error', 'Ocorreu um erro ao atualizar o usuário!!');
        }

        return redirect()->route('users')->with('success', 'Usuário atualizado com sucesso!!');
    }

    public function destroy($id = null)
    {
        if (!$id) {
            return redirect()->route('users')->with('error', 'Usuario não encontrado!!');
        }
        if ($id) {
            $user = new ModelsUser();
            $user->delete($id);

            return redirect()->route('users')->with('success', 'Usuario excluido!! id:' . $id);
        }
    }
}
