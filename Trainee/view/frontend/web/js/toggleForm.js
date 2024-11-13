require([
    'jquery',
    'mage/url',
    'Magento_Ui/js/modal/alert',
    'mage/translate'
], function($, urlBuilder, alert) {
    $(document).ready(function() {
        const toggleButton = $('#toggle-form-button');
        const testimonialsSection = $('#testimonials');
        const formSection = $('.review-form-section');
        const reviewForm = $('#review-form');

        // Mostrar/Ocultar el formulario
        toggleButton.on('click', function () {
            if (formSection.is(':visible')) {
                formSection.hide();
                testimonialsSection.show();
                toggleButton.text('¡Deja tu Opinión!');
            } else {
                formSection.show();
                testimonialsSection.hide();
                toggleButton.text('Volver');
            }
        });

        // Enviar formulario con AJAX
        reviewForm.on('submit', function(event) {
            event.preventDefault();

            // Verificar si se seleccionó una calificación
            if (!$('input[name="rating"]:checked').val()) {
                // Mostrar mensaje de error si no se seleccionó una calificación
                alert({
                    title: $.mage.__('Campo Obligatorio'),
                    content: $.mage.__('Por favor, selecciona una calificación antes de enviar tu opinión.'),
                    actions: {
                        always: function() {}
                    }
                });
                return; // Detener el envío del formulario
            }

            // Crear el payload de datos del formulario
            let formData = new FormData(this);
            let data = {
                data: {
                    customer_name: formData.get("customer_name"),
                    customer_email: formData.get("customer_email"),
                    rating: parseInt(formData.get("rating")),
                    review: formData.get("review"),
                    status: "Pending"
                }
            };

            // Obtener la URL y el token desde el ViewModel
            let apiUrl = '<?= $FormReviewsViewModel->getApiUrl() ?>';
            let apiToken = '<?= $FormReviewsViewModel->getApiToken() ?>';

            // Configurar la solicitud AJAX
            fetch("https://magento.test/rest/V1/reviews", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer " + apiToken,
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(responseData => {
                    if (responseData[0] === true) {
                        // Mostrar alerta de éxito usando Magento
                        alert({
                            title: $.mage.__('¡Gracias por tu opinión!'),
                            content: $.mage.__('Gracias por tu opinión. Será revisada y autorizada antes de publicarse en la tienda.'),
                            actions: {
                                always: function(){
                                    // Limpiar el formulario y regresar al estado inicial
                                    reviewForm[0].reset();
                                    formSection.hide();
                                    testimonialsSection.show();
                                    toggleButton.text('¡Deja tu Opinión!');
                                }
                            }
                        });
                    } else {
                        alert({
                            title: $.mage.__('Error'),
                            content: $.mage.__('Error al enviar la opinión. Inténtalo de nuevo.'),
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert({
                        title: $.mage.__('Error'),
                        content: $.mage.__('Hubo un problema al enviar la opinión. Inténtalo de nuevo.'),
                    });
                });
        });
    });
});
