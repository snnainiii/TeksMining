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
            background-image: url('<?php echo e(asset('images/wpp.png')); ?>');
            background-size: cover; /* Ensure the background covers the whole element */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Prevent the background from repeating */
            font-family: 'Roboto', sans-serif;
            font-weight: 700; 
        }
    
        .container {
            text-align: center;
            /* display: inline; */
            justify-content: center;
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

    body {
        background-image: url('<?php echo e(asset('images/wpp.png')); ?>');
            background-size: cover; /* Ensure the background covers the whole element */
            background-position: center; /* Center the background image */
            /* background-repeat: no-repeat; */
    }

    .card {
    background: radial-gradient(circle at 90% 90%, #31572c, black);
    color: #fff;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden; /* Untuk memastikan konten tidak keluar dari border-radius */
}

    .card-img-top {
        width: 100%;
        height: 200px; /* Sesuaikan tinggi gambar */
        object-fit: cover; /* Memastikan gambar penuh tanpa mengubah rasio aspek */
    }

    .card a.img-link {
        display: block; /* Pastikan link mengisi seluruh gambar */
    }

    .card-title {
        color: #fff;
        font-size: 1.5rem;
        margin-bottom: 10px;
        text-decoration: none;
        text-shadow: 0 0 10px #31572c;
    }

    .card-title a:hover {
    text-decoration: underline;
}

    .card-text {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #fff;
    font-size: 1rem;
    margin-bottom: 5px;
}

    .card-body {
        padding: 20px;
    }

    .form-control {
        padding: 10px 20px;
    }

    .kotak-ketik {
        width: 500px;
        border-radius: 20px;
        border-top-right-radius: 20px;
        margin-right: 5px;
        padding: 10px 15px;
        /* margin-left: 300px; */
    }

    .kategori {
        border-radius: 
    }

    .rank-berita {
        /* width: auto; */
        border-radius: 0px;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
    }
    .category-berita {
        /* width: auto; */
        border-radius: 10px;
    }

    .input-group {
        /* width: 60%; */
        justify-content: center;

    }
    


    .btn-secondary {
        margin-top: 5px;
        background-color: #31572c; 
        color: #fff; 
        border: none;
        border-radius: 20px; 
        padding: 10px 20px;
        cursor: pointer;
        width: 120px;
        transition: background-color 0.3s; 
        box-shadow: 0 0 10px #132a13;; 
    }

    .btn-secondary:hover {
        background-color: #132a13; 
        border: none;
    }

    /* judul berita */
    .judul_berita{
        font-weight: 900; 
        color: white; 
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        text-shadow: 2px 2px 4px #000; 
    }
</style>

</head>
<body>
    <main role="main">
        <div class="container">
            <!-- Another variation with a button -->
            <h1 class="judul_berita" > - Search Berita Kompas Atau Liputan6 -</h1>
            <br>
            
            <form action="#" method="GET" onsubmit="return false">
                <div class="input-group">
                    <input type="text" class="kotak-ketik form-control" placeholder ="Ketikkan yang ingin anda cari..." name="q" id="cari">
                    <div class="col-lg-1">
                        <select class="rank-berita form-control" name="rank" id="rank">
                            <option value="5">5</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
                
                <br>
                
                <div class="input-group-append">
                    <select class="category-berita form-control" name="category" id="category">
                            <option value="">Pilih Kategori Berita</option>
                            <option value="Edukasi">Edukasi</option>
                            <option value="Health">Health</option>
                            <option value="Sports">Sports</option>
                            <option value="Travel">Travel</option>
                            <option value="Food">Food</option>
                            <option value="Otomotif">Otomotif</option>
                            <option value="News">News</option>
                            <option value="Bisnis">Bisnis</option>
                            <option value="Lifestyle">Lifestyle</option>
                            <option value="Bola">Bola</option>
                            <option value="Global">Global</option>
                            <option value="Tekno">Tekno</option>
                        </select>
                </div>
                <br>

                
                <div class="input-group-append">
                    <button class="btn btn-secondary fas fa-search" id="search" type="button">Search</button>
                </div>
            </form>
        </div>
    </main>

    <div class="row m-4" id="content">
        
    </div>
</body>
</html>

<script>
    $(document).ready(function() {
        $("#search").click(function(){
            var cari = $("#cari").val().trim();
            var rank = $("#rank").val();
            var category = $("#category").val().trim(); // Ambil nilai kategori

            if (!cari && !category) {
                alert('Silakan masukkan kata kunci pencarian atau pilih kategori');
                return;
            }

            $.ajax({
                url: '/search',
                type: 'GET',
                data: {
                    q: cari,
                    rank: rank,
                    category: category // Sertakan kategori dalam data
                },
                success: function(data){
                    $('#content').html(data.join(''));
                },
                error: function(data){
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            });
        });
    });
</script>

<?php /**PATH D:\uas-penteks\search\resources\views/Landing.blade.php ENDPATH**/ ?>