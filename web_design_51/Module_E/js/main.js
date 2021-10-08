var app = {
    data(){
        return {
            contacts:[],
            tags:[],
            dialogType:null,
            dialogKey:null,
            contact:{
                img:'img/Unknown_person.jpg',
                last_name:'',
                first_name:'',
                emails:[{text:''}],
                phones:[{text:''}],
                tags:[],
                note:'',
                deleted: false,
            },
            tag:{
                text:'',
            },
            search:'',
            msg:'',
            index:0,
            limit:10,
            nums:[],
            getDel: false,
        }
    },
    mounted(){
        this.refresh();
    },
    methods:{
        async refresh(){
            this.index = 0;
            this.contacts = await db.getAll('contacts');
            this.tags = await db.getAll('tags');
            this.getNums();
            this.renderTag();
            this.getDel = false;
        },
        renderTag(){
            this.contacts.forEach((e,i)=>{
                e.value.tags.forEach((ee,ii)=>{
                    db.get('tags',ee).then(tag=>{
                        this.contacts[i].value.tags[ii] = tag.text;
                    })
                });
            });
        },
        getNums(){
            this.nums = [this.contacts.length];
            this.tags.forEach((e,i)=>{
                let count = 0;
                this.contacts.forEach((ee,ii)=>{
                    if(ee.value.tags.includes(e.value.id)) count++
                });
                this.nums.push(count);
            });
        },
        async dialogShow(type,key = null){
            this.dialogType = type;
            this.dialogKey = key;
            this[this.dialogType] = this.$options.data()[this.dialogType];
            if(key != null){
                this[this.dialogType] = await db.get(this.dialogType + 's',this.dialogKey);
            }
            $('#dialog').modal('show');
        },
        dialogSubmit(){
            let data = JSON.parse(JSON.stringify(this[this.dialogType]));
            db.put(this.dialogType + 's',data,this.dialogKey);
            $('#dialog').modal('hide');
            this.refresh();
        },
        async dialogDel(type,key){
            let data = await db.get(type + 's',key);
            data.deleted = true;
            db.put(type + 's',data);
            this.refresh();
        },
        async dialogBack(type,key){
            let data = await db.get(type + 's',key);
            data.deleted = false;
            db.put(type + 's',data);
            this.refresh();
        },
        avatar_preview(){
            let file = event.target.files[0];
            let fs = new FileReader();
            fs.onload = () => {
                let img = new Image(120,120);
                img.src = event.target.result;
                img.onload = () => {
                    let canvas = document.createElement('canvas');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    let ctx = canvas.getContext('2d');
                    ctx.drawImage(img,0,0,img.width,img.height);
                    this.contact.img = canvas.toDataURL('image/jpeg');
                }
            }
            fs.readAsDataURL(file);
        },
        searchText(){
            if(this.search == '') return;
            this.contacts = this.contacts.filter((e)=>{
                let bool = false;
                if(e.value.last_name == this.search) bool = true;
                if(e.value.first_name == this.search) bool = true;
                if(`${e.value.last_name}${e.value.first_name}` == this.search) bool = true;
                for(let email of e.value.emails){
                    if(email.text == this.search) bool = true;
                }
                for(let phone of e.value.phones){
                    if(phone.text == this.search) bool = true;
                }
                return bool;
            });

            if(this.contacts.length <= 0) this.msg = '在你的聯絡人中找不到相符的搜尋結果';
        },
        async searchTag(id){
            $('li.item').removeClass('current active');
            $(event.target).addClass('current active');

            if(id == -1){
                this.refresh();
            }else{
                this.contacts = await db.getAll('contacts');
                this.contacts = this.contacts.filter((e)=>{
                    let bool = false;
                    
                    if(e.value.tags.includes(id)) bool = true;

                    return bool;
                });
                this.renderTag();
            }
        },
        recyclerView(){
            if(event.deltaY > 0){
                if(this.index + this.limit < this.contacts.length){
                    this.index++;
                }
            }else{
                if(this.index > 0){
                    this.index--;
                }
            }
        },
        trash(){
            $('li.item').removeClass('current active');
            $(event.target).addClass('current active');
            this.getDel = true;
        },
    }
}
Vue.createApp(app).mount('#app');