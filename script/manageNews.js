txt_search = document.getElementById('txt_search');
btn_search = document.getElementById('btn_search');
btn_search.addEventListener('click',search);
const allNews = document.querySelectorAll('figure.news');
function search() {
    
    result = Array.from(allNews).filter(fig => fig.textContent.includes(txt_search.value) );
    console.log(txt_search.value);
    if(result.length!=0){
        container = document.querySelector('main');
        container.replaceChildren(...result);
        console.log(result);
        
        //result.map(res=> container.append( res.parentElement.parentElement));
    }
    else{
        container = document.querySelector('main');
        container.innerHTML="";
        msg = document.createElement("h2");
        msg.innerText="There are no results found!!";
        container.appendChild(msg);
    }
    //console.log(result);
}