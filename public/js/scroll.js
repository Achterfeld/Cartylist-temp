var endless = {
  page: 0, // "current page",
  hasMore: true, // not at the end, has more contents
  proceed: true, // load the next page?

  load: function () { 
    if (endless.proceed && endless.hasMore) {
      // Prvent user from loading too much contents suddenly
      // Block the loading until this one is done
      endless.proceed = false;

      // Load the next page
      var data = new FormData(),
          nextPg = endless.page + 1,
          loading = document.getElementById("page-loading");
      data.append('page', nextPg);

      // Show loading message or spinner
      loading.style.display = "block";

      // AJAX request
      var ajax = new XMLHttpRequest();
      ajax.open('POST', "ajax-content.php", true);
      ajax.onload = function () {
        // No more contents to load

        if (this.response == false) {
          loading.innerHTML = "Tous les paniers ont été chargés";
          loading.style.display = "block";
          endless.hasMore = false;
        }

        // Contents loaded
        else {
          // Append into container + hide loading message
          var el = document.createElement('div');
          el.innerHTML = this.response;
          document.getElementById("panier-liste").appendChild(el);
          loading.style.display = "none";
          // Set the current page, unblock loading
          endless.page = nextPg;
          endless.proceed = true;
        }
      };
      ajax.send(data);
    }
  },

  listen: function(){
    // Get the height of the entire document
    var height = document.documentElement.offsetHeight,
    // Get the current offset - how far "scrolled down"
    offset = Math.round(document.documentElement.scrollTop + window.innerHeight);

    // Check if user has hit the end of page
    console.log('Height: ' + height);
    console.log('Offset: ' + offset);
    if (offset === height) { 
      endless.load();
    }
  }
};

window.onload = function () {
  // Attach scroll listener
  window.addEventListener("scroll", endless.listen);

  // Initial load contents
  endless.load();
};