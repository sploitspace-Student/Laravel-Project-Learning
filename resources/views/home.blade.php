<x-layout :title="$title" class="bg-black overscroll-none m-0 p-0 overflow-x-hidden">

    <div id="smooth-wrapper">
        <div class="overflow-x-visible overflow-y-visible w-full h-[4000px]" style="background-image: 
         linear-gradient(rgba(255, 255, 255, 0.07) 2px, transparent 2px),
         linear-gradient(90deg, rgba(255, 255, 255, 0.07) 2px, transparent 2px),
         linear-gradient(rgba(255, 255, 255, 0.06) 1px, transparent 1px),
         linear-gradient(90deg, rgba(255, 255, 255, 0.06) 1px, transparent 1px);
       background-size: 100px 100px, 100px 100px, 20px 20px, 20px 20px;
       background-position: -2px -2px, -2px -2px, -1px -1px, -1px -1px;">
            <header class="flex justify-center items-center flex-col pt-10">
                <h1 class="mt-8">scroll smoother</h1>
                <button class="relative mt-4">Jump To shade</button>
            </header>
            <div class="absolute w-[100px] h-[100px] left-1/2 -translate-x-1/2 z-[100] text-center will-change-transform top-[400px] gradient-pink" data-speed="clamp(0.5)">a</div>
            <div class="absolute w-[100px] h-[100px] left-1/2 -translate-x-1/2 z-[100] leading-[100px] text-center will-change-transform top-[900px] gradient-purple" data-speed="clamp(0.8)">Some Water</div>
            <img class="absolute w-[100px] h-[100px] left-1/2 -translate-x-1/2 z-[100] leading-[100px] text-center will-change-transform top-[1300px]" data-speed="1.5" src="https://assets.codepen.io/16327/2D-keyframe-2.png" alt="">
            <div class="invisible absolute top-0 left-[400px] w-[2px] h-[4000px] bg-[#777]">line</div>
            <div class="absolute top-[2400px] -translate-y-full text-[30px] text-white">End</div>
        </div>
    </div>
    <footer class="fixed right-0 bottom-0 pt-[6px] pr-[10px] pb-[10px] pl-[12px] rounded-tl-[26px] z-100 bg-black/50 text-white">

    </footer>

<script src="https://cloudflare.com"></script>
<script src="https://cloudflare.com"></script>

<!-- 2. Panggil ScrollSmoother bawaan lokal Anda menggunakan helper Laravel -->
<script src="{{ asset('js/ScrollSmoother.min.js') }}"></script>

<!-- 3. Jalankan Inisialisasi Script -->
<script>
  // Pastikan plugin terdaftar dengan benar
  gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

  // Buat smooth scroller
  let smoother = ScrollSmoother.create({
    smooth: 2,
    effects: true,
    normalizeScroll: true
  });

  // Animasi Pin untuk Shape
  ScrollTrigger.create({
    trigger: "img[src*='2D-keyframes']", // menargetkan gambar shape langsung jika class diubah
    pin: true,
    start: "center center",
    end: "+=300"
  });
    </script>
</x-layout>