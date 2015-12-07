    navigator.getMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia);
    canvas       = document.querySelector('#canvas'),
    photo        = document.querySelector('#photoForm'),
    mountForm    = document.querySelector('#mountForm'),
    mountFormFile    = document.querySelector('#mountFormFile'),
    makerForm    = document.querySelector('#makerForm'),
    inputForm    = document.querySelector('#inputForm'),
    fileUpForm   = document.querySelector('#fileUpForm'),
    mount        = document.querySelector('#mount'),
    maker        = document.querySelector('#maker'),
    startButton  = document.querySelector('#startButton'),
    startButton.disabled = true,
    video        = document.getElementsByTagName('video')[0];
    canMake      = false;
    webcam       = false;
    fileSet      = false;

    navigator.getMedia(
        // constraints
        {video:true, audio:false},

        // success callback
        function (mediaStream) {
            var img = document.getElementById('toHide');
            video.className = "relative block center-block";
            img.className = "hidden";
            video.src = window.URL.createObjectURL(mediaStream);
            video.play();
            canMake = true;
            webcam  = true;

        },
        //handle error
        function (error) {
            canMake = false;
        })

    function takePicture() {
        canvas.setAttribute('width', 300);
        canvas.setAttribute('height', 200);
        canvas.getContext('2d').drawImage(video, 0, 0, 300, 200);
        var data = canvas.toDataURL('image/png');
        photo.setAttribute('value', data);
        makerForm.submit();
    }

    function setPicture(e, id_img) {
        if (canMake)
        {
            var left = (maker.offsetWidth - parseInt(video.style.width))/2;
            mount.style.width = video.style.width - 10;
            mount.style.height = video.style.height;
            mount.style.top = "0px";
            mount.style.left = left + 50;
            mount.src = e.src;
            mountForm.setAttribute('value', id_img);
            mountFormFile.setAttribute('value', id_img);
            startButton.disabled = false;
        }
        else
            alert("Veuillez uploader une photo avant de selectionner une image.");
    }

    function uploadFile()
    {
        inputForm.click();
    }

    function uploadFileChange()
    {
        var reader = new FileReader();
        var baseImg = document.getElementById('toHide');

        reader.readAsDataURL(inputForm.files[0]);
        reader.onload = function (e) {
                baseImg.src = e.target.result;
                canMake = true;
        }
    }

    startButton.addEventListener('click', function(ev){
        if (webcam)
            takePicture();
        else
            fileUpForm.submit();
        ev.preventDefault();
    }, false);

    window.addEventListener('resize', function() {
        var left = (maker.offsetWidth - parseInt(video.style.width))/2;
        mount.style.left = left + 50;
    });
