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
    
    $(document).on('click', '#suggestions div', function () {
        var elementName = $(this).text();
        
        window.location.href = "element.php?name=" + encodeURIComponent(elementName);
    });
    $(document).on('click', '#results div', function () {
        var eName = $(this).text();
        
        window.location.href = "element.php?name=" + encodeURIComponent(eName);
    });

    $('#search').keypress(function (event) {
        if (event.which == 13) { // 13 = enter 
            var query = $(this).val().trim();
            if (query !== '') {
                window.location.href = "recherche.php?search=" + encodeURIComponent(query);
            }
        }
    });
});