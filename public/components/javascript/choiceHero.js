function selectHero(heroId, heroName) {
    document.getElementById('selected-hero-id').value = heroId;
    document.getElementById('hero-name').value = heroName;

    // Retirer la classe 'selected' de tous les héros
    document.querySelectorAll('.hero').forEach(el => el.classList.remove('selected'));

    // Ajouter la classe 'selected' au héros cliqué
    document.getElementById(heroName).classList.add('selected');
}
