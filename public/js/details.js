var btnDetail = document.getElementById('btn-detail');
var divDetail = document.getElementById('div-detail-js');

btnDetail.addEventListener('click', openBlock);

function openBlock(){
    divDetail.style.display = 'block';
}