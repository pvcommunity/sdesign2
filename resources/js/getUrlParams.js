/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getQueryVariable(variable)
{
    var query = window.lodation.search.substring(1);
    var vars = query.split("&");
    for(var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable)
        {
            return pair[1];
        }
    }
    return (false);
}
