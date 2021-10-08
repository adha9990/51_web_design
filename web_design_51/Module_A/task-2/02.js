let zip = new JSZip();

function handle(){
    let files = event.target.files;
    let show = document.getElementById('show');
    let bool = false;
    for(let file of files){
        let name = file.webkitRelativePath || file.name;
        zip.file(name,file);
        if(file.webkitRelativePath){
            if(!bool){
                show.innerHTML += name.split('/')[0] + '/' + '<br>';
                bool = true;
            }
        }else{
            show.innerHTML += name + '<br>';
        }
    }
}

function download(){
    zip.generateAsync({type:'blob'}).then(res=>{
        let a = document.createElement('a');
        let url = window.URL.createObjectURL(res);
        a.href = url;
        a.download = document.getElementById('download').value || 'download';
        a.click();
        window.URL.revokeObjectURL(url);
    })
}