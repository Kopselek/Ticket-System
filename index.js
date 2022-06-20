function makeRequest(file_request) {
    var http_request = new XMLHttpRequest();
    http_request.onreadystatechange = function(){
        if(http_request.readyState == 4) {
            if(http_request.status = 200) {
                console.log(http_request.responseText);
            }
        }
    };
    http_request.open('GET', file_request, true);
    http_request.send(null);
}
