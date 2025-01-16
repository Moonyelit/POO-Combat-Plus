function selectHero(hero){
    function selectHero(hero) {
        document.getElementById('selected-hero').value = hero;
        document.querySelectorAll('.hero').forEach(el => el.classList.remove('selected'));
        document.getElementById(hero).classList.add('selected');
        document.getElementById('hero-name').value = hero === 'Riou' ? 'Riou' : 'Nanami';
    }
}