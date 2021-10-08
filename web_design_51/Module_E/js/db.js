var db = {
    async init(){
        return new Promise((resolve,reject)=>{
            let db = null;
            let res = indexedDB.open('test');
            res.onsuccess = function(){
                db = res.result;
                resolve(db);
            }
            res.onupgradeneeded = function(){
                db = res.result;
                db.createObjectStore('contacts',{
                    keyPath: 'id',
                    autoIncrement: true,
                });
                db.createObjectStore('tags',{
                    keyPath: 'id',
                    autoIncrement: true,
                });
                resolve(db);
            }
        })
    },
    async getAll(table){
        let db = await this.init();
        return new Promise((resolve,reject)=>{
            let data = [];

            db
            .transaction(table)
            .objectStore(table)
            .openCursor()
            .onsuccess = function(event){
                let cursor = event.target.result;

                if(cursor){
                    data.push({
                        key: cursor.key,
                        value: cursor.value,
                    });
                    cursor.continue();
                }else{
                    resolve(data);
                }
            }
        });
    },
    async get(table,id){
        let db = await this.init();
        return new Promise((resolve,reject)=>{
            db
            .transaction(table)
            .objectStore(table)
            .get(id)
            .onsuccess = function(){
                resolve(event.target.result);
            }
        });
    },
    async put(table,data,id = null){
        let db = await this.init();
        if(id != null) data['id'] = id;
        return new Promise((resolve,reject)=>{
            db
            .transaction(table,'readwrite')
            .objectStore(table)
            .put(data)
        });
    },
    async del(table,id){
        let db = await this.init();
        return new Promise((resolve,reject)=>{
            db
            .transaction(table,'readwrite')
            .objectStore(table)
            .delete(id)
        });
    },
}

db.init();