<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8bb6ae7263.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view.css">
    <script src="view.js" defer></script>
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
    <video src="./files/video.mp4" class="video" controls></video>
</section>

<div class="infoAndNext">
    <!-- video information -->
    <section class="info">
        <div class="metadata">
            <ul class="hashTag">
                <li>#HTML</li>
                <li>#CSS</li>
                <li>#coding</li>
            </ul>
            <div class="titleAndButton">
            <span class="title clamp">Clone Coding: Youtube Mobile Website 유튜브 모바일 웹사이트 따라 만들기
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
                <img src="./files/man.jpg" alt="" class="profile">
                <div class="info">
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
                <div class="img">
                    <img src="https://via.placeholder.com/270x150" alt="">
                </div>
                <div class="info">
                    <span class="title">1. 골로 가는 코딩, 아직 시작도 못했는데 어떻게 하는거냐? 그 시작</span>
                    <span class="name">파란햇님</span>
                    <span class="views">20 views</span>
                </div>
                <button class="more"><i class="fas fa-ellipsis-v"></i></button>
            </li>
            <li class="item">
                <div class="img">
                    <img src="https://via.placeholder.com/270x150" alt="">
                </div>
                <div class="info">
                    <span class="title">2. 제목만 좀 길게 보였으면 좋겠다. 다른건 안바랄게 두줄까지만 나와줘. 제발...</span>
                    <span class="name">파란햇님</span>
                    <span class="views">30 views</span>
                </div>
                <button class="more"><i class="fas fa-ellipsis-v"></i></button>
            </li>
            <li class="item">
                <div class="img">
                    <img src="https://via.placeholder.com/270x150" alt="">
                </div>
                <div class="info">
                    <span class="title">3. 풀스택 개발자 되고 싶은데 html,css부터 하래요. 근데 css 너무 어려워요;; 벌써 늙은이인데 ㅠㅠ</span>
                    <span class="name">파란햇님</span>
                    <span class="views">100 views</span>
                </div>
                <button class="more"><i class="fas fa-ellipsis-v"></i></button>
            </li>
        </ul>
    </section>
</div>
</body>
</html>