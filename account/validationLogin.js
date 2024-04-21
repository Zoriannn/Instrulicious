const form = document.getElementById('loginForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

form.addEventListener('submit', function(event) {
    event.preventDefault();
    const errors = [];

    if(emailInput.value.trim() === ''){
        errors.push('Please enter your email address');
        emailInput.nextElementSibling.innerHTML = 'Please enter your email address';
        emailInput.nextElementSibling.style.color = 'red';
    }else if(!isValidEmail(emailInput.value.trim())){
        errors.push('Please enter a valid email address');
        emailInput.nextElementSibling.innerHTML = 'Please enter a valid email address';
        emailInput.nextElementSibling.style.color = 'red';
    }else{
        emailInput.nextElementSibling.innerHTML = '';
    }
   
    if(passwordInput.value.trim() === ''){
        errors.push('Please enter your password');
        passwordInput.nextElementSibling.innerHTML = 'Please enter your password';
        passwordInput.nextElementSibling.style.color = 'red';
    }else{
        passwordInput.nextElementSibling.innerHTML = '';
    }
 

    if(errors.length === 0){
        form.submit();
    }
});


function isValidEmail(email){
    const emailRegex = /^[\w-\,]+@([\w]+\.)+[\w-]{2,4}$/;
    return emailRegex.test(email);
}