document.addEventListener("DOMContentLoaded", function () {
    // Navbar scroll
    var navbarBefore = document.querySelector(".navbar-before");
    var navbar = document.querySelector(".navbar");
    var logo = document.querySelector(".logo");
    var title = document.querySelector(".title-home");
    var titleHidden = document.querySelector(".title-home-hidden");
    var btnNav = document.querySelectorAll(".btn-navigation");

    function toggleNavbarScroll() {
        if (window.scrollY > 30) {
            navbarBefore.classList.add("scrolled");
            navbar.classList.add("scrolled");
            logo.classList.add("scrolled");
            title.classList.add("scrolled");
            titleHidden.classList.add("scrolled");
            btnNav.forEach(element => {
                element.classList.add("scrolled");
            });
        } else {
            navbarBefore.classList.remove("scrolled");
            navbar.classList.remove("scrolled");
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
        eventItems.forEach((item, index) => {
            if (currentEventIndex > eventItems.length - 1) {
                document.querySelector('.i-next-event-btn').setAttribute('disabled');
            }else if(currentEventIndex < 0){
                document.querySelector('.i-pre-event-btn').setAttribute('disabled');
            }
            if (index >= currentEventIndex && index < currentEventIndex + 3) {
                item.style.display = 'block';
            }
            else {
                item.style.display = 'none';
            }
        });
    }

    document.querySelector('.i-pre-event-btn').addEventListener('click', function () {
        currentEventIndex = (currentEventIndex - 1 + eventItems.length) % eventItems.length;
        updateEventVisibility();
    });

    document.querySelector('.i-next-event-btn').addEventListener('click', function () {
        currentEventIndex = (currentEventIndex + 1) % eventItems.length;
        updateEventVisibility();
    });

    updateEventVisibility();

    // Avatar File Upload
    document.querySelector('.file-avatar').addEventListener('change', function () {
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            var image = document.querySelector('.box-avatar-3x4');
            image.style.backgroundImage = 'url(' + e.target.result + ')';
            
            // Upload the image to server (for example, using fetch)
            var formData = new FormData();
            formData.append('avatar', file);

            fetch('/upload-avatar', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error uploading file');
                }
                return response.json();
            })
            .then(data => {
                console.log('File uploaded successfully:', data);
                // Assuming 'data' contains the path to the uploaded image
                var imagePath = data.path; // Adjust 'path' based on actual response structure
                // Set background image using the uploaded image path
                image.style.backgroundImage = 'url(' + imagePath + ')';
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle error
            });
        };

        reader.readAsDataURL(file);
    });
});
