/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    var totalChars      = 180; //Total characters allowed in textarea
    var countTextBox    = $('#self-stmt') // Textarea input box
    var charsCountEl    = $('#countchars'); // Remaining chars count will be displayed here

    charsCountEl.text(totalChars); //initial value of countchars element
    countTextBox.keyup(function() { //user releases a key on the keyboard
        var thisChars = this.value.replace(/{.*}/g, '').length; //get chars count in textarea
        if(thisChars > totalChars) //if we have more chars than it should be
        {
            var CharsToDel = (thisChars-totalChars); // total extra chars to delete
            this.value = this.value.substring(0,this.value.length-CharsToDel); //remove excess chars from textarea
        }else{
            charsCountEl.text( totalChars - thisChars ); //count remaining chars
        }
    });
});
