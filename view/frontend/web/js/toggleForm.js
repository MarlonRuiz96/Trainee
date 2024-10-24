document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggle-form-button');
    const testimonialsSection = document.getElementById('testimonials');
    const formSection = document.querySelector('.review-form-section');

    toggleButton.addEventListener('click', function () {
        if (testimonialsSection.style.display === 'block') {
            testimonialsSection.style.display = 'none';
            formSection.style.display = 'block';
            toggleButton.textContent = 'Volver ';
        } else {
            testimonialsSection.style.display = 'block';
            formSection.style.display = 'none';
            toggleButton.textContent = '¡Deja tu Opinión!';
        }
    });
});


