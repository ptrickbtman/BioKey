particlesJS.load('particles-js', 'assets/particles.json', function() {
    console.log('callback - particles.js config loaded');
});


$(document).ready(function() {
    $(".btnSetPass").on("click", function() {
        changePass();
    });
});



function changePass() {
    data = obtenerDatosForm("formNPass");
    if (vacio(data["pass1"]) && vacio(data["pass2"])) {
        $(".lblGes1").remove("error");
        if (validarTextoMasNum(data["pass1"])) {
            $(".lblGes1").addClass("remove");
            if (data["pass1"] == data["pass2"]) {
                crearModalEspera();
                setDataUser(data);
                $(".lblGes2").text("Repita nueva coontraseña:");
                $(".lblGes2").addClass("error");

            } else {

                $(".lblGes2").addClass("error");
                $(".lblGes2").text("Contraseña no coincide:");
            }
        } else {
            $(".lblGes1").addClass("error");
            $(".lblGes1").text("Debe tener numero y letras");
        }
    } else {
        $(".lblGes1").addClass("error");
        $(".lblGes1").text("Complete los campos ");
    }
}


function setDataUser(data) {

}