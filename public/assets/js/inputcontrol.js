const list=document.querySelector('#idselector');


let desc =list.getElementsByClassName('desc') ;
let desc2 =document.getElementsByClassName('desc') ;
let savebutton =document.getElementById('savebutton');
console.log(desc2);

const lclasse =document.getElementsByClassName('controls') ;

let searchBar=lclasse[0].firstElementChild;
let searchBar2=lclasse[3].firstElementChild;
let searchBar3=lclasse[2].firstElementChild;




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

searchBar2.addEventListener('keyup',function(e){
  const term=e.target.value.toLowerCase();


  
  if(listid2.map(function(e) { return e.instructor_id; }).indexOf(term)!=-1 && term!='' ){
    pos=listid2.map(function(e) { return e.instructor_id; }).indexOf(term) ;
    desc2[11].innerHTML=listid2[pos].instructor_name;
    searchBar2.style.border='solid 1px #1d990d' ;
  }
  else if(listid2.map(function(e) { return e.instructor_id; }).indexOf(term)==-1 &&term!='')
  {
    desc2[11].innerHTML='This ID doesnt EXISTS';
    searchBar2.style.border='solid 1px #f00d0d' ; 

  }  
  else
  {
    desc2[11].innerHTML='';
    searchBar2.style.border='' ;
  }
});

searchBar3.addEventListener('keyup',function(e){
  const term=e.target.value.toLowerCase();

    num=Number(term);
  
if(isNaN(num) &&term!='')
{
  desc2[10].innerHTML='Type a number please';
  searchBar3.style.border='solid 1px #f00d0d' ;
}
else if (!isNaN(num) &&term!='')
{
  desc2[10].innerHTML='VALID Number';
  searchBar3.style.border='solid 1px #1d990d' ;
} 
else
{
  desc2[10].innerHTML='';
  searchBar3.style.border='' ;
}
 

});

savebutton.addEventListener('click',function(e){

  if(desc[0].innerHTML=='This ID already EXISTS' || desc2[11].innerHTML=='This ID doesnt EXISTS' || desc2[10].innerHTML=='Type a number please')
  {
    e.preventDefault(); // Cancel the native event
    e.stopPropagation();// Don't bubble/capture the event
  }
   

}, false);