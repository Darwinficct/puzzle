const express = require('express');

const app = express();


app.set('port', process.env.PORT || 3000);

//static files
 app.use(express.static(path.join(__dirname, 'public')));

//iniciar servidor
const server = app.listen(app.get('port'),()=>{
    console.log('server on port', app.get('port'));
});

//websocket
const SocketIO = require('socket.io');
const io = SocketIO(server);

io.on('connection', (socket) => {
    console.log('connection');

    socket.on('sendChatToServer', (message) => {
        console.log(message);

       //io.sockets.emit('sendChatToClient', message);
       socket.broadcast.emit('sendChatToClient', message);
    });

    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

server.listen(3000, () =>{
    console.log('Server is running');
});