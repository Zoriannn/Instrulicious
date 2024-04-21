const form = document.getElementById('contact-form');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const message = document.getElementById('message');

form.addEventListener('submit', function(event) {
    event.preventDefault();
    const errors = [];

    if(nameInput.value.trim() === ''){
        errors.push('Please enter your name');
        nameInput.nextElementSibling.innerHTML = 'Please enter your name';
        nameInput.nextElementSibling.style.color = 'red';
    } else if(!isValidName(nameInput.value.trim())){
        errors.push('Please enter a valid email address');
        nameInput.nextElementSibling.innerHTML = 'Name should only contain alphabets';
        nameInput.nextElementSibling.style.color = 'red';
    }else {
        nameInput.nextElementSibling.innerHTML = '';
    }

    if(emailInput.value.trim() === ''){
        errors.push('Please enter your email address');
        emailInput.nextElementSibling.innerHTML = 'Please enter your email address';
        emailInput.nextElementSibling.style.color = 'red';
    } else if(!isValidEmail(emailInput.value.trim())){
        errors.push('Please enter a valid email address');
        emailInput.nextElementSibling.innerHTML = 'Please enter a valid email address';
        emailInput.nextElementSibling.style.color = 'red';
    } else {
        emailInput.nextElementSibling.innerHTML = '';
    }

    if(message.value.trim() === ''){
        errors.push('Please enter your message');
        message.nextElementSibling.innerHTML = 'Please enter your message';
        message.nextElementSibling.style.color = 'red';
    } else {
        message.nextElementSibling.innerHTML = '';
    }

    if(errors.length === 0){
        alert('Your message has been successfully submitted. Please keep an eye on your email for any responses.');
        form.submit();
    }
});




function isValidEmail(email){
    const emailRegex = /^[\w-\,]+@([\w]+\.)+[\w-]{2,4}$/;
    return emailRegex.test(email);
}

function isValidName(name){
    const nameRegex = /^[A-Za-z\s]+$/; 
    return nameRegex.test(name);
}

