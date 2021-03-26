// require node modules
const http = require('http');
// file imports
const respond = require('./lib/respond');
// connection settings
const port = process.env.port || 3000;

// create server
const server = http.createServer(respond);

// listen to client requests on the specific port,
// the port should be available.
server.listen(port, () => {
    console.log(`listening on port: ${port}`);
});