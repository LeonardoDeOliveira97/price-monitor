window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });

    // Initialize DataTable
    const dataTable = document.body.querySelector("#dataTable");

    if (dataTable) {
      new simpleDatatables.DataTable(dataTable, {
        perPage: 5,
        perPageSelect: [5, 10, 25, 50, 100],
        labels: {
          placeholder: "Buscar...",
          perPage: "resultados por página",
          noRows: "Nenhum registro encontrado",
          info: "Mostrando {start} a {end} de {rows} registros",
        },
        fixedColumns: false,
        layout: {
          autoWidth: true,
        },
      });
    }
  }
});

function showAlertMessage(target, type, message) {
  const wrapper = document.getElementById(target);
  wrapper.innerHTML =
    `<div class="alert alert-${type} alert-dismissible" role="alert">` +
    `   <div>${message}</div>` +
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
    "</div>";
}
