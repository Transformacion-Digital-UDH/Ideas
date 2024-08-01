
<div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function () {
    // Maneja el evento de entrada en el campo de búsqueda
    $('.light-table-filter').on('input', function () {
        // Obtiene el valor del campo de búsqueda y lo convierte a minúsculas
        var value = $(this).val().toLowerCase();
        
        // Filtra las tarjetas basadas en el texto
        $('.card-item').filter(function () {
            // Muestra u oculta la tarjeta basándose en si el texto contiene el valor de búsqueda
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
    </script>
    
</div>