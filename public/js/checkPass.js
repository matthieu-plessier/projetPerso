let checkPass = ( event ) =>{
    if (password1.value!=password2.value) {
        event.preventDefault();
        errPass1.innerHtml = 'Pas pareil';
        errPass2.innerHtml = 'Pas pareil';
    }
}

btnSubmit.addEventListener('submit', checkPass)

