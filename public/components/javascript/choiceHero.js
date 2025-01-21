function selectHero(heroName, heroId) {
    
    // Modifier l'input caché avec l'ID du héros sélectionné
    document.getElementById('selected-hero-id').value = heroId;

    // Mettre à jour le placeholder du champ de nom avec le nom du héros sélectionné
    document.getElementById('hero-name').placeholder = heroName;

    // Retirer la classe 'selected' de tous les héros
    document.querySelectorAll('.hero').forEach(el => el.classList.remove('selected'));

    // Ajouter la classe 'selected' au héros cliqué
    document.getElementById(heroName).classList.add('selected');
}
