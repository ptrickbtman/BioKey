particlesJS.load('particles-js', 'assets/particles.json', function() {
    console.log('callback - particles.js config loaded');
});

$(".btn1").on("click", function() {
    $(".loginCont").toggleClass("loginContOn");
});


$(".btn2").on("click", function() {
    window.location.href = "formularioCompra.php";
});