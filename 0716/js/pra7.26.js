// var test=document.getElementsByTagName("button");
// //for测序尝试
// for(var i=0,I=test.length;i<I;i++){
//   test[i].onclick=function(){alert(i)};
// }




var oinput=document.getElementsByTagName("input");
var obox=document.getElementsByClassName("box");
var content=document.getElementsByTagName("p");
var month=document.getElementsByTagName("li");
// var calendar=document.getElementsByClassName("calendar");
// var month=calendar[0].childNodes;


//创建新变量记录for中的临时变量
for(var i=0 ,I=3;i<I;i++){
  oinput[i].index=i;
  oinput[i].onmouseover=function(){
  for(var k=0,L=obox.length;k<L;k++){
      obox[k].style.display='none';
  }
  obox[this.index].style.display='block';
  }
}
//匿名函数的另一形式解决（一般匿名函数的构造时间是在调用的时候）
/*     for(var i=0,I=oinput.length;i<3;i++){
  (function(num){ 
      oinput[i].onmouseover=function(){
      for(var k=0 ,L=obox.length ;k<L;k++){
          // if(k!=num){
          obox[k].style.display='none';
      }
      obox[num].style.display='block';} })(i)
} */


/*     oinput[1].onmouseover=function(){
  if(obox[1].style.display=='none'){
     obox[1].style.display='block';
     obox[0].style.display='none';
     obox[2].style.display='none';
  }
}
oinput[0].onmouseover=function(){
  if(obox[0].style.display=='none'){
     obox[0].style.display='block';
     obox[1].style.display='none';
     obox[2].style.display='none';
  }
}
oinput[2].onmouseover=function(){
  if(obox[2].style.display=='none'){
     obox[2].style.display='block';
     obox[0].style.display='none';
     obox[1].style.display='none';
  }
} */


// 第二部分日历
for(var z=0,Q=month.length;z<Q;z++)
{  
  month[z].index=z;
  month[z].onmouseover=function(){
      for(var k=0;k<Q;k++){
          month[k].style.background="#000";
          month[k].style.color="white";
          content[k].style.display='none';
      }
      this.style.background="white";
      this.style.color="black";
      content[this.index].style.display="block";
  }
}


// 第三部分搜索
var table=document.getElementById("table");
var tr=table.getElementsByTagName("tr");
var td=table.getElementsByTagName("td");
var sure=document.getElementById("sure");
var input=document.getElementById("input")


/* sure.onclick=function(){
    for(var k=0;k<tr.length;k++){
        tr[k].style.background='unset';
    }
    var wrong=true;
    var len=input.value.length;
    var get=false;
    for(var c=0;c<td.length;c++){
        // alert(c);
        for(var j=0;j<td[c].innerText.length;j++){
            if(input.value[0]==td[c].innerText[j]){
                // alert(get);
                for(m=0;m<len;m++){
                    if(input.value[m]==td[c].innerText[j+m]){
                        get=true;
                        // alert(c);
                        // alert(td[c].innerText);
                        // alert(get);
                    }
                    else{get=false;}
                }
        }
        // alert(get);
        if(get)
        {   
            // alert(get);
            // alert(Math.floor((c+2)/3));
            // alert(Math.floor((c+2)/3));
            tr[Math.floor((c+2)/3)].style.background='yellow';
            get=false;
            wrong=false;
            // alert(td[c].innerText[0])
        }
    }
    }
    if(wrong)
    {alert("没有找到指定对象！")} 

} */

// 搜索之search（）方法
sure.onclick=function(){
    var wrong=true;
    var content=input.value.split(" ");
    for(var j=5;j<td.length;j=j+3){
        td[j].parentElement.removeAttribute('background');
        td[j].parentElement.style.background='none';
        for(var c=0;c<content.length;c++){
        if(td[j].innerText.search(content[c])>-1){
            wrong=false;
            td[j].parentElement.style.background='yellow';
        }}
    }
    if(wrong){
        alert("没有找到指定对象！")
    }
} 

