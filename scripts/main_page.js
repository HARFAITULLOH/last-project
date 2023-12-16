const remainingChar = document.querySelector('.remainChar');
const titleInput = document.querySelector('.note-input__title');

if (titleInput.value.length <= 50) {
  titleInput.addEventListener('input', () => {
    remainingChar.innerText = 50 - titleInput.value.length;
  });
}
