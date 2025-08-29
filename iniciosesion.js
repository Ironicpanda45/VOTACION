const registro = document.getElementById("registrarse");
const inicio = document.getElementById("iniciarsesion");
const cambio = document.getElementById("cambioboton");
var secambio = 0;

cambioboton.addEventListener("click", function() {
    if (secambio == 0){
    inicio.style.display="none"
    registro.style.display = "block";
    cambio.innerHTML = "Iniciar sesion"; 
    secambio = 1;
    } else{
    inicio.style.display="block"
    registro.style.display = "none";
    cambio.innerHTML = "Registrarse"; 
    secambio = 0;
    }
});