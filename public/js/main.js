/**
 * import @module
 */
import {Mail} from './Models/Mail.js'

$("#login").click(function(){
    alert("The paragraph was clicked.");
});

function emails(){
    $('#myInput').autocomplete({
        souce: function(request, response) {
            $.ajax({
                'url' : '/api/mail/emails',
                'data' : {
                    search_string: request.term,
                },
                'success' : function(data) {
                    let res = data.users
                    res.forEach(element => {
                        emails.push(element.email)
                    });
                },
                'error' : function(request,error)
                {
                    alert("Request");
                }
            })
        }
    })
}

function sendEmail(){
    let mail = new Mail()

    let receiver = $("#myInput").val()
    let subject = $("#subject").val()
    let message = $("#email_body").val()

    mail.send(receiver, subject, message)
}

$.ajax({
    'url': "/api/mail",
    'method': "GET",
    'contentType': 'application/json'
}).done( function(data) {
    $('#example').dataTable( {
        "aaData": data,
        "aoColumns": [
            {
                "mData": null,
                "mRender": function (o) { return '<input type="checkbox" class="checkmail">'; }
            },
            {
                "mData": null,
                "mRender": function (o) { return '<span class="mail-important"><i class="fa fa-star starred"></i></span>'; }
            },
            { "data": "receiver" },
            { "data": "message" },
            { "data": "subject" },
            { "data": "sender" },
            {
                "mData": null,
                "mRender": function (data) { return '<i class="fa fa-paperclip"></i>'; }
            },
            { "data": "created_at" },
        ]
    })
})

$("#template_section").hide()

$("#email_body").hide()

$('#select_template').change(function(){
    if($('#select_template').find(":selected").val() == 1){
        $("#template_section").show()
        $("#email_body").hide()
    }else if($('#select_template').find(":selected").val() == 0){
        $("#email_body").show()
        $("#template_section").hide()
    }
})

window.emails = emails

window.sendEmail = sendEmail
