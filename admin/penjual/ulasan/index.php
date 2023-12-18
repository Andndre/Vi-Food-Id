<?php
session_start();

if (!defined('ROOT'))
  define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
  require_once ROOT . "/module/backend/akun/cek-login.php";
  require_once ROOT . "/module/backend/database/connection.php";
  
      function getAllCommentsById($slug) {
        $koneksi = getDb();
        // Query untuk mendapatkan semua komentar pada semua menu dari tempat makan
        $query = "SELECT um.id AS ulasan_id,
                um.id_menu,
                um.pengirim,
                um.bintang,
                um.isi AS ulasan_isi,
                GROUP_CONCAT(gu.href) AS gambar_ulasan_href
            FROM ulasan_menu AS um
            JOIN menu AS m ON um.id_menu = m.id
            JOIN tempat_makan AS tm ON m.tempat_makan = tm.username
            LEFT JOIN gambar_ulasan AS gu ON um.id = gu.id_ulasan
            WHERE tm.slug = ?
            GROUP BY um.id, um.id_menu, um.pengirim, um.bintang, um.isi;";

        $stmt = $koneksi->prepare($query);

        if (!$stmt) {
            echo "Error preparing statement: " . $koneksi->error;
            exit();
        }

        $stmt->bind_param("s", $slug);

        if (!$stmt->execute()) {
            echo "Error executing statement: " . $stmt->error;
            exit();
        } else {
            $result = $stmt->get_result();
            $comments = $result->fetch_all(MYSQLI_ASSOC);
            return $comments;
        }
    }

        function getAllRating($slug) {
          $query = "SELECT
              tm.nama_tempat_makan,
              tm.slug AS tempat_makan_slug,
              COALESCE(SUM(CASE WHEN um.bintang = 0 THEN 1 ELSE 0 END), 0) AS rating_0,
              COALESCE(SUM(CASE WHEN um.bintang = 1 THEN 1 ELSE 0 END), 0) AS rating_1,
              COALESCE(SUM(CASE WHEN um.bintang = 2 THEN 1 ELSE 0 END), 0) AS rating_2,
              COALESCE(SUM(CASE WHEN um.bintang = 3 THEN 1 ELSE 0 END), 0) AS rating_3,
              COALESCE(SUM(CASE WHEN um.bintang = 4 THEN 1 ELSE 0 END), 0) AS rating_4,
              COALESCE(SUM(CASE WHEN um.bintang = 5 THEN 1 ELSE 0 END), 0) AS rating_5
          FROM tempat_makan AS tm
          LEFT JOIN menu AS m ON tm.username = m.tempat_makan
          LEFT JOIN ulasan_menu AS um ON m.id = um.id_menu
          WHERE tm.slug = '$slug'
          GROUP BY tm.nama_tempat_makan, tm.slug;";
      
          $koneksi = getDb();
      
          $result = $koneksi->query($query);
      
          if (!$result) {
              echo "Error executing query: " . $koneksi->error;
              exit();
          }
      
          $ratings = $result->fetch_assoc();
      
          return $ratings;
      }
      
      if(isset($_GET['slug'])) {
        $slug = $_GET['slug'];
        $ratings = getAllRating($slug);
        $sumAllRating = $ratings['rating_0'] + $ratings['rating_1'] + $ratings['rating_2'] + $ratings['rating_3'] + $ratings['rating_4'] + $ratings['rating_5'];
        $maxRating = max((int)$ratings['rating_0'], (int)$ratings['rating_1'], (int)$ratings['rating_2'], (int)$ratings['rating_3'], (int)$ratings['rating_4'], (int)$ratings['rating_5']);
    
        // Panggil fungsi getAllCommentsById() dengan parameter $slug
        $comments = getAllCommentsById($slug);
        
        // Tampilkan ulasan dan informasi rating di halaman web
        foreach ($comments as $comment) {
            // Lakukan operasi untuk menampilkan informasi ulasan menu
            echo "ID Ulasan: " . $comment['ulasan_id'] . "<br>";
            echo "Pengirim: " . $comment['pengirim'] . "<br>";
            echo "Bintang: " . $comment['bintang'] . "<br>";
            echo "Isi Ulasan: " . $comment['ulasan_isi'] . "<br>";
            echo "Gambar Ulasan: " . $comment['gambar_ulasan_href'] . "<br><br>";
        }
        
        // Tampilkan informasi rating
        echo "Nama Tempat Makan: " . $ratings['nama_tempat_makan'] . "<br>";
        echo "Slug Tempat Makan: " . $ratings['tempat_makan_slug'] . "<br>";
        echo "Rating 0: " . $ratings['rating_0'] . "<br>";
        echo "Rating 1: " . $ratings['rating_1'] . "<br>";
        echo "Rating 2: " . $ratings['rating_2'] . "<br>";
        echo "Rating 3: " . $ratings['rating_3'] . "<br>";
        echo "Rating 4: " . $ratings['rating_4'] . "<br>";
        echo "Rating 5: " . $ratings['rating_5'] . "<br>";
    } else {
        echo "Parameter 'slug' tidak ditemukan dalam URL.";
    }

?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<?php require ROOT . "/module/components/head.php" ?>
  <body class="bg-gray-200">
    <div class="flex w-full min-h-screen">
    <?php 
     $_GET['highlight'] = "manajemen-ulasan";
    require ROOT . "/module/components/sidebar-penjual.php";
    ?>
      <div class="flex-1 flex flex-col">
			<?php require ROOT . "/module/components/navbar.php"; ?>

        <!-- Konten komentar mulai-->
        <div class="py-10 px-5 mx-3 my-3 bg-white rounded-md">
          <div class="flex items-center mb-4">
          </div>
          <div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">
            <svg
              class="w-4 h-4 text-yellow-300"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-4 h-4 text-yellow-300"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-4 h-4 text-yellow-300"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-4 h-4 text-yellow-300"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-4 h-4 text-gray-300"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
          </div>
          <div class="mb-5 text-sm text-gray-500">
            <p></p>
          </div>
          <p class="mb-2 text-gray-500">
           
          </p>
          <p class="mb-3 text-gray-500">
          </p>
          <a
            href="#"
            class="block mb-5 text-sm font-medium text-primary hover:underline"
            >Lebih Lanjut</a
          >
          <div>
            <p class="mt-1 text-xs text-gray-500">
              19 orang menyukai komentar ini
            </p>
            <div class="flex flex-col items-start mt-3">
              <textarea
                name=""
                id=""
                cols="30"
                rows="3"
                class="w-full p-3 rounded-md border-2 border-gray-300"
                placeholder="Ketikkan Balasan..."
              ></textarea>
              <div class="flex my-4">
                <a
                  href="#"
                  class="text-white bg-primary font-medium rounded-lg text-xs px-2 py-1.5"
                  >Balas</a
                >
              </div>
            </div>
          </div>
        </div>

        <!-- Konten komentar berakhir-->

        <footer class="px-5 container mx-auto py-4 border-t">
          Copyright © 2023 VI-Food.co
        </footer>
      </div>
    </div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    <style>
      .hidden {
        display: none;
      }
    </style>
  </body>
</html>
