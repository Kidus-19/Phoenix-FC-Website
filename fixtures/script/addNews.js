let fig = document.getElementsByClassName('image')[0]
let message = fig.firstElementChild
let inputImg = document.getElementsByName('myImage')[0]
function addPic(){
    if(inputImg != null){
        let img = inputImg.files[0]
        fig.style.backgroundImage ='url('+ URL.createObjectURL(img)+')'
        console.log(message)
        message.innerHTML = 'Change Image'

    }
}
inputImg.addEventListener('change',addPic)


