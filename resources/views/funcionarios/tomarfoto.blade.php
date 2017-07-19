<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #c{display: none;}
    </style>
    <title>Document</title>
</head>
<body>
    <img src="" id="img">
    <video id="v"></video>
    <canvas id="c"></canvas>
    <button id="b" >TOMAR FOTO</button>

    <script>
        window.addEventListener('load',init);
        function init() {
            var video = document.querySelector('#v'), canvas= document.querySelector('#c'),
                bton =document.querySelector('#b'), img =document.querySelector('#img');

            navigator.getUserMedia = (navigator.getUserMedia ||
                                      navigator.webkitGetUserMedia ||
                                      navigator.mozGetUserMedia ||
                                        navigator.msGetUserMedia);
            if(navigator.getUserMedia)
            {
                navigator.getUserMedia({video:true},function stream(){
                    video.src= window.URL.createObjectURL(stream);
                    video.play();
                },function (e){console.log(e);})
            }
            else alert('tienes un navegador obsoleto');
            video.addEventListener('loadedmetadata',function () {
               canvas.widget =video.videoWidth, canvas.height = video.videoHeight},false);

            bton.addEventListener('click',function () {
                canvas.getContext('2d').drawImage(video,0,0);
                var imgdata= canvas.toDataURL('image/png');
                img.setAttribute('src',imgdata);
            })
        }
    </script>
</body>
</html>