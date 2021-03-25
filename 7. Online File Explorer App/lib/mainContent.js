const fs = require('fs');
const path = require('path');

const buildMainContent = (fullStaticPath) => {
    let mainContent = '';
    let items;
    //loop through the elements inside the folder
    try{
        const items = fs.readdirSync(fullStaticPath);
        console.log(items);
    }catch(err){
        console.log(`readdirSync error: ${err}`);
        return `<div class="alert alert-danger">Internal Server Error</div>`;
    }
    
    //get the following elemts for each item:
    items.forEach(item => {
        //link
        const link = path.join(pathname, item);

        mainContent +=  `
    <tr>
        <td><a href="${link}">${item}</a></td>
        <td>100</td>
        <td>12/08/2018, 09:00:00 PM</td>
    </tr>`;
    });
        //name
        //icon
        //link to the item
        //size
        //last modified
    

    return mainContent;
};



module.exports = buildMainContent;