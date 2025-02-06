//////////  NAVBAR CMIWWWWWW
const navbar = document.querySelector(".navbar");
const animBgNavbar = document.querySelector(".anim-bg-navbar");
const lR = document.querySelectorAll(".lr");
const navbarButton = document.querySelectorAll("#nav-btn");

let timeout;
window.addEventListener("scroll", function () {
    navbarFn();
    paralax();
});

function navbarFn() {
    if (window.scrollY >= 0) {
        navbarButton[0].classList.replace("border-none", "border-b-2");
    }
    if (window.scrollY >= document.getElementById("aboutTo").offsetTop - 150) {
        navbarButton[0].classList.replace("border-b-2", "border-none");
        navbarButton[1].classList.replace("border-none", "border-b-2");
    } else if (
        window.scrollY <=
        document.getElementById("aboutTo").offsetTop - 150
    ) {
        navbarButton[1].classList.replace("border-b-2", "border-none");
    }
    if (window.scrollY >= document.getElementById("helpTo").offsetTop - 150) {
        navbarButton[1].classList.replace("border-b-2", "border-none");
        navbarButton[2].classList.replace("border-none", "border-b-2");
    } else if (
        window.scrollY <=
        document.getElementById("helpTo").offsetTop - 150
    ) {
        navbarButton[2].classList.replace("border-b-2", "border-none");
    }

    animBgNavbar.classList.replace("block", "hidden");
    navbar.classList.replace("text-secondary", "text-primary");
    lR[0].classList.replace("bg-secondary", "bg-primary");
    lR[0].classList.replace("text-primary", "text-secondary");
    navbarButton.forEach((e) =>
        e.classList.replace("border-secondary", "border-primary")
    );

    clearTimeout(timeout);
    timeout = setTimeout(() => {
        if (window.scrollY == 0) {
            animBgNavbar.classList.replace("bg-primary", "bg-transparent");
        } else {
            animBgNavbar.classList.replace("bg-transparent", "bg-primary");
            animBgNavbar.classList.replace("animate-none", "animate-wiggle");
            animBgNavbar.classList.replace("hidden", "block");
            setTimeout(() => {
                navbarButton.forEach((e) =>
                    e.classList.replace("border-primary", "border-secondary")
                );
                navbar.classList.replace("text-primary", "text-secondary");
                lR[0].classList.replace("bg-primary", "bg-secondary");
                lR[0].classList.replace("text-secondary", "text-primary");
            }, 200);
        }
    }, 500);
}

scrollKe(0, navbarButton[0]);
scrollKe(0, navbarButton[3]);
scrollKe(document.getElementById("aboutTo").offsetTop - 150, navbarButton[1]);
scrollKe(document.getElementById("aboutTo").offsetTop - 150, navbarButton[4]);
scrollKe(document.getElementById("helpTo").offsetTop - 150, navbarButton[2]);
scrollKe(document.getElementById("helpTo").offsetTop - 150, navbarButton[5]);

function scrollKe(ke, elemenClick) {
    elemenClick.addEventListener("click", () => {
        window.scroll({
            top: ke,
            left: 0,
            behavior: "smooth",
        });
    });
}

function paralax() {
    const wTop = window.visualViewport.pageTop;
    const bulat = document.querySelectorAll(".paralax");
    const header = document.getElementById("homeTo");
    const shadowBulat = document.querySelector(".shadow-bulat");
    shadowBulat.style.width = `${300 - wTop / 5}px`;
    header.style.transform = `translate(0,-${wTop / 20}%)`;
    bulat.forEach((e) => (e.style.transform = `translate(0,${wTop / 5}%)`));
}
