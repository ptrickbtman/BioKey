$(".next1").on("click", function() {

    $(this).removeClass("nextActive")

    $(".contForm1").css({
        "opacity": "0"
    })
    setTimeout(function() {
        $(".contForm1").removeClass("contFormActive")
        setTimeout(function() {
            $(".contForm2").addClass("contForm2Active")
            $(".next2").addClass("nextActive")
            $(".tittleForm2").text("Direccion :")
            setTimeout(function() {
                $(".contForm2Active").css({ "transition": "1s", "opacity": "1" });
            }, 100)

        }, 300)
    }, 500)


});