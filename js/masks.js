const input_sign = document.querySelector('#cpf_sign');
const input_log = document.querySelector('#cpf_log');

[input_sign, input_log].forEach(item => {
  
  item.addEventListener('keypress', () => {
    let inputleigth = item.value.length

    if(inputleigth === 3 || inputleigth === 7) {
      item.value += '.'
    }else if(inputleigth === 11){
      item.value += '-'
    } 

  })

})
