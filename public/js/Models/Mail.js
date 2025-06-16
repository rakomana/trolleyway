class Mail{
    constructor(){}


    send(receiver, subject, message){
        $.ajax({

            'url' : '/api/mail/email',
            'type' : 'POST',
            'data' : {receiver, subject, message
            },
            'success' : function(data) {              
                alert("sent")
            },
            'error' : function(request,error)
            {
                alert("failed");
            }
        })
    }
}

export {Mail}