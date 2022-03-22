<head>
    <title>Dapp</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
    <style>
        .localstorage{
            display:none;
        }
    </style>
</head>
<input type="text" class="to" placeholder="resourceId">
<input type="text" class="message" placeholder="Type your message">
<button class="send-msg">Send</button>
<div class="messages"></div>
<div class="localstorage"></div>
<script>
function encryptMsg(msg,key){
    return btoa(CryptoJS.AES.encrypt(msg,key));
}
function decryptMsg(msg,key){
    return CryptoJS.AES.decrypt(atob(msg), key).toString(CryptoJS.enc.Utf8);
}
var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    $('.messages').append('<p>conected</p>');
    var data = {type:'auth', token: "<?php echo $_COOKIE['UID']; ?>"};
    conn.send(btoa(JSON.stringify(data)));
};

conn.onmessage = function(e) {
    var response = JSON.parse(atob(e.data));
    if(response['type'] == 'auth'){
        localStorage.setItem("resourceId", response['resourceId']);
        $('.messages').html('<p>'+atob(e.data)+'</p>');
        $('.localstorage').html(localStorage.getItem("data"));
        $('.messages').append(localStorage.getItem("data"));
    }
    if(response['type'] == 'data'){
        $('.localstorage').append('<p>'+response['contents']+'</p>');
        localStorage.setItem("data", $('.localstorage').html());
        $('.messages').append('<p>'+response['contents']+'</p>');
    }
};
$('.send-msg').click(function(){           
    var data = {type:'data', contents: $('.message').val(), to:$('.to').val()};
    conn.send(btoa(JSON.stringify(data)));
    $('.messages').append('<p>You: '+$('.message').val()+'</p>');
    $('.localstorage').append('<p>You: '+$('.message').val()+'</p>');
    localStorage.setItem("data", $('.localstorage').html());
    $('.message').val('');
});
</script>