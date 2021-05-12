//require node modules
const fs = require('fs');
const path = require('path');

//require files
const calculateSizeD = require('./calculateSizeD.js');
const calculateSizeF = require('./calculateSizeF.js');

const buildMainContent = (fullStaticPath, pathname) => {
    let mainContent = '';
    let items;
    //loop through the elements inside the folder

    try{
        items = fs.readdirSync(fullStaticPath);
        console.log(items);
    }catch(err){
        console.log(`readdirSync error: ${err}`);
        return `<div class="alert alert-danger">Internal Server Error</div>`;
    }
    
    //remove .DS_Store
    items = items.filter(element => element !== '.DS_Store');
    
    //Home directory, remove project_files
    if(pathname === '/'){
        items = items.filter(element =>  !['project_files', 'ace-builds-master'].includes(element));
    }
    
    //get the following elements for each item:
    items.forEach(item => {
        
        //store item details in an object
        let itemDetails = {};
        
        //name
        itemDetails.name = item;
        
        //link
        const link = path.join(pathname, item);

        //get stats of the item
        const itemFullStaticPath = path.join(fullStaticPath, item);
        try{
            itemDetails.stats = fs.statSync(itemFullStaticPath);
        }catch(err){
            console.log(`statSync error: ${err}`);
            mainContent = `<div class="alert alert-danger">Internal server error</div>`;
            return false;
        }
        
        if(itemDetails.stats.isDirectory()){
            itemDetails.icon = '<ion-icon name="folder"></ion-icon>';
            
            [itemDetails.size, itemDetails.sizeBytes] = calculateSizeD(itemFullStaticPath);
        }else if (itemDetails.stats.isFile()){
            itemDetails.icon = '<ion-icon name="document"></ion-icon>';
            
            [itemDetails.size, itemDetails.sizeBytes] = calculateSizeF(itemDetails.stats);
        }
        
        //when was the file last changed? (unix timestamp)
        itemDetails.timeStamp = parseInt(itemDetails.stats.mtimeMs);
        
        console.log(itemDetails.timeStamp);
        
        //convert timestamp to a date
        itemDetails.date = new Date(itemDetails.timeStamp);
        
        itemDetails.date = itemDetails.date.toLocaleString();
        
        console.log(itemDetails.date);
        
        
        mainContent +=  `
<tr data-name="${itemDetails.name}" data-size="${itemDetails.sizeBytes}" data-time="${itemDetails.timeStamp}">
<td>${itemDetails.icon}<a href="${link}" target='${itemDetails.stats.isFile() ? "_blank" : ""}'>${item}</a></td>
<td>${itemDetails.size}</td>
<td>${itemDetails.date}</td>
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