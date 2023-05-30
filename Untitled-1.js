const express=require("express")
const mongo=require("mongodb").MongoClient
const app=express()
var url="mongodb://127.0.0.1:27017/session"
mongo.connect(url,(err,db)=>{
    if (err) throw err
    var dbc=db.db("model")
    // dbc.createCollection("data",(err,dat)=>{
    //     if(err) throw err
    //     console.log("collection created")
    // })

    app.get('/insert',(req,res)=>{
        let dat=[{name:'abinesh',email:"abinesh@gmail.com" ,age: 19, city:"CBE"},
        {name:'pranesh',email:"pranesh@gmail.com" ,age: 20, city:"MS"},
        {name:'jack',email:"jack@gmail.com" ,age: 18, city:"TEN"},
        {name:'krithik',email:"krithik@gmail.com" ,age: 19, city:"CBE"},
        {name:'aswin',email:"aswin@gmail.com" ,age: 19, city:"CBE"}
    ];
        dbc.collection("dat").insert(dat,(err,res)=>{
            if(err) throw err
            console.log("Data inserted",dat)
        })
    })

    app.get('/getdata',(req,res)=>{
        let dat={name:"jack"}
        dbc.collection("dat").findOne(dat,(err,res)=>{
            if (err) throw err
            console.log(res)
        })
    })

    app.get('/update',(req,res)=>{
        let dat={name:"abinesh"}
        let updates={$set:{name:"abineshwari"}}
        dbc.collection("dat").updateOne(dat,updates,(err,res)=>{
            if(err) throw err
            console.log(JSON.stringify("Updates done",res))
        })
    })

    app.get('/delete',(req,res)=>{
        let dat={name:"aswin"}
        dbc.collection("dat").deleteOne(dat,(err,res)=>{
            if(err) throw err
            console.log("Deleted",dat)
        })
    })
})

app.listen(3000,()=>{
    console.log("Server running")
})