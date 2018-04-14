function addToCart() {
    var prodId = event.target.parentNode.querySelector('button').getAttribute('value');
    var prodQtty = event.target.parentNode.querySelector('input').value;
    
    if(prodQtty < 1){
        alert("Выберите количество товара, отличное от нуля.");
        return;
    }
    var server = 'index.php';
    
    // Склеиваю запрос, который сможет проглотить $_POST
    var request = 'qtty=' + prodQtty + '&id=' + prodId;
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', server, true);
    xhr.timeout = 2000;
    xhr.ontimeout = function() {
        console.log('Server request timeout');
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    
    // Без следующего заголовка PHP не поймет, что нужно наполнять $_POST
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(request);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                requestResult = JSON.parse(xhr.responseText);
                alert(requestResult.result);
            }
        } 
    };
}

function removeFromCart() {
    var prodId = event.target.parentNode.querySelector('button').getAttribute('value');
    var prodQtty = event.target.parentNode.querySelector('input').value;
    var currentQtty = event.target.parentNode.parentNode.getElementsByClassName("qtty")[0];
    
    if(prodQtty < 1){
        alert("Выберите количество товара, отличное от нуля.");
        return;
    }
    var server = 'cart.php';
    
    // Склеиваю запрос, который сможет проглотить $_POST
    var request = 'action=remove&qtty=' + prodQtty + '&id=' + prodId;
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', server, true);
    xhr.timeout = 2000;
    xhr.ontimeout = function() {
        console.log('Server request timeout');
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    
    // Без следующего заголовка PHP не поймет, что нужно наполнять $_POST
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(request);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                requestResult = JSON.parse(xhr.responseText);
                currentQtty.textContent = requestResult.qtty;
                alert(requestResult.result);
            }
        } 
    };
}


function makeOrder() {
    var server = 'cart.php';

    var request = 'action=order';
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', server, true);
    xhr.timeout = 2000;
    xhr.ontimeout = function() {
        console.log('Server request timeout');
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    
    // Без следующего заголовка PHP не поймет, что нужно наполнять $_POST
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(request);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                requestResult = JSON.parse(xhr.responseText);
                alert(requestResult.result);
            }
        } 
    };
}


