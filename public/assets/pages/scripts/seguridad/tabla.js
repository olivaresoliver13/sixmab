$(document).ready(function() {
  $('#pricing-table').DataTable({
    language: {
      processing:     "Tratamiento en curso...",
      search:         "Buscar&nbsp;:",
      lengthMenu:     "Mostrar&nbsp; _MENU_ &nbsp;Elementos",
      info:           "Visualización del elemento _START_ a _END_ en _TOTAL_ elementos",
      infoEmpty:      "Visualización del elemento 0 en 0 elementos",
      infoFiltered:   "(Filtro total de elementos _MAX_)",
      infoPostFix:    "",
      loadingRecords: "Cargando...",
      zeroRecords:    "Ningún elemento a exhibir",
      emptyTable:     "No hay datos disponibles en la tabla.",
      paginate: {
        first:        "Primero",
        previous:     "<<",
        next:         ">>",
        last:         "Pasado"
      },
      aria: {
        sortAscending:  ": active para ordenar la columna en orden ascendente",
        sortDescending: ": active para ordenar la columna en orden descendente"
      }
    }
  });
});  