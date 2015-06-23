var express = require('express');
var path = require('path');
var mysql = require('mysql');
var app = express();
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : 'DB PASSWOR',
  database : 'kiriket_db'
});
connection.connect();

var bodyParser = require('body-parser');
var cookieParser=require('cookie-parser');
var session=require('express-session');

app.use( bodyParser.json() );       // to support JSON-encoded bodies
app.use(bodyParser.urlencoded({     // to support URL-encoded bodies
  extended: true
})); 

app.use(cookieParser());
app.use(session({secret: '1234567890QWERTY', resave: true,
    saveUninitialized: true}));




app.post('/doSave', function(req, res){
console.log(req.body);
var matchName=req.body.match;
var teamName=req.body.team;
var runs=req.body.runs;
var wickets=req.body.wickets;
var overs=req.body.overs;
var by=req.body.by;

var insert_query="insert into score_master values('','"+matchName+"','"+teamName+"',"+runs+","+overs+","+wickets+",NOW(),'"+by+"')";
console.log(insert_query);
res.send("DONE");

connection.query(insert_query, function(err, rows){
if(err)
{
 res.send("ERROR");

}
else
{
 res.send("SUCCESS");
}
 });

});


app.post('/doLogin', function(req, res){
console.log(req.body);
var userName=req.body.Username;
var password=req.body.password;
var stat=0;
console.log(userName);
var query="SELECT * FROM user_login where uname ='"+userName+"' and password ='"+password+"'";
console.log(query);
 connection.query(query, function(err, rows){
if(err)
{
console.log('Error');
}
console.log(rows.length);
 stat=rows.length;
if(stat==0)
{
res.send("NO");
}
else{
res.send("YES");
}
  });


});


app.get('/', function(req, res){
var data_query="SELECT * FROM score_master WHERE score_id = (SELECT MAX( score_id ) FROM score_master )";
 connection.query(data_query, function(err, rows){
if(err)
{
console.log('Error');
//res.send("Some Error");
}
res.json(rows);
});

});

app.listen(8080);
