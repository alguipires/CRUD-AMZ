<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div>
    <div>    
        <h3 class="text-center"><?php echo isset($users->id) ? 'Editando Usuario' : 'Novo Usuario' ?></h3>
        <form action="<?php echo url_to('users.new') ?>" method="post">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($users->name) ? $users->name : '' ?>" />
                        <label class="form-label" for="name">Nome</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['name'] ?? ''; ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="phone" name="phone" maxlength="11" class="form-control" value="<?php echo isset($users->phone) ? $users->phone : '' ?>" />
                        <label class="form-label" for="phone">telefone</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['phone'] ?? ''; ?></span>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="email" name="email" class="form-control" value="<?php echo isset($users->email) ? $users->email : '' ?>"/>
                        <label class="form-label" for="email">E-mail</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['email'] ?? ''; ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="password" name="password" class="form-control" value="<?php echo isset($users->password) ? $users->password : '' ?>" />
                        <label class="form-label" for="password">Senha</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['password'] ?? ''; ?></span>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-4 container">
                    <div class="form-outline">
                        <input type="text" id="cep" name="cep" class="form-control" value="<?php echo isset($users->cep) ? $users->cep : '' ?>" />
                        <label class="form-label" for="cep">CEP - busca automatica</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['cep'] ?? ''; ?></span>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="street" name="street" class="form-control" value="<?php echo isset($users->street) ? $users->street : '' ?>"/>
                        <label class="form-label" for="street">Rua</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['street'] ?? ''; ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="neighborhood" name="neighborhood" class="form-control" value="<?php echo isset($users->neighborhood) ? $users->neighborhood : '' ?>"/>
                        <label class="form-label" for="neighborhood">Bairro</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['neighborhood'] ?? ''; ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="number_house" name="number_house" class="form-control" value="<?php echo isset($users->number_house) ? $users->number_house : '' ?>"/>
                        <label class="form-label" for="number_house">Numero Casa</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['number_house'] ?? ''; ?></span>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="city" name="city" class="form-control" value="<?php echo isset($users->city) ? $users->city : '' ?>" />
                        <label class="form-label" for="city">Cidade</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['city'] ?? ''; ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="state" name="state" class="form-control" value="<?php echo isset($users->state) ? $users->state : '' ?>"/>
                        <label class="form-label" for="state">Estado</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['state'] ?? ''; ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="country" name="country" class="form-control" value="<?php echo isset($users->country) ? $users->country : '' ?>" />
                        <label class="form-label" for="country">Pais</label>
                        <span class="text text-danger"><?php echo session()->getFlashdata('errors')['country'] ?? ''; ?></span>
                    </div>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-success btn-block mb-4">Cadastrar</button>
        </form>
    </div>
</div>

<script>
        const cepInput = document.getElementById('cep');
        const streetInput = document.getElementById('street');
        const neighborhoodInput = document.getElementById('neighborhood');
        const cityInput = document.getElementById('city');
        const stateInput = document.getElementById('state');
        const countryInput = document.getElementById('country');
        const numberHouseInput = document.getElementById('number_house');

        cepInput.addEventListener('blur', () => {
            console.log("entrou no blur");
            const cepValue = cepInput.value.replace(/\D/g, '');
            console.log("cep value:  " + cepValue);

            if (cepValue.length !== 8) {
                return;
            }

            fetch(`https://viacep.com.br/ws/${cepValue}/json/`)
                .then(response => response.json())
                .then(data => {
                    console.log("data....: " + data);

                    if (data.erro) {
                        alert('CEP não encontrado. Verifique se o CEP está correto.');
                    } else {
                        streetInput.value = data.logradouro || '';
                        neighborhoodInput.value = data.bairro || '';
                        cityInput.value = data.localidade || '';
                        stateInput.value = data.uf || '';
                        countryInput.value = "Brasil" || '';
                        numberHouseInput.focus();
                    }
                })
                .catch(error => {
                    alert('Ocorreu um erro ao consultar o CEP. Por favor, tente novamente mais tarde.');
                    console.error(error);
                });
        });
    </script>
<?= $this->endSection() ?>