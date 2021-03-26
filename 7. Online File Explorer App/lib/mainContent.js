//require node modules
const fs = require('fs');
const path = require('path');

//require files
const calculateSizeD = require('./calculateSizeD');
const calculateSizeF = require('./calculateSizeF');

const buildMainContent = (fullStaticPath) => {
    let mainContent = '';
    let items;
    //loop through the elements inside the folder
    //name and link
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
        

        //icon
        let itemDetails = {};
        let icon, stats;
        //get stats of the item
        const itemFullStaticPath = path.join(fullStaticPath, item);
        try{
            itemDetails.stats = fs.statSync(itemFullStaticPath);
        }catch(err){
            console.log(`statSync error: ${err}`);
            mainContent = `<div class="alert alert-danger">Internal Server Error</div>`;
            return false;

        }
        if(itemDetails.stats.isDirectory()){
            itemDetails.icon = '<ion-icon name="folder"></ion-icon>';


            [itemDetails.size, itemDetails.sizeBytes] = calsulateSizeD(itemFullStaticPath);

        }else if(itemDetails.stats.isFile()){
            itemDetails.icon = '<ion-icon name="document"></ion-icon>';


            [itemDetails.size, itemDetails.sizeBytes] = calsulateSizeF(itemFullStaticPath);
        }



        mainContent +=  `
    <tr>
        <td>${itemDetails.icon}<a href="${link}">${item}</a></td>
        <td>${itemDetails.size}</td>
        <td>12/08/2018, 09:00:00 PM</td>
    </tr>`;
    });
        
        //link to the item
        //size
        //last modified
    

    return mainContent;
};



module.exports = buildMainContent;