import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Récupérez tous les liens de suppression
const deleteLinks = document.querySelectorAll('.delete-link');

// Ajoutez un gestionnaire d'événements pour chaque lien de suppression
deleteLinks?.forEach(function (link) {
    link.addEventListener('click', function (event) {
        event.preventDefault();

        // Affichez le dialogue de confirmation
        const isConfirmed = confirm("Êtes-vous sûr(e) de vouloir supprimer ceci ?");
        if (isConfirmed) {
            // Soumettez le formulaire associé
            const formId = link.closest('form').getAttribute('id');
            document.getElementById(formId).submit();
        }
    });
});
