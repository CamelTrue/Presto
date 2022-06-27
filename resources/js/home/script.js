import AOS from 'aos';

AOS.init({
    offset: 400,
    duration: 1000
});






window.onscroll = () => {
    let scroll = window.scrollY;
    let docHeight = document.body.clientHeight;
    let winHeight = window.innerHeight;
    let diff = docHeight - winHeight;
    let perc = (scroll * 100) / diff;

    let bar = document.querySelector('.bar-custom').style.width = `${perc}%`;
}





let header = document.querySelector('.img-header');
let headerTitle = document.querySelector('.header-title');
let navbar = document.querySelector('nav');
let section = document.querySelector('#section');
const customContainer = document.querySelector('.container-custom');




let observer = new IntersectionObserver(
    (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                headerTitle.style.transform = 'translateX(900px)';
                headerTitle.style.opacity = '1';
            }
        })
    }
)

observer.observe(navbar);






let observerHeader = new IntersectionObserver(
    (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                header.style.opacity = '1';
            }
        });
    }
);

let interval = setInterval(() => {
    observerHeader.observe(navbar);
}, 500);







let obsNav = new IntersectionObserver(
    (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                customContainer.style.transform = 'translateX(0vw)';
            }
        });
    }
);

let intervalLink = setInterval(() => {
    obsNav.observe(navbar);
}, 500);



const modal = document.querySelector('.modal-custom-home');
const categories = document.querySelector('.container-categories');
const iconCategories = document.querySelector('.icon-categories');

modal.addEventListener('click', () => {
    modal.style.display = 'none';
    categories.style.display = 'block';

    let interval = setTimeout(() => {
        categories.style.transform = 'translateX(0)';
        modal.style.transform = 'translateX(-200px)';
    }, 300);
})

iconCategories.addEventListener('click', () => {
    modal.style.display = 'flex';
    categories.style.transform = 'translateX(-300px)';

    let interval = setTimeout(() => {
        modal.style.transform = 'translateX(0)';
        categories.style.display = 'none';
    }, 300);

})