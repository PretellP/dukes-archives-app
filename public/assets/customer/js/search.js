const data = [
    { name: 'Manzana', image: 'apple.jpg', price: '$1.50' },
    { name: 'Banana', image: 'banana.jpg', price: '$0.75' },
    { name: 'Cereza', image: 'cherry.jpg', price: '$2.00' },
    // ... otros elementos
  ];

  const searchInput = document.getElementById('searchInput');
  const autocompleteContainer = document.getElementById('autocompleteContainer');

  searchInput.addEventListener('input', function() {
    const inputValue = this.value.toLowerCase();
    const matches = data.filter(item => item.name.toLowerCase().includes(inputValue)).slice(0, 10);
    displayAutocomplete(matches);
  });

  searchInput.addEventListener('focusout', function() {
    // Esperar un breve momento antes de limpiar el contenedor para dar tiempo al clic en la sugerencia
    setTimeout(() => {
      autocompleteContainer.innerHTML = '';
    }, 200);
  });

  function displayAutocomplete(matches) {
    autocompleteContainer.innerHTML = '';

    // Limpiar el contenedor si el cuadro de búsqueda está vacío
    if (searchInput.value === '') {
      return;
    }

    matches.forEach(match => {
      const suggestion = document.createElement('div');
      suggestion.classList.add('autocomplete-suggestion', 'border-bottom');
      suggestion.innerHTML = `<div>
                                  <img src="${match.image}" alt="${match.name}"/>
                                  ${match.name}
                                </div>
                                <div>${match.price}</div>`;
      suggestion.addEventListener('click', function() {
        searchInput.value = match.name;
        autocompleteContainer.innerHTML = '';
      });
      autocompleteContainer.appendChild(suggestion);
    });
  }