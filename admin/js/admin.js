document.addEventListener('DOMContentLoaded',()=>{
 const toggler=document.getElementById('menuToggle');
 if(toggler){toggler.addEventListener('click',()=>{
 document.querySelector('.sidebar').classList.toggle('d-none');});}
});
