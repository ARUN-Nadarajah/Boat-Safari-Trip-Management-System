let profileContainer = document.getElementById('profileContainer');


window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    
    if (window.scrollY > 50) {
        header.classList.add('scroll');
    } else {
        header.classList.remove('scroll');
    }
});


// JavaScript to toggle the profile slide-in effect
document.getElementById('profile').addEventListener('click', function () {
    profileContainer.classList.add('active');
});


document.getElementById('profile-closer').addEventListener('click', function () {
    profileContainer.classList.remove('active');
    console.log('testing profile');
    
});