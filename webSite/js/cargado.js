$(window).on("load", function() {
    deleteLoader();
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