const {execSync} = require('child_process');

try{
    const result = execSync(`du -sh "/Users/devisland/Desktop/Node/Node\ Project\ -\ File\ Explorer"`).toString();
    console.log(result);
}catch(err){
    console.log(`Error: ${err}`);
}