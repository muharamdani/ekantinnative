let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        document.getElementById("qrdata").value = content;
        if(content!=='')
        {
          document.getElementById('sendnis').click();
        }
        $.post('hasil.php',{dataqr:content},
        function(data)
        {
          if(data)
          {
            document.getElementById("content").innerHTML=data;
          }
          else
          {
            document.getElementById("error").innerHTML="Error";
          }
        });
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });