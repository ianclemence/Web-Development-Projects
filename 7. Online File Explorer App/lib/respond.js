//require node modules
const url = require('url');
const path = require('path');
const fs = require('fs');


//file imports
const buildBreadcrumb = require('./breadcrumb.js');
const buildMainContent = require('./mainContent.js');
//static base path: location of your static folder

const staticBasePath = path.join(__dirname, '..', 'static');

//respond to a request

//Following is function passed to createServer used to create the server

const respond = (request, response) => {
//before working with the pathname, you need to decode it

let pathname = url.parse(request.url, true).pathname;

//if favicon.ico stop
if (pathname === '/favicon.ico'){
    return false;
}

pathname = decodeURIComponent(pathname);


//get the corresponding full static path located in the static folder

const fullStaticPath = path.join(staticBasePath, pathname);

//can we find something in fullStaticPath?

    //no: '404: File Not Foound'
if (fs.existsSync(fullStaticPath)){
    console.log(`${fullStaticPath} does not exist.`);
    response.write('404: File Not Found!');
    response.end();
    return false;
}

    //we found something
    //is it a file or a directory?
    
let stats;
try{
    stats = fs.lstatSync(fullStaticPath);
}catch(err){
    console.log(`lstatSync Error: ${err}`);
}


    //It is a directory:
if (stats.isDirectory){

    //get content from the template index.html
    let data = fs.readFileSync(path.join(staticBasePath, 'project files/index.html'), 'utf-8');
    //build the page title
    console.log(pathname);
    let pathElements = pathname.split('/').reverse();
    pathElements = pathElements.filter(element => element !== '');
    const folderName = pathElements[0];
    console.log(folderName);
    data = data.replace('page_title', folderName); 

    //build breadcrumb
    const breadcrumb = buildBreadcrumb(pathname);
    data = data.replace('pathname', breadcrumb);

    //build table rows (main content)
    
    const mainContent = buildMainContent(fullStaticPath, pathname);
    
    //fill the template data with the page title, breadcrumb and table rows (main content)
    data = data.replace('page_title', folderName);
    data = data.replace('pathname', breadcrumb);
    data = data.replace('mainContent', mainContent);
    //print ddata to the webpage

    response.statusCode = 200;
    response.write(data);
    response.end();

}    
            

        //It is neither a file nor a directory:
            // send: 401: Access Denied!

        //It is a file:
            //let's get the file extension
            //get the file mime type and add it to the response header
            //get the file size and add it to the response header
            //pdf file? -> display in the browser
            //audio/video -> stream in randes
            //all other files stream in a normal way
}

module.exports = respond;