chrome.runtime.sendMessage({
    method: 'get',
},function(res){
    let nowURL = location.href;
    res.datas.forEach((e,i)=>{
        let oldURL = e.oldURL.replaceAll('*','(.*)');
        let regex = new RegExp(`^${oldURL}$`);
        if(regex.test(nowURL)){
            setTimeout(() => {
                location.href = e.newURL;
            }, 1000);
        }
    });
})