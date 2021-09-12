function openCloseNav(event){
    var b=document.getElementById("bar");
    var c=document.getElementById("croix");
    if(event.currentTarget.classList.contains("open")){
        closeNav();
    }else{
        openNav();
    }
    c.classList.toggle("open");
    b.classList.toggle("open");
    b.classList.toggle("fa-chevron-circle-right");
    b.classList.toggle("fa-chevron-circle-left");
}
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

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

