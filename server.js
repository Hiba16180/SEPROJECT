const { Console } = require('console');
const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
const io = new Server(server,{
    cors: {origin:"*"}
});


app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});




io.on('connection', (socket) => {
  socket.join(socket.userID);
  console.log('connected base');
  // send existing users to client 
  const users = [];
  
    socket.on('connections', (message) =>{
      io.use((socket, next) => {
        const id = socket.handshake.auth.ID;
        if (!id) {
          return next(new Error("invalid username"));
        }
        socket.ID = id;
        next();
      });
      let currentid = socket.id;
      socket.broadcast.emit("user connected", {
        // new user connected we should send him all existing users and then send 'him' other existing users
        userID:  socket.id,
        ID: message.ID,
      });
      for (let [id, socket] of io.of("/").sockets) {
        if(currentid!=id){
          users.push({
          userID: id,
          ID: socket.handshake.auth.ID,
        });
      }
    }
      // if there is users send else no.  
      if(users.length>0){
        socket.emit("users", users);
      }
      })
      
      socket.on('disconnect', (st) =>{
        console.log("bro connect !")
        socket.broadcast.emit("user disconnected", socket.ID);
      })

      socket.on('chat', ({message,to}) =>{
        console.log(message,to)
        //io.sockets.emit('chatToServer',message);
       // socket.broadcast.emit('receiveMessage',{
        //io.to(targetSocketId).emit('message', message);
       
        
        let target = null;
        for (let [id, socket] of io.of("/").sockets) {
          if(socket.handshake.auth.ID==to){
            target = id;
            break;
          }
        }
        socket.to(target).to(socket.userID).emit('receiveMessage',{
          message: message,
          from: socket.ID,
          to: to
          });

        
          socket.to(target).to(socket.userID).emit('Notification',{
            message: message,
            from: socket.ID,
            to: to
            });

        console.log("he"+socket.ID+" "+to)
        /*
        socket.broadcast.to(target).emit('receiveMessage',{
        'message': message,
        from: socket.handshake.auth.ID,
        });*/
        /* io.to(target).emit('receiveMessage', {
          'message': message,
          from: socket.handshake.auth.ID,
          });
*/
    })

});

server.listen(3000, () => {
  console.log('listening on *:3000');
});


/**
 * 
 *   socket.on("users", (users) => {
    console.log(users);
    for(let i = 0 ; i<users.length ; i++){
              document.getElementById(users[i].ID).innerHTML+='<span  style="display: inline-block;border-radius: 50%;height: 25px;width: 25px;background-color: green;" class="dot"></span>';            
        }
  })

  if(socket.auth){
    socket.on("user connected", (user) => {
      console.log(user);
      document.getElementById(user[i].ID).innerHTML+='<span  style="display: inline-block;border-radius: 50%;height: 25px;width: 25px;background-color: green;" class="dot"></span>';
   });
 *  */