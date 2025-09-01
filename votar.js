const btn1 = document.getElementById("miBtn1");
const conta1 = document.getElementById("conta1");
const btn2 = document.getElementById("miBtn2");
const conta2 = document.getElementById("conta2");
const btn3 = document.getElementById("miBtn3");
const conta3 = document.getElementById("conta3");
const btn4 = document.getElementById("miBtn4");
const conta4 = document.getElementById("conta4");
const btn5 = document.getElementById("miBtn5");
const conta5 = document.getElementById("conta5");

const botones = [btn1, btn2, btn3, btn4, btn5];
const contadores = [conta1, conta2, conta3, conta4, conta5];
let votos = [0, 0, 0, 0, 0];
const nombres = ["ITCJ", "TEC", "URN", "UACJ", "UACH"];

function deshabilitarTodosLosBotones() {
    botones.forEach(btn => {
        btn.disabled = true;
    });
}

botones.forEach((btn, index) => {
    btn.addEventListener("click", function() {
        votos[index]++;
        contadores[index].innerHTML = `${nombres[index]}: ${votos[index]}`;
        
        btn.textContent = "Votado";
        
        deshabilitarTodosLosBotones();
    });
});