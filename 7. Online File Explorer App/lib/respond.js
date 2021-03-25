//require node modules

//file imports

//static base path: location of your static folder


//respond to a request

//Following is function passed to createServer used to create the server
const respond = (request, response) => {
    console.log('respond fired!');
//before working with the pathname, you need to decode it

//get the corrsponding full static path located in the static folder

//can we find something in fullStaticPath?

    //no: '4040: File Not Foound'

    //we found something
    //is it a file or a directory?

        //It is a directory:
            //get content from the template
            //build the page title
            //build breadcrumb
            //build table rows (main content)
            //fill the template data with the page title, breadcrumb and table rows (main content)
            //print ddata to the webpage

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