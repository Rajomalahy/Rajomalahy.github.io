<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="fonts/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>canvas</title>
</head>
<body>
    <form id="imageForm" action="upload.php" enctype="multipart/form-data" method="post">
        <input type="file" name="uploadedImage" id="uploadedImage">
        <input type="submit" value="Télécharger">
    </form>

    <canvas id="myCanvas" width="800" height="600" style="border:1px solid black"></canvas>
    <form action="traitement.php" id="coordForm" method="post">
        <input type="hidden" name="coordX" id="coordX" value="">
        <input type="hidden" name="coordY" id="coordY" value="">
        <input type="submit" value="Enregistrer">
    </form>
    <script>
        const canvas = document.getElementById("myCanvas");
        const ctx = canvas.getContext('2d');

        document.getElementById('imageForm').addEventListener('submit', function(event){
            event.preventDefault();

            const fileInput = document.getElementById("uploadedImage");
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onloadend = function(){
                const img = new Image();
                img.src = reader.result;

                img.onload = function(){
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                };
            };
            if(file){
                    reader.readAsDataURL(file);
                }
        });

        canvas.addEventListener('click', function(event){
            const rect = canvas.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            document.getElementById('coordX').value = x;
            document.getElementById('coordY').value = y;
        })
    </script>

<script src="JavaScript/jquery3.js"></script>    
<script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
<script src="bootstrap-4.4.1-dist/js/bootstrap.js"></script>
</body>
</html>