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

itcj = 0, tec = 0, urn = 0, uacj = 0, uach = 0;

btn1.addEventListener("click", function() {
    itcj++;
    conta1.innerHTML = "ITCJ: " + itcj;
    btn1.disabled = true;
    btn1.textContent = "Votado";
});
btn2.addEventListener("click", function() {
    tec++;
    conta2.innerHTML = "TEC: " + tec;
    btn2.disabled = true;
    btn2.textContent = "Votado";
});
btn3.addEventListener("click", function() {
    urn++;
    conta3.innerHTML = "URN: " + urn;
    btn3.disabled = true;
    btn3.textContent = "votado";
});
btn4.addEventListener("click", function() {
    uacj++;
    conta4.innerHTML = "UACJ: " + uacj;
    btn4.disabled = true;
    btn4.textContent = "Votado";
});
btn5.addEventListener("click", function() {
    uach++;
    conta5.innerHTML = "UACH: " + uach;
    btn5.disabled = true;
    btn5.textContent = "Votado";
});