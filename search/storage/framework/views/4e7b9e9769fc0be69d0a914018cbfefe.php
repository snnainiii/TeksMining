<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEARCH BERITA</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss','resources/js/app.js']); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: black;
            font-family: 'Roboto', sans-serif;
            font-weight: 700; 
        }
        .container {
            text-align: center;
        }
        #content {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
            body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: 'Roboto', sans-serif;
        color: #fff; /* Warna teks putih */
    }
    .card {
        background: radial-gradient(circle at 90% 90%, #ff6699,black ); /* Gradasi lingkaran hitam ke merah muda */
        color: #fff; /* Warna teks putih untuk card */
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .card-title {
        color: #fff; /* Warna judul putih */
        font-size: 1.5rem;
        margin-bottom: 10px;
        text-shadow: 0 0 10px #ff6699; /* Efek glow neon pada judul */
    }
    .card-text {
        color: #bbb; /* Warna teks abu-abu muda */
        font-size: 1rem;
        margin-bottom: 5px;
    }
    .card-body {
        padding: 20px;
    }
    .form-control {
        background-color: #292929; /* Warna latar belakang input */
        border: none;
        color: #fff; /* Warna teks putih */
        border-radius: 20px; /* Mengatur sudut input */
        padding: 10px 20px;
        width: 200px; /* Lebar input */
        box-shadow: 0 0 10px #ff6699; /* Efek glow neon pada input */
    }
    .btn-secondary {
        background-color: #ff6699; /* Warna latar belakang tombol */
        color: #fff; /* Warna teks putih */
        border: none;
        border-radius: 20px; /* Mengatur sudut tombol */
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s; /* Animasi perubahan warna */
        box-shadow: 0 0 10px #ff6699; /* Efek glow neon pada tombol */
    }
    .btn-secondary:hover {
        background-color: #ff007b; /* Warna latar belakang tombol saat dihover */
    }
</style>

</head>
<body>
    <main role="main">
        <div class="container">
            <!-- Another variation with a button -->
            <h1 style="font-weight: 900"> Search Berita </h1>
            <br>
            <form action="#" method="GET" onsubmit="return false">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder ="Ketikkan yang ingin anda cari..." name="q" id="cari">
                    <div class="col-lg-1">
                        <select class="form-control" name="rank" id="rank">
                            <option value="5">5</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div><br>
                <div class="input-group-append">
                    <button class="btn btn-secondary fas fa-search" id="search" type="button">Search</button>
                </div>
            </form>
        </div>
    </main>

    <div class="row m-4" id="content">
        <!-- Here goes the content -->
    </div>
</body>
</html>

<script>
    $(document).ready(function() {
        $("#search").click(function(){
            var cari = $("#cari").val();
            var rank = $("#rank").val();
            $.ajax({
                url:'/search?q='+cari+'&rank='+rank,
                dataType : "json",
                success: function(data){
                         $('#content').html(data);
                    },
                    error: function(data){
                        alert("Please insert your command");
                    }
            });
        });
    });
</script>
<?php /**PATH D:\KULIAH\SEMESTER 6\PENAMBANGAN TEXT\tugas\search\resources\views/Landing.blade.php ENDPATH**/ ?>