"use strict"
let isActive = false;
function active(message,type="dark"){
    if(isActive)return false;
    let html = `<div style="position: absolute;left:50%;top:1%;transform:translate(-50%);z-index:9999;" class="alert alert-${type} animate__animated animate__backInLeft showTips">
                    ${message}
                </div>`
    document.querySelector('body').insertAdjacentHTML('beforeend',html);
    isActive = true;
    setTimeout(() => disappear(isActive),3000)
}
function disappear(){
    let tip = document.querySelector('.showTips')
    tip.classList.add('animate__backOutDown')
    tip.addEventListener('animationend',(e) => {
        isActive = false;
        e.target.parentElement.removeChild(e.target)
    })
}

export default active;