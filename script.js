const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const butPopup = document.querySelector('.butLogin-popup');


registerLink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});


loginLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});

butPopup.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
});