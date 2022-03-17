const input = document.querySelector('#cpf');

input.addEventListener('keypress', () => {
  let inputleigth = input.value.length

  if(inputleigth === 3 || inputleigth === 7) {
    input.value += '.'
  }else if(inputleigth === 11){
    input.value += '-'
  }

})
