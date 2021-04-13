<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8bb6ae7263.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view.css">
    <script src="view.js"></script>
    <title>clone Coding - Youtube mobile</title>
</head>
<body>
<!-- header -->
<header>
    <div class="logo">
        <i class="fab fa-youtube"></i>
        <span class="title">Youtube</span>
    </div>
    <div class="icon">
        <i class="fas fa-search"></i>
        <i class="fas fa-ellipsis-v"></i>
    </div>
</header>

<!-- video player -->
<section class="player">
    <video src="" class="video" controls></video>
</section>

<!-- video information -->
<section class="info">
    <div class="metadata">
        <ul class="hashTag">
            <li>#HTML</li>
            <li>#CSS</li>
            <li>#coding</li>
        </ul>
        <div class="titleAndButton">
            <span class="title">Clone Coding: Youtube Mobile Website 유튜브 모바일 웹사이트 따라 만들기
                | 프론트앤드 개발자 입문편 : HTML, CSS, Javascript #기본 #따라하기 #제목 #3줄만들기 #조금만 #더욱 #길어져라 #조금만더</span>
            <button class="moreBt">
                <i class="fas fa-caret-down"></i>
            </button>
        </div>
        <div class="views">
            <span class="views">1M views 1 month ago</span>
        </div>
    </div>
    <ul class="actions">
        <li>
            <button>
                <i class="fas fa-thumbs-up"></i><span>1K</span>
            </button>
        </li>
        <li>
            <button>
                <i class="fas fa-thumbs-up fa-flip-vertical"></i><span>0</span>
            </button>
        </li>
        <li>
            <button><i class="fas fa-share"></i><span>Share</span></button>
        </li>
        <li>
            <button><i class="fas fa-plus"></i><span>Save</span></button>
        </li>
        <li>
            <button><i class="fas fa-flag"></i><span>Report</span></button>
        </li>
    </ul>
    <div class="channel">
        <div class="metadata">
            <img src="" alt="">
            <div class="info">
                <img src="https://via.placeholder.com/30x30" alt="" class="profile">
                <span class="name">파란햇님</span>
                <span class="subscribers">20 subscribers</span>
            </div>
        </div>
        <button class="subscribe">subscribe</button>
    </div>
</section>
<section class="others_video">
    <span class="title">Up Next</span>
    <ul>
        <li class="item">
            <img src="https://via.placeholder.com/270x150" alt="">
            <div class="info">
                <span class="title"></span>
                <span class="name"></span>
                <span class="views"></span>
            </div>
            <button class="more"></button>
        </li>
        <li class="item">
            <img src="https://via.placeholder.com/270x150" alt="">
            <div class="info">
                <span class="title"></span>
                <span class="name"></span>
                <span class="views"></span>
            </div>
            <button class="more"></button>
        </li>
        <li class="item">
            <img src="https://via.placeholder.com/270x150" alt="">
            <div class="info">
                <span class="title"></span>
                <span class="name"></span>
                <span class="views"></span>
            </div>
            <button class="more"></button>
        </li>
    </ul>
</section>
</body>
</html>