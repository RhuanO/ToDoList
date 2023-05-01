chkfunc = document.getElementById('chkfunc');
function getchk() {
        if (chkfunc.checked) {
                return true;
        }
        else {
                return false;
        }
}

function alteraName(obj) {
    
    if (obj == true) {
        chkfunc.setAttribute('value', true);
    }
    if (obj == false) {
        chkfunc.setAttribute('value', false);
    }
}

window.addEventListener('load', () => {
    alteraName(getchk());
})

chkfunc.addEventListener('click', () => {
    alteraName(getchk());
})