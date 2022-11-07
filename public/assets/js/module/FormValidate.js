/* 
 *使用方法：1.在需要使用的页面使用具有 type=module 的script标签中使用
 *         2.使用import关键字导入这个类
 *         3.生成一个类实例并传递 使用该功能的表单的css选择器 new formValidate(form),
 *
 */
"use strict"
class FormElement {
    constructor(formElement){
        this.el = formElement;
        this.inputSubmitFunction = () => {
            if(!this.el.value){
                !Array.from(this.el.classList).includes('mdate') && this.el.focus()
                if(this.el.nextElementSibling && Array.from(this.el.nextElementSibling.classList).includes(`${this.el.name}-error`))return false;
                this.el.parentElement.insertAdjacentHTML('beforeend',`<div class="${this.el.name}-error animate__animated animate__fadeInUp" style="color:red" for="newpwd" style="">請輸入</div>`)
                return false;
            }
        }
        this.selectChangeEventHandle = () => {
            if(!this.el.selectedIndex){
                this.el.parentElement.insertAdjacentHTML('beforeend',`<div class="${this.el.id}-error animate__animated animate__fadeInUp" style="color:red" for="newpwd" style="">請輸入</div>`)
                return false;
            };
            if(this.el.nextElementSibling && Array.from(this.el.nextElementSibling.classList).includes(`${this.el.id}-error`)){
                this.el.nextElementSibling.classList.add('animate__fadeOutDown')
                this.el.nextElementSibling.addEventListener('animationend',() =>{
                    this.el.parentElement.removeChild(this.el.nextElementSibling)
                })
            };
        }
        this.selectSubmitFunction = () => {
            if(!this.el.selectedIndex){
                if(this.el.nextElementSibling && Array.from(this.el.nextElementSibling.classList).includes(`${this.el.name}-error`))return false;
                this.el.parentElement.insertAdjacentHTML('beforeend',`<div class="${this.el.name}-error animate__animated animate__fadeInUp" style="color:red" for="newpwd" style="">請輸入</div>`)
                return false;
            }
        }
        this.bind(this.el)
    }
    bind(el){
        switch(el.tagName){
            case "SELECT":
                el.addEventListener('change',this.selectChangeEventHandle);
                el.form.addEventListener('submit',this.selectSubmitFunction);
                break;
            case "INPUT":
                el.addEventListener(this.eventType(el),this.InputEventFunction);
                el.form.addEventListener('submit',this.inputSubmitFunction);
                break
        }
        
    }
    eventType(InputElement){
        let state = Array.from(InputElement.classList).includes('mdate')
        if(state)InputElement.onchange = this.InputEventFunction
        return state ? 'change': 'blur'
    }
    InputEventFunction(){
        if(this.value == ''){
            if(this.nextElementSibling && Array.from(this.nextElementSibling.classList).includes(`${this.name}-error`))return false;
            this.parentElement.insertAdjacentHTML('beforeend',`<div class="${this.name}-error animate__animated animate__fadeInUp" style="color:red" for="newpwd" style="">請輸入</div>`)
            return false;
        }
        if(this.nextElementSibling && Array.from(this.nextElementSibling.classList).includes(`${this.name}-error`)){
            this.nextElementSibling.classList.add('animate__fadeOutDown')
            this.nextElementSibling.addEventListener('animationend',() =>{
                this.parentElement.removeChild(this.nextElementSibling)
            })
        };
    }
}

class formValidate {
    constructor(FormId){
        this.form = document.querySelector(`${FormId}`)
        this.elements = [ 
            ...document.querySelectorAll(`${FormId} input[validate]`),
            ...document.querySelectorAll(`${FormId} select[validate]`)
        ]
        this.init()
        this.bind()
    }
    init(){
        this.form.addEventListener('submit',function(event){
            event.preventDefault()
        })
    }
    bind(){
        this.elements.forEach(item => {
            new FormElement(item)
        })
    }
}
export default formValidate