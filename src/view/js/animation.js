// AFFICHAGE DES CARTE QUAND ON SCROLL


$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.custom-card.wd-2').each(function (i) {
                $(this).delay((i + 1) * 15).queue(function () {
                    $(this).animate({ opacity: 1 }, 1000);
                    $(this).dequeue();
                });
            });
        }
    });

    // PLACEHOLDERS QUI S'ECRIVENT


    // Sélectionner tous les inputs avec un placeholder
    $('input[placeholder]').each(function () {
        // Créer une instance de Typed.js pour chaque input
        var typed = new Typed(this, {
            strings: [$(this).attr('placeholder')],
            typeSpeed: 50,
            backSpeed: 50,
            loop: false,
            cursorChar: '_',
            startDelay: 500,
            showCursor: false,
            onComplete: function (self) {
                // Supprimer le texte animé une fois l'animation terminée
                self.el.value = '';
            }
        });
    });

    // APPARITION DES BOUTONS SUR LA PAGE CONNEXION ET SUR LE FORMULAIRE D'INSCRIPTION

    $(document).ready(function () {
        $('.btn-block').addClass('apparait').animate({
            marginLeft: '0'
        }, 1300);
    });

    $(document).ready(function () {
        $('.btn-block.valider').addClass('apparait-bas').animate({
            marginTop: '0'
        }, 800, function () {
            $(this).animate({
                width: '100%'
            }, 500);
        }).delay(150);
    });
});


// VERIF EXTENSION IMAGE QUI EMPECHE DE VALIDER

document.addEventListener("DOMContentLoaded", function () {
    // Désactiver le bouton de soumission par défaut
    document.querySelector("#submitButton").disabled = true;
    // Ajouter un écouteur d'événement sur le champ de sélection de fichier
    document.querySelector("#photo_profil").addEventListener("change", function () {
        // Récupérer l'extension du fichier sélectionné
        var extension = this.value.split(".").pop().toLowerCase();
        // Vérifier si l'extension est autorisée
        if (["jpg", "jpeg", "png", "gif"].includes(extension)) {
            // Activer le bouton de soumission
            document.querySelector("#submitButton").disabled = false;
        } else {
            // Afficher un message d'erreur
            document.querySelector("#photoHelp").innerHTML = "Veuillez sélectionner une image au format JPG, JPEG, PNG ou GIF.";
        }
    });
    // Ajouter un écouteur d'événement sur le formulaire
    document.querySelector("#inscriptionForm").addEventListener("submit", function (event) {
        // Récupérer le champ de sélection de fichier
        var photo_profil = document.querySelector("#photo_profil");
        // Vérifier si un fichier a été sélectionné
        if (photo_profil.files.length === 0) {
            // Afficher un message d'erreur et empêcher la soumission du formulaire
            document.querySelector("#photoHelp").innerHTML = "Veuillez sélectionner une image.";
            event.preventDefault();
        }
    });
});

