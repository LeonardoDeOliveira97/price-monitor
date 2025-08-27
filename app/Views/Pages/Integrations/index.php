<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Integrações</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Aqui você pode gerenciar as integrações cadastradas no sistema</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plug me-1"></i>
                    Integrações Cadastradas
                </div>
                <div class="card-body">
                    <div id="callbackListIntegrations"></div>
                    <table id="dataTable">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Criado em</th>
                                <th>Editado em</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Criado em</th>
                                <th>Editado em</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <!-- Data will be populated via AJAX -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    // Fetch all users via AJAX
    document.addEventListener('DOMContentLoaded', function() {
        fetch('<?= base_url('usuarios/listar') ?>')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const tbody = document.querySelector('#dataTable tbody');

                    if (!tbody) {
                        throw new Error('Tabela não encontrada');
                    }

                    tbody.innerHTML = '';

                    data.data.forEach(user => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td>${new Date(user.created_at).toLocaleDateString('pt-BR')}</td>
                            <td>${new Date(user.updated_at).toLocaleDateString('pt-BR')}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary edit-user" data-id="${user.id}"><i class="fas fa-edit"></i> Editar</a>
                                <a href="#" class="btn btn-sm btn-danger delete-user" data-id="${user.id}"><i class="fas fa-trash-alt"></i> Excluir</a>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });
                } else {
                    showAlertMessage('callbackListUsers', 'danger', data.message);
                    console.error('Failed to fetch users:', data.message);
                }
            })
            .catch(error => {
                showAlertMessage('callbackListUsers', 'danger', error.message);
                console.error('Error fetching users:', error);
            });
    });
    // Delete User with SweetAlert
    document.querySelector('#dataTable tbody').addEventListener('click', function(event) {
        if (event.target.closest('.delete-user')) {
            event.preventDefault();
            const userId = event.target.closest('.delete-user').getAttribute('data-id');

            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você realmente deseja excluir este usuário?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`<?= base_url('usuarios/excluir') ?>/${userId}`, {
                            method: 'DELETE'
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Excluído!', data.message, 'success');
                                event.target.closest('tr').remove();
                            } else {
                                Swal.fire('Erro!', data.message, 'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Erro!', error.message, 'error');
                            console.error('Error deleting user:', error);
                        });
                }
            });
        }
    });
</script>