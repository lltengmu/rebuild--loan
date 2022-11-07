
export default (targetElement,toNumber) => {
    let boforNumber = Number(document.querySelector(targetElement).innerHTML)
    let number = {score:boforNumber}
    let showResponse = document.querySelector(targetElement)
    //创建一个tween在20秒内改变score的属性值从0到100.
    let tween = TweenLite.to(number,1,{
        score:toNumber,
        onUpdate:showScore
    })
    function showScore() {
        showResponse.innerHTML = number.score.toFixed();
    }
}

/**
 * 定义数组去重方法
 * @param : 接收一个js数组,数组成员为数字
 */
let ArrayDeDuplication = (array) => {
    if(array instanceof Array){
        let newArray = [];
        array = array.sort();
        array.forEach(function(item,index){
            if(item != array[index - 1]){
                newArray.push(item)
            }
        })
        return newArray;
    }
    return false;
} 
export { ArrayDeDuplication }