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
  
    // Verifica si products es un array antes de intentar iterar sobre él
    if (Array.isArray(products)) {
      products.forEach(product => {
        const suggestion = $('<div></div>')
          .addClass('autocomplete-suggestion border-bottom')
          .html(`<div>${product.name}</div><div>${product.sale_price}</div>`)
          .on('click', function() {
            searchInput.val(product.name);
            autocompleteContainer.empty();
          });
  
        autocompleteContainer.append(suggestion);
      });
    } else if (products.message) {
      console.log(products.message);
    } else {
      console.error('error:', products);
    }
  }

});