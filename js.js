$(document).ready(function () {
    //alert("Hello World!");
    $("input").focusin(function () {
        $(this).css("background-color", "aqua");
    });

    $("input").focusout(function () {
        $(this).css("background-color", "white");
    });

    $('#search').keyup(function () {
        var query = $(this).val();
        if (query != '') {
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: { query: query },
                success: function (data) {
                    $('#suggestions').html(data);
                    $('#suggestions').show();
                }
            });
        }
    });

    $('#search').on('keydown',function (event) {
        if (event.which == 8 && $(this).val().length <= 1) {
            $('#suggestions').hide();
        }
    });
    // Ajouter un écouteur d'événements pour les clics sur les suggestions d'autocomplétion
    $(document).on('click', '#suggestions div', function () {
        var elementName = $(this).text();
        // Rediriger l'utilisateur vers la page de l'élément avec le nom de l'élément dans l'URL
        window.location.href = "element.php?name=" + encodeURIComponent(elementName);
    });
    $(document).on('click', '#results div', function () {
        var eName = $(this).text();
        // Rediriger l'utilisateur vers la page de l'élément avec le nom de l'élément dans l'URL
        window.location.href = "element.php?name=" + encodeURIComponent(eName);
    });

    $('#search').keypress(function (event) {
        if (event.which == 13) { // 13 is the code for Enter key
            var query = $(this).val().trim();
            if (query !== '') {
                window.location.href = "recherche.php?search=" + encodeURIComponent(query);
            }
        }
    });
});