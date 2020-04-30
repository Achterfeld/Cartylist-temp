<?php const _VUES = "./"; ?>
<?php require_once './../../config.php' ?>

<?php 
	Utilitaires\Page::titre("accueil"); 
?>

<?php include "./includes/header.php" ?>
	<header class="page-header">
		<div class="lil-row between middle">
			<div class="lil-col sm-12-12 md-6-12">
				<h1>Lorem ipsum dolor</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur tempora, corporis possimus
					aliquid illo officia illum provident fugit voluptates.</p>
				<div id="boutons-entete">
					<a class="bouton-secondaire" href="#">Connexion</a>
					<a class="bouton" href="#">Inscription</a>
				</div>
			</div>
			<div class="lil-col sm-12-12 md-6-12">
				<img id="image-entete" src="<?= _PUBLIC ?>/images/undraw_empty_cart_co35.svg" alt="">
			</div>
		</div>
	</header>
	<main>
		<div class="conteneur-pleine-page">
			<div class="conteneur-centre-page">
				<ul class="fonction-liste">
					<li class="fonction-conteneur">
						<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32"
							viewBox="0 0 172 172" style=" fill:#000000;">
							<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
								stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
								font-family="none" font-weight="none" font-size="none" text-anchor="none"
								style="mix-blend-mode: normal">
								<path d="M0,172v-172h172v172z" fill="none"></path>
								<g fill="#1e2a78">
									<path
										d="M16.125,32.25v107.5h51.52442l18.35058,18.35059l18.35059,-18.35059h51.52441v-107.5zM26.875,43h118.25v86h-45.22558l-13.89942,13.89942l-13.89941,-13.89942h-45.22559zM48.375,59.125v10.75h75.25v-10.75zM48.375,80.625v10.75h75.25v-10.75zM48.375,102.125v10.75h53.75v-10.75z">
									</path>
								</g>
							</g>
						</svg>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias quae nobis deleniti
							perferendis pariatur, omnis, laborum voluptatem quisquam neque nulla modi.</p>
					</li>
					<li class="fonction-conteneur">
						<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32"
							viewBox="0 0 172 172" style=" fill:#000000;">
							<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
								stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
								font-family="none" font-weight="none" font-size="none" text-anchor="none"
								style="mix-blend-mode: normal">
								<path d="M0,172v-172h172v172z" fill="none"></path>
								<g fill="#1e2a78">
									<path
										d="M26.875,37.625c-2.967,0 -5.375,2.408 -5.375,5.375c0,2.967 2.408,5.375 5.375,5.375h11.92578l4.03125,16.125h92.31982l-10.25659,37.625h-55.02026v10.75h48.375h6.63477c4.84825,0 9.09282,-3.24977 10.37207,-7.92602l13.9729,-51.19898h-98.00977l-1.99463,-7.97852c-1.19325,-4.78375 -5.49031,-8.14648 -10.42456,-8.14648zM118.25,112.875c-8.84171,0 -16.125,7.28329 -16.125,16.125c0,8.84171 7.28329,16.125 16.125,16.125c8.84171,0 16.125,-7.28329 16.125,-16.125c0,-8.84171 -7.28329,-16.125 -16.125,-16.125zM69.875,112.875c-8.84171,0 -16.125,7.28329 -16.125,16.125c0,8.84171 7.28329,16.125 16.125,16.125c8.84171,0 16.125,-7.28329 16.125,-16.125c0,-8.84171 -7.28329,-16.125 -16.125,-16.125zM32.25,75.25v10.75h43v-10.75zM32.25,96.75v10.75h26.875v-10.75zM69.875,123.625c3.03704,0 5.375,2.33796 5.375,5.375c0,3.03704 -2.33796,5.375 -5.375,5.375c-3.03704,0 -5.375,-2.33796 -5.375,-5.375c0,-3.03704 2.33796,-5.375 5.375,-5.375zM118.25,123.625c3.03704,0 5.375,2.33796 5.375,5.375c0,3.03704 -2.33796,5.375 -5.375,5.375c-3.03704,0 -5.375,-2.33796 -5.375,-5.375c0,-3.03704 2.33796,-5.375 5.375,-5.375z">
									</path>
								</g>
							</g>
						</svg>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias quae nobis deleniti
							perferendis pariatur, omnis.</p>
					</li>
					<li class="fonction-conteneur">
						<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32"
							viewBox="0 0 172 172" style=" fill:#000000;">
							<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
								stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
								font-family="none" font-weight="none" font-size="none" text-anchor="none"
								style="mix-blend-mode: normal">
								<path d="M0,172v-172h172v172z" fill="none"></path>
								<g fill="#1e2a78">
									<path
										d="M86,21.5c-35.56738,0 -64.5,28.93262 -64.5,64.5c0,35.56739 28.93262,64.5 64.5,64.5c35.56739,0 64.5,-28.93261 64.5,-64.5c0,-35.56738 -28.93261,-64.5 -64.5,-64.5zM86,32.25c19.96729,0 37.24707,10.77099 46.52734,26.875h-93.05469c9.28028,-16.10401 26.56006,-26.875 46.52734,-26.875zM34.60156,69.875h8.39844v5.375c0,5.9209 4.8291,10.75 10.75,10.75h16.125c5.9209,0 10.75,-4.8291 10.75,-10.75v-5.375h10.75v5.375c0,5.9209 4.8291,10.75 10.75,10.75h16.125c5.9209,0 10.75,-4.8291 10.75,-10.75v-5.375h8.39844c1.5957,5.10205 2.35156,10.49805 2.35156,16.125c0,29.75146 -23.99854,53.75 -53.75,53.75c-29.75146,0 -53.75,-23.99854 -53.75,-53.75c0,-5.62695 0.75586,-11.02295 2.35156,-16.125zM112.875,91.375c0,2.93945 -1.72168,5.18604 -6.38281,7.72656c-4.66113,2.54053 -11.73682,4.59815 -18.8125,5.87891c-14.15136,2.56153 -28.55469,2.51953 -28.55469,2.51953v10.75c0,0 15.15918,0.10498 30.57031,-2.6875c7.70557,-1.38574 15.41114,-3.54834 21.83594,-7.05469c6.42481,-3.50635 12.09375,-9.28027 12.09375,-17.13281z">
									</path>
								</g>
							</g>
						</svg>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias quae nobis deleniti
							perferendis pariatur, omnis, laborum voluptatem.</p>
					</li>
				</ul>
			</div>
		</div>
		<div class="conteneur-centre-page">
			<div id="faq-conteneur">
				<h2 class="titre-section">Foire aux questions:</h2>
				<div class="conteneur">
					<div class="faq-question">
						<h3>Test</h3>
						<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil possimus, enim adipisci
							architecto in
							sunt pariatur! Quos, tempora cumque! Vero porro delectus voluptas quaerat magni quis odit iste
							quia
							illo!</p>
					</div>
					<div class="faq-question">
						<h3>Test</h3>
						<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil possimus, enim adipisci
							architecto in
							sunt pariatur! Quos, tempora cumque! Vero porro delectus voluptas quaerat magni quis odit iste
							quia
							illo!</p>
					</div>
					<div class="faq-question">
						<h3>Test</h3>
						<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil possimus, enim adipisci
							architecto in
							sunt pariatur! Quos, tempora cumque! Vero porro delectus voluptas quaerat magni quis odit iste
							quia
							illo!</p>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php include "./includes/footer.php" ?>