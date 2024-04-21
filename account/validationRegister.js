const form = document.getElementById('registerForm');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('phone');
const passwordInput = document.getElementById('password');
const re_passwordInput = document.getElementById('re_password');
const checkbox = document.getElementById('agreeCheckBox');
 
form.addEventListener('submit', function(event) {
    event.preventDefault();
    const errors = [];

    if(nameInput.value.trim() === ''){
        errors.push('Please enter your name');
        nameInput.nextElementSibling.innerHTML = 'Please enter your name';
        nameInput.nextElementSibling.style.color = 'red';
    }else{
        nameInput.nextElementSibling.innerHTML = '';
    }

    if (phoneInput.value.trim() === '') {
        errors.push('Please enter your phone number');
        phoneInput.nextElementSibling.innerHTML = 'Please enter your phone number';
        phoneInput.nextElementSibling.style.color = 'red';
    } else {
        phoneInput.nextElementSibling.innerHTML = '';
        var phoneRegex = /^[0-9]{10}$/;
        if (!phoneRegex.test(phoneInput.value)) {
            errors.push('Please enter a valid phone number');
            phoneInput.nextElementSibling.innerHTML = 'Please enter a valid phone number';
            phoneInput.nextElementSibling.style.color = 'red';
        } else {
            phoneInput.nextElementSibling.innerHTML = '';
        }
    }

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

    if(re_passwordInput.value.trim() === ''){
        errors.push('Please re-enter your password');
        re_passwordInput.nextElementSibling.innerHTML = 'Please re-enter your password';
        re_passwordInput.nextElementSibling.style.color = 'red';
    }else{
        re_passwordInput.nextElementSibling.innerHTML = '';
        if(passwordInput.value === re_passwordInput.value) {
            re_passwordInput.nextElementSibling.innerHTML = '';
        }else{
            errors.push('Password not match.');
            re_passwordInput.nextElementSibling.innerHTML = 'Password not match';
            re_passwordInput.nextElementSibling.style.color = 'red';
            
        }
    }  

    if (!checkbox.checked) {
        errors.push('Terms and Conditions not ticked.');
        checkbox.nextElementSibling.innerHTML = 'Terms and Conditions not ticked.';
        checkbox.nextElementSibling.style.color = 'red';
    }else{
        checkbox.nextElementSibling.innerHTML = '';
    }
   
    if(errors.length === 0){
        form.submit();
    }
});


function isValidEmail(email){
    const emailRegex = /^[\w-\,]+@([\w]+\.)+[\w-]{2,4}$/;
    return emailRegex.test(email);
}

function matchPassword(password, re_password) {
    return password.value === re_password.value;
}

