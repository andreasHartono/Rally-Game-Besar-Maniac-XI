<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Pelanggaran</title>

    {{-- Custom CSS --}}
    <style>
        @import url(https://fonts.googleapis.com/css?family=Oswald|Roboto);
    @-webkit-keyframes btn {
        0%, 100% {
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -webkit-transform: scale(1);
        transform: scale(1);
        }
        70% {
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -webkit-transform: scale(1);
        transform: scale(1);
        }
        80% {
        -moz-transform: scale(1.04);
        -ms-transform: scale(1.04);
        -webkit-transform: scale(1.04);
        transform: scale(1.04);
        }
        90% {
        -moz-transform: scale(0.96);
        -ms-transform: scale(0.96);
        -webkit-transform: scale(0.96);
        transform: scale(0.96);
        }
    }
    @-moz-keyframes btn {
        0%, 100% {
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -webkit-transform: scale(1);
        transform: scale(1);
        }
        70% {
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -webkit-transform: scale(1);
        transform: scale(1);
        }
        80% {
        -moz-transform: scale(1.04);
        -ms-transform: scale(1.04);
        -webkit-transform: scale(1.04);
        transform: scale(1.04);
        }
        90% {
        -moz-transform: scale(0.96);
        -ms-transform: scale(0.96);
        -webkit-transform: scale(0.96);
        transform: scale(0.96);
        }
    }
    @keyframes;
    @-webkit-keyframes fish {
        0%, 70% {
        opacity: 0;
        }
        100% {
        opacity: 1;
        }
    }
    @-moz-keyframes fish {
        0%, 70% {
        opacity: 0;
        }
        100% {
        opacity: 1;
        }
    }
    @keyframes;
    html {
        height: 100%;
    }
    
    body {
        font-family: Roboto, sans-serif;
        color: #8E24AA;
        background-color: #210E40;
        height: 100%;
        margin: 0;
        overflow: hidden;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }
    
    .fish, .fish-shadow {
        width: 640px;
        height: auto;
        position: absolute;
        top: -145px;
        left: -177px;
        -moz-animation: fish 3s forwards ease-in-out;
        -webkit-animation: fish 3s forwards ease-in-out;
        animation: fish 3s forwards ease-in-out;
    }
    .fish path, .fish-shadow path {
        fill: #fff;
    }
    .fish path:hover, .fish-shadow path:hover {
        fill: #AB47BC;
    }
    .fish .line, .fish-shadow .line {
        fill: none;
    }
    .fish-shadow-con {
        opacity: 0.2;
        filter: blur(10px);
        position: absolute;
        top: 0;
        left: 0;
    }
    .fish-shadow {
        top: -125px;
        left: -157px;
    }
    .fish-shadow path {
        fill: #211922;
    }
    .fish-shadow path:hover {
        fill: #211922;
    }
    .fish-shadow {
        -webkit-filter: url("#goo");
        filter: url(#goo);
        top: -125px;
        left: -157px;
        opacity: 0.4;
    }
    
    .container {
        position: relative;
        background-color: #fafafe;
        border-radius: 10px;
        padding: 25px 20px 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        width: 320px;
        box-sizing: border-box;
    }
    .container:before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        right: 0;
        height: 60%;
        background-color: #fafafe;
        border-radius: 10px;
        z-index: 2;
    }
    
    .card {
        position: relative;
        z-index: 2;
    }
    
    .card_title {
        font-size: 29px;
        margin: 0;
        margin-bottom: 20px;
    }
    
    .card_button {
        border-radius: 4px;
        border: none;
        outline: none;
        width: 100%;
        padding: 0 15px;
        font-size: 18px;
        line-height: 36px;
        font-weight: 500;
        margin: 25px 0 10px;
        color: #fff;
        background: linear-gradient(#AB47BC, #8E24AA);
        box-shadow: 0 2px 12px -3px #8E24AA;
        -moz-animation: btn 6s 3s infinite ease-in-out;
        -webkit-animation: btn 6s 3s infinite ease-in-out;
        animation: btn 6s 3s infinite ease-in-out;
        opacity: 0.9;
        -moz-transition: all 0.3s;
        -o-transition: all 0.3s;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
        cursor: pointer;
    }
    .card_button:hover {
        opacity: 1;
        box-shadow: 0 2px 2px -3px #8E24AA;
    }
    
    .input {
        display: flex;
        flex-direction: column-reverse;
        position: relative;
        padding-top: 20px;
    }
    .input + .input {
        margin-top: 20px;
    }
    
    .input_label {
        color: #4e585f;
        position: absolute;
        top: 20px;
        -moz-transition: all 0.3s;
        -o-transition: all 0.3s;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
    }
    
    .input_field {
        border: 0;
        padding: 0;
        z-index: 1;
        background-color: transparent;
        border-bottom: 2px solid #ead4ee;
        font: inherit;
        font-size: 14px;
        line-height: 30px;
    }
    .input_field:focus, .input_field:valid {
        outline: 0;
        border-bottom-color: #AB47BC;
    }
    .input_field:focus + .input_label, .input_field:valid + .input_label {
        color: #000000;
        -moz-transform: translateY(-25px);
        -ms-transform: translateY(-25px);
        -webkit-transform: translateY(-25px);
        transform: translateY(-25px);
    }
    .input_field:focus + .input_label, .input_field:read-only + .input_label {
        color: #000000;
        -moz-transform: translateY(-25px);
        -ms-transform: translateY(-25px);
        -webkit-transform: translateY(-25px);
        transform: translateY(-25px);
    }
    </style>

</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="card_title">Tambah Pelanggaran</h1>
            <form action="/admin/pelanggaran/input" method="post" class="card_form">
                @csrf
                <div class="input">
                    <input type="text" name="txtNama" class="input_field" required />
                    <label class="input_label">Name</label>
                </div>
                <div class="input">
                    <input type="number" name="txtMinusPoin" class="input_field" required />
                    <label class="input_label">Minus</label>
                </div>
                <div class="input">
                    <input type="number" name="txtIDPlayer" value="{{$idplayer}}" class="input_field" readonly />
                    <label class="input_label">ID Player</label>
                </div>
                <button class="card_button">Submit</button>
            </form>
        </div>
        <div class="fish-shadow-con">
            <svg class="fish-shadow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMin slice" viewBox="0 0 743 645">
    
                <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                    <path d="M177.367 337.568L182.709 357.739C198.517 417.421 249.748 460.995 311.193 467.019L421.508 477.834C478.237 483.396 532.831 454.649 560.346 404.729C607.09 319.923 557.549 214.182 462.47 195.822L375.079 178.946C368.369 177.651 361.766 175.854 355.324 173.572C251.651 136.837 149.205 231.245 177.367 337.568Z" class="line" id="Line" />
    
                    <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Group" transform="translate(-103.000000, 3.000000)" fill="#F2AFAF">
                            <g id="l-1" transform="translate(118.396084, 37.985234) rotate(-89.000000) translate(-118.396084, -37.985234) translate(104.396084, 23.985234)">
                                <path d="M14.1723611,27.5145257 C19.9713509,27.5145257 24.6723611,22.8135155 24.6723611,17.0145257 C24.6723611,15.8258883 28.1981217,2.09701504 27.8341336,1.03166708 C26.4223375,-3.10048431 18.7827136,6.51452565 14.1723611,6.51452565 C9.87015746,6.51452565 1.67467528,-2.67194974 0.0523652038,1.03166708 C-0.512055182,2.32019808 3.67236107,15.5177394 3.67236107,17.0145257 C3.67236107,22.8135155 8.3733712,27.5145257 14.1723611,27.5145257 Z" />
                            </g>
                        </g>
                        <animateMotion dur="6s" begin="0s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                            <mpath xlink:href="#Line" />
                        </animateMotion>
                    </g>
    
                    <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Group" transform="translate(-71.000000, 3.000000)">
                            <g id="l-2" transform="translate(96.916890, 37.437926) rotate(-89.000000) translate(-96.916890, -37.437926) translate(60.416890, 13.437926)">
                                <ellipse id="Oval" cx="36.5" cy="24" rx="16.5" ry="24" />
                                <path d="M52.8409492,28.4193415 C56.9830848,28.4193415 67.8409492,23.8671728 67.8409492,17.7920406 C67.8409492,16.3338966 72.7364131,8.06546148 72.3851131,6.79204055 C71.2727759,2.75994931 63.4888957,6.79204055 60.3409492,6.79204055 C56.1988135,6.79204055 52.8409492,11.7169083 52.8409492,17.7920406 C52.8409492,23.8671728 48.6988135,28.4193415 52.8409492,28.4193415 Z" id="Oval" />
                                <path d="M1.84094917,28.4193415 C5.98308479,28.4193415 16.8409492,23.8671728 16.8409492,17.7920406 C16.8409492,16.3338966 21.7364131,8.06546148 21.3851131,6.79204055 C20.2727759,2.75994931 12.4888957,6.79204055 9.34094917,6.79204055 C5.19881354,6.79204055 1.84094917,11.7169083 1.84094917,17.7920406 C1.84094917,23.8671728 -2.30118646,28.4193415 1.84094917,28.4193415 Z" id="Oval" transform="translate(10.701577, 16.709671) scale(-1, 1) translate(-10.701577, -16.709671) " />
                            </g>
                        </g>
                        <animateMotion dur="6s" begin="0.1s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                            <mpath xlink:href="#Line" />
                        </animateMotion>
                    </g>
    
                    <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Group" transform="translate(-58.000000, 3.000000)" fill="#D8D8D8">
                            <g id="l-3-" transform="translate(83.924588, 36.883456) rotate(-89.000000) translate(-83.924588, -36.883456) translate(69.424588, 12.883456)">
                                <path d="M14.1723611,48 C19.4148996,48 23.903645,41.8034457 25.7601702,33.016917 C26.3483828,30.2330353 28.8341336,32.1407168 28.8341336,28.9515567 C28.8341336,15.6967227 21.0759204,1.42108547e-14 14.1723611,1.42108547e-14 C7.2688017,1.42108547e-14 3.55271368e-15,13.745166 3.55271368e-15,27 C3.55271368e-15,29.9816317 1.95554677,29.8362716 2.47309478,32.4701788 C4.25630479,41.5452976 8.82173488,48 14.1723611,48 Z" id="l-3" />
                            </g>
                        </g>
                        <animateMotion dur="6s" begin="0.2s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                            <mpath xlink:href="#Line" />
                        </animateMotion>
                    </g>
    
                    <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Group" transform="translate(-48.000000, 3.000000)" fill="#D8D8D8">
                            <g id="l-4-" transform="translate(73.917498, 37.202362) rotate(-89.000000) translate(-73.917498, -37.202362) translate(61.417498, 13.202362)">
                                <path d="M12.2878333,48 C16.8332608,48 20.7251285,41.8034457 22.3347878,33.016917 C22.8447845,30.2330353 25,32.1407168 25,28.9515567 C25,15.6967227 18.2734123,1.42108547e-14 12.2878333,1.42108547e-14 C6.30225431,1.42108547e-14 0,13.745166 0,27 C0,29.9816317 1.69551372,29.8362716 2.14424232,32.4701788 C3.69033525,41.5452976 7.64869079,48 12.2878333,48 Z" id="l-4" />
                            </g>
                        </g>
                        <animateMotion dur="6s" begin="0.3s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                            <mpath xlink:href="#Line" />
                        </animateMotion>
                    </g>
    
                    <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Group" transform="translate(-32.000000, 3.000000)" fill="#D8D8D8">
                            <g id="l-5-" transform="translate(58.922677, 36.774735) rotate(-89.000000) translate(-58.922677, -36.774735) translate(49.422677, 12.774735)">
                                <path d="M9.33875331,48 C12.7932782,48 15.7510977,41.8034457 16.9744387,33.016917 C17.3620362,30.2330353 19,32.1407168 19,28.9515567 C19,15.6967227 13.8877933,1.42108547e-14 9.33875331,1.42108547e-14 C4.78971327,1.42108547e-14 0,13.745166 0,27 C0,29.9816317 1.28859043,29.8362716 1.62962417,32.4701788 C2.80465479,41.5452976 5.813005,48 9.33875331,48 Z" id="l-4" />
                            </g>
                        </g>
                        <animateMotion dur="6s" begin="0.4s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                            <mpath xlink:href="#Line" />
                        </animateMotion>
                    </g>
    
                    <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Group" transform="translate(-1.000000, -2.000000)" fill="#D8D8D8">
                            <g id="l-6" transform="translate(23.080623, 42.228667) rotate(-89.000000) translate(-23.080623, -42.228667) translate(-17.919377, 20.728667)">
                                <path d="M41.7607406,42.4419194 C43.7607286,42.4419194 43.2381119,38.329711 43.2310921,38.0763828 C43.1415394,34.8446384 44.2788431,34.4419194 41.6451883,34.4419194 C39.0115336,34.4419194 39.7260112,34.2957436 39.8222402,37.76842 C39.82926,38.0217482 39.7195178,42.4419194 41.7607406,42.4419194 Z" id="Oval" />
                                <path d="M23.6342467,37.7478622 C27.3113017,37.7478622 36.9500408,30.5559331 36.9500408,20.9578882 C36.9500408,18.65418 41.2958401,5.59095627 40.9839843,3.57909038 C39.9965407,-2.7911731 32.569021,0.0196920288 29.4031545,6.69804407 C26.912494,11.9520586 23.6342467,11.3598432 23.6342467,20.9578882 C23.6342467,30.5559331 19.9571917,37.7478622 23.6342467,37.7478622 Z" id="Oval" transform="translate(31.500000, 18.873931) scale(-1, 1) translate(-31.500000, -18.873931) " />
                                <path d="M43.2310921,38.0763828 C46.9081472,38.0763828 56.5468863,30.8844538 56.5468863,21.2864088 C56.5468863,18.9827007 60.8926856,5.91947694 60.5808297,3.90761104 C59.5933862,-2.46265244 52.1658664,0.348212694 49,7.02656473 C46.5093394,12.2805793 43.2310921,11.6883638 43.2310921,21.2864088 C43.2310921,30.8844538 39.5540371,38.0763828 43.2310921,38.0763828 Z" id="Oval" />
                                <rect id="Rectangle" fill-opacity="0" x="0.186684949" y="18.7699638" width="81" height="9" />
                            </g>
                        </g>
                        <animateMotion dur="6s" begin="0.5s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                            <mpath xlink:href="#Line" />
                        </animateMotion>
                    </g>
    
            </svg>
        </div>
        <svg class="fish" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMin slice" viewBox="0 0 743 645">
            <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                <path d="M177.367 337.568L182.709 357.739C198.517 417.421 249.748 460.995 311.193 467.019L421.508 477.834C478.237 483.396 532.831 454.649 560.346 404.729C607.09 319.923 557.549 214.182 462.47 195.822L375.079 178.946C368.369 177.651 361.766 175.854 355.324 173.572C251.651 136.837 149.205 231.245 177.367 337.568Z" class="line" id="Line" />
    
                <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Group" transform="translate(-103.000000, 3.000000)" fill="#F2AFAF">
                        <g id="l-1" transform="translate(118.396084, 37.985234) rotate(-89.000000) translate(-118.396084, -37.985234) translate(104.396084, 23.985234)">
                            <path d="M14.1723611,27.5145257 C19.9713509,27.5145257 24.6723611,22.8135155 24.6723611,17.0145257 C24.6723611,15.8258883 28.1981217,2.09701504 27.8341336,1.03166708 C26.4223375,-3.10048431 18.7827136,6.51452565 14.1723611,6.51452565 C9.87015746,6.51452565 1.67467528,-2.67194974 0.0523652038,1.03166708 C-0.512055182,2.32019808 3.67236107,15.5177394 3.67236107,17.0145257 C3.67236107,22.8135155 8.3733712,27.5145257 14.1723611,27.5145257 Z" />
                        </g>
                    </g>
                    <animateMotion dur="6s" begin="0s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                        <mpath xlink:href="#Line" />
                    </animateMotion>
                </g>
    
                <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Group" transform="translate(-71.000000, 3.000000)" fill="#8E24AA">
                        <g id="l-2" transform="translate(96.916890, 37.437926) rotate(-89.000000) translate(-96.916890, -37.437926) translate(60.416890, 13.437926)">
                            <ellipse id="Oval" cx="36.5" cy="24" rx="16.5" ry="24" />
                            <path d="M52.8409492,28.4193415 C56.9830848,28.4193415 67.8409492,23.8671728 67.8409492,17.7920406 C67.8409492,16.3338966 72.7364131,8.06546148 72.3851131,6.79204055 C71.2727759,2.75994931 63.4888957,6.79204055 60.3409492,6.79204055 C56.1988135,6.79204055 52.8409492,11.7169083 52.8409492,17.7920406 C52.8409492,23.8671728 48.6988135,28.4193415 52.8409492,28.4193415 Z" id="Oval" />
                            <path d="M1.84094917,28.4193415 C5.98308479,28.4193415 16.8409492,23.8671728 16.8409492,17.7920406 C16.8409492,16.3338966 21.7364131,8.06546148 21.3851131,6.79204055 C20.2727759,2.75994931 12.4888957,6.79204055 9.34094917,6.79204055 C5.19881354,6.79204055 1.84094917,11.7169083 1.84094917,17.7920406 C1.84094917,23.8671728 -2.30118646,28.4193415 1.84094917,28.4193415 Z" id="Oval" transform="translate(10.701577, 16.709671) scale(-1, 1) translate(-10.701577, -16.709671) " />
                        </g>
                    </g>
                    <animateMotion dur="6s" begin="0.1s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                        <mpath xlink:href="#Line" />
                    </animateMotion>
                </g>
    
                <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Group" transform="translate(-58.000000, 3.000000)" fill="#D8D8D8">
                        <g id="l-3-" transform="translate(83.924588, 36.883456) rotate(-89.000000) translate(-83.924588, -36.883456) translate(69.424588, 12.883456)">
                            <path d="M14.1723611,48 C19.4148996,48 23.903645,41.8034457 25.7601702,33.016917 C26.3483828,30.2330353 28.8341336,32.1407168 28.8341336,28.9515567 C28.8341336,15.6967227 21.0759204,1.42108547e-14 14.1723611,1.42108547e-14 C7.2688017,1.42108547e-14 3.55271368e-15,13.745166 3.55271368e-15,27 C3.55271368e-15,29.9816317 1.95554677,29.8362716 2.47309478,32.4701788 C4.25630479,41.5452976 8.82173488,48 14.1723611,48 Z" id="l-3" />
                        </g>
                    </g>
                    <animateMotion dur="6s" begin="0.2s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                        <mpath xlink:href="#Line" />
                    </animateMotion>
                </g>
    
                <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Group" transform="translate(-48.000000, 3.000000)" fill="#D8D8D8">
                        <g id="l-4-" transform="translate(73.917498, 37.202362) rotate(-89.000000) translate(-73.917498, -37.202362) translate(61.417498, 13.202362)">
                            <path d="M12.2878333,48 C16.8332608,48 20.7251285,41.8034457 22.3347878,33.016917 C22.8447845,30.2330353 25,32.1407168 25,28.9515567 C25,15.6967227 18.2734123,1.42108547e-14 12.2878333,1.42108547e-14 C6.30225431,1.42108547e-14 0,13.745166 0,27 C0,29.9816317 1.69551372,29.8362716 2.14424232,32.4701788 C3.69033525,41.5452976 7.64869079,48 12.2878333,48 Z" id="l-4" />
                        </g>
                    </g>
                    <animateMotion dur="6s" begin="0.3s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                        <mpath xlink:href="#Line" />
                    </animateMotion>
                </g>
    
                <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Group" transform="translate(-32.000000, 3.000000)" fill="#D8D8D8">
                        <g id="l-5-" transform="translate(58.922677, 36.774735) rotate(-89.000000) translate(-58.922677, -36.774735) translate(49.422677, 12.774735)">
                            <path d="M9.33875331,48 C12.7932782,48 15.7510977,41.8034457 16.9744387,33.016917 C17.3620362,30.2330353 19,32.1407168 19,28.9515567 C19,15.6967227 13.8877933,1.42108547e-14 9.33875331,1.42108547e-14 C4.78971327,1.42108547e-14 0,13.745166 0,27 C0,29.9816317 1.28859043,29.8362716 1.62962417,32.4701788 C2.80465479,41.5452976 5.813005,48 9.33875331,48 Z" id="l-4" />
                        </g>
                    </g>
                    <animateMotion dur="6s" begin="0.4s" repeatCount="indefinite" rotate="auto" fill="freeze"        >
                        <mpath xlink:href="#Line" />
                    </animateMotion>
                </g>
    
                <g xmlns="http://www.w3.org/2000/svg" id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Group" transform="translate(-1.000000, -2.000000)" fill="#D8D8D8">
                        <g id="l-6" transform="translate(23.080623, 42.228667) rotate(-89.000000) translate(-23.080623, -42.228667) translate(-17.919377, 20.728667)">
                            <path d="M41.7607406,42.4419194 C43.7607286,42.4419194 43.2381119,38.329711 43.2310921,38.0763828 C43.1415394,34.8446384 44.2788431,34.4419194 41.6451883,34.4419194 C39.0115336,34.4419194 39.7260112,34.2957436 39.8222402,37.76842 C39.82926,38.0217482 39.7195178,42.4419194 41.7607406,42.4419194 Z" id="Oval" />
                            <path d="M23.6342467,37.7478622 C27.3113017,37.7478622 36.9500408,30.5559331 36.9500408,20.9578882 C36.9500408,18.65418 41.2958401,5.59095627 40.9839843,3.57909038 C39.9965407,-2.7911731 32.569021,0.0196920288 29.4031545,6.69804407 C26.912494,11.9520586 23.6342467,11.3598432 23.6342467,20.9578882 C23.6342467,30.5559331 19.9571917,37.7478622 23.6342467,37.7478622 Z" id="Oval" transform="translate(31.500000, 18.873931) scale(-1, 1) translate(-31.500000, -18.873931) " />
                            <path d="M43.2310921,38.0763828 C46.9081472,38.0763828 56.5468863,30.8844538 56.5468863,21.2864088 C56.5468863,18.9827007 60.8926856,5.91947694 60.5808297,3.90761104 C59.5933862,-2.46265244 52.1658664,0.348212694 49,7.02656473 C46.5093394,12.2805793 43.2310921,11.6883638 43.2310921,21.2864088 C43.2310921,30.8844538 39.5540371,38.0763828 43.2310921,38.0763828 Z" id="Oval" />
                            <rect id="Rectangle" fill-opacity="0" x="0.186684949" y="18.7699638" width="81" height="9" />
                        </g>
                    </g>
                    <animateMotion dur="6s" begin="0.5s" repeatCount="indefinite" rotate="auto" fill="freeze">
                        <mpath xlink:href="#Line" />
                    </animateMotion>
                </g>
        </svg>
    </div>
</body>
</html>