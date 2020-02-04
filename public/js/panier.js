var index = document.querySelector("#nb-produits").value - 1;
document.querySelector("#ajouterProduit").addEventListener('click', function (e) {
    e.preventDefault();
    ++index;
    var conteneur = document.createElement("div");
    conteneur.id = index;
    conteneur.className = "panier-conteneur";
    conteneur.innerHTML = `
        <h3>Ajouter un produit:</h3>
        <div class="lil-row lil-col between margin-tb-10">
            <input class="champ-texte lil-col 8-12" type="text" placeholder="Nom du produit" name="nom_produit_${index}">
            <input class="champ-texte lil-col 4-12" type="text" placeholder="Prix"  name="prix_produit_${index}">
        </div>
        <input class="champ-texte width-100 margin-tb-10" type="text" placeholder="Adresse du produit"  name="adresse_produit_${index}">
        <textarea class="champ-texte width-100 margin-tb-10" placeholder="Si vous avez des notes" name="notes_produit_${index}"></textarea>
    `;
    document.querySelector('#conteneur-produits').appendChild(conteneur);
    document.querySelector("#nb-produits").value = index + 1;
});