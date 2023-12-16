<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keamanan</title>
    <link rel="stylesheet" href="../../assets/css/dist/output.css" />
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.js"></script>
  </head>
  <body>
    <nav class="bg-white shadow-sm">
      <div
        class="flex items-center h-16 justify-between w-full gap-6 container mx-auto px-4"
      >
        <a href="/"><img src="../../assets/images/logo.svg" alt="logo" class="h-5" /></a>
        <div class="flex gap-4 items-center">
          <div class="flex gap-3 items-center">
            <a
              class="flex gap-2 items-center px-6 py-3 bg-primary/10 hover:bg-primary/25 transition-all duration-300 rounded-md"
              href="../../pembelian"
              ><i data-feather="bar-chart-2"></i> Pembelian</a
            >
            <a
              class="flex gap-2 items-center px-6 py-3 bg-primary/10 hover:bg-primary/25 transition-all duration-300 rounded-md"
              href="../../keranjang/"
              ><i data-feather="shopping-cart"></i> Keranjang</a
            >
          </div>
          <a href="../">
						<div class="w-10 h-10 bg-gray-400 rounded-full"></div>
					</a>
        </div>
      </div>
    </nav>
    <div class="container mx-auto px-8">
			<div class="space-y-6 pt-10">
				<div class="space-y-0.5">
					<h2 class="text-2xl font-bold tracking-tight">Keamanan</h2>
					<p class="text-grabg-gray-200/60-foreground">
						Berikut adalah pengaturan untuk akun Anda
					</p>
				</div>
				<div
					data-orientation="horizontal"
					role="none"
					class="shrink-0 bg-border h-[1px] w-full my-6"
				></div>
				<div
					class="grid grid-cols-12 gap-8"
				>
					<aside class="-ml-4 col-span-12 md:col-span-4 lg:col-span-3">
						<nav class="flex flex-col space-y-1 relative">
							<a
								class="rounded-md text-sm font-medium 
								h-10 px-4 py-2 flex justify-start gap-3 items-center 

								hover:bg-gray-200/60"
								href="../"
								><i data-feather="user" class="h-4"></i>Profil</a
							><a
								class="rounded-md text-sm font-medium  
								h-10 px-4 py-2 flex justify-start gap-3 items-center 

								before:rounded-full
								before:absolute before:content-[''] 
								before:h-5 before:-left-1 
								before:w-1 bg-gray-200/60 
								before:bg-primary"
								href="#"
								> <i data-feather="lock" class="h-4"></i> Keamanan</a
							>
						</nav>
					</aside>
					<div class="col-span-12 md:col-span-8 lg:col-span-9">
						<div class="space-y-6">
							<div>
								<h3 class="text-lg font-medium">Keamanan</h3>
								<p class="text-sm text-grabg-gray-200/60-foreground">
									Update informasi terkait keamanan akun Anda di sini.
								</p>
							</div>
							<div
								class="border-t h-[1px] w-full"
							></div>
							<div class="flex flex-col space-y-6">
								<form class="space-y-8 lg:m-0 lg:flex-1">
									<div class="space-y-2">
										<label
											class="text-sm font-medium leading-none"
											>Email</label
										><input
											type="email"
											class="flex h-10 w-full rounded-md border 
											px-3 py-2 text-sm 
											outline-none
											focus-visible:ring-primary
											focus-visible:ring-2 
											focus-visible:ring-offset-4"
											placeholder="Perbarui Email"
											name="email"
										/>
									</div>
									<div class="space-y-2">
										<label
											class="text-sm font-medium leading-none"
											>Perbarui Password</label
										>
										<input
											type="password"
											class="flex h-10 w-full rounded-md border 
											px-3 py-2 text-sm 
											outline-none
											focus-visible:ring-primary
											focus-visible:ring-2 
											focus-visible:ring-offset-4"
											placeholder="Password Lama"
											name="password-old"
										/>
										<input
											type="password"
											class="flex h-10 w-full rounded-md border 
											px-3 py-2 text-sm 
											outline-none
											focus-visible:ring-primary
											focus-visible:ring-2 
											focus-visible:ring-offset-4"
											placeholder="Password Baru"
											name="password-new"
										/>
										<input
											type="password"
											class="flex h-10 w-full rounded-md border 
											px-3 py-2 text-sm 
											outline-none
											focus-visible:ring-primary
											focus-visible:ring-2 
											focus-visible:ring-offset-4"
											placeholder="Konfirmasi Password"
											name="password-new-confirm"
										/>
									</div>
									<button
										class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2"
										type="submit"
									>
										Simpan
									</button>
								</form>
							</div>
						</div>
						<div class="mt-8"></div>
						<footer class="container mx-auto py-4 border-t px-0">
							Copyright © 2023 VI-Food.co<!-- -->
						</footer>
					</div>
				</div>
			</div>
		</div>
    <!--  -->
    <script>
      feather.replace();
    </script>
  </body>
</html>
