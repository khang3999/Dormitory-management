document.addEventListener("DOMContentLoaded", function () {
    // Navbar scroll
    var navbarBefore = document.querySelector(".navbar-before");
    var navbar = document.querySelector(".navbar");
    var logo = document.querySelector(".logo");
    var title = document.querySelector(".title-home");
    var titleHidden = document.querySelector(".title-home-hidden");
    var btnNav = document.querySelectorAll(".btn-navigation");
    var hiddenNav = document.querySelector(".hidden-nav");
    var eventPersonal = document.querySelector(".box-event-personal");

    var changeNav = false;
    logo.style.display = 'flex';
    title.style.display = 'flex';
    titleHidden.style.display = 'flex';
    btnNav.forEach(element => {
        element.style.display = 'inline-block';
    });
    eventPersonal.style.display = 'inline-block';
    hiddenNav.addEventListener("click", function () {
        if (navbar.style.height === '160px') {
            navbar.style.height = '0px';
            navbarBefore.style.height = '10px';
            changeNav = true;
            hiddenNav.innerHTML = '<i class="bi bi-caret-down-fill icon-nav-hidden"></i>';
        } else if (navbar.style.height === '0px') {
            navbar.style.height = '160px';
            navbarBefore.style.height = '160px';
            changeNav = false;
            hiddenNav.innerHTML = '<i class="bi bi-caret-up-fill icon-nav-hidden"></i>';
        } else if (navbar.style.height === '130px') {
            navbar.style.height = '1px';
            navbarBefore.style.height = '10px';
            changeNav = true;
            hiddenNav.innerHTML = '<i class="bi bi-caret-down-fill icon-nav-hidden"></i>';
        }else if (navbar.style.height = '1px'){
            navbar.style.height = '130px';
            navbarBefore.style.height = '130px';
            changeNav = false;
            hiddenNav.innerHTML = '<i class="bi bi-caret-up-fill icon-nav-hidden"></i>';
        }else{
            navbar.style.height = '160px';
            navbarBefore.style.height = '160px';
            changeNav = true;
            hiddenNav.innerHTML = '<i class="bi bi-caret-down-fill icon-nav-hidden"></i>';
        }
        logo.style.display = (logo.style.display === 'none') ? 'flex' : 'none';
        title.style.display = (title.style.display === 'none') ? 'flex' : 'none';
        titleHidden.style.display = (titleHidden.style.display === 'none') ? 'flex' : 'none';
        btnNav.forEach(element => {
            element.style.display = (element.style.display === 'inline-block') ? 'none' : 'inline-block';
        });
        eventPersonal.style.display = (eventPersonal.style.display === 'inline-block') ? 'none' : 'inline-block';
    });

    function toggleNavbarScroll() {
        if (window.scrollY > 30) {
            if (changeNav == false) {
                navbar.style.height = '130px';
                navbarBefore.style.height = '130px';
            }
            else{
                navbar.style.height = '1px';
                navbarBefore.style.height = '10px';
            }
            navbarBefore.classList.add("scrolled");
            hiddenNav.classList.add("scrolled");
            navbar.classList.add("scrolled");
            logo.classList.add("scrolled");
            title.classList.add("scrolled");
            titleHidden.classList.add("scrolled");
            btnNav.forEach(element => {
                element.classList.add("scrolled");
            });

            console.log(changeNav);
        } else {
            if (changeNav == false) {
                navbar.style.height = '160px';
                navbarBefore.style.height = '160px';
            }
            else{
                navbar.style.height = '0px';
                navbarBefore.style.height = '10px';
            }
            navbarBefore.classList.remove("scrolled");
            navbar.classList.remove("scrolled");
            hiddenNav.classList.remove("scrolled");
            logo.classList.remove("scrolled");
            title.classList.remove("scrolled");
            titleHidden.classList.remove("scrolled");
            btnNav.forEach(element => {
                element.classList.remove("scrolled");
            });
            console.log(changeNav);
        }
    }

    document.addEventListener("scroll", toggleNavbarScroll);

    // Popup Personal
    var personalDiv = document.querySelector('.personal');
    var popupPersonal = document.getElementById('popup-personal');

    personalDiv.addEventListener('click', function () {
        popupPersonal.style.display = (popupPersonal.style.display === 'inline-block') ? 'none' : 'inline-block';
    });

    window.addEventListener('click', function (event) {
        if (!personalDiv.contains(event.target) && !popupPersonal.contains(event.target)) {
            popupPersonal.style.display = 'none';
        }
    });

    // Image banner
    let currentImageIndex = 0;
    const images = ['/images/banner.jpg', '/images/event.jpg'];
    const banner = document.querySelector('.i-banner');

    function changeImage(index) {
        banner.style.backgroundImage = `url('${images[index]}')`;
    }

    document.querySelector('.i-pre-image-btn').addEventListener('click', function () {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        changeImage(currentImageIndex);
    });

    document.querySelector('.i-next-image-btn').addEventListener('click', function () {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        changeImage(currentImageIndex);
    });

    // Automatic image change every 3 seconds
    setInterval(function () {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        changeImage(currentImageIndex);
    }, 3000);

// Event Navigation
let currentEventIndex = 0;
const eventItems = document.querySelectorAll('.i-event .col-md-4');

function updateEventVisibility() {
    // Ensure currentEventIndex is within valid bounds
    if (currentEventIndex >= eventItems.length) {
        currentEventIndex = eventItems.length - 1;
    } else if (currentEventIndex < 0) {
        currentEventIndex = 0;
    }

    eventItems.forEach((item, index) => {
        if (index >= currentEventIndex && index < currentEventIndex + 3) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });

    // Disable buttons if at the beginning or end
    document.querySelector('.i-pre-event-btn').disabled = currentEventIndex === 0;
    document.querySelector('.i-next-event-btn').disabled = currentEventIndex >= eventItems.length - 3;
}

document.querySelector('.i-pre-event-btn').addEventListener('click', function () {
    currentEventIndex = Math.max(currentEventIndex - 1, 0);
    updateEventVisibility();
});

document.querySelector('.i-next-event-btn').addEventListener('click', function () {
    currentEventIndex = Math.min(currentEventIndex + 1, eventItems.length - 3);
    updateEventVisibility();
});

updateEventVisibility();

});

// Avatar File Upload
document.getElementById('avatarPreview').addEventListener('click', function () {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('avatarPreview').style.backgroundImage = `url(${e.target.result})`;
            document.getElementById('avatarPreview').textContent = ''; // Clear the "Chọn ảnh" text
        };
        reader.readAsDataURL(file);
    }
});

// Ngày tháng năm hiển thị làm đơn
document.addEventListener('DOMContentLoaded', function () {
    const currentDateDiv = document.getElementById('current-date');
    const now = new Date();
    const day = String(now.getDate()).padStart(2, '0');
    const month = String(now.getMonth() + 1).padStart(2, '0'); // Tháng trong JavaScript bắt đầu từ 0
    const year = now.getFullYear();

    currentDateDiv.textContent = `Ngày ${day} Tháng ${month} Năm ${year}`;
});