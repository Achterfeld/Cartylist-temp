var chargementDynamique = {
    page: 0, // "page actuelle",
    hasMore: true, // Afin de savoir si des panniers reste a charger
    charge: true, // Afin de sacoir si le chargement de nouveau pannier est possible

    AjouterPannier: function() {
        if (chargementDynamique.charge && chargementDynamique.hasMore) {
            // Évite de lancer plusieurs requêtes en même temps
            chargementDynamique.charge = false;

            // Charge les panniers suivant
            var data = new FormData(),
                pgSuiv = chargementDynamique.page + 1,
                chargement = document.getElementById("page-loading");
            data.append('page', pgSuiv);

            // Afficher le message de chargement
            chargement.style.display = "block";

            // Requete AJAX 
            var ajax = new XMLHttpRequest();
            ajax.open('POST', "ajax-contenu.php", true);
            ajax.onload = function() {

                // Si Aucun panniers sont a charger
                if (this.response == false) {
                    chargement.innerHTML = "Tous les paniers ont été chargés";
                    chargement.style.display = "block";
                    chargementDynamique.hasMore = false;
                }

                // Si du contenu est a charger
                else {
                    // Ajout dans le conteneur + cache le message de chargement
                    // var el = document.createElement('div');
                    // el.innerHTML =;
                    console.log(this.response);
                    document.getElementById("panier-conteneur").innerHTML += (this.response);
                    chargement.style.display = "none";
                    // Definie la page en cours, débloquer le chargement pour un prochain ajout
                    chargementDynamique.page = pgSuiv;
                    chargementDynamique.charge = true;
                }
            };
            ajax.send(data);
        }
    },

    detection: function() {
        // Récupère la longueur de la page
        var hauteur = document.documentElement.offsetHeight,
            // Récupère la position de l'utilisateur 
            position = Math.round(document.documentElement.scrollTop + window.innerHeight);

        // Vérifie si l'utilisateur est arrivé en bas de la page
        if (position === hauteur) {
            console.log(chargementDynamique.page)
            chargementDynamique.AjouterPannier();
        }
    }
};

window.onload = function() {
    // Ajout du scroll listener
    window.addEventListener("scroll", chargementDynamique.detection);

    // Charge quelques produits au lancement
    chargementDynamique.AjouterPannier();
};