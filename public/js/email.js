function verifEmail(id) {

    let mail = document.getElementById(id);
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.open('GET', 'verif_email.php?mailtest=' + mail.value);

    xmlhttp.onload = function() {
        var msg = document.getElementById("email-valide");
        var page_suivante_btn = document.getElementById("page-suivante");
        if (this.response) {
            msg.innerHTML = "Cette adresse mail est déjà utilisée. Veuillez en choisir une autre ou vous connecter avec celle-ci.";
            page_suivante_btn.style.display = "none";
        } else {
            msg.innerHTML ="";
            page_suivante_btn.style.display = "block";
        }
    };

    xmlhttp.send();
}