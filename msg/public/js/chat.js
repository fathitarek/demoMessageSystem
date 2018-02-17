var me = {};
me.avatar = "/images/me.png";

var you = {};
you.avatar = "/images/you.jpeg";

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}

//-- No use time. It is a javaScript effect.
function insertChat(who, text, time = 0){
    var control = "";
    var date = formatAMPM(new Date());

    if (who ==$('#from_id').val()){

        control = '<li style="width:100%">' +
                        '<div class="msj macro">' +
                        '<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ me.avatar +'" /></div>' +
                            '<div class="text text-l">' +
                                '<p>'+ text +'</p>' +
                                '<p><small></small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';
    }else{
        control = '<li style="width:100%;">' +
                        '<div class="msj-rta macro">' +
                            '<div class="text text-r">' +
                                '<p>'+text+'</p>' +
                                '<p><small></small></p>' +
                            '</div>' +
                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="'+you.avatar+'" /></div>' +
                  '</li>';
    }
    setTimeout(
        function(){
            $("ul").append(control);

        }, time);

}

function resetChat(){
    $("ul").empty();
}

$(".mytext").on("keyup", function(e){
    if (e.which == 13){
        var text = $(this).val();
        if (text !== ""){
            insertChat("me", text);
            $(this).val('');
        }
    }
});

//-- Clear Chat
resetChat();
$(function() {
$("#send").click(function() {
alert("in");
$.ajax({
                 type: "POST",
                 url: "/sendMessage",
                 data: {
                   "from_id":$('#from_id').val(),
                   "to_id":$('#to_id').val(),
                   "content":$('#content').val(),
                   "_token":$('#csrf-token').val()
                 },
                 success: function (msg) {

                       insertChat("{{ Auth::user()->id }}",$('#content').val(), 0);
                     },
                     error: function (msg) {
                         console.log("error :  ",msg);
                 }
             });

});

$.get("/getMsg/"+$('#from_id').val()+"/"+$('#to_id').val(), function( data ) {
console.log(data.msg);
/*for each (var item in data.msg) {
  alert(item.id);
}*/
for (var index = 0; index < data.msg.length; ++index) {
    console.log(data.msg[index].id);
    insertChat(data.msg[index].from_id,data.msg[index].content, 0);

}
  insertChat("{{ Auth::user()->id }}",$('#content').val(), 0);

}, "json" );
/*
$.ajax({
                 type: "GET",
                 url: "/getMsg/"+$('#from_id').val()+"/"+$('#to_id').val(),
                 data: {
                 },
                 success: function (msg) {

                       insertChat("{{ Auth::user()->id }}",$('#content').val(), 0);
                     },
                     error: function (msg) {
                         console.log("error :  ",msg);
                 }
             });
*/

});
//-- Print Messages
/*
insertChat("{{ Auth::user()->id }}", "Hello Tom...", 0);
insertChat("you", "Hi, Pablo", 1500);
insertChat("{{ Auth::user()->id }}", "What would you like to talk about today?", 3500);
insertChat("you", "Tell me a joke",7000);
insertChat("{{ Auth::user()->id }}", "Spaceman: Computer! Computer! Do we bring battery?!", 9500);
insertChat("you", "LOL", 12000);

*/
