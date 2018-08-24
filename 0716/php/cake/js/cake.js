    var imgBox=document.getElementById ('imgshow');
    alert(imgBox);
    setInterval(function(){
        alert(imgBox.style.left);
        imgBox.style.left=parseInt(imgBox.style.left)+1003+'px';
    ;},1000);