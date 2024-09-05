const button = document.querySelector('button');

button.addEventListener('click', () => {
    const currentState = button.getAttribute('data-state');

    if(!currentState || currentState === 'closed') {
        button.setAttribute('data-state', 'opened');
        button.setAttribute('aria-expended', 'true');
    } else{
        button.setAttribute('data-state', 'closed');
        button.setAttribute('aria-expended', 'false');
    }
}); 

let hamburger = document.querySelector('.button');
let menu = document.querySelector('.menu');
let links = document.querySelector('.menu li a');
 hamburger.addEventListener('click', () => {
    menu.classList.toggle('active');
 });

 links.foreach(function(link){
    link.onclick = function() {
         menu.classList.remove('active');
         hamburger.setAttribute('data-state','closed');
         hamburger.setAttribute('aria-expanded','false');
    }
 })

