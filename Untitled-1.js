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

















const express = require("express");
const mongo = require("mongodb").MongoClient;
const app = express();
const url = "mongodb://127.0.0.1:27017/model";
mongo.connect(url, (err, db) => {
  if (err) throw err;
  var dbc = db.db("semesteriwp");
  app.get("/insert", (req, res) => {
    let data =[{
      model_name:"apple",
      make:"USA",
      color:"deep purple",
      price:"150000"
    },
    {
      model_name:"samsung",
      make:"china",
      color:"black",
      price:"80000"
    },
    {
      model_name:"vivo",
      make:"china",
      color:"white",
      price:"25000"
    },
    {
      model_name:"realme",
      make:"china",
      color:"red",
      price:"30000"
    },
    {
      model_name:"oppo",
      make:"korea",
      color:"blue",
      price:"30000"
    }
    ];
    dbc.collection("bike_datas").insertMany(data, (err, res) => {
      if (err) throw err;
      console.log("Data inserted");
    });
  });

  app.get("/getdata", (req, res) => {
    let data = { model_name:"oppo" };
    dbc.collection("bike_datas").findOne(data, (err, res) => {
      if (err) throw err;
      console.log(res);
    });
  });

  app.get("/read", (req, res) => {
    // let data = { model_name: "BMW" };
    dbc.collection("bike_datas").find({}).toArray(function(err, result)
     {
        if (err) throw err;
        console.log(result);
    });
  });

  // app.get("/update", (req, res) => {
  //   let data = { model_name: "oppo" };
  //   let updates = { $set: { model_name: "Newoppo" } };
  //   dbc.collection("bike_datas").updateMany(data, updates, (err, result) => {
  //     if (err) throw err;
  //     console.log("updated");
  //     console.log(result);
  //   });
  // });

  app.get('/update',(req,res)=>{
    let data = { model_name: "oppo" };
    let updates = { $set: { model_name: "Newoppo" } };
    dbc.collection("bike_datas").updateOne(data,updates,(err,res)=>{
        if(err) throw err
        console.log(JSON.stringify("Updates done"+res))
    })
})

  
  

  app.get("/delete", (req, res) => {
    let data = { model_name: "vivo" };
    dbc.collection("bike_datas").deleteOne(data, (err, res) => {
      if (err) throw err;
      console.log("Deleted");
    });
  });
});

app.listen(3000, () => {
  console.log("Server listening at 3000");
})
