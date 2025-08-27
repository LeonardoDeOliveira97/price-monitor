<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Nova Integração</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Nesta tela você pode cadastrar uma nova integração</li>
            </ol>

            <div class="row">
                <div class="col-md-6 row mb-4">
                    <div class="col-md-6 mt-0 pt-0">
                        <img
                            src="<?= base_url('assets/img/logotipo_mercado_livre.png') ?>"
                            alt="Mercado Livre"
                            class="integration-item"
                            onclick="redirectToNewIntegration('mercado_livre')">
                    </div>
                </div>
                <form action="<?= base_url('integracoes/nova') ?>" method="post" class="col-md-6">
                    <div id="callbackStoreIntegration"></div>

                    <div class="mb-3">
                        <label for="platform" class="form-label">Tipo de Integração</label>
                        <select class="form-select form-select-sm" id="platform" name="platform">
                            <option value="">Selecione uma integração</option>
                            <option value="Mercado Livre">Mercado Livre</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="token" class="form-label">Token Gerado</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="token" name="token">
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="pasteToken()">Colar</button>
                        </div>
                    </div>
                    <script>
                        function pasteToken() {
                            navigator.clipboard.readText().then(function(text) {
                                document.getElementById('token').value = text;
                            });
                        }
                    </script>

                    <div class="mb-3">
                        <button type="submit" id="btnSubmit" class="btn btn-sm btn-dark"><i class="fas fa-plus"></i> Adicionar</button>
                    </div>
                </form>

            </div>
        </div>
    </main>
</div>

<script>
    function redirectToNewIntegration(integration) {
        window.open('<?= base_url('integracoes/nova/') ?>' + integration, '_blank');
    }

    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();

        const btnSubmit = document.querySelector('button[type="submit"]');
        btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adicionando...';
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
                    showAlertMessage('callbackStoreIntegration', 'success', data.message);
                } else {
                    showAlertMessage('callbackStoreIntegration', 'danger', data.message);
                }
                btnSubmit.innerHTML = '<i class="fas fa-plus"></i> Adicionar';
                btnSubmit.disabled = false;
            })
            .catch(error => {
                console.error('Error:', error);
                showAlertMessage('callbackStoreIntegration', 'danger', error.message);
                btnSubmit.innerHTML = '<i class="fas fa-plus"></i> Adicionar';
                btnSubmit.disabled = false;
            });
    });
</script>