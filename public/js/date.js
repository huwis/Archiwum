/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        function timer()
        {
            var today = new Date();
            var day = today.getDate();
            var month = today.getMonth()+1;
            var year = today.getFullYear();

            var hours = today.getHours();
            var minutes = today.getMinutes();
            var seconds = today.getSeconds();
            if (minutes < 10) minutes = "0" + minutes;
            if (seconds < 10) seconds = "0" + seconds;
            
            document.getElementById("date").innerHTML = day+"/"+month+"/"+year+"  "+hours+":"+minutes+":"+seconds;
            
            setTimeout("timer()",1000);
        
        
        }

