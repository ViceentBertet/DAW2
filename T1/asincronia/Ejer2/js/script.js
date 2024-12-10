let nMinutos = prompt("Introduce un nº de minutos:");
let HH = 0;
let mm = 0;
let ss = 59;
let ds = 0;
let cs = 0;
while (nMinutos / 60 >= 1) {
    HH++;
    nMinutos -= 60;
}
if (HH > 99) HH = 99;
mm = nMinutos;
let id = setInterval(restarNum, 10);
mm--;
function restarNum() {
    reloj.remove();
    
    let hAux, mAux, sAux, dAux,cAux;

    if (cs == 0) {
        cs = 99
        
    } else {
        cs--;
    }

    if (cs % 10 == 0) {
        if (ds == 0)
            ds = 99;
        else {
            ds--;
        }
        if (ds % 10 == 0) {
            if (ss == 0) {
                ss = 59
                if (mm == 0) {
                    mm = 59
                    HH--;
                } else {
                    mm--; 
                }
            } else {
                ss--; 
            }
        }
    }
    if (cs < 10) cAux="0" + cs;
    else cAux=cs;
    if (ds < 10) dAux="0" + ds;
    else dAux=ds;
    if (ss < 10) sAux="0" + ss;
    else sAux=ss;
    if (mm < 10) mAux="0" + mm;
    else mAux = mm;
    if (HH < 10) hAux= "0" + HH;
    else hAux = HH;
    let div = document.createElement('div');
    div.innerText = hAux + ":" + mAux + ":" + sAux + ":" + dAux  + ":" + cAux
    div.id = "reloj";
    let sitio = document.querySelectorAll('div')[0];
    sitio.appendChild(div);
    if (HH <= 0 && mm <= 0 && ss <= 0 && ds <= 0 && cs <= 0) {
        clearInterval(0);
    }
}
function comprobar() {
    
}