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
        } else if (navbar.style.height === '1px') {
            navbar.style.height = '130px';
            navbarBefore.style.height = '130px';
            changeNav = false;
            hiddenNav.innerHTML = '<i class="bi bi-caret-up-fill icon-nav-hidden"></i>';
        } else {
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
            else {
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
        } else {
            if (changeNav == false) {
                navbar.style.height = '160px';
                navbarBefore.style.height = '160px';
            }
            else {
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

});

// Avatar File Upload
// Các phần tử liên quan đến avatar
var avatarPreview = document.getElementById('avatarPreview');
var fileInput = document.getElementById('fileInput');

if (avatarPreview && fileInput) {
    avatarPreview.addEventListener('click', function () {
        fileInput.click();
    });

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                avatarPreview.style.backgroundImage = `url(${e.target.result})`;
                avatarPreview.textContent = ''; // Clear the "Chọn ảnh" text
            };
            reader.readAsDataURL(file);
        }
    });
} else {
    console.error('Không tìm thấy các phần tử avatar trong DOM');
}

var notePre = document.getElementById('uutienPreview');
var fileInputNote = document.getElementById('fileInputNote');

if (notePre && fileInputNote) {
    notePre.addEventListener('click', function () {
        fileInputNote.click();
    });

    fileInputNote.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                notePre.style.backgroundImage = `url(${e.target.result})`;
                notePre.textContent = ''; // Clear the "Chọn ảnh" text
            };
            reader.readAsDataURL(file);
        }
    });
} else {
    console.error('Không tìm thấy các phần tử avatar trong DOM');
}

var initialPreview = document.getElementById('uutienPreview');
var initialFileInput = document.getElementById('fileInputNote');

if (initialPreview && initialFileInput) {
    attachEventHandlers(initialPreview, initialFileInput);
} else {
    console.error('Không tìm thấy các phần tử avatar trong DOM');
}

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

let currentEventIndex = 0;
const eventItems = document.querySelectorAll('.event-item');
const prevButton = document.querySelector('.i-pre-event-btn');
const nextButton = document.querySelector('.i-next-event-btn');

function updateEventVisibility() {
    eventItems.forEach((item, index) => {
        if (index >= currentEventIndex && index < currentEventIndex + 3) {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });

    // Disable/enable buttons based on currentEventIndex
    if (currentEventIndex <= 0) {
        prevButton.setAttribute('disabled', true);
    } else {
        prevButton.removeAttribute('disabled');
    }

    if (currentEventIndex >= eventItems.length - 3) {
        nextButton.setAttribute('disabled', true);
    } else {
        nextButton.removeAttribute('disabled');
    }
}

nextButton.addEventListener('click', function () {
    if (currentEventIndex < eventItems.length - 3) {
        currentEventIndex++;
        updateEventVisibility();
    }
});

prevButton.addEventListener('click', function () {
    if (currentEventIndex > 0) {
        currentEventIndex--;
        updateEventVisibility();
    }
});

// Initial update to show the first 3 items
updateEventVisibility();

const modal = document.getElementById('eventModal');
const modalTitle = modal.querySelector('.modal-title');
const modalImage = modal.querySelector('.modal-event-image');
const modalContent = modal.querySelector('.modal-event-content');

eventItems.forEach(item => {
    item.addEventListener('click', function () {
        const eventTitle = item.querySelector('.i-event-title').textContent;
        const eventImageSrc = item.querySelector('.i-event-image img').getAttribute('src');
        const eventContent = item.querySelector('.i-event-text-hidden').textContent;

        modalTitle.textContent = eventTitle;
        modalImage.setAttribute('src', eventImageSrc);
        modalContent.textContent = eventContent;

        $('#eventModal').modal('show');
    });
});



// Ngày tháng năm hiển thị làm đơn
const currentDateDiv = document.getElementById('current-date');
const now = new Date();
const day = String(now.getDate()).padStart(2, '0');
const month = String(now.getMonth() + 1).padStart(2, '0'); // Tháng trong JavaScript bắt đầu từ 0
const year = now.getFullYear();
currentDateDiv.textContent = `Ngày ${day} Tháng ${month} Năm ${year}`;
