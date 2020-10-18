
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
