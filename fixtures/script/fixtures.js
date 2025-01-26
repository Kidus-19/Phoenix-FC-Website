buyTicket = document.getElementById("buy")
form = document.getElementsByTagName('form')[0]

buyTicket.addEventListener('click',function () { 
    
     teams=buyTicket.parentElement.getElementsByTagName('h2')
     console.log(obj);
    passVal();
 })
    function passVal(){
    var data = {
        fn: "filename",
        str: "this_is_a_dummy_test_string"
    };

    $.post("test.php", data);
}
