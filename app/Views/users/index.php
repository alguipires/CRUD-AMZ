<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div id="content-users">
    <div class="users-table">
        <a class="btn btn-success" href="<?php echo url_to('users.form') ?>" role="button">Cadastrar novo Usuário</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th><?php echo $user->name; ?></th>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->phone; ?></td>
                        <td>
                            <?php echo 'Rua ' . $user->street . ', Nº ' . $user->number_house . ', Bairro ' . $user->neighborhood . ', Cidade: '. $user->city . ','. '<br>'. 'Estado: ' . $user->state . ', Pais: ' . $user->country . ', Cep: ' . $user->cep; ?>
                        </td>
                        <td><a class="btn btn-success" href="<?php echo route_to('users.edit', $user->id); ?>" role="button">Editar</a>&nbsp;<a class="btn btn-danger" href="<?php echo route_to('users.destroy', $user->id); ?>" role="button" onclick="confirma()">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirma(){
        if(!confirm("Excluir Usuário?")){
            return false;
        }
        return true;
    }
</script>
<?= $this->endSection() ?>