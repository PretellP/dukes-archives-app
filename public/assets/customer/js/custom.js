$(document).ready(function () {
    var $grid = $('.grid').isotope({
        itemSelector: '.all',
/*         percentPosition: false,
        masonry: {
            columnWidth: '.all'
        } */
    });

    // Manejar el cambio en los checkboxes
    $('input[type="checkbox"]').change(function () {
        // Obtener todas las categorías seleccionadas
        var selectedCategories = $('input[type="checkbox"]:checked').map(function () {
            return $(this).data('filter');
        }).get();
       
        // Crear el filtro para Isotope
        var filterValue = selectedCategories.length > 0 ? selectedCategories.join(' ') : '*';
        console.log(filterValue)
        // Aplicar el filtro en Isotope y animar los cambios
        $grid.isotope({ filter: ".romance" });
        console.log('Elementos filtrados:', $grid.data('isotope').filteredItems.length);
    });
});