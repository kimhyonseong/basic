const actions = document.querySelector('.actions>li>button');
const clampBt = document.querySelector('.titleAndButton>.moreBt');
const clampBt_i = document.querySelector('.titleAndButton>.moreBt>i');
const clamp = document.querySelector('.titleAndButton>.title');

actions.addEventListener('click',function (){
    this.classList.toggle('active');
});

clampBt.addEventListener('click',function (){
    clamp.classList.toggle('clamp');
    clampBt_i.classList.toggle('clamp');
});