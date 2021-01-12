@extends('frontend.app')


@section('content')

<section class="section  pb-4 chat-box-page">



<div class="content-wrapper h-100">

    <!-- Row start -->
    <div class="row gutters h-100">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 h-100">

            <div class="card m-0 h-100">

                <!-- Row start -->
                <div class="row no-gutters h-100 " id="chat-card-box">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                        <div class="users-container">
                            <div class="chat-search-box">

                                    <input type="text" class="form-control rounded-0" placeholder="Search Chat" aria-label="Search Chat" aria-describedby="basic-addon2">

                            </div>
                            <ul class="users ">
                                @if($newChat)
                                 <li class="person active" data-receiver-id="{{$newChat->id}}" data-chat="person1">
                                    <div class="user">
                                        <img src="{{$newChat->avatar}}" alt="Retail Admin">
                                        <span class="status busy"></span>
                                    </div>
                                    <p class="name-time">
                                        <span class="name">{{$newChat->full_name}}</span>
                                        <span class="time">{{$newChat->created_at->toDayDateTimeString()}}</span>
                                    </p>
                                </li>
                               @endif

                               @foreach ($friends as $item)


                                @if($item->receiver->id !== auth()->user()->id && auth()->user()->isBrand())
                                    <li  class="person" data-receiver-id="{{$item->receiver->id}}" data-chat="person1">
                                        <div class="user">
                                            <img src="{{$item->receiver->avatar}}" alt="{{$item->receiver->full_name}}">
                                        </div>
                                        <p class="name-time">
                                            <span class="name">{{$item->receiver->full_name}}</span>
                                            <span class="time">{{$item->created_at->toDayDateTimeString()}}</span>
                                        </p>
                                    </li>
                                @elseif( $item->sender->id !== auth()->user()->id  && auth()->user()->isTalent() )
                                <li class="person" data-receiver-id="{{$item->sender->id}}" data-chat="person1">
                                    <div class="user">
                                        <img src="{{$item->sender->avatar}}" alt="{{$item->sender->full_name}}">
                                    </div>
                                    <p class="name-time">
                                        <span class="name">{{$item->sender->full_name}}</span>
                                        <span class="time">{{$item->created_at->toDayDateTimeString()}}</span>
                                    </p>
                                </li>

                                @endif

                               @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                        {{-- <div class="selected-user">
                            <span>To: <span class="name">Emily Russell</span></span>
                        </div> --}}
                        <div class="chat-container">
                            <ul class="chat-box chatContainerScroll w-100">

                            </ul>
                            <div class="form-group mt-3 w-100">
                               <form method="post" id="chatBox">
                                    <textarea class="form-control" id="message-box" rows="3" placeholder="Type your message here..."></textarea>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
            </div>

        </div>

    </div>

    </div>
</section>


    @endsection



    @push('styles')
<style>

    .chat-search-box {
        -webkit-border-radius: 3px 0 0 0;
        -moz-border-radius: 3px 0 0 0;
        border-radius: 3px 0 0 0;
        padding: .75rem 1rem;
    }

    .chat-search-box .input-group .form-control {
        -webkit-border-radius: 2px 0 0 2px;
        -moz-border-radius: 2px 0 0 2px;
        border-radius: 2px 0 0 2px;
        border-right: 0;
    }

    .chat-search-box .input-group .form-control:focus {
        border-right: 0;
    }

    .chat-search-box .input-group .input-group-btn .btn {
        -webkit-border-radius: 0 2px 2px 0;
        -moz-border-radius: 0 2px 2px 0;
        border-radius: 0 2px 2px 0;
        margin: 0;
    }

    .chat-search-box .input-group .input-group-btn .btn i {
        font-size: 1.2rem;
        line-height: 100%;
        vertical-align: middle;
    }

    @media (max-width: 767px) {
        .chat-search-box {
            display: none;
        }
    }


    /************************************************
        ************************************************
                                        Users Container
        ************************************************
    ************************************************/

    .users-container {
        position: relative;
        padding: 1rem 0;
        border-right: 1px solid #e6ecf3;
        height: 100%;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
    }


    /************************************************
        ************************************************
                                                Users
        ************************************************
    ************************************************/

    .users {
        padding: 0;
    }

    .users .person {
        position: relative;
        width: 100%;
        padding: 10px 1rem;
        cursor: pointer;
        border-bottom: 1px solid #f0f4f8;
    }
    .users  .person.active,
    .users .person:hover {
        background-color: #ffffff;
        /* Fallback Color */
        background-image: -webkit-gradient(linear, left top, left bottom, from(#e9eff5), to(#ffffff));
        /* Saf4+, Chrome */
        background-image: -webkit-linear-gradient(right, #e9eff5, #ffffff);
        /* Chrome 10+, Saf5.1+, iOS 5+ */
        background-image: -moz-linear-gradient(right, #e9eff5, #ffffff);
        /* FF3.6 */
        background-image: -ms-linear-gradient(right, #e9eff5, #ffffff);
        /* IE10 */
        background-image: -o-linear-gradient(right, #e9eff5, #ffffff);
        /* Opera 11.10+ */
        background-image: linear-gradient(right, #e9eff5, #ffffff);
    }

    .users .person.active-user {
        background-color: #ffffff;
        /* Fallback Color */
        background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f9fb), to(#ffffff));
        /* Saf4+, Chrome */
        background-image: -webkit-linear-gradient(right, #f7f9fb, #ffffff);
        /* Chrome 10+, Saf5.1+, iOS 5+ */
        background-image: -moz-linear-gradient(right, #f7f9fb, #ffffff);
        /* FF3.6 */
        background-image: -ms-linear-gradient(right, #f7f9fb, #ffffff);
        /* IE10 */
        background-image: -o-linear-gradient(right, #f7f9fb, #ffffff);
        /* Opera 11.10+ */
        background-image: linear-gradient(right, #f7f9fb, #ffffff);
    }

    .users .person:last-child {
        border-bottom: 0;
    }

    .users .person .user {
        display: inline-block;
        position: relative;
        margin-right: 10px;
    }

    .users .person .user img {
        width: 48px;
        height: 48px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
    }

    .users .person .user .status {
        width: 10px;
        height: 10px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
        background: #e6ecf3;
        position: absolute;
        top: 0;
        right: 0;
    }

    .users .person .user .status.online {
        background: #9ec94a;
    }

    .users .person .user .status.offline {
        background: #c4d2e2;
    }

    .users .person .user .status.away {
        background: #f9be52;
    }

    .users .person .user .status.busy {
        background: #fd7274;
    }

    .users .person p.name-time {
        font-weight: 600;
        font-size: .85rem;
        display: inline-block;
    }

    .users .person p.name-time .time {
        font-weight: 400;
        font-size: .7rem;
        text-align: right;
        color: #8796af;
    }

    @media (max-width: 767px) {
        .users .person .user img {
            width: 30px;
            height: 30px;
        }
        .users .person p.name-time {
            display: none;
        }
        .users .person p.name-time .time {
            display: none;
        }
    }


    /************************************************
        ************************************************
                                        Chat right side
        ************************************************
    ************************************************/

    .selected-user {
        width: 100%;
        padding: 0 15px;
        min-height: 64px;
        line-height: 64px;
        border-bottom: 1px solid #e6ecf3;
        -webkit-border-radius: 0 3px 0 0;
        -moz-border-radius: 0 3px 0 0;
        border-radius: 0 3px 0 0;
    }

    .selected-user span {
        line-height: 100%;
    }

    .selected-user span.name {
        font-weight: 700;
    }

    .chat-container {
        position: relative;
        position: relative;
    height: 100%;
    flex-wrap: wrap;
    display: flex;
}
    }
    ul.chat-box.chatContainerScroll {
    width: 100%;
}

    .chat-container li img {
        width: 48px;
        height: 48px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        border-radius: 30px;
    }

    .chat-container li .chat-avatar {
        margin-right: 20px;
    }

    .chat-container li.chat-right {
        justify-content: flex-end;
    }

    .chat-container li.chat-right > .chat-avatar {
        margin-left: 20px;
        margin-right: 0;
    }

    .chat-container li .chat-name {
        font-size: .75rem;
        color: #999999;
        text-align: center;
    }

    .chat-container li .chat-text {
        padding: .4rem 1rem;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    background: #468486;
    font-weight: 300;
    line-height: 150%;
    position: relative;
    color: #fff;
    width: 50%;
    }

    .chat-container li .chat-text:before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        top: 10px;
        left: -20px;
        border: 10px solid;
        border-color: transparent #ffffff transparent transparent;
    }

    .chat-container li.chat-right > .chat-text {
        text-align: right;
    margin-left: auto;
    margin-right: 0;
    }

    .chat-container li.chat-right > .chat-text:before {
        right: -20px;
        border-color: transparent transparent transparent #ffffff;
        left: inherit;
    }





    @media (max-width: 767px) {
        .chat-container li.chat-left,
        .chat-container li.chat-right {
            flex-direction: column;
            margin-bottom: 30px;
        }
        .chat-container li img {
            width: 32px;
            height: 32px;
        }
        .chat-container li.chat-left .chat-avatar {
            margin: 0 0 5px 0;
            display: flex;
            align-items: center;
        }
        .chat-container li.chat-left .chat-hour {
            justify-content: flex-end;
        }
        .chat-container li.chat-left .chat-name {
            margin-left: 5px;
        }
        .chat-container li.chat-right .chat-avatar {
            order: -1;
            margin: 0 0 5px 0;
            align-items: center;
            display: flex;
            justify-content: right;
            flex-direction: row-reverse;
        }
        .chat-container li.chat-right .chat-hour {
            justify-content: flex-start;
            order: 2;
        }
        .chat-container li.chat-right .chat-name {
            margin-right: 5px;
        }
        .chat-container li .chat-text {
            font-size: .8rem;
        }
    }

    .chat-form {
        padding: 15px;
        width: 100%;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ffffff;
        border-top: 1px solid white;
    }

    ul.chat-box.chatContainerScroll li:last-child {
    margin-bottom: 0;
}

section.chat-box-page.pb-4.section {
    height: 100vh;
}

  ul.chat-box.chatContainerScroll.w-100 {
    overflow-y: auto;
    list-style: none;
    padding: 15px 20px;
    transform: rotateX(180deg);
}
.chat-container li.chat-right  .chat-hour,
.chat-container li.chat-right  .chat-name ,
.chat-container li.chat-right .chat-avatar {
    text-align: end;
}

.chat-container li.chat-left  .chat-hour,
.chat-container li.chat-left  .chat-name ,
.chat-container li.chat-left .chat-avatar {
    text-align: left;
}
.chat-box.chatContainerScroll li {
    border-bottom: 1px solid #47525d;
    padding: 10px 0;
    transform: rotateX(180deg);
}


/*
 *  STYLE 1
 */

 .chat-box.chatContainerScroll::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

.chat-box.chatContainerScroll::-webkit-scrollbar
{
	width: 5px;
	background-color: #F5F5F5;
}

.chat-box.chatContainerScroll::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #468486;
}


</style>
@endpush


@push('scripts')
<script src="{{url('/js/app.js')}}"></script>
<script>




jQuery('.users li:first-child').addClass('active');



    jQuery('body').on('click','[data-receiver-id]',function(){

        jQuery('[data-receiver-id]').removeClass('active');
        jQuery(this).addClass('active');

        getMessageList();

    });

    getMessageList();

    function getMessageList(){
        jQuery('.chatContainerScroll').height(jQuery('div#chat-card-box').height()-jQuery('form#chatBox').height()-(parseInt(jQuery('.chatContainerScroll').css('margin-bottom'))*2)+1);
        axios.post('{{route("chat.get.message")}}',{
            receiverID: jQuery('[data-receiver-id].active').attr('data-receiver-id'),
        }) .then(function (response) {

            jQuery('ul.chat-box.chatContainerScroll li').remove()
            jQuery.each(response.data,function(k,v){
                console.log(v.sender.avatar)
                if(v.message_user == 'sender'){
                    jQuery('ul.chat-box.chatContainerScroll').prepend('<li class="chat-right">'+
                    '<div class="chat-avatar">'+
                        '<img src="'+v.sender.avatar+'" alt="Retail Admin">'+
                        '<div class="chat-name">'+v.sender.full_name+'</div>'+
                        '</div>'+
                        '<div class="chat-text">'+v.message+'</div>'+
                        '<div class="chat-hour">'+v.date+'</div>'+
                        '</li>');
                }else{
                    jQuery('ul.chat-box.chatContainerScroll').prepend('<li class="chat-left">'+
                    '<div class="chat-avatar">'+
                        '<img src="'+v.sender.avatar+'" alt="Retail Admin">'+
                        '<div class="chat-name">'+v.sender.full_name+'</div>'+
                        '</div>'+
                        '<div class="chat-text">'+v.message+'</div>'+
                        '<div class="chat-hour">'+v.date+'</div>'+
                        '</li>');
                }

            })
            console.log();
        })
        .catch(function (error) {

            console.log(error);
        }).then(function () {

        });
    }


    window.Echo.private('App.User.{{Auth::ID()}}')
    .listen('.chat', function (e) {

        var _data = JSON.parse(JSON.stringify (e)).data;

        var _active_class;
        if(  jQuery('[data-receiver-id="'+_data.receiver.id+'"]').hasClass('active')){
          _active_class = 'active';
        }
        jQuery('[data-receiver-id="'+_data.receiver.id+'"]').remove()

        jQuery('ul.users').prepend('<li class="person '+_active_class+'" data-receiver-id="'+_data.receiver.id+'" data-chat="person1">'+
                                    '<div class="user">'+
                                        '<img src="'+_data.receiver.avatar+'" alt="'+_data.receiver.full_name+'">'+
                                    '</div>'+
                                    '<p class="name-time">'+
                                        '<span class="name">'+_data.receiver.full_name+'</span>'+
                                        '<span class="time">'+_data.chat.date+'</span>'+
                                        '</p>'+
                                    '</li>');


        jQuery('ul.chat-box.chatContainerScroll').prepend('<li class="chat-left">'+
                    '<div class="chat-avatar">'+
                        '<img src="'+_data.receiver.avatar+'" alt="'+_data.receiver.full_name+'">'+
                        '<div class="chat-name">'+_data.receiver.full_name+'</div>'+
                        '</div>'+
                        '<div class="chat-text">'+_data.chat.message+'</div>'+
                        '<div class="chat-hour">'+_data.chat.date+'</div>'+
                        '</li>');


           console.log(_data)

    });

    $('#message-box').keypress(function(event) {
        if(event.which == 13) {

            axios.post('{{route("chat.send.message")}}',{
                    senderID: jQuery('[data-receiver-id].active').attr('data-receiver-id'),
                    message: jQuery('#message-box').val()
                })
                .then(function (response) {


                    jQuery('ul.chat-box.chatContainerScroll').prepend('<li class="chat-right">'+
                    '<div class="chat-avatar">'+
                        '<img src="'+response.data.user.avatar+'" alt="Retail Admin">'+
                        '<div class="chat-name">'+response.data.user.full_name+'</div>'+
                        '</div>'+
                        '<div class="chat-text">'+response.data.chat.message+'</div>'+
                        '<div class="chat-hour">'+response.data.chat.date+'</div>'+
                        '</li>');

                        jQuery('#message-box').val('')
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
                event.preventDefault();
        }
    });


</script>
@endpush
