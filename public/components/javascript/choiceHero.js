function selectHero(heroName, heroId) {
    const allowedHeroes = ['1', '2']; // Limiter aux héros autorisés (Riou et Nanami)

    if (!allowedHeroes.includes.toString()) {
        alert('Ce héros n\'est pas sélectionnable.');
        return;
    }

    // Mettre à jour l'input caché avec l'ID du héros sélectionné
    document.getElementById('selected-hero-id').value = heroId;

    // Mettre à jour le placeholder du champ de texte avec le nom du héros sélectionné
    document.getElementById('hero-name').placeholder = heroName;

    // Retirer la classe 'selected' de tous les héros
    document.querySelectorAll('.hero').forEach(el => el.classList.remove('selected'));

    // Ajouter la classe 'selected' au héros cliqué
    document.getElementById(heroName).classList.add('selected');
}

// Vérification que le formulaire est soumis avec les bonnes valeurs
document.querySelector('.form-container').addEventListener('submit', function(e) {
    let selectedHeroId = document.getElementById('selected-hero-id').value;
    
    // Vérifie si un héros a été sélectionné
    if (!selectedHeroId || selectedHeroId === "0") {
        e.preventDefault();
        alert('Veuillez sélectionner un héros avant de valider.');
        return;
    }

    // Vérifie si le nom du héros est rempli
    let heroNameInput = document.getElementById('hero-name').value.trim();
    if (heroNameInput.length === 0) {
        e.preventDefault();
        alert('Veuillez entrer un nom pour votre héros.');
    }
});
