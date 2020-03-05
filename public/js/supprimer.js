function supprimer(id) {

    let conteneurPanier = document.getElementById(id);
    let requete = new XMLHttpRequest();
    requete.open('GET', 'supprimer_panier.php?id=' + id);

    requete.onload = () => {

        if(requete.status >= 200 && requete.status < 400) {
            conteneurPanier.parentNode.removeChild(conteneurPanier);
            console.log(requete.response);
            console.log('pas error');
            } else {
            console.log('error');
            }
        }

    requete.send();
}