$(window).on("load", function() {
    setTimeout(deleteLoader(), 500);
})

function deleteLoader() {

    $(".loader").css("opacity", "0");
    setTimeout(function() {
        $(".loader").remove();
    }, 500)

}


$(".hamburger").on("click", function() {
    $(".stick1").toggleClass("stick1On");
    $(".stick2").toggleClass("stick2On");
    $(".stick3").toggleClass("stick3On")
    $(".itemsMenu").toggleClass("itemsMenuOn")
});


// login modal

$(".abrirModal").on("click", function() {

    $(".contLogin").addClass("contLoginOn")
    $(".modalLogin").addClass("modalLoginOn");
    setTimeout(function() {
        $(".contLoginBinary").addClass("contLoginBinaryOn");
        $(".contModalLogin").addClass("contModalLoginOn");
        setTimeout(function() {
            $(".btnEnvio").css("opacity", "0");
            setTimeout(function() {
                $(".btnEnvio").css("opacity", "1");
                setTimeout(function() {
                    $(".btnEnvio").css("opacity", "0");
                    setTimeout(function() {
                        $(".btnEnvio").css("opacity", "1");
                    }, 100)
                }, 200)
            }, 200)


        }, 350)
    }, 600)
});



$(".cerrarLogin").on("click", function() {
    $(".contLoginBinary").removeClass("contLoginBinaryOn");
    $(".contModalLogin").removeClass("contModalLoginOn");

    setTimeout(function() {
        $(".contLogin").removeClass("contLoginOn")
        $(".modalLogin").removeClass("modalLoginOn");

    }, 700)
});