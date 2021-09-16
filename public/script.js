const hideButton = document.querySelector('.b');
const container = document.querySelector('.a');

hideButton.addEventListener('click', () => {
    container.style.display = 'block';
})