
let champAvatar = document.getElementById("avatar-input");
let champAvatarDernier = document.getElementById("avatar-dernier");
let imageAvatar = document.getElementById("image-profil-inscription");

function checkImage(image, succes) {
	let http = new XMLHttpRequest();
	http.open('GET', image);
	http.send();
	http.onreadystatechange = rep =>{
		if (rep.target.status === 200) {
			let img = new Image();
			img.onload = succes;
			img.onerror = () =>{
				champAvatar.classList.add("erreur");
			};
			img.src = image;
		}
		else {
			champAvatar.classList.add("erreur");
		}
	};
}

champAvatar.addEventListener('input', () => {
	checkImage(champAvatar.value, () => {
		imageAvatar.src = champAvatar.value;
		champAvatarDernier.value = champAvatar.value;
		champAvatar.classList.remove("erreur");
	});
});