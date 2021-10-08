function handle(){
    let file = event.target.files[0];
    let fs = new FileReader();
    fs.readAsText(file);
    fs.onload = () => {
        let lines = event.target.result.split('\r\n');
        let title = lines.splice(0,1);
        let data = [];
        for(let line of lines){
            let [city,area,male,female] = line.split(',');
            if(data[city] == undefined) data[city] = [];
            data[city][area] = {male,female};
        }
        
        drawCity(data);
    }
}
function drawCity(data){
    let y = 0;
    for(let [k,v] of Object.entries(data)){
        let total = 0;
        for(let [kk,vv] of Object.entries(v)){
            for(let [kkk,vvv] of Object.entries(vv)){
                total += vvv * 1;
            }
        }
        let g = draw(k,total,y);
        g.addEventListener('click',()=>{drawArea(v)});
        document.getElementById('city').append(g);
        y += 20;
    }
}
function drawArea(data){
    document.getElementById('area').innerHTML = '';
    let y = 0;
    for(let [k,v] of Object.entries(data)){
        let total = 0;
        for(let [kk,vv] of Object.entries(v)){
            total += vv * 1;
        }
        let g = draw(k,total,y);
        document.getElementById('area').append(g);
        y += 20;
    }
}
function draw(k,v,y){
    let g = document.createElementNS('http://www.w3.org/2000/svg','g');
    let rect = document.createElementNS('http://www.w3.org/2000/svg','rect');
    let text = document.createElementNS('http://www.w3.org/2000/svg','text');
    rect.setAttribute('width',v/100);
    rect.setAttribute('height',19);
    rect.setAttribute('y',y);
    text.setAttribute('x',v/100 + 1);
    text.setAttribute('y',y + 15);
    text.innerHTML = `${k} : ${v}`;
    g.append(rect,text);
    return g;
}