<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cadastrar Usuário</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Nesta tela você pode cadastrar um novo usuário</li>
            </ol>

            <div class="row">
                <form action="<?= base_url('usuarios/novo') ?>" class="col-md-6">
                    <div id="callbackStoreUser"></div>
                    <div class="mb-2">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                    </div>
                    <button type="submit" id="btnSubmit" class="btn btn-dark"><i class="fas fa-user-plus"></i> Cadastrar</button>
                </form>
            </div>
        </div>
    </main>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();

        const btnSubmit = document.getElementById('btnSubmit');
        btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Cadastrando...';
        btnSubmit.disabled = true;

        const form = event.target;
        const formData = new FormData(form);



        fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlertMessage('callbackStoreUser', 'success', data.message);
                } else {
                    showAlertMessage('callbackStoreUser', 'danger', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlertMessage('callbackStoreUser', 'danger', error.message);
            })
            .finally(() => {
                btnSubmit.innerHTML = '<i class="fas fa-user-plus"></i> Cadastrar';
                btnSubmit.disabled = false;
            });
    });
</script>