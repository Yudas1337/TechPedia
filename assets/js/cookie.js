jQuery(document).ready(function(){  

    // cookie-notice
    let cookie = document.getElementsByClassName('cookie-notice');
        
       setTimeout( function(){ 
        if (readCookie('cookie') == null) {            
             cookie[0].style.display = 'block';   
    } 
    }  , 2000 );


    // cookie modal
    setTimeout( function(){ 
        if (readCookie('pop') == null) {            
            jQuery('.modal-promosi').modal();            
        }
    }  , 5000 );

    
    // Cookies
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function createCookie(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        }
        else var expires = "";               

        document.cookie = name + "=" + value + expires + "; path=/";
    }

    
    jQuery('body').on('click','.modal-jangan-tampil',function(){                        
        createCookie('pop','1',1);
    });
    
     jQuery('body').on('click','.cookiesnya',function(){                        
        createCookie('cookie','2',1)
        cookie[0].style.display = 'none';   
    });
    


});