var index = 0;
document.querySelector("#ajouterProduit").addEventListener('click', function (e) {
    e.preventDefault();
    ++index;
    var elem = document.getElementById('conteneur-produits');
    elem.innerHTML += '<div id="'+index+'" class="panier-conteneur"><h3>Ajouter un produit:</h3><div class="lil-row lil-col between margin-tb-10"><input class="champ-texte lil-col 8-12" type="text" placeholder="Nom du produit" value=""><input class="champ-texte lil-col 4-12" type="text" placeholder="Prix" value=""></div><input class="champ-texte width-100 margin-tb-10" type="text" placeholder="addresse du produit" value=""><textarea class="champ-texte width-100 margin-tb-10" placeholder="Si vous avez des notes"></textarea></div>';
});