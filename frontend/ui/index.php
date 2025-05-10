<?php require_once "../../database/dbConnect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrbanNest</title>
    <link rel="stylesheet" href="../assets/vendor/bootstrap/bootstrap.min.css">
    <link href="../assets/img/favicon.png" rel="icon" />
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
        <div>
            <div class="d-flex justify-content-center">
                <div class="p-2 bg-black text-white rounded fw-bold fs-3">UN</div>
            </div>
            <h4 class="fs-2 fw-bold text-black mb-0 mt-2" style="letter-spacing: 1px;">UrbanNest</h4>
            <div class="progress mt-2" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="height: 7px">
                <div class="progress-bar progress-bar-striped bg-dark" id="progressBar" style="width: 0%"></div>
            </div>
        </div>
    </div>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/jQuery/jquery-3.7.1.min.js"></script>
    <script>
        let percent=0;
        let interval=setInterval(()=>{
            $("#progressBar").css({"width":`${percent+=2}%`})
            if(percent==150){
                clearInterval(interval);
                window.location.replace("./home.php")
            }
        },30)
    </script>
</body>
</html>