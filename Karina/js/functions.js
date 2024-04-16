  // search sans cliquer sur le produit a chercher

function search() {
    var input = document.getElementById("search-input");
    var filter = input.value.toUpperCase();
    var $grid = $('.isotope-grid').isotope();
    $grid.isotope({filter: function() {
      var title = $(this).find('.stext-104.cl4.hov-cl1.trans-04.js-name-b2.p-b-6').text().toUpperCase();
      return title.indexOf(filter) > -1;
    }});
  }
  //quant je clique sur un link il devient active

const filterLinks = document.querySelectorAll('.filter-link');
filterLinks.forEach(link => {
    link.addEventListener('click', function() {
        filterLinks.forEach(link => {
            link.classList.remove('filter-link-active');
        });
        this.classList.add('filter-link-active');
    });
});

  // fonction de tri (les 2)
  $(document).ready(function() {
    function sortProducts(order, key) {
      const grid = $('.isotope-grid');
      const iso = new Isotope(grid[0], {
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows',
        getSortData: {
          price: function(itemElem) {
            const priceText = $(itemElem).find('.stext-105').text();
            return parseFloat(priceText.replace(/[^\d.-]/g, ''));
          },
          date: '.date parseInt'
        },
        sortBy: key,
        sortAscending: (order === 'asc')
      });
    
      // Ajouter une fonction de filtre pour filtrer les produits selon le prix
      iso.filters.price = function(itemElem) {
        const price = parseFloat($(itemElem).find('.stext-105').text().replace(/[^\d.-]/g, ''));
        return (price >= 0 && price <= 5000);
      };
    
      iso.arrange();
    }
    
    const lowToHighLink = $('#low-to-high-link');
    const highToLowLink = $('#high-to-low-link');
    const newnessLink = $('#newness-link');
    const priceFilterLink = $('#price-filter-link');
    
    lowToHighLink.on('click', function(e) {
      e.preventDefault();
      sortProducts('asc', 'price');
    });
    
    highToLowLink.on('click', function(e) {
      e.preventDefault();
      sortProducts('desc', 'price');
    });
    
    newnessLink.on('click', function(e) {
      e.preventDefault();
      sortProducts('desc', 'date');
    });
    
    priceFilterLink.on('click', function(e) {
      e.preventDefault();
      const grid = $('.isotope-grid');
      const iso = new Isotope(grid[0]);
      iso.arrange({ filter: '.price' });
    });
  });

  
//fonction pour recuperer l'id de produit cliquer




function getIdProduit(idProduit, event) {
  event.preventDefault(); // Empêche le rechargement de la page
  

  id_p = idProduit;
  document.getElementById('id_p_value').innerHTML = id_p;
  
}





  
  


