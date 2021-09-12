function dropDown1(){
    var d=document.getElementById("drop1");
    var c=document.getElementById("fleche1");
    if(!d.classList.contains("drop")){
        d.style.display="block";
    }else{
        d.style.display="none";
    }
    c.classList.toggle("fa-caret-down");
    c.classList.toggle("fa-caret-up");
    d.classList.toggle("drop");
}

function dropDown2(){
    var d=document.getElementById("drop2");
    var c=document.getElementById("fleche2");
    if(!d.classList.contains("drop")){
        d.style.display="block";
    }else{
        d.style.display="none";
    }
    c.classList.toggle("fa-caret-down");
    c.classList.toggle("fa-caret-up");
    d.classList.toggle("drop");
}

