<style>
    .message {
        border: double 4px #ccc;
        margin: 10px;
        padding: 10px;
        background-color: #fafafa;
    }

    .msg_title {
        margin: 10px 20px;
        color: #999;
        font-size: 12pt;
        font-weight: bold;
    }

    .msg_content {
        margin: 10px 20px;
        color: #aaa;
        font-size: 12pt;
    }
</style>

<div class="message row">
    <div class="msg_title col-2">{{ $msg_title }}</div>
    <div class="msg_content col-9">{{ $msg_content }}</div>
</div>