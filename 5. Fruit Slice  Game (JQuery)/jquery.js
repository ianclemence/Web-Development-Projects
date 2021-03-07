var playing = false;
var score; 
var trialsleft;
var fruits = ['apple', 'banana', 'cherries', 'grapes', 'mango', 'orange', 'orange', 'peach', 'pear', 'pineapple', 'watermelon'];
$(function(){
    
    //click on start reset button
    $("#startreset").click(function(){
        
        //we are playing
        if(playing == true){
            
           //reload page
            location.relod();
           }else{
               
               //we are not playing
               playing = true; //game initiated
               
               //set score to 0
               score = 0; //set score to 0
               $("#scorevalue").html(score);
               
               //show trials left
               $("#trialsleft").show();
               trialsleft = 3;
               addHearts();
               
               //change button text to "reset game"
               $("#startreset").html("Reset Game");
               
               
               //start sending fruits
               startAction();
           }
    });
});


            
            //step 1. create a random fruit
            //define a random step
            //step 2. move fruit down one step every 30 seconds
                //is fruit too low?
                    //no-> repeat step 2
                    //yes->any trials left?
                        //yes: repeat step 1
                        //no: show game over, button text: start game


//slice a fruit
    //play sound in the background
    //explode fruit

//function

function addHearts(){
    for(i = 0; i < trialsleft; i++){
                   $("#trialsleft").append('<img src="images/heart.png" class="life">');
               }
}

//start sending fruits
function startAction(){
    $("#fruit1").show();
    chooseFruit(); //choose a random fruit
}


//generate a random fruit

function chooseFruit(){
    $("#fruit1").attr('src', 'images/' + fruits[Math.round(9*Math.random())] +'.png');
}