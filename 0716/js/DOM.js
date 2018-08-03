//不认目睹的乱七八糟的js代码    ——_——
// 对DOM节点进行操作（改变属性）
    //  console.log(test.childNodes[0]);
//  var test=document.getElementsByTagName("div");
//  for(var i=1;i<test[0].childNodes.length;i++){
//      test[0].firstElementChild.style.background='yellow';
//  
    // 显示文本节点内容
    // var box=document.getElementById('box');
    // var obj=document.getElementsByClassName('box3');
    // for(var i=0;i<obj.length;i++){
    //    alert(obj[i].innerText)
    // }
    // 创建与添加新节点
    // var tmp=document.createElement("div");
    // tmp.className='box2';
    // var text=document.createTextNode("a new text");
    // tmp.appendChild(text);
    // document.getElementById("test").appendChild(tmp);
    var tb=document.getElementById('test');
    var id=2;
    tb.getElementsByTagName('a')[0].onclick=function(){
        // alert(this.parentNode.parentNode.parentNode)
        tb.tBodies[0].removeChild(this.parentNode.parentNode);
        id--;
    }
    function createLi(){
        var input=document.getElementById('create');
        if(input.value==''){
            alert('输入不能为空！');
        }else{
        // var tmp=document.createElement("li");
        var oa=document.createElement('a');  
        oa.innerText='删除';
        // oa.setAttribute('href','javascript:;');
        oa.href='javascript:;';
        // var text=document.createTextNode(input.value);
        // tmp.appendChild(text);
        // tmp.appendChild(oa);       
        var otr=document.createElement('tr');
        var otd=document.createElement('td');
        otd.innerText=id++;
        otr.appendChild(otd);
        var otd=document.createElement('td');
        otd.innerText=input.value;
        otr.appendChild(otd);
        var otd=document.createElement('td');
        otd.innerText='18(先都18）';
        otr.appendChild(otd);
        var otd=document.createElement('td');
        otd.appendChild(oa);
        otr.appendChild(otd);
        tb.appendChild(otr);
        oa.onclick=function reomove(){
            tb.removeChild(this.parentNode.parentNode);
            id--;
        }}s
    }
        // tb.insertBefore(tmp,tb.childNodes[0]); //insertBefore可以将节点放到需要的位置

    // 删除节点
    function removeLi(){
        tb.removeChild(tb.childNodes[1]);
    }
    //添加删除的a
    /*  body.removeChild(body.childNodes[11])
    console.log(body.children)
    var table=document.getElementsByTagName('table')[0];
    table.tBodies[0].rows[0].cells[0].style.background='red';
    var test=document.getElementById('1');
    test.parentNode.parentNode.style.background='yellow';
    function codetest(){
        table.tBodies[0].removeChild(table.tBodies[0].rows[0]);
    } */