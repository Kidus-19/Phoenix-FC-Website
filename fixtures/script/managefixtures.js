 edit = document.getElementById('editFixture')
let del = document.getElementById('deleteFixture')
let searchBar = document.getElementById('searchBar')
let add = document.getElementById('add')
let submit = document.getElementById('submit')
let allFix =  document.getElementsByClassName('fixture')
function name(params) {
    alert("try new things");
}
add.addEventListener('click',function () {
    submit.parentElement.parentElement.parentElement.style.display='flex'
    console.log(submit.parentElement.parentElement);

  })
function showEditForm() {
    add.addEventListener('click',function () {

        submit.parentElement.parentElement.style.display='flex'
    
      })
}
searchBar.addEventListener('keyup',function () {
    let results = Array.from(allFix).filter(function (a) {
        // console.log(a);
        if(a.textContent.toLowerCase().includes(searchBar.value.toLowerCase())){
            return a;
        }
    })
    firstFix = document.querySelector('.fixture');
    for(i=0;i<results.length;i++){
        firstFix.parentElement.insertBefore(results[i],firstFix);
    }
})
/*
edit.addEventListener('click',function() {
    
    let fixture=this.parentElement.parentElement
    // fixture.style.backgroundColor='red'
    fixture.style.backgroundColor='red'
    let logo = fixture.getElementsByTagName('img')[0]
    logo.style.display='none'
    edit.style.display='none'
    del.style.display='none'
    save.style.display='block'
    let Arr = Array.from(fixture.getElementsByTagName('h3'))
    Arr.map(a=> a.style.display='none')
    let inp = Array.from(fixture.getElementsByTagName('input'))
    inp.map(a=>a.style.display='block')
    inp[0].placeholder=logo.src;
    for(let i=0;i<Arr.length;i++){
        inp[i+1].placeholder= Arr[i].innerText;
    }
    
    
})
save.addEventListener('click',saveclick)
function saveclick () {
    let fixture=this.parentElement.parentElement
    let logo = fixture.getElementsByTagName('img')[0]
    logo.style.display='block'
    edit.style.display='block'
    del.style.display='block'
    save.style.display='none'
    let Arr = Array.from(fixture.getElementsByTagName('h3'))
    Arr.map(a=> a.style.display='block')
    let inp = Array.from(fixture.getElementsByTagName('input'))
    inp.map(a=>a.style.display='none')
    console.log(inp[0].value)
    // logo.src = `url("${URL.createObjectURL(fixture.getElementsByTagName('input')[0])})"`

    for(let i=0;i<Arr.length;i++){
        Arr[i].innerText= inp[i].value;
    }

 
}

  submit.addEventListener('click',function () {
    let newfix = document.getElementsByClassName('fixture')[0].cloneNode(true)
    let form = document.getElementsByClassName('addFixture')[0]
    document.getElementsByClassName('fixture')[0].parentElement.append(newfix)
    console.log(newfix);
    newfix.addEventListener('click',saveclick)
    newfix.style.display='flex'
    
    let fixture=edit.parentElement.parentElement
    let logo = newfix.getElementsByTagName('img')[0]
    logo.style.display='block'
    edit.style.display='block'
    del.style.display='block'
    save.style.display='none'
    newfix.getElementsByClassName('icon edit')[0].addEventListener('click',saveclick)
    let Arr = Array.from(newfix.getElementsByTagName('h3'))
    Arr.map(a=> a.style.display='block')
    let inp = Array.from(form.getElementsByTagName('input'))
    
    inp[0].placeholder=logo.src;
    for(let i=0;i<Arr.length;i++){
        Arr[i].innerText = inp[i+1].value ;
    }
    this.parentElement.parentElement.style.display='none'
    })

    */