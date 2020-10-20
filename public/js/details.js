
function blockDetail(btnId, divId, btnid){
    var btnDetail = document.getElementById(btnId);
    var divDetail = document.getElementById(divId);
    var btnid = document.getElementById(btnid);

    btnDetail.addEventListener('click', openBlock);
    btnid.addEventListener('click', closeBlock);

    function closeBlock(){
        divDetail.style.display = 'none';
        divDetail.parentNode.appendChild(btnDetail);
    }

    function openBlock(){
        divDetail.style.display = 'block';
        divDetail.parentNode.removeChild(btnDetail);
    }
}

var i = 0;

while(i < 8){
    blockDetail("btn-detail-" + (i+1), "div-detail-js-" + (i+1), "btnid-" + (i+1));
    i++;
}

/* ========================================= */

var btnAlert = document.getElementById('btnAlert');

btnAlert.addEventListener('click', popup);

function popup(){
    alert('Enseignant : Makan KONE');
}

/* ========================================== */

var btnPopup = document.getElementById('btnPopup');
var overlay = document.getElementById('overlay');
var btnClose = document.getElementById('btnClose');

btnPopup.addEventListener('click',openModal);

btnClose.addEventListener('click', closePopup);

function closePopup(){
    overlay.style.display = 'none';
}

function openModal(){
    overlay.style.display = 'block';
}
