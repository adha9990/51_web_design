chrome.runtime.onMessage.addListener(function(request,sender,sendResponse){
    let method = request.method;
    
    if(method == "set"){
            chrome.storage.sync.set({
                'datas': request.datas,
            },function(){
                sendResponse(true);
            });
            
            return true;
        }

    if (method == "get"){
        chrome.storage.sync.get(['datas'],function(res){
            sendResponse({
                'datas': JSON.parse(res.datas),
            });
        });

        return true;

    }
         
});