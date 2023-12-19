$(document).ready(function() {
  const searchInput = $('#searchInput');
  const autocompleteContainer = $('#autocompleteContainer');

  

  searchInput.on('input', function() {
    const query = $(this).val();
    $.ajax({
      url: '/inicio/productos/search',
      method: 'GET',
      data: { query: query },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(products) {
        displayAutocomplete(products);
      },
      error: function(error) {
        console.error(error);
      }
    });
  });

  function displayAutocomplete(products) {
    autocompleteContainer.empty();

    if (searchInput.val() === '') {
      return;
    }

    products.forEach(product => {
      const suggestion = $('<div></div>')
        .addClass('autocomplete-suggestion border-bottom')
        .html(`<div>
                 
                 ${product.name}
               </div>
               <div>${product.sale_price}</div>`)
        .on('click', function() {
          searchInput.val(product.name);
          autocompleteContainer.empty();
        });

      autocompleteContainer.append(suggestion);
    });
  }
});