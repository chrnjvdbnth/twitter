$(function(){
    $(document).on('click','#messagePopup',function(){
        var getMessages = 1; //might need update
        $.post('http://localhost/twitter/core/ajax/messages.php', {showMessage:getMessages}, function(data){ 
        $('.popupTweet').html(data);    //create messages.php in ajax folder....i have created it in core folder
    });
    });

    $(document).on('click','.people-message', function(){
        var get_id = $(this).data('user');
        $.post('http://localhost/twitter/core/ajax/messages.php', {showChatPopup:get_id}, function(data){
            $('.popupTweet').html(data);
            if(autoscroll){
                scrolldown();
            }
            $('#chat').on('scroll', function(){
                if($(this).scrollTop() < this.scrollHeight - $(this).height()){
                    autoscroll = false;
                }
                else{
                    autoscroll = true;
                }
            });
        });
        getMessages = function(){
            $.post('http://localhost/twitter/core/ajax/messages.php', {showChatMessage:get_id}, function(data){
                $('.main-msg-inner').append(data);
                if(autoscroll){
                    scrolldown();
                }
                $('#chat').on('scroll', function(){
                    if($(this).scrollTop() < this.scrollHeight - $(this).height()){
                        autoscroll = false;
                    }
                    else{
                        autoscroll = true;
                    }
                });
            });
        }

        var timer = setInterval(getMessages, 5000);  // run after every 5 sec
        getMessages();

        //scroll down to new messages
        autoscroll = true;
        scrolldown = function(){
            $('#chat').scrollTop($('#chat')[0].scrollHeight);
        }
    });
})