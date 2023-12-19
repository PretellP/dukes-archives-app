$(function () {

    var $grid = $('.products_container').isotope({
        itemSelector: '.product-item',
        percentPosition: false,
        masonry: {
            columnWidth: '.product-item'
        }
    });

    // Manejar el cambio en los checkboxes
    $('input[type="checkbox"]').change(function () {

        var selectedCategories = $('input[type="checkbox"]:checked').map(function () {
            return $(this).data('filter');
        }).get();

        var filterValue = selectedCategories.length > 0 ? selectedCategories.join(', ') : '*';

        $grid.isotope({ filter: filterValue});

        console.log('Elementos filtrados:', $grid.data('isotope').filteredItems.length);
    });
});
