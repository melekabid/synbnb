const list=document.querySelector('#idselector');


let desc =list.getElementsByClassName('desc') ;
let desc2 =document.getElementsByClassName('desc') ;
let savebutton =document.getElementById('savebutton');
console.log(desc2);

const lclasse =document.getElementsByClassName('controls') ;

let searchBar=lclasse[0].firstElementChild;
let searchBar2=lclasse[2].firstElementChild;
let searchBar3=lclasse[4].firstElementChild;
let searchBar4=lclasse[5].firstElementChild;
let searchBar5=lclasse[6].firstElementChild;
let searchBar6=lclasse[7].firstElementChild;




searchBar.addEventListener('keyup',function(e){
  const term=e.target.value.toLowerCase();


  
  if(listid.indexOf(term)!=-1 && term!='' ){
    
    desc[0].innerHTML='This ID already EXISTS';
    searchBar.style.border='solid 1px #f00d0d' ;
  }
  else if(listid.indexOf(term)==-1 &&term!='')
  {
    desc[0].innerHTML='This ID is VALID';
    searchBar.style.border='solid 1px #1d990d' ;

  }  
  else
  {
    desc[0].innerHTML='';
    searchBar.style.border='' ;
  }
});



searchBar3.addEventListener('keyup',function(e){
  const term=e.target.value.toLowerCase();


  
  if(listid3.map(function(e) { return e.id; }).indexOf(term)!=-1 && term!='' ){
    pos=listid3.map(function(e) { return e.id; }).indexOf(term) ;
    desc2[12].innerHTML=listid3[pos].name;
    searchBar3.style.border='solid 1px #1d990d' ;
  }
  else if(listid3.map(function(e) { return e.id; }).indexOf(term)==-1 &&term!='')
  {
    desc2[12].innerHTML='This ID doesnt EXISTS';
    searchBar3.style.border='solid 1px #f00d0d' ; 

  }  
  else
  {
    desc2[12].innerHTML='required';
    searchBar3.style.border='' ;
  }
});
searchBar4.addEventListener('keyup',function(e){
  const term=e.target.value.toLowerCase();


  
  if(listid3.map(function(e) { return e.id; }).indexOf(term)!=-1 && term!='' ){
    pos=listid3.map(function(e) { return e.id; }).indexOf(term) ;
    desc2[13].innerHTML=listid3[pos].name;
    searchBar4.style.border='solid 1px #1d990d' ;
  }
  else if(listid3.map(function(e) { return e.id; }).indexOf(term)==-1 &&term!='')
  {
    desc2[13].innerHTML='This ID doesnt EXISTS';
    searchBar4.style.border='solid 1px #f00d0d' ; 

  }  
  else
  {
    desc2[13].innerHTML='required';
    searchBar4.style.border='' ;
  }
});
searchBar5.addEventListener('keyup',function(e){
  const term=e.target.value.toLowerCase();


  
  if(listid3.map(function(e) { return e.id; }).indexOf(term)!=-1 && term!='' ){
    pos=listid3.map(function(e) { return e.id; }).indexOf(term) ;
    desc2[14].innerHTML=listid3[pos].name;
    searchBar5.style.border='solid 1px #1d990d' ;
  }
  else if(listid3.map(function(e) { return e.id; }).indexOf(term)==-1 &&term!='')
  {
    desc2[14].innerHTML='This ID doesnt EXISTS';
    searchBar5.style.border='solid 1px #f00d0d' ; 

  }  
  else
  {
    desc2[14].innerHTML='Not required';
    searchBar5.style.border='' ;
  }
});

/* searchBar6.addEventListener('keyup',function(e){
  const term=e.target.value.toLowerCase();

    num=Number(term);
  
if(isNaN(num) &&term!='')
{
  desc2[15].innerHTML='Type a number please';
  searchBar6.style.border='solid 1px #f00d0d' ;
}
else if (!isNaN(num) &&term!='')
{
  desc2[15].innerHTML='VALID Number';
  searchBar6.style.border='solid 1px #1d990d' ;
} 
else
{
  desc2[15].innerHTML='';
  searchBar6.style.border='' ;
}
});  */

savebutton.addEventListener('click',function(e){

  if(desc[0].innerHTML=='This ID already EXISTS' || desc2[12].innerHTML=='This ID doesnt EXISTS' || desc2[13].innerHTML=='This ID doesnt EXISTS' || desc2[14].innerHTML=='This ID doesnt EXISTS' ) 
  {
    e.preventDefault(); // Cancel the native event
    e.stopPropagation();// Don't bubble/capture the event
  }
   

}, false);