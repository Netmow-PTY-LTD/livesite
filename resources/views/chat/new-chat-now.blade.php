<?php
  $app_url  = config('app.apps_url');
  $imgname  = \App\Model\Business::where('uid', $uid)->first()->logo_image;
  $imgpath  = $app_url."/images/business_logo/".$imgname;
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Live Chat</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="csrf-token" content="{{ csrf_token() }}">
    	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700&display=swap" rel="stylesheet">
    </head>
    <style type="text/css">
        @import "https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500;600;700;800;900&display=swap"; /* Using a string */
        html, body {
            margin: 0;
            height: 100%;
            overflow: hidden;
        }
        .fabs {
            font-family: 'Poppins', sans-serif;
            position: relative;
            height: 100%;
        }
        .fab {
            font-family: 'Poppins', sans-serif;
            display: block;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            text-align: center;
            color: #f0f0f0;
            margin: 25px auto 0;
            box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
            cursor: pointer;
            -webkit-transition: all .1s ease-out;
            transition: all .1s ease-out;
            position: relative;
            z-index: 998;
            overflow: hidden;
            background: #42a5f5;
        }
        
        .fab img {
            max-height: 25px;
            max-width: 25px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
        }
        
        .fab > i {
          font-size: 2em;
          line-height: 55px;
          -webkit-transition: all .2s ease-out;
          -webkit-transition: all .2s ease-in-out;
          transition: all .2s ease-in-out;
        }
        
        .fab:not(:last-child) {
          width: 0;
          height: 0;
          margin: 20px auto 0;
          opacity: 0;
          visibility: hidden;
          line-height: 40px;
        }
        
        .fab:not(:last-child) > i {
          font-size: 1.4em;
          line-height: 40px;
        }
        
        .fab:not(:last-child).is-visible {
          width: 40px;
          height: 40px;
          margin: 15px auto 10;
          opacity: 1;
          visibility: visible;
        }
        
        .fab:nth-last-child(1) {
            -webkit-transition-delay: 25ms;
            transition-delay: 25ms;
        }
        
        .fab:not(:last-child):nth-last-child(2) {
            -webkit-transition-delay: 20ms;
            transition-delay: 20ms;
        }
        
        .fab:not(:last-child):nth-last-child(3) {
            -webkit-transition-delay: 40ms;
            transition-delay: 40ms;
        }
        
        .fab:not(:last-child):nth-last-child(4) {
            -webkit-transition-delay: 60ms;
            transition-delay: 60ms;
        }
        
        .fab:not(:last-child):nth-last-child(5) {
            -webkit-transition-delay: 80ms;
            transition-delay: 80ms;
        }
        
        .fab(:last-child):active,
        .fab(:last-child):focus,
        .fab(:last-child):hover {
            box-shadow: 0 0 6px rgba(0, 0, 0, .16), 0 6px 12px rgba(0, 0, 0, .32);
        }
        .chat {
            position: relative;
            width: 100%;
            height: calc(100% - 51px);
            opacity: 0;
            -webkit-transition: all .2s ease-out;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            display: none;
        }
        .chat_fullscreen {
            position: fixed;
            right: 0px;
            bottom: 0px;
            top: 0px;
        }
        #chat_head {
            width:100%;
            overflow :hidden;
            font-family: 'Poppins', sans-serif;
        }
        .chat_header2 {
              /* margin: 10px; */
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }
        .chat_fullscreen_loader {
            display: none;
            float: right;
            cursor: pointer;
            font-size: 20px;
            opacity: 0.5;
            margin: -10px 10px;
        }
        
        .chat.is-visible {
            opacity: 1;
            -webkit-animation: zoomIn .2s cubic-bezier(.42, 0, .58, 1);
            animation: zoomIn .2s cubic-bezier(.42, 0, .58, 1);
            display:block !important;
        }
        .is-hide{
            opacity: 0;
            display:none !important;
        }
        .chat_option {
            float: left;
            font-size: 15px;
            list-style: none;
            position: relative;
            height: 100%;
            width: 100%;
            text-align: relative;
            margin-right: 10px;
            letter-spacing: 0.5px;
            font-weight: 400
        }
        .chat_option img {
            /*border-radius: 50%;*/
            width: 45px;
            height: 45px;
            float: left;
            margin: -30px 20px 10px 20px;
            border: 4px solid rgba(0, 0, 0, 0.21);
            background: white;
            padding: 5px;
        }
        
        .change_img img{
            width: 35px;
            margin: 0px 20px 0px 20px;
        }
        .chat_option .agent {
          font-size: 12px;
            font-weight: 300;
            font-family: 'Poppins', sans-serif;
        }
        .chat_option .online{
              opacity: 0.4;
            font-size: 11px;
            font-weight: 300;
        }
        .chat_color {
          display: block;
          width: 20px;
          height: 20px;
          border-radius: 50%;
          margin: 10px;
          float: left;
        }
        
        
        .chat_body {
            background: #fff;
            width: 100%;
            display: inline-block;
            text-align: center;
            overflow-y: auto;
        }
        #chat_body{
            height: 450px;
        }
        .chat_login p, .chat_body li, p, a{
            -webkit-animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
            animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
        }
        .chat_body p {
            padding: 20px;
            color: #888
        }
        .chat_body a {
            width: 10%;
            text-align: center;
            border: none;
            box-shadow: none;
            line-height: 40px;
            font-size: 15px;
        }
        
        .chat_field {
            position: relative;
            margin: 5px 0 5px 0;
            width: 50%;
            font-family: 'Roboto';
            font-size: 12px;
            line-height: 30px;
            font-weight: 500;
            color: #4b4b4b;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            border: none;
            outline: none;
            display: inline-block;
        }
        
        .chat_field.chat_message {
            font-family: 'Poppins', sans-serif;
            height: 30px;
            resize: none;
            font-size: 13px;
            font-weight: 400;
            overflow-x: hidden;
            overflow-y: hidden;
            width: calc(100% - 151px);
        }
        .chat_category{
            text-align: left;
        }
        .chat_category{
            margin: 20px;
            background: rgba(0, 0, 0, 0.03);
            padding: 10px;
        }
        
        .chat_category ul li{
            width: 80%;
            height: 30px;
            background: #fff;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #e0e0e0;
            font-size: 13px;
            cursor: pointer;
            line-height: 30px;
            color: #888;
            text-align: center;
        }
        
        .chat_category li:hover{
            background: #83c76d;
            color: #fff;
        }
        .chat_category li.active{
            background: #83c76d;
            color: #fff;
        }
        
        .tags{
            margin: 20px;
            bottom: 0px;
            display: block;
            width: 120%
        }
        .tags li{
            padding: 5px 10px;
            border-radius: 40px;
            border: 1px solid rgb(3, 117, 208);
            margin: 5px;
            display: inline-block;
            color: rgb(3, 117, 208);
            cursor: pointer;
        
        }
        .fab_field {
            width: 100%;
            display: inline-block;
            text-align: center;
            background: #fff;
            position: relative;
        }
        
        .fab_field a {
            display: inline-block;
            text-align: center;
        }
        
        #fab_camera {
            float: left;
            background: rgba(0, 0, 0, 0);
        }
        
        #fab_send {
            float: right;
            background: rgba(0, 0, 0, 0);
        }
        
        .fab_field .fab {
            width: 35px;
            height: 35px;
            box-shadow: none;
            margin: 5px;
        }
        
        #prime span.chatbox {
            max-height: 25px;
            max-width: 25px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            /*background-color: white !important;*/
            z-index: 9999999999;
            height: 25px;
            width: 25px;
            background-image: url("{{config('app.cdn_url')}}/images/chat/chat.png");
        }
        
        #prime span.chatbox_close {
            max-height: 25px;
            max-width: 25px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            /*background-color: white !important;*/
            z-index: 9999999999;
            height: 25px;
            width: 25px;
            background-image: url("{{config('app.cdn_url')}}/images/chat/close.png");
        }
        
        #fab_send span.send{
            max-height: 25px;
            max-width: 25px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            /*background-color: white !important;*/
            z-index: 9999999999;
            height: 25px;
            width: 25px;
            background-image: url("{{config('app.cdn_url')}}/images/chat/send.png");   
        }
        
        #fab_camera span.camera{
            max-height: 25px;
            max-width: 25px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            /*background-color: white !important;*/
            z-index: 9999999999;
            height: 25px;
            width: 25px;
            background-image: url("{{config('app.cdn_url')}}/images/chat/camera.png");   
        }
        
        #fab_call span.call{
            max-height: 25px;
            max-width: 25px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            /*background-color: white !important;*/
            z-index: 9999999999;
            height: 25px;
            width: 25px;
            background-image: url("{{config('app.cdn_url')}}/images/chat/call.png");   
        }
        
        #fab_call {
            background-color: transparent;
        }
        
        .fab_field .fab>i {
          font-size: 1.6em;
          line-height: 35px;
          color: #bbb;
        }
        .fab_field .fab>i:hover {
          color: #42a5f5;
        }
        .chat_conversion {
        
        }
        .chat_converse {
            font-family: 'Poppins', sans-serif;
            position: relative;
            font-size: 10px;
            line-height: 18px;
            overflow-y: auto;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            padding: 10px 0;
        }
        .chat_converse2{
            height: 100%;
            max-height: 800px
        }
        .chat_list {
            opacity: 0;
            visibility: hidden;
            height: 0;
        }
        
        .chat_list .chat_list_item {
            opacity: 0;
            visibility: hidden;
        }
        
        .chat .chat_converse .chat_msg_item {
            position: relative;
            word-wrap: break-word;
            -webkit-animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
            animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
            clear: both;
            z-index: 999;
            padding: 0 10px;
            display: flex;
            flex-flow: wrap row;
            align-items: center;
            margin-top: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        .chat_msg_item.chat_msg_item_user {
            justify-content: flex-end;
        }
        .miyn-chat-avatar-label {
            background-color: rgba(0, 0, 0, 0.03);
            padding: 8px 10px;
            display: inline-block;
            border-radius: 3px;
            margin-left: 10px;
        }
        .status {
            font-size: 10px;
            opacity: 0.3;
            display: block;
            clear: both;
            text-align: right;
            margin: 2px 55px 0 0;
        }
        .status2 {
            margin: 0 20px 0 0;
            /*float: right;*/
            display: block;
            font-size: 10px;
            opacity: 0.3;
            text-align: left;
        }
        .status2 {
            clear: both;
            margin-left: 60px;
        }
        .chat .chat_converse .chat_msg_item.chat_msg_item_admin .chat_avatar {
            background: rgba(0, 0, 0, 0.03);
            width: 30px;
            height: 30px;
            border: 1px solid #f3f1f1;
            align-self: flex-end;
        }
        
        .chat .chat_converse .chat_msg_item.chat_msg_item_user .chat_avatar {
            background: #ffffff;
            order: 2;
            width: 30px;
            height: 30px;
            justify-content: center;
            align-items: center;
            display: flex;
            align-self: flex-end;
        }
        .chat .chat_converse .chat_msg_item .chat_avatar, .chat_avatar img {
            width: 26px;
            height: 25px;
            text-align: center;
            border-radius: 50%;
            padding: 2px;
        }
        .chat .chat_converse .chat_msg_item_user .miyn-live-chat-message {
            background: rgba(2, 0, 0, 0.5);
            color: #eceff1;
            padding: 8px 10px;
            border-radius: 3px;
            margin-right: 10px;
            max-width: calc(80% - 65px);
        }
        
        .miyn-live-chat-message img {
            max-width: 100%;
        }
        
        .chat .chat_converse .chat_msg_item.chat_msg_item_admin .miyn-live-chat-message {
            background: rgba(0, 0, 0, 0.03);
            color: #666;
            padding: 8px 10px;
            border-radius: 3px;
            margin-left: 10px;
            max-width: calc(80% - 65px);
        }
        .chat_form .get-notified label{
            color: #077ad6;
            font-weight: 600;
            font-size: 11px;
        }
        
        input.msgbox {
          position: relative;
          /*width: 90%;*/
          font-family: 'Roboto';
          font-size: 12px;
          line-height: 20px;
          font-weight: 500;
          color: #4b4b4b;
          -webkit-font-smoothing: antialiased;
          font-smoothing: antialiased;
          outline: none;
          background: #fff;
          display: inline-block;
          resize: none;
          padding: 5px;
          border-radius: 3px;
        }
        .chat_form .get-notified input {
          margin: 2px 0 0 0;
          border: 1px solid #83c76d;
        }
        .chat_form .get-notified i {
            background: #83c76d;
            width: 30px;
            height: 32px;
            font-size: 18px;
            color: #fff;
            line-height: 30px;
            font-weight: 600;
            text-align: center;
            margin: 2px 0 0 -30px;
            position: absolute;
            border-radius: 3px;
        }
        .chat_form .message_form {
          margin: 10px 0 0 0;
        }
        /*.chat_form .message_form input{
          margin: 5px 0 5px 0;
          border: 1px solid #e0e0e0;
        }*/
        .chat_form .message_form input{
          margin: 5px 0 5px 0;
          border: 1px solid #e0e0e0;
          position: relative;
          width: 90%;
          font-family: 'Roboto';
          font-size: 12px;
          line-height: 20px;
          font-weight: 500;
          color: #4b4b4b;
          -webkit-font-smoothing: antialiased;
          font-smoothing: antialiased;
          outline: none;
          background: #fff;
          display: inline-block;
          resize: none;
          padding: 5px;
          border-radius: 3px;
        }
        .chat_form .message_form button{
            margin: 5px 0 5px 0;
            border: 1px solid #e0e0e0;
            position: relative;
            width: 95%;
            font-family: 'Roboto';
            font-size: 12px;
            line-height: 20px;
            font-weight: 500;
            color: #fff;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            outline: none;
            background: #fff;
            display: inline-block;
            resize: none;
            padding: 5px;
            border-radius: 3px;
            background: #83c76d;
            cursor: pointer;
        }
        strong.chat_time {
          padding: 0 1px 1px 0;
          font-weight: 500;
          font-size: 8px;
          display: block;
        }
        
        #fab_call {
            float: left;
            margin-left: -4px;
        }
        
        /*Chatbox scrollbar*/
        
        ::-webkit-scrollbar {
          width: 6px;
        }
        
        ::-webkit-scrollbar-track {
          border-radius: 0;
        }
        
        ::-webkit-scrollbar-thumb {
          margin: 2px;
          border-radius: 10px;
          background: rgba(0, 0, 0, 0.2);
        }
        /*Element state*/
        
        .is-active {
          -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
          -webkit-transition: all 1s ease-in-out;
          transition: all 1s ease-in-out;
        }
        
        .is-float {
          box-shadow: 0 0 6px rgba(0, 0, 0, .16), 0 6px 12px rgba(0, 0, 0, .32);
        }
        
        .is-loading {
          display: block;
          -webkit-animation: load 1s cubic-bezier(0, .99, 1, 0.6) infinite;
          animation: load 1s cubic-bezier(0, .99, 1, 0.6) infinite;
        }
        /*Animation*/
        
        @-webkit-keyframes zoomIn {
          0% {
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 0.0;
          }
          100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1;
          }
        }
        
        @keyframes zoomIn {
          0% {
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 0.0;
          }
          100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1;
          }
        }
        
        @-webkit-keyframes load {
          0% {
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 0.0;
          }
          50% {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
            opacity: 1;
          }
          100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 0;
          }
        }
        
        @keyframes load {
          0% {
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 0.0;
          }
          50% {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
            opacity: 1;
          }
          100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 0;
          }
        }
        /*Color Options*/
        .blue .fab {
            background: #42a5f5;
            color: #fff;
        }
        .blue .chat {
            background: #42a5f5;
            color: #999;
        }
        
        
        /* Ripple */
        .ink {
            display: block;
            position: absolute;
            background: rgba(38, 50, 56, 0.4);
            border-radius: 100%;
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            webkit-transform: scale(0);
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        .ink.animate {
            -webkit-animation: ripple 0.5s ease-in-out;
            animation: ripple 0.5s ease-in-out;
        }
        
        @-webkit-keyframes ripple {
            100% {
                opacity: 0;
                -moz-transform: scale(5);
                -ms-transform: scale(5);
                webkit-transform: scale(5);
                -webkit-transform: scale(5);
                transform: scale(5);
            }
        }
        
        @keyframes ripple {
            100% {
                opacity: 0;
                -moz-transform: scale(5);
                -ms-transform: scale(5);
                webkit-transform: scale(5);
                -webkit-transform: scale(5);
                transform: scale(5);
            }
        }
        ::-webkit-input-placeholder { /* Chrome */
            color: #bbb;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: #bbb;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: #bbb;
        }
        :-moz-placeholder { /* Firefox 4 - 18 */
            color: #bbb;
        }
        .infobox {
            max-width: 300px;
            margin: 15px 15px 0;
        }
        
        .infobox label {
            display: block;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 500;
        }
        
        .infobox label:not(:first-child) {
            margin-top: 10px;
        }
        
        .infobox > input {
            position: relative;
            width: 90%;
            font-family: 'Roboto';
            font-size: 12px;
            line-height: 17px;
            font-weight: 500;
            color: #4b4b4b;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            outline: none;
            background: #fff;
            display: inline-block;
            resize: none;
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #e1e1e1;
            border: 1px solid #ffffff;
            background-color: #ffffff;
            border-radius: 2px;
            font-family: 'Poppins', sans-serif;
            color: #8A8A8A;
            font-size: 12px;
            padding: 10px;
            max-width: 100%;
            width: 100%;
            display: block;
            box-sizing: border-box;
        }
        
        .infobox > button {
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            background-color: <?php echo $livesitestyleinfo[0]->action_background_color; ?>;
            border-radius: 2px;
            color: #ffffff;
            font-size: 12px;
            line-height: 35px;
            min-width: 100px;
            text-align: center;
            font-weight: 500;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            font-family: 'Poppins', sans-serif;
        }
        
        .infobox label > span {
            float: right;
            margin-right: 50px;
            color: red;
        }
        
        
        
        /* Upload progress bar */
        #progress-wrp {
            border: 1px solid #0099CC;
            padding: 1px;
            position: absolute;
            height: 23px;
            border-radius: 3px;
            margin-left: 5%;
            width: 90%;
            background: #fff;
            top: -30px;
            box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
            display:none;
        }
        
        #progress-wrp .progress-bar {
          height: 100%;
          border-radius: 3px;
          background-color: #f39ac7;
          width: 0;
          box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
        }
        
        #progress-wrp .status {
          top: 3px;
          left: 50%;
          position: absolute;
          display: inline-block;
          color: #000000;
        }
        
        /* LOADER */
         .loader {
            z-index: 9999;
            margin: 0;
            position: relative;
        }
        
        .loader::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{config('app.cdn_url')}}/images/loader.gif") 50% 50% no-repeat rgb(249,249,249);
            background-position: center;
            opacity: 0.8;
        }
        
        
        .chat-ringging-btn {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background: rgba(255, 255, 255, 0.9);
            z-index: 999;
            display:none;
        }
        
        .chat-ringging-btn-dis-none {
            display: none
        }
        .chat-ringging-btn-dis-flex {
            display: flex
        }
        
        
        .chat-ringging-status {
            margin-top: -100px;
            margin-bottom: 30px;
            text-transform: uppercase;
            color: #2DB9EB;
        }
        
        .chat-ringging-btn .chat-btns a {
            font-size: 12px;
            color: #fff;
            background-color: #4CAF50;
            text-decoration: none;
            padding: 4px 10px;
            width: 64px;
            margin-right: 10px;
            display: inline-block;
            text-align: center;
        }
        
        .chat-ringging-btn .chat-reject-btn {
            background-color: #F44336 !important;
            margin-left: 10px;
        }
        
                
        
    </style>

    <body class="loader">
        <div class="fabs miyn-chat-box-area">
            <div class="chat is-visible">
                <audio id="audio" src="{{config('app.live_url')}}/audio/beep-07.wav" autoplay="false" style="display:none;"></audio>
                <div id="chat_fullscreen" class="chat_conversion chat_converse" style="display: block;">
                    <div class="miyn-chat-box-form">
                        
                        <div class="chat_msg_item chat_msg_item_admin">
                            <div class="chat_avatar"><img src="<?php echo $imgpath; ?>"></div>
                            <div class="miyn-chat-avatar-label">Hey there! Any question?</div>
                        </div>
                        <!--- start box -->
                        <!--<div class="infobox miyn-infobox-form-area">
                            <label>Name <span class="usererror"> </span> </label>
                            <input type="hidden" id="chatuseruid" name="chatuseruid" value="6590bff766e62909">
                            <input type="text" id="chatname" name="chatname" class="chatname" placeholder="Enter your name">
                            <label>Email <span class="emailerror"> </span> </label>
                            <input type="email" id="chatemail" class="chatemail" pattern="[^ @]*@[^ @]*" placeholder="Enter your email"> 
                            <button id="btnchatsubmit"> Submit </button>
                        </div>-->
                        <!--- end box -->
                        
                    </div>
                    
                    <div class="miyn-live-chat-contents-area">
                        
                       

                    </div>
                </div>
            </div>
            <div class="chat-ringging-btn">
                <span class="chat-ringging-status">Ringging ..</span>
                <div class="chat-btns">
                    <a class="chat-accept-btn" href="">Accecpt</a>
                    <a href="javascript:void(0)" class="chat-reject-btn">Reject</a>
                </div>
                
            </div>
            <div class="fab_field">
                <a id="fab_camera" class="fab is-visible"><span class="camera"></span></a>
                <a id="fab_send" class="fab is-visible"><span class="send"></span></a>
                <a id="fab_call" class="fab is-visible"><span class="call"></span></a>
                <input id="chatSend" name="chat_message" placeholder="Message" class="chat_field chat_message msgbox" onkeypress="MIYNTalk.onTestChange(event);" disabled="" autocomplete="off">
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        
<script>
var Intercom=function(){var t=function(){};t.createInterface=function(t){return{on:function(e,n){void 0===this[t]&&(this[t]={}),this[t].hasOwnProperty(e)||(this[t][e]=[]),this[t][e].push(n)},off:function(e,n){void 0!==this[t]&&this[t].hasOwnProperty(e)&&o.removeItem(n,this[t][e])},trigger:function(e){if(void 0!==this[t]&&this[t].hasOwnProperty(e))for(var n=Array.prototype.slice.call(arguments,1),i=0;i<this[t][e].length;i++)this[t][e][i].apply(this[t][e][i],n)}}};var e=t.createInterface("_handlers");t.prototype._on=e.on,t.prototype._off=e.off,t.prototype._trigger=e.trigger;var n=t.createInterface("handlers");t.prototype.on=function(){n.on.apply(this,arguments),Array.prototype.unshift.call(arguments,"on"),this._trigger.apply(this,arguments)},t.prototype.off=n.off,t.prototype.trigger=n.trigger;var i=window.localStorage;void 0===i&&(i={getItem:function(){},setItem:function(){},removeItem:function(){}});var o={},r=function(){return(65536*(1+Math.random())|0).toString(16).substring(1)};o.guid=function(){return r()+r()+"-"+r()+"-"+r()+"-"+r()+"-"+r()+r()+r()},o.throttle=function(t,e){var n=0;return function(){var i=(new Date).getTime();i-n>t&&(n=i,e.apply(this,arguments))}},o.extend=function(t,e){if(void 0!==t&&t||(t={}),"object"==typeof e)for(var n in e)e.hasOwnProperty(n)&&(t[n]=e[n]);return t},o.removeItem=function(t,e){for(var n=e.length-1;0<=n;n--)e[n]===t&&e.splice(n,1);return e};var a=function(){var t=this,e=(new Date).getTime();this.origin=o.guid(),this.lastMessage=e,this.bindings=[],this.receivedIDs={},this.previousValues={},e=function(){t._onStorageEvent.apply(t,arguments)},window.attachEvent?document.attachEvent("onstorage",e):window.addEventListener("storage",e,!1)};a.prototype._transaction=function(t){var e=this,n=!1,o=!1,r=null,a=function(){if(!n){var s=(new Date).getTime(),c=parseInt(i.getItem(p)||0);c&&1e3>s-c?(o||(e._on("storage",a),o=!0),r=window.setTimeout(a,20)):(n=!0,i.setItem(p,s),t(),o&&e._off("storage",a),r&&window.clearTimeout(r),i.removeItem(p))}};a()},a.prototype._cleanup_emit=o.throttle(100,function(){this._transaction(function(){for(var t=(new Date).getTime()-f,e=0,n=JSON.parse(i.getItem(s)||"[]"),o=n.length-1;0<=o;o--)n[o].timestamp<t&&(n.splice(o,1),e++);0<e&&i.setItem(s,JSON.stringify(n))})}),a.prototype._cleanup_once=o.throttle(100,function(){var t=this;this._transaction(function(){var e,n=JSON.parse(i.getItem(c)||"{}");(new Date).getTime();var o=0;for(e in n)t._once_expired(e,n)&&(delete n[e],o++);0<o&&i.setItem(c,JSON.stringify(n))})}),a.prototype._once_expired=function(t,e){if(!e||!e.hasOwnProperty(t)||"object"!=typeof e[t])return!0;var n=e[t].ttl||u,i=(new Date).getTime();return e[t].timestamp<i-n},a.prototype._localStorageChanged=function(t,e){if(t&&t.key)return t.key===e;var n=i.getItem(e);return n!==this.previousValues[e]&&(this.previousValues[e]=n,!0)},a.prototype._onStorageEvent=function(t){t=t||window.event;var e=this;this._localStorageChanged(t,s)&&this._transaction(function(){for(var t=(new Date).getTime(),n=i.getItem(s),o=(n=JSON.parse(n||"[]"),0);o<n.length;o++)if(n[o].origin!==e.origin&&!(n[o].timestamp<e.lastMessage)){if(n[o].id){if(e.receivedIDs.hasOwnProperty(n[o].id))continue;e.receivedIDs[n[o].id]=!0}e.trigger(n[o].name,n[o].payload)}e.lastMessage=t}),this._trigger("storage",t)},a.prototype._emit=function(t,e,n){if((n="string"==typeof n||"number"==typeof n?String(n):null)&&n.length){if(this.receivedIDs.hasOwnProperty(n))return;this.receivedIDs[n]=!0}var o={id:n,name:t,origin:this.origin,timestamp:(new Date).getTime(),payload:e},r=this;this._transaction(function(){var n=[(n=i.getItem(s)||"[]").substring(0,n.length-1),"[]"===n?"":",",JSON.stringify(o),"]"].join("");i.setItem(s,n),r.trigger(t,e),window.setTimeout(function(){r._cleanup_emit()},50)})},a.prototype.bind=function(t,e){for(var n=0;n<a.bindings.length;n++){var i=a.bindings[n].factory(t,e||null,this);i&&this.bindings.push(i)}},a.prototype.emit=function(t,e){this._emit.apply(this,arguments),this._trigger("emit",t,e)},a.prototype.once=function(t,e,n){if(a.supported){var o=this;this._transaction(function(){var r=JSON.parse(i.getItem(c)||"{}");o._once_expired(t,r)&&(r[t]={},r[t].timestamp=(new Date).getTime(),"number"==typeof n&&(r[t].ttl=1e3*n),i.setItem(c,JSON.stringify(r)),e(),window.setTimeout(function(){o._cleanup_once()},50))})}},o.extend(a.prototype,t.prototype),a.bindings=[],a.supported=void 0!==i;var s="intercom",c="intercom_once",p="intercom_lock",f=5e4,u=36e5;a.destroy=function(){i.removeItem(p),i.removeItem(s),i.removeItem(c)};var g=null;a.getInstance=function(){return g||(g=new a),g};var h=function(t,e,n){if((e=o.extend({id:null,send:!0,receive:!0},e)).receive){var i,r=[],a=function(i){-1===r.indexOf(i)&&(r.push(i),t.on(i,function(t){var o="function"==typeof e.id?e.id(i,t):null,r="function"!=typeof e.receive||e.receive(i,t);(r||"boolean"!=typeof r)&&n._emit(i,t,o)}))};for(i in n.handlers)for(var s=0;s<n.handlers[i].length;s++)a(i,n.handlers[i][s]);n._on("on",a)}e.send&&n._on("emit",function(n,i){var o="function"!=typeof e.send||e.send(n,i);(o||"boolean"!=typeof o)&&t.emit(n,i)})};return h.factory=function(t,e,n){return void 0!==t.socket&&new h(t,e,n)},a.bindings.push(h),a}();   
</script>  

<script>
! function() {
    "use strict";
    
    var _t       = MIYNTalk,
        config      = {},
        info        = [],
        protocl    = 'https://',
        livesite    = "{{config('app.live_url')}}",
        clientsite  = "{{config('app.client_url')}}",
        apisite     = "{{config('app.api_url')}}",
        appsite     = "{{config('app.apps_url')}}",
        is_online   = 0,
        is_dataavailable = 0,
        chatuserid = '',
        chatusername = '',
        intervalSource = 1000,
        isSourceneedClose = true,
        source      = null,
        newmessageurl = '',
        newmessageboxurl = '',
        newfileurl = '',
        evtmessageurl = '',
        newmessagesendurl = '',
        currenttimezone = Intl.DateTimeFormat().resolvedOptions().timeZone,
        intercom = new Intercom();
        
    function MIYNTalk(options) {}
   
   	_t.init = function(_) {
       var curr = window.location.protocol + "//" +  window.location.hostname;

        var business = apisite+'/api/business_info/'+_.uid;
        //console.log(business);
		 $.ajax({
            type: 'GET',
            url: business ,
            success: function (data) {
                //console.log(data.botmessages);
                var infos = JSON.stringify(data); info = JSON.parse(infos);	config = _; config.businessinfo = info; config.currurl = curr;
            		_c.chat_avatar = appsite+'/images/business_logo/'+config.businessinfo.logo_image;
            		_c.chat_avatar_user = apisite+'/img-chat/chat-user.png';
            		
            		//console.log(_c.chat_avatar);
            		//console.log(_c.chat_avatar_user);

                    _t.initEvent();
                    
                    //if(config.ui == true) { _t.addButtons(); }
                    
                        var json = data.botmessages;
                        //_c.Fake = []; 
                        
                        $.each(json, function(idx, obj) {
                        	_c.Fake.push(obj.message);
                        });
                                            
            		/*[
                      'Hi there, I\'m fine and you?',
                      'Nice to meet you',
                      'How are you?',
                      'Not too bad, thanks',
                      'What do you do?',
                      'That\'s awesome',
                      'MIYN is a nice place to stay',
                      'I think you\'re a nice person',
                      'Why do you think that?',
                      'Can you explain?',
                      'Anyway I\'ve gotta go now',
                      'It was a pleasure chat with you',
                      'Time to make a new codepen',
                      'Bye',
                      ':)'
                    ];*/
                    
                        _t.chatuserid =  _t.getCookiee("miynchatid-"+config.businessinfo.id+"");
                        // var myJSON = JSON.stringify(_t.chatuserid);
                        
                        if(_t.chatuserid == "") {
                          _t.chatuserid = _t.generateUUID();
                          _t.setCookiee('miynchatid-'+config.businessinfo.id+'', _t.chatuserid, 30);
                            _t.liveEvent();
                        } else {
                            _t.liveEvent();
                        }
                        
                        console.log(_t.checkCookie("miynchatid-"+config.businessinfo.id+""));
                        
                        _t.chatusername = _t.getCookiee('miynusername-'+config.businessinfo.id+''); 
                        // var myJSONName = JSON.stringify(_t.chatusername);
                        
                        
                        if(_t.chatusername  == "") {
                            //console.log('Called');
                            _c.need_name_emailbox == 1
                            _c.name_email_box();
                            
                            console.log(config.is_dashboard_chat);
                            console.log(config.dashboard_chat_username);
                            
                            if(config.is_dashboard_chat == 'yes') {
                                $("#chatname").val(config.dashboard_chat_username);
                                $("#chatemail").val(config.dashboard_chat_email);
                                _c.info_submit();
                            } 
                            
                            //_c.need_name_emailbox = 0;
                            //_c.connect();
                           
                        } else {
                            _c.need_name_emailbox = 0;
                            
                            newmessageboxurl = apisite+"/api/"+config.uid+"/"+_t.chatuserid+"/newmessagebox?chatid="+_t.chatuserid;
                            newmessagesendurl = apisite+"/api/"+config.uid+"/"+_t.chatuserid+"/sendtoadmin?chatid="+_t.chatuserid;
                            _t.newMessageBox();
                            _c.connect();
                        }
                        
                        _c.text_event();
                        
                        
                        if (Intercom.supported) {
                		    intercom.on('notice', function(data) {
                		        if(data.type== 'user') {
                		            if($.trim(data.message) !="") {
                		                if(data.msg_type == "text") {
                		                    $('<div class="miyn-live-chat-row"><div class="chat_msg_item chat_msg_item_user uu"><div class="chat_avatar"><img src="'+_c.chat_avatar_user+'"></div><div class="miyn-live-chat-message">'+ _c.sanitise(data.message)+'</div></div><div class="status">'+_c.getChatTime($.trim(data.created_at))+'</div></div>').appendTo($("#chat_fullscreen"));
                                            //$('<span class="chat_msg_item chat_msg_item_user uu">'+_c.sanitise(data.message)+'</span><div class="status">'+_c.getChatTime($.trim(data.created_at))+'</div>').appendTo($("#chat_fullscreen"));
                		                } else {
                		                    $('<div class="miyn-live-chat-row"><div class="chat_msg_item chat_msg_item_user uu"><div class="chat_avatar"><img src="'+_c.chat_avatar_user+'"></div><div class="miyn-live-chat-message">'+data.message+'</div></div><div class="status">'+_c.getChatTime($.trim(data.created_at))+'</div></div>').appendTo($("#chat_fullscreen"));
                		                    // $('<span class="chat_msg_item chat_msg_item_user uu">'+data.message+'</span><div class="status">'+_c.getChatTime($.trim(data.created_at))+'</div>').appendTo($("#chat_fullscreen"));
                		                }
                		           }
                		        }
            					if(data.type== 'admin') {
            					    if($.trim(data.message) !="") {
            					        
            					        if(data.msg_type == "text") {
            					            $('<div class="miyn-live-chat-row"><div class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="'+_c.chat_avatar+'"></div> <div class="miyn-live-chat-message">' + _c.sanitise(data.message) + '</div></div><div class="status2">'+_c.getChatTime($.trim(data.created_at))+'</div></div>').appendTo($("#chat_fullscreen"));
            					            //$('<span class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="'+_c.chat_avatar+'"></div> ' + _c.sanitise(data.message) + '</span><div class="status2">'+_c.getChatTime($.trim(data.created_at))+'</div>').appendTo($("#chat_fullscreen"));
            					        } else {
            					            //$('<span class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="'+_c.chat_avatar+'"></div> ' + data.message + '</span><div class="status2">'+_c.getChatTime($.trim(data.created_at))+'</div>').appendTo($("#chat_fullscreen"));
            					            $('<div class="miyn-live-chat-row"><div class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="'+_c.chat_avatar+'"></div> <div class="miyn-live-chat-message">' + data.message + '</div></div><div class="status2">'+_c.getChatTime($.trim(data.created_at))+'</div></div>').appendTo($("#chat_fullscreen"));
            					        }
            					        
            					    }
            					 }
            					 
            					 
            					_t.updateScrollbar();
            				});
            		    } else {	console.log('Error no 100');	}
                    

            }
        });
      
    }, window.MIYNTalk = MIYNTalk;
    
    
    _t.gotActivity = function () {
      if(keepaliveTimer != null)clearTimeout(keepaliveTimer);
      keepaliveTimer = setTimeout(_t.connectevt, 30 * 1000);
    };
    
    _t.connectevt = function () {
      gotActivity();
      var es = new EventSource(apisite+"/api/"+config.uid+"/"+_t.chatuserid+"/default?chatid="+_t.chatuserid);
      es.addEventListener('message', function(e){
        _t.gotActivity();
        },false);
    };
    
    _t.liveEvent = function () {
	 	    newmessageurl = apisite+"/api/"+config.uid+"/"+_t.chatuserid+"/newmessage?chatid="+_t.chatuserid;
            evtmessageurl = apisite+"/api/"+config.uid+"/"+_t.chatuserid+"/default?chatid="+_t.chatuserid;
            newfileurl = apisite+"/api/"+config.uid+"/"+_t.chatuserid+"/chat/fileupload?chatid="+_t.chatuserid;

    };
    
    _t.newClient = function () {
        var nwc = '';
        //console.log('New Cookie'+_t.generateUUID());
        /*if ($.cookie('miynchatuser') === "undefined") {
            
            nwc = _t.generateUUID();
            var ccc = $.cookie('miynchatuser', nwc, { expires: 7, path: '/' });
            console.log('Check'+ccc);
        }*/
        return nwc;
    };
    
    _t.generateUUID = function () {
        var d = new Date().getTime();
        var uuid = 'xxxxxxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
          var r = (d + Math.random() * 16) % 16 | 0;
          d = Math.floor(d / 16);
          return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
        return uuid;
    };
    
    
    _t.setCookiee = function(cname,cvalue,exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    };
    
 
    _t.getCookiee = function(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
              c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
            }
        }
      return "";
    };
    
    _t.checkCookie = function (name) {
      //setCookie('username',"", 30);
      var ck=_t.getCookiee(name);
      return ck;
    };
    
    _t.firstTimeMessage = function (data) {
       
        for(let i = 0; i < data.length; i++){
            if(data[i].sender_type== 'user') {
                if($.trim(data[i].message) !="") {
                    if($.trim(data[i].msg_type) == 'image') {
                        $('<div class="miyn-live-chat-row"><div class="chat_msg_item chat_msg_item_user uu"><div class="chat_avatar"><img src="'+_c.chat_avatar_user+'"></div><div class="miyn-live-chat-message"><img src="{{config('app.api_url')}}/images/chat/'+$.trim(data[i].message)+'" style="max-width:100%" /></div></div><div class="status">'+_c.dateConvertTString($.trim(data[i].created_at, currenttimezone))+'</div></div>').appendTo($("#chat_fullscreen"));
                    } else {
                        $('<div class="miyn-live-chat-row"><div class="chat_msg_item chat_msg_item_user uu"><div class="chat_avatar"><img src="'+_c.chat_avatar_user+'"></div><div class="miyn-live-chat-message">'+ _c.sanitise(data[i].message)+'</div></div><div class="status">'+ _c.dateConvertTString($.trim(data[i].created_at, currenttimezone))+'</div></div>').appendTo($("#chat_fullscreen"));
                    }
                }
            }
    		if(data[i].sender_type== 'admin') {
    		    if($.trim(data[i].message) !="") {
    		        if($.trim(data[i].msg_type) == 'image') {
    		            $('<div class="miyn-live-chat-row"><div class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="'+_c.chat_avatar+'"></div> <div class="miyn-live-chat-message"><img src="{{config('app.live_url')}}/images/chat/'+$.trim(data[i].message)+'" style="max-width:100%" /></div> </div></div><div class="status2">'+_c.dateConvertTString($.trim(data[i].created_at, currenttimezone))+'</div></div>').appendTo($("#chat_fullscreen"));
    		        } else {
    		            $('<div class="miyn-live-chat-row"><div class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="'+_c.chat_avatar+'"></div> <div class="miyn-live-chat-message">' + _c.sanitise(data[i].message) + '</div></div><div class="status2">'+_c.dateConvertTString($.trim(data[i].created_at, currenttimezone))+'</div></div>').appendTo($("#chat_fullscreen"));
    		        }
    		        
    		    }
    		}
    		_t.updateScrollbar();
        }
		
    };
    
    _t.newMessageBox= function () {
        //console.log(newmessageboxurl);
        $.ajax({
             url: newmessageboxurl,
             type: 'GET',
             success: function(data){
                 //console.log(data);
                 _t.firstTimeMessage(data);
             },
             error : function(errors)
             {
                 //console.log(errors.status);
                 /*if(errors.status == '500') {
                    console.log('No need to recall !');
                 }*/ 
             }
         });
    };
    
    _t.newMessage= function () {
        _c.connect();
    };
    
    _t.shortPoll= function () {
        
    };
    
    _t.longPoll= function () {
        
    };
    
    _t.adminOffline= function () {
        _c.setOnlineStatus();
    };
    
    _t.adminOnline= function () {
        _c.setOnlineStatus();
    };
    
    _t.reConnect= function () {
        _c.setOnlineStatus();
    };
    
    _t.liveTask = function () {
        
        //var sts = parseInt(isonline);
        switch(is_online) {
            case 0:
                _t.adminOffline();
                break;
            case 1:
                _t.adminOnline();
                break;
            default:
                _t.reConnect();
                break;
        }
	    //console.log(is_online);
    };

    _t.addButtons = function () {
        
        //console.log(_t);
        
        var myJSON = JSON.stringify(config.businessinfo.liveaction);
       // alert(config.businessinfo.liveaction.length);
    
	   var chatview     = config.businessinfo.livestyle.chat_box;
	   var chathide     = "";
	   if(chathide == 'false') {   chathide = "display:none;"; }
	   
	   var chathtml = '';
	   
            chathtml += '<div class="fabs">';
            
                  chathtml += '<div class="chat">';
                    chathtml += '<div class="chat_header">';
                      chathtml += '<div class="chat_option">';
                      chathtml += '<div class="header_img">';
                        chathtml += '<img src="'+_c.chat_avatar+'">';
                        chathtml += '</div>';
                        chathtml += '<span id="chat_head">'+config.businessinfo.business_name.limit(20)+'</span> <br> <span class="agent">Agent</span> <span class="online">(Online)</span>';
                       chathtml += '<span id="chat_fullscreen_loader" class="chat_fullscreen_loader" style="display: block;"><i class="fullscreen zmdi zmdi-window-maximize"></i><audio id="audio" src="{{config('app.live_url')}}/audio/beep-07.wav" autoplay="false" style="display:none;" ></audio></span>';
                      chathtml += '</div>';
                    chathtml += '</div>';

    
            chathtml += '<div id="chat_fullscreen" class="chat_conversion chat_converse" style="display: block;">';
                  chathtml += '<span class="chat_msg_item chat_msg_item_admin">';
                        chathtml += '<div class="chat_avatar">';
                           chathtml += '<img src="'+_c.chat_avatar+'">';
                        chathtml += '</div>Hey there! Any question?</span>';
                 // chathtml += '<span class="chat_msg_item chat_msg_item_user">Hello!</span>';
                 //        chathtml += '<div class="status">20m ago</div>';
                 //  chathtml += '<span class="chat_msg_item chat_msg_item_admin">';
                 //        chathtml += '<div class="chat_avatar">';
                 //           chathtml += '<img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg">';
                 //        chathtml += '</div>Hey! Would you like to talk sales, support, or anyone?</span>';



            chathtml += '</div>';
            chathtml += '<div class="fab_field">';
              chathtml += '<a id="fab_camera" class="fab "><span class="camera"></span></a>';
              chathtml += '<a id="fab_send" class="fab "><span class="send"></span></a>';
              chathtml += '<a id="fab_call" class="fab "><span class="call"></span></a>';
              //chathtml += '<form name="chatform" id="chatform">';
                    //chathtml += '<input id="user_name" name="user_name" placeholder="Send a message" class="" type="hidden" value="maksud" />';
              chathtml += '<input id="chatSend" name="chat_message" placeholder="Send a message" class="chat_field chat_message msgbox" onkeypress="MIYNTalk.onTestChange(event);" />';
              //chathtml += '</form>';
            chathtml += '</div>';
            
          chathtml += '</div>';
            chathtml += '<a id="prime" class="fab miynchat"><span class="chatbox"></span></a>';
        chathtml += '</div>';
	   
	    $("body").append(chathtml);
	    
	    $(".chat_header").css({"background": config.businessinfo.livestyle.action_background_color });
	    $("#prime").css({"background": config.businessinfo.livestyle.action_background_color });
	    $(".chat_msg_item_user").css({"background": config.businessinfo.livestyle.action_background_color });
	    $(".chat_msg_item_user").css({"background-color": config.businessinfo.livestyle.action_background_color });
	    
	     $(".uu").css("color", "red");
	    //console.log(chathtml);
		
    };
    
    _t.onTestChange = function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (e.keyCode === 13) {
            //console.log("Enter key was pressed");
            $("#fab_send").trigger('click');
           //$("#chatSend").val('');
            
               
            return false;
        }
    };
    
    _t.updateScrollbar = function () {
          $('#chat_fullscreen').scrollTop($('#chat_fullscreen')[0].scrollHeight);
          //console.log('Update');
    };
    
    _t.addChatBox= function () {
	 
    	$( document ).ready(function() {

            //$('.prime').toggleClass('zmdi-comment-outline');
            //$('.prime').toggleClass('zmdi-close');
            //$('.prime').toggleClass('is-active');
            //$('.prime').toggleClass('is-visible');
            //$('#prime').toggleClass('is-float');
            $('.chat').toggleClass('is-visible');
            $('.fab').toggleClass('is-visible');
            
            if($("#prime span").hasClass("chatbox")) {
                $('#prime span').removeClass('chatbox');
                $('#prime span').addClass('chatbox_close');
            } else {
                $('#prime span').removeClass('chatbox_close');
                $('#prime span').addClass('chatbox');
            }
	
    	});
					 		 	
    };
    
    
    _t.fakeMessage= function () { 
      setTimeout(function() {
          intercom.emit('notice', {type: 'admin', msg_type: 'text', created_at : _c.getCurrentTimeFormate(_c.getCurrentTime()), message: _c.Fake[_c.j]});
          _t.updateScrollbar();
        //$('<span class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="'+chat_avatar+'"></div> ' + Fake[j] + '</span>').appendTo($("#chat_fullscreen"));
        if(_c.Fake.length-1 == _c.j) { _c.j=0; } else {  _c.j++; }
      }, 1000 + (Math.random() * 20) * 100);
      
    }
    
    _t.initEvent = function () {
		
		$("body").on("click", ".miynchat", function(e) {
		     e.preventDefault();

		     _t.addChatBox();
			//console.log('called');
			
         }), 
         
        $("body").on("click", "#fab_camera", function(e) {
            
            //console.log('Camera click');
            
            if(_c.need_name_emailbox == 0) {
                
                //console.log('_c.need_name_emailbox'+_c.need_name_emailbox);
                
                _c.fileinput();
                
                $( "#ingredient_file" ).click();
                $("#ingredient_file").on("change", function (e) {
                    e.preventDefault();

                    //console.log('fab_camera');
                    
                    var file = $(this)[0].files[0];
                    //console.log(file.size);
                        if(file.size > 2000000) {
                            alert('Size limit exceed !');
                        
                        } else {
                            var upload = new Upload(file);
                            upload.doUpload();
                            $(this).val('');
                        }
                    
                    
                });
            
            }
             
        }),
        
        
        $("body").on("click", "#fab_call", function(e) {
            
           // console.log('call click');
            
            var msg ="I would like to talk, please call !";
            
            $.ajax({
                    type:'POST',
                    url: newmessagesendurl,
                    data:{ msg:msg },
                    dataType:'json',
                    success:function(data){
                        //console.log(data.created_at);
                        //var msg = $('#chatSend').val();
                         
                        intercom.emit('notice', {type: 'user', msg_type: 'text', created_at : _c.dateConvertTString(data.created_at, currenttimezone),  message: msg});
                        _t.updateScrollbar();
                       
                    }
            });
             
        }),
        
        $("body").on("click", "a.chat-accept-btn", function(e) {
            e.preventDefault();
            
            $('.chat-ringging-btn').removeClass('chat-ringging-btn-dis-flex');
            //$('.chat-ringging-btn').addClass('chat-ringging-btn-dis-none');
            
            var url, title, w, h, popup_chat;
            url     = $(this).attr('href');
            title   = "Calling ..";
            w       = 800;
            h       = 600;
        
            var y = window.outerHeight / 2 + window.screenY - ( h / 2);
            var x = window.outerWidth / 2 + window.screenX - ( w / 2);
            
             popup_chat = window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + y + ', left=' + x);
            
            popup.onbeforeunload = function () {
                // processing event here
                //ringerAudio.pause();
                console.log("new window closed");
            }
            
            popup.onload = function(){  //wait til load to add onunload event
                console.log('Window loaded');
                //cancelRing();
            }
            
            
            
            return popup_chat;
    }),
    
    $("body").on("click", "a.chat-reject-btn", function(e) {
            e.preventDefault();
            
            $("a.chat-accept-btn").attr("href", "");
            
            var msg ="User busy !";
            
            $.ajax({
                    type:'POST',
                    url: newmessagesendurl,
                    data:{ msg:msg },
                    dataType:'json',
                    success:function(data){
                        //console.log(data.created_at);
                        //var msg = $('#chatSend').val();
                         
                        intercom.emit('notice', {type: 'user', msg_type: 'text', created_at : _c.dateConvertTString(data.created_at, currenttimezone),  message: msg});
                        _t.updateScrollbar();
                       
                    }
            });
            
            $('.chat-ringging-btn').removeClass('chat-ringging-btn-dis-flex');
            //$('.chat-ringging-btn').addClass('chat-ringging-btn-dis-none');
      
            return false;
    }),
         
         $("body").on("click", "#fab_send", function(e) {
                e.preventDefault();
               
               if($('#chatSend').val() !="") {
                    //console.log('Form');
                    $("#chatSend").attr('disabled','disabled');
                    _c.send_message();
                    
               }
                return false;
         });
		 		
		
    };

var _c ={
         chat_avatar_user : '',
         chat_avatar : '',
         ts : 0 ,
         intts : 12000 ,
         need_name_emailbox : 1 ,
         Fake : [] ,
         j : 0 ,
         ns : 0 ,
         url : apisite+'/api/'+config.uid+'/'+_t.chatuserid+'/newmessage',
         idletime:20000,
         reconnectafter:100000,
         maxlenght:200,
         onlinestatus:'Offline',
         popupopened:'no',
         //to display the response
    show_response : function(){
        //console.log('Show Response');
         $('.infobox').html("Thank you !");
    },
            //validation fuction for empty user name or message
    validate : function()
    {
        
        if($.trim( $('#chatuseruid').val() )=='') {
            return false;
        } 
        
        if ($.trim( $('#chatname').val() )=='') {
            $(".usererror").text('required');
        } else {
            $(".usererror").text('');
        }
        if($.trim( $('#chatemail').val() )=='') {
            $(".emailerror").text('required');
        } else {
            var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
            if(!email_regex.test($.trim( $('#chatemail').val()))){
               $(".emailerror").text('required');
               return false;
            }else{
                $(".emailerror").text('');
            }
        }
        
        if ($.trim( $('#chatname').val() )=='' || $.trim( $('#chatemail').val() )=='') {
            return false;
        }
        
         return true;
    },
    
    info_submit : function()
    {
        if(this.validate()) {

            var chatuseruid = $('#chatuseruid').val();
            var chatname    = $('#chatname').val();
            var chatemail   = $('#chatemail').val();
            var b_uid        = config.uid;
            
            
            //return false;
            
            var submitform = apisite+"/api/chat/chatform";
            //console.log(submitform);
            
            $.ajax({
                type:'POST',
                url: submitform,
                data:{chatuseruid:chatuseruid, chatname:chatname, chatemail:chatemail, b_uid:b_uid },
                dataType:'json',
                success:function(data){
                    //console.log("Response");
                    //console.log(data);
                    //return false;
                    //console.log("Response");
                    _t.chatusername = data.name;
                    //localStorage.setItem('miynusername', data.name);
                    _t.setCookiee('miynusername-'+config.businessinfo.id+'', data.name, 30);
                    
                    newmessageboxurl = apisite+"/api/"+config.uid+"/"+_t.chatuserid+"/newmessagebox?chatid="+_t.chatuserid;
                    newmessagesendurl = apisite+"/api/"+config.uid+"/"+_t.chatuserid+"/sendtoadmin?chatid="+_t.chatuserid;
                    _t.newMessageBox();
                            
                    _c.need_name_emailbox = 0;
                    _c.show_response();
                    _c.text_event();
                    _c.connect();
                    
                }
            });
        }
    },
    
    text_event : function()
    {
        if(this.need_name_emailbox == 0) {
            $("#chatSend").removeAttr("disabled");
        } else {
            $("#chatSend").prop('disabled', 'disabled');
        }
    },
    
    name_email_box : function()
    {

        var ht = '<div class="infobox"><label>Name <span class="usererror"> </span> </label><input type="hidden" id="chatuseruid" name="chatuseruid" value="'+_t.chatuserid+'" /><input type="text" id="chatname" name="chatname" class="chatname" placeholder="Enter your name" /><label>Email <span class="emailerror"> </span> </label><input type="email" id="chatemail" class="chatemail" type="email" pattern="[^ @]*@[^ @]*" placeholder="Enter your email" /> <button id="btnchatsubmit"> Submit </button></div>';
        $("#chat_fullscreen").append(ht);
        
        $("#btnchatsubmit" ).click(function() {
          _c.info_submit();
        });
    },
    
    fileinput : function()
    {
        var fi = '<input id="ingredient_file" multiple="false" type="file" accept=".png, .jpg, .jpeg .PNG, .JPG, .JPEG" style="display:none;" />';
        $(".miyn-chat-box-area").append(fi);
        //console.log(fi);
    },
    
    removefileinput : function()
    {
        $("#ingredient_file").remove();
    },
    
    progressbar : function()
    {
        var pb = '<div id="progress-wrp"><div class="progress-bar"></div><div class="status">0%</div></div>';
        $(".fab_field").append(pb);
    },
    
    removeprogressbar : function()
    {
        $(".fab_field #progress-wrp").remove();
    },
    
             //validation fuction for empty user name or message
    chatvalidate : function()
    {
        
        if($.trim( $('#chatSend').val() )=='') {
            return false;
        } else {
            return true;
        }
        
         return false;
    },
    send_message : function() {
        if(this.chatvalidate())
        {
            _c.sendChat();
        }
    },
    
    sendChat : function()
    {
        if(this.chatvalidate()) {

            var msg = $('#chatSend').val();
            
           // console.log(_c.getCurrentTime());
           // return false;
           
           //console.log(newmessagesendurl);
            
            $.ajax({
                type:'POST',
                url: newmessagesendurl,
                data:{ msg:msg },
                dataType:'json',
                success:function(data){
                    //console.log(data.created_at);
                    //var msg = $('#chatSend').val();
                     
                    intercom.emit('notice', {type: 'user', msg_type: 'text', created_at : _c.dateConvertTString(data.created_at, currenttimezone),  message: msg});
                    $("#chatSend").removeAttr('disabled'); 
                    _t.updateScrollbar();
    
                    $('#chatSend').val('');
                    $('#chatSend').focus();
                    
                    if(is_online == 0) {
                        _t.fakeMessage();
                    }
                    
                    _c.connect();
                   
                }
            });
        }
    },
    
    getChatTime : function(str) {
       // const event = new Date();
       // const options = {  year: 'numeric', month: 'short', day: 'numeric' };
       // return dateObject.toLocaleDateString(undefined, options) + ' ' + event.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        
        /* let dateString = str
  , reggie = /(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/
  , [, year, month, day, hours, minutes, seconds] = reggie.exec(dateString)
  , dateObject = new Date(year, month-1, day, hours, minutes, seconds);
        
       // const event = new Date();
        const options = {  year: 'numeric', month: 'short', day: 'numeric' };
        var ndate =  dateObject.toLocaleDateString(undefined, options) + ' ' + dateObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        return ndate;*/
        
        return str;
    },
    
    
    getCurrentTimeFormate : function(str) {
       // const event = new Date();
       // const options = {  year: 'numeric', month: 'short', day: 'numeric' };
       // return dateObject.toLocaleDateString(undefined, options) + ' ' + event.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        
         let dateString = str
  , reggie = /(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/
  , [, year, month, day, hours, minutes, seconds] = reggie.exec(dateString)
  , dateObject = new Date(year, month-1, day, hours, minutes, seconds);
        
       // const event = new Date();
        const options = {weekday: 'long',  year: 'numeric', month: 'short', day: 'numeric' };
        var ndate =  dateObject.toLocaleDateString(undefined, options) + ' ' + dateObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        return ndate;
    },
    
    getCurrentTime : function() {

        var d = new Date();
            d = d.getFullYear() + "-" + ('0' + (d.getMonth() + 1)).slice(-2) + "-" + ('0' + d.getDate()).slice(-2) + " " + ('0' + d.getHours()).slice(-2) + ":" + ('0' + d.getMinutes()).slice(-2) + ":" + ('0' + d.getSeconds()).slice(-2);
        //console.log(d);
        
        let dateString = d
          , reggie = /(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/
          , [, year, month, day, hours, minutes, seconds] = reggie.exec(dateString)
          , dateObject = new Date(year, month-1, day, hours, minutes, seconds);
                
               // const event = new Date();
                const options = {  year: 'numeric', month: 'short', day: 'numeric' };
                var ndate =  dateObject.toLocaleDateString(undefined, options) + ' ' + dateObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        
        return d;
        
    },
    
    setOnlineStatus : function() {
        if(is_online == 1) {
            $('.online').text("(Online)");
        } else {
            $('.online').text("(Offline)");
        }
    },
    
    printConsole : function() {
        this.ts = 500;
    },
    sanitise : function(str) {
        
        //console.log('str:'+str+':');
        
        if( str !="undefined") {
          const map = {
              '&': '&amp;',
              '<': '&lt;',
              '>': '&gt;',
              '"': '&quot;',
              "'": '&#x27;',
              "/": '&#x2F;',
          };
          const reg = /[&<>"'/]/ig;
          if(str !="") {
            return str.replace(reg, (match)=>(map[match]));
          } else {
              return str;
          }
        }
      
      
    },
    
    dateConvertTString : function(date, timezone) {

        var d = new Date(date);
        const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
        var datetime =  d.toLocaleTimeString(undefined, options);
        var aestTime = new Date(datetime+ " +00:00").toLocaleString("en-US", {timeZone: timezone});
        return (new Date(aestTime).toLocaleTimeString(undefined, options));
        
    },
    
    connect : function()
    {
       // var currenttimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
       // console.log(currenttimezone);
         
        setInterval(function(){ 
        
           
           var d = new Date();
           //console.log(d);
            
            $.ajax({
                 url: newmessageurl,
                 type: 'GET',
                 success: function(data){
                     //console.log(data);
                     //console.log(newmessageurl);
                     if(data.data_admin.online == 'yes') { is_online= 1; } else { is_online = 0; }
                     //console.log('is_online:'+is_online);
                     
                     if(data.data_array.length > 0) {
                         //_c.intts = 20000;
                        var sound = document.getElementById("audio");
                        sound.play();
                     }
                     
                    // console.log(data.result);
                     
                     if(data.result == 'need to call'){
                        // var callmsg = 'Ringing ... <a target="_blank" href="{{config('app.live_url')}}/chat-opentok-call?peer_id='+data.existing_user_ring.peer_id+'" onclick="'+_c.popupwindow(this.href, 'MIYN vedio call', 800, 600)+'">Click to recive call</a>';
                        var peer_id = data.existing_user_ring.peer_id;
                     
                     //console.log('peer_id');
                     //console.log(peer_id);
                        
                        if(_c.popupopened == 'no') {
                            var y = window.outerHeight / 2 + window.screenY - ( h / 2);
                            var x = window.outerWidth / 2 + window.screenX - ( w / 2);
                            var w = 800;
                            var h = 600;
                           
                            $('.chat-ringging-btn').addClass('chat-ringging-btn-dis-flex');
                            
                            if(window.opener === null) {
                                // ajax call riging -- yes
                                
                                var csrf_token      = $('meta[name="csrf-token"]').attr('content');
      
                                $.ajax({
                                    type: 'post',
                                    url:'{{config('app.live_url')}}/call-ringing-status',
                                    data:{_token:csrf_token, peer_id:peer_id },
                                    dataType:'json',
                                    success: function (response) {
                                        $('.chat-ringging-btn').removeClass('chat-ringging-btn-dis-none');
                                        //console.log(response);
                                        $("a.chat-accept-btn").attr("href", "{{config('app.live_url')}}/chat-opentok-call?peer_id="+data.existing_user_ring.peer_id);
                                        //window.open('{{config('app.live_url')}}/chat-opentok-call?peer_id='+data.existing_user_ring.peer_id, "This is title", 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + y + ', left=' + x);
                                    }
                                });
                                    
                                
                                

                            }
                              
                           // intercom.emit('notice', {type: 'admin', msg_type: 'ring', created_at : _c.getCurrentTime(), message: 'Ringing ...'});
                           // _t.updateScrollbar();
                         }
                     }
                     
                     for(let i = 0; i < data.data_array.length; i++){
                         //console.log(data.data_array[i].msg_type);
                         if(data.data_array[i].msg_type == 'image') {
                            intercom.emit('notice', {type: 'admin', msg_type: 'image', created_at : _c.dateConvertTString(data.data_array[i].created_at, currenttimezone), message: '<img src="{{config('app.api_url')}}/images/chat/'+data.data_array[i].message+'" style="max-width:100%" />'});
                            _t.updateScrollbar();
                         } else {
                         intercom.emit('notice', {type: 'admin', msg_type: data.data_array[i].msg_type, created_at : _c.dateConvertTString(data.data_array[i].created_at, currenttimezone), message: data.data_array[i].message});
                         _t.updateScrollbar();
                         }
                     }
                 },
                 error : function(errors)
                 {
                     //console.log(errors.status);
                     
                     if(errors.status == '500') {
                        //console.log('No need to recall !');
                     } else {
                         //wait for 5 second before sending another request
                        setTimeout(function(){
                            _c.connect();
                        }, 60000);
                     }
                 }
            });
            
           // _t.updateScrollbar();
           _c.text_event();
   
        }, 6000);

    }
    
};


// File Upload    
    
var Upload = function (file) {
    this.file = file;
};

Upload.prototype.getType = function() {
    return this.file.type;
};
Upload.prototype.getSize = function() {
    return this.file.size;
};
Upload.prototype.getName = function() {
    return this.file.name;
};
Upload.prototype.doUpload = function () {
    var that = this;
   // var formData = new FormData();
  //  formData.append('file', $('#ingredient_file')[0].files[0]);

        //console.log(that);
       
        var formData = new FormData();
      
        if($("#ingredient_file")[0].files.length>0) {
            
            _c.progressbar();
            
           formData.append("select_file",$("#ingredient_file")[0].files[0]);
           
           $( "#progress-wrp .progress-bar" ).css( "background-color", "#fff" );
           $( "#progress-wrp .progress-bar" ).css( "width", "0%" );
           $( "#progress-wrp .status" ).text( "0%" );
           $("#progress-wrp").css( "display", "block" );
           
        }
           
        $("#ingredient_file").val('');
   

    //console.log($('#ingredient_file')[0].files[0]);
   // return false;
   
   //console.log(newfileurl);

    $.ajax({
        type: "POST",
        url: newfileurl,
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.addEventListener('progress', that.progressHandling, false);
            }
            return myXhr;
        },
        success: function (data) {
            // your callback here
            //console.log(data);
            //$('#ingredient_file').val(''); 
            formData=null;
            this.file  = null;
            _c.removefileinput();
            
            
            intercom.emit('notice', {type: 'user', msg_type: 'image', created_at : _c.getCurrentTimeFormate(_c.getCurrentTime()), message: '<img src="{{config('app.api_url')}}/images/chat/'+data+'" style="max-width:100%" />'});
           
            _t.updateScrollbar();
            //$("#ingredient_file").replaceWith($("#ingredient_file").val('').clone(true));
           // $("#progress-wrp").delay(5000).fadeOut('slow');
            
        },
        error: function (error) {
            // handle error
            //console.log(error);
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
    });
};

Upload.prototype.progressHandling = function (event) {
    
    
    var percent = 0;
    var position = event.loaded || event.position;
    var total = event.total;
    var progress_bar_id = "#progress-wrp";
    if (event.lengthComputable) {
        percent = Math.ceil(position / total * 100);
    }
    // update progressbars classes so it fits your code
    $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
    $(progress_bar_id + " .status").text(percent + "%");
    _c.ts = percent;
    if(_c.ts == 100) {
        _c.ts = 0;
        _c.removeprogressbar();
    }

}; 



/* ------ */
function setCookie(cname, cvalue, exdays) {

   var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    //console.log(document.cookie);
  }
  window.setCookie = setCookie;

  function getCookie(cname) {
     var name = cname + "=";
      var decodedCookie = decodeURIComponent(window.document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
  }
  window.getCookie = getCookie;

  function setSession(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    var url = window.location.href;
    var widget_id = url.split('?wid=')[1];
    if (widget_id === undefined) {
      widget_id = url.split('/').pop();
    }
    var key = cname;
    try {
      localStorage.setItem(key, cvalue);
    } 
    catch(e){
      console.error('localStorage.setItem(...)', e);
    }

  }
  window.setSession = setSession;

  function getSession(cname) {
    var url = window.location.href;
    var widget_id = url.split('?wid=')[1];
    if (widget_id === undefined) {
      widget_id = url.split('/').pop();
    }
    var sessionValue = localStorage.getItem(cname);
    //console.log('getSession', sessionValue);
    if(sessionValue){
      return sessionValue;
    }
    return "";
  }
  window.getSession = getSession;


    $(window).on("blur focus", function(e) {
        var prevType = $(this).data("prevType");
    
        if (prevType != e.type) {   //  reduce double fire issues
            switch (e.type) {
                case "blur":
                    //console.log("Blured");
                    //
                    break;
                case "focus":
                    //console.log("Focused");
                    //
                    break;
                default:
                    //console.log("None");
                    break;
            }
        }
    
        $(this).data("prevType", e.type);
    });
    
 String.prototype.limit = function(length) {
    return this.length > length ? (this.substring(0, length) + '...') : this;
}

/*String.prototype.sanitise = function() {
  const map = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#x27;',
      "/": '&#x2F;',
  };
  const reg = /[&<>"'/]/ig;
  return this.replace(reg, (match)=>(map[match]));
}*/

String.prototype.desanitise = function() {
    return this;
}

String.prototype.strcount = function() {
    return this.length;
}


String.prototype.getQueryString = function(field, url) {
    var href = url ? url : window.location.href;
    var reg = new RegExp('[?&]' + field + '=([^&#]*)', 'i');
    var string = reg.exec(href);

    return string ? string[1] : null;
}
   
   
    
    
}();

;(function (global) {

if ("EventSource" in global) return;

var reTrim = /^(\s|\u00A0)+|(\s|\u00A0)+$/g;

var EventSource = function (url) {
  var eventsource = this,  
      interval = 500, // polling interval  
      lastEventId = null,
      cache = '';

  if (!url || typeof url != 'string') {
    throw new SyntaxError('Not enough arguments');
  }

  this.URL = url;
  this.readyState = this.CONNECTING;
  this._pollTimer = null;
  this._xhr = null;
  
  function pollAgain(interval) {
    eventsource._pollTimer = setTimeout(function () {
      poll.call(eventsource);
    }, interval);
  }
  
  function poll() {
    try { // force hiding of the error message... insane?
      if (eventsource.readyState == eventsource.CLOSED) return;

      // NOTE: IE7 and upwards support
      var xhr = new XMLHttpRequest();
      xhr.open('GET', eventsource.URL, true);
      xhr.setRequestHeader('Accept', 'text/event-stream');
      xhr.setRequestHeader('Cache-Control', 'no-cache');
      // we must make use of this on the server side if we're working with Android - because they don't trigger 
      // readychange until the server connection is closed
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

      if (lastEventId != null) xhr.setRequestHeader('Last-Event-ID', lastEventId);
      cache = '';
    
      xhr.timeout = 50000;
      xhr.onreadystatechange = function () {
        if (this.readyState == 3 || (this.readyState == 4 && this.status == 200)) {
          // on success
          if (eventsource.readyState == eventsource.CONNECTING) {
            eventsource.readyState = eventsource.OPEN;
            eventsource.dispatchEvent('open', { type: 'open' });
          }

          var responseText = '';
          try {
            responseText = this.responseText || '';
          } catch (e) {}
        
          // process this.responseText
          var parts = responseText.substr(cache.length).split("\n"),
              eventType = 'message',
              data = [],
              i = 0,
              line = '';
            
          cache = responseText;
        
          // TODO handle 'event' (for buffer name), retry
          for (; i < parts.length; i++) {
            line = parts[i].replace(reTrim, '');
            if (line.indexOf('event') == 0) {
              eventType = line.replace(/event:?\s*/, '');
            } else if (line.indexOf('retry') == 0) {                           
              var retry = parseInt(line.replace(/retry:?\s*/, ''));
              if(!isNaN(retry)) { interval = retry; }
            } else if (line.indexOf('data') == 0) {
              data.push(line.replace(/data:?\s*/, ''));
            } else if (line.indexOf('id:') == 0) {
              lastEventId = line.replace(/id:?\s*/, '');
            } else if (line.indexOf('id') == 0) { // this resets the id
              lastEventId = null;
            } else if (line == '') {
              if (data.length) {
                var event = new MessageEvent(data.join('\n'), eventsource.url, lastEventId);
                eventsource.dispatchEvent(eventType, event);
                data = [];
                eventType = 'message';
              }
            }
          }

          if (this.readyState == 4) pollAgain(interval);
          // don't need to poll again, because we're long-loading
        } else if (eventsource.readyState !== eventsource.CLOSED) {
          if (this.readyState == 4) { // and some other status
            // dispatch error
            eventsource.readyState = eventsource.CONNECTING;
            eventsource.dispatchEvent('error', { type: 'error' });
            pollAgain(interval);
          } else if (this.readyState == 0) { // likely aborted
            pollAgain(interval);
          } else {
          }
        }
      };
    
      xhr.send();
    
      setTimeout(function () {
        if (true || xhr.readyState == 3) xhr.abort();
      }, xhr.timeout);
      
      eventsource._xhr = xhr;
    
    } catch (e) { // in an attempt to silence the errors
      eventsource.dispatchEvent('error', { type: 'error', data: e.message }); // ???
    } 
  };
  
  poll(); // init now
};

EventSource.prototype = {
  close: function () {
    // closes the connection - disabling the polling
    this.readyState = this.CLOSED;
    clearInterval(this._pollTimer);
    this._xhr.abort();
  },
  CONNECTING: 0,
  OPEN: 1,
  CLOSED: 2,
  dispatchEvent: function (type, event) {
    var handlers = this['_' + type + 'Handlers'];
    if (handlers) {
      for (var i = 0; i < handlers.length; i++) {
        handlers[i].call(this, event);
      }
    }

    if (this['on' + type]) {
      this['on' + type].call(this, event);
    }
  },
  addEventListener: function (type, handler) {
    if (!this['_' + type + 'Handlers']) {
      this['_' + type + 'Handlers'] = [];
    }
    
    this['_' + type + 'Handlers'].push(handler);
  },
  removeEventListener: function (type, handler) {
    var handlers = this['_' + type + 'Handlers'];
    if (!handlers) {
      return;
    }
    for (var i = handlers.length - 1; i >= 0; --i) {
      if (handlers[i] === handler) {
        handlers.splice(i, 1);
        break;
      }
    }
  },
  onerror: null,
  onmessage: null,
  onopen: null,
  readyState: 0,
  URL: ''
};

var MessageEvent = function (data, origin, lastEventId) {
  this.data = data;
  this.origin = origin;
  this.lastEventId = lastEventId || '';
};

MessageEvent.prototype = {
  data: null,
  type: 'message',
  lastEventId: '',
  origin: ''
};

if ('module' in global) module.exports = EventSource;
global.EventSource = EventSource;
 
})(this);
            
        </script>
<script>

MIYNTalk.init({
	uid: '{{$uid}}',
	ui: true,
	buttonprefix: true,
	paramName: 'action',
	dashboard_chat_userid: '{{$dashboard_chat_userid}}',
	dashboard_chat_useruid: '{{$dashboard_chat_useruid}}',
	dashboard_chat_username: '{{$dashboard_chat_username}}',
	dashboard_chat_email: '{{$dashboard_chat_email}}',
	is_dashboard_chat: '{{$is_dashboard_chat}}'
	
});

</script> 

        
        <script type="text/javascript">
        $( document ).ready(function() {
         // $(window).load(function() {
                //console.log('Called');
                $("body").removeClass("loader");
         //   });  
            
        });
        </script>

        <!-- New Chat Application -->
        <script type="text/javascript">

            function receiveMessageFromIndex ( event ) {
                //console.log( { height: parseInt($("body").height()) } , event )
                //parent.postMessage({ height: parseInt($("body").height()) },"*");


            }

            //Listen for message events
            window.addEventListener("message", receiveMessageFromIndex, false);


           /* window.addEventListener("message", event => {
               if (event.origin != "https://app.miyn.app") return;
               //console.warn(event.source.frameElement.name);
               console.warn(event);
               // here you can find your iframe by name
           });*/


            // window.addEventListener("message", (event) => {
            //   // Do we trust the sender of this message?  (might be
            //   // different from what we originally opened, for example).
            //   if (event.origin !== "http://app.miyn.app")
            //     return;

            //   // event.source is popup
            //   // event.data is "hi there yourself!  the secret response is: rheeeeet!"

            //          console.log(event.data);




            //         event.source.postMessage("hi there yourself!  the secret response " +
            //                "is: rheeeeet!",
            //                event.origin);




            // }, false);


          /*  setInterval(function () {

                window.postMessage({v1: 'Assign to value1', v2: 'Assign to value2'}, "https://.app.miyn.app");

            }, 100);


            var receiveMessage = function(event) {
                console.log("Recieved event from app " + JSON.stringify(event));
            }
            window.addEventListener("message", receiveMessage, true);*/

        </script>

    </body>
</html>
    
