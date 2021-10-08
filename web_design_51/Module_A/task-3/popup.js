document.getElementById('add').addEventListener('click',()=>add());
document.getElementById('save').addEventListener('click',()=>{
    let lists = document.getElementsByClassName('list');
    let datas = [];

    for(let list of lists){
        let oldURL = list.querySelector('.oldURL').value;
        let newURL = list.querySelector('.newURL').value;
        datas.push({oldURL,newURL});
    }

    chrome.runtime.sendMessage({
        method: 'set',
        datas: JSON.stringify(datas),
    },function(res){
        console.log(1);
    });
});

function init(){
    chrome.runtime.sendMessage({
        method: 'get',
    }, function(res){
        res.datas.forEach((e,i,a)=>{
            add(e.oldURL,e.newURL);
        });
    })
}

function add(oldURL = "",newURL = ""){
    document.getElementById('main').innerHTML += `
        <tr class="list">
            <td><input type="text" name="" id="" class="oldURL" value="${oldURL}"></td>
            <td><input type="text" name="" id="" class="newURL" value="${newURL}"></td>
        </tr>
    `;
}

init();