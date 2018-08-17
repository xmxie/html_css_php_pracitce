// 主页通知框
var close=document.getElementById("close");
var inform=document.getElementById("inform")
if(close!=null)close.onclick=function(){inform.style.transition='all 2s';inform.style.bottom='-300px'}

// 主页幻灯片
var left=document.getElementById("left");
var right=document.getElementById("right");
var oimg=document.getElementById("banner");
var infinte=null;
    infinte=setInterval("turnright()",8000);
var thum=document.getElementById("thum").getElementsByTagName('li');
thum[0].style.background='red';
function turnright(){
    // alert();
    clearInterval(infinte);
    infinte=setInterval("turnright()",8000);
    if(oimg.style.left=='-2250px'){
        oimg.style.left='0px';
        }else{
             oimg.style.left=parseInt(oimg.style.left)-750+'px';
             }
    for(var x=0;x<4;x++){
        thum[x].style.background='#eaeaea';
    }
    thum[-parseInt(oimg.style.left)/750].style.background='red';

}
left.onclick=function(){
    clearInterval(infinte);
    infinte=setInterval("turnright()",8000)
    if( oimg.style.left=='0px'){
        oimg.style.left='-2250px';
        }else{
             oimg.style.left=parseInt(oimg.style.left)+750+'px';
             }
    for(var x=0;x<4;x++){
        thum[x].style.background='#eaeaea';
    }
    thum[-parseInt(oimg.style.left)/750].style.background='red';
        
}
// 图标变化
function bright(event){
    button=event.target;
    button.style.background="rgba(255,255,255,0.9)";
    button.style.transition="all .5s";
    button.style.width="70px";
    button.style.height="70px";
}
function dark(event){
    button=event.target;
    button.style.background="rgba(255,255,255,0)";
    button.style.transition="all .5s";
    button.style.width="50px";
    button.style.height="50px";
}
function thumclick(event){
    oimg.style.left=parseInt(event.target.id)*(-750)+'px';
    clearInterval(infinte);
    infinte=setInterval("turnright()",8000);
    for(var x=0;x<4;x++){
        thum[x].style.background='#eaeaea';
    }
    event.target.style.background='red';
}
oimg.onmouseover=function(){clearInterval(infinte)}
oimg.onmouseout=function(){infinte=setInterval("turnright()",8000)}//触碰静止

// 搜索
var search=document.getElementById('search');
search.onfocus=function(){this.style.background="url('./images/search_r1_c1.jpg') no-repeat,url('./images/search_r1_c5.jpg'"}
search.onblur=function(){
    if(search.value==''){
    this.style.background="url('./images/search_r1_c1.jpg') no-repeat,url('./images/search_r1_c9.jpg') no-repeat right,url('./images/search_r1_c5.jpg'"}
    }


