$(document).ready(function () {

    var $modal = $('#modal');
    var image = document.getElementById('sample_image');
    var nombreOriginal;
    var cropper;
    var altoImg;
    var anchoImg;
    var imgRectActual;

    var tipo = $("#tipo").val();



    if(tipo == 1){
        var proporcion = 4 / 1.7; //Espacios
        var anchooutput = 1901;
        var altooutput = 806;
    } else if(tipo == 2){ 
        var proporcion = 1; //Actividades
        var anchooutput = 800;
        var altooutput = 800;
    } else if(tipo == 3){ 
        var proporcion = 3; //Slide Home rectangular
        var anchooutput = 1901;
        var altooutput = 633;
    } else if(tipo == 4){ 
        var proporcion = 1; //Slide Home Cuadrado
        var anchooutput = 900;
        var altooutput = 900;
    }


    $('#upload_image').change(function (event) {

        var files = event.target.files;

        nombreOriginal = files[0]["name"];

        imgRectActual = $("#imageNewRect").val();

        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function (event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            initialAspectRatio: proporcion,
            aspectRatio: proporcion,
            autoCropArea: 1,
            viewMode: 2,
            preview: '.preview',
            crop: function (e) {

                $("#alto").val(Math.round(e.detail.height));
                $("#ancho").val(Math.round(e.detail.width));

                anchoImg = Math.round(e.detail.width);
                altoImg = Math.round(e.detail.height);

            }
        });

        
       
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function () {
        
        canvas = cropper.getCroppedCanvas({
            /*width: anchoImg,
            height: altoImg*/
            width: anchooutput,
            height: altooutput
        
            
            
        });

        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                $.ajax({
                    url: 'upload.php',
                    method: 'POST',
                    data: {
                        image: base64data,
                        nombre: nombreOriginal,
                        tipo: tipo,
                        imgActual: imgRectActual
                    },
                    success: function (data) {
                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', data);

                        var divide = data.split("/");
                        var imageUp = divide[3];
                        $("#imageNewRect").val(imageUp);

                    }
                });
            };
        }, 'image/jpeg', 1);

    });

    //**************************************************************************** */

    var $modal2 = $('#modal2');
    var image2 = document.getElementById('sample_image2');
    var nombreOriginal2;
    var cropper2;
    var altoImg2;
    var anchoImg2;
    var imgCuadtActual2;
    
    var tipo2 = $("#tipo2").val();

    if(tipo2 == 1){
        var proporcion2 = 4 / 1.7; //Espacios
        var anchooutput2 = 1901;
        var altooutput2 = 806;
    } else if(tipo2 == 2){ 
        var proporcion2 = 1; //Actividades
        var anchooutput2 = 800;
        var altooutput2 = 800;
    } else if(tipo2 == 3){ 
        var proporcion2 = 3; //Slide Home rectangular
        var anchooutput2 = 1901;
        var altooutput2 = 633;
    } else if(tipo2 == 4){ 
        var proporcion2 = 1; //Slide Home Cuadrado
        var anchooutput2 = 900;
        var altooutput2 = 900;
    }



    $('#upload_image2').change(function (event) {

        var files2 = event.target.files;

        nombreOriginal2 = files2[0]["name"];

        imgCuadtActual2 = $("#imageNewCuad").val();

        var done = function (url) {
            image2.src = url;
            $modal2.modal('show');
        };

        if (files2 && files2.length > 0) {
            reader = new FileReader();
            reader.onload = function (event) {
                done(reader.result);
            };
            reader.readAsDataURL(files2[0]);
        }
    });

    $modal2.on('shown.bs.modal', function () {
        cropper2 = new Cropper(image2, {
            aspectRatio: proporcion2,
            viewMode: 3,
            preview: '.preview3',
            crop: function (e) {

                $("#alto2").val(Math.round(e.detail.height));
                $("#ancho2").val(Math.round(e.detail.width));

                anchoImg2 = Math.round(e.detail.width);
                altoImg2 = Math.round(e.detail.height);

            }
        });
    }).on('hidden.bs.modal', function () {
        cropper2.destroy();
        cropper2 = null;
    });

    $('#crop2').click(function () {
        
        canvas2 = cropper2.getCroppedCanvas({
            /*width: anchoImg2,
            height: altoImg2*/
            width: anchooutput2,
            height: altooutput2
        });

        canvas2.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                $.ajax({
                    url: 'upload.php',
                    method: 'POST',
                    data: {
                        image: base64data,
                        nombre: nombreOriginal2,
                        tipo: tipo2,
                        imgActual: imgCuadtActual2
                    },
                    success: function (data) {
                        $modal2.modal('hide');
                        $('#uploaded_image2').attr('src', data);

                        var divide = data.split("/");
                        var imageUp = divide[3];
                        $("#imageNewCuad").val(imageUp);

                    }
                });
            };
        }, 'image/jpeg', 1);

    });


});