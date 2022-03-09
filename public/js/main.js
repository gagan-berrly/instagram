window.addEventListener("load", function () {

    //Boton like
    function like() {

        $('.btn-like').unbind('click').click(function () {
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', '/img/heart-red.png');

            $.ajax({
                url: "/like/" + $(this).data('id'),
                type: 'GET',
                success: function (response) {
                    if (response.like) {
                        console.log("Has dado like a la publicacion");
                    } else {
                        console.log("Error al dar like");
                    }
                }
            })

            dislike();
        })
    }
    like();

    //Boton dislike
    function dislike() {

        $('.btn-dislike').unbind('click').click(function () {
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', '/img/heart-black.png');

            $.ajax({
                url: "/dislike/" + $(this).data('id'),
                type: 'GET',
                success: function (response) {
                    if (response.like) {
                        console.log("Has dado dislike a la publicacion");
                    } else {
                        console.log("Error al dar dislike");
                    }
                }
            })

            like();
        })
    }

    dislike();

    //Buscador
    $('#user-search').submit(function () {
        $(this).attr('action', '/discover/users/' + $('#user-search #search').val());

    });

    $("#visibility-icon").click(function () {
        $(".bi").toggleClass("bi-eye-slash-fill");
    });

    

});