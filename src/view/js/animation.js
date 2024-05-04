// Reaction au Scroll


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
});


// INPUTS

$(document).ready(function () {
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
                self.cursor.remove();
            }
        });
    });
});