<?php 
$path = $_SERVER['REQUEST_URI'];

$locations = [
  [
    "judul" => "Dashboard",
    "icon" => "bar-chart-2",
    "href" => "../dashboard",
    "highlight" => "dashboard"
  ],
  [
    "judul" => "Manajemen Pesanan",
    "icon" => "bar-chart-2",
    "href" => "../manajemen-pesanan",
    "highlight" => "manajemen-pesanan"
  ],
  [
    "judul" => "Manajemen Menu",
    "icon" => "database",
    "href" => "../manajemen-menu",
    "highlight" => "manajemen-menu"
  ],
  [
    "judul" => "Ulasan",
    "icon" => "message-circle",
    "href" => "../ulasan/",
    "highlight" => "manajemen-ulasan"
  ],
];

?>

<aside
      id="sidebar"
      class="bg-card-foreground bg-black text-white text-card border-r shadow-xl min-h-screen max-w-[250px] p-4 z-[100] flex flex-col fixed md:static"
    >
      <div class="flex flex-col items-center mt-8">
        <img
          id="sidebar-logo"
          src="../../../assets/images/logo-white.svg"
          alt="logo"
          class="transition-all"
          width="128px"
          height="128px"
        />
        <p class="font-medium sidebar-text">Warung Pak Wayan</p>
      </div>
      <div
        data-orientation="horizontal"
        role="none"
        class="shrink-0 bg-border h-[1px] w-full my-4"
      ></div>
      <ul class="space-y-1 flex-1 text-gray-300">
        <?php foreach ($locations as $location): ?>
          <li
            title="<?= $location['judul']?>"
            class="<?= isset($_GET['highlight']) && $_GET['highlight'] === $location['highlight'] ? 'transition-all duration-300 rounded-md px-4 py-2 bg-primary/25 text-primary' : 'transition-all duration-300 rounded-md px-4 py-2 bg-gray-900' ?>"
          >
            <a class="flex items-center gap-3" href="<?= $location['href']?>">
              <i data-feather="<?= $location['icon']?>"></i>
              <div class="sidebar-text"><?= $location['judul']?></div>
            </a>
          </li> 
        <?php endforeach ?>
      </ul>
      <div>
        <div
          data-orientation="horizontal"
          role="none"
          class="shrink-0 bg-border h-[1px] w-full my-4"
        ></div>
        <button
          id="sidebar-tutup"
          class="duration-300 bg-gray-900 transition-all rounded-md p-2 flex gap-3 w-full"
        >
          <i data-feather="arrow-left"></i>
          <span class="sidebar-text">Tutup</span>
        </button>
      </div>
    </aside>

    <script>
      // Logika untuk sidebar
      const tombolClose = $("#sidebar-tutup");
      const sidebar = $("#sidebar");
      const sidebarLogo = $("#sidebar-logo");
      const sidebarTexts = $(".sidebar-text");

      tombolClose.click(() => {
        sidebarTexts.each((i, e) => {
          e.classList.toggle("hidden");
        });
        sidebar.toggleClass("fixed");
        sidebarLogo.toggleClass("w-16 h-16");
        sidebarLogo.toggleClass("w-7 h-7");
      });

      // Feather icon...
      feather.replace();
    </script>
