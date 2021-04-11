const toggle_bt = document.querySelector('.nav_toggle');
const menu = document.querySelector('.nav_menu');
const sns_icon = document.querySelector('.nav_sns');

if(toggle_bt.addEventListener) {
    toggle_bt.addEventListener('click', function(){
        menu.classList.toggle('active');
        sns_icon.classList.toggle('active');
    },false);
}
// else {
//     toggle_bt.attachEvent('click', () => {
//         menu.classList.toggle('active');
//         sns_icon.classList.toggle('active');
//     });
// }