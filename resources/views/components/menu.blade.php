@extends('template.antrian')
@section('content')
<div class="relative bg-image" style="background-image: url('img/rsigm.png');">

  <div class=" bg-black bg-opacity-60  h-screen fixed w-full">
    <div class="translate-y-40 mx-auto justify-center flex text-4xl tracking-wider text-slate-100">
      <h1 class=" font-extrabold border-b-opacity-80">DAFTAR MENU</h1>
    </div>
    <div class="container px-16 inset-0 flex flex-wrap items-center gap-2 justify-center my-56">





      <div class="relative flex flex-col text-slate-900 bg-slate-200 shadow-md hover:opacity-80 w-96 rounded-xl bg-clip-border border border-fuchsia-800">
        <a href="/daftarantrian">
          <div class="p-6 flex">
            <div class="flex flex-col">

              <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                DAFTAR ANTRIAN
              </h5>
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                Lorem ipsum dolor sit amet.
              </p>
            </div>
            <div class="translate-x-11">
              <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
              </svg>
            </div>
          </div>
          <div class="">
            <div class="w-full select-none rounded-b-lg bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md hover:opacity-80 shadow-fuchsi-500/20 transition-all  focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" data-ripple-light="true">

            </div>
          </div>
        </a>
      </div>

      <div class="relative flex flex-col text-slate-900 bg-slate-200 shadow-md hover:opacity-80 w-96 rounded-xl bg-clip-border border border-fuchsia-800">
        <a href="/display">
          <div class="p-6 flex">
            <div class="flex flex-col">

              <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                DISPLAY
              </h5>
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                Lorem ipsum dolor sit amet.
              </p>
            </div>
            <div class="translate-x-11">
              <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" fill="currentColor" class="bi bi-tv" viewBox="0 0 16 16">
                <path d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5M13.991 3l.024.001a1.46 1.46 0 0 1 .538.143.757.757 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.464 1.464 0 0 1-.143.538.758.758 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.464 1.464 0 0 1-.538-.143.758.758 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.46 1.46 0 0 1 .143-.538.758.758 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2" />
              </svg>
            </div>
          </div>
          <div class="">
            <div class="w-full select-none rounded-b-lg bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md hover:opacity-80 shadow-fuchsi-500/20 transition-all  focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" data-ripple-light="true">

            </div>
          </div>
        </a>
      </div>

      <div class="relative flex flex-col text-slate-900 bg-slate-200 shadow-md hover:opacity-80 w-96 rounded-xl bg-clip-border border border-fuchsia-800">
        <a href="/rincian">
          <div class="p-6 flex">
            <div class="flex flex-col">

              <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                PANGGIL ANTRIAN
              </h5>
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                Lorem ipsum dolor sit amet.
              </p>
            </div>
            <div class="translate-x-11">
              <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
                <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5" />
                <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3" />
              </svg>
            </div>
          </div>
          <div class="">
            <div class="w-full select-none rounded-b-lg bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md hover:opacity-80 shadow-fuchsi-500/20 transition-all  focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" data-ripple-light="true">

            </div>
          </div>
        </a>
      </div>

      <div class="relative flex flex-col text-slate-900 bg-slate-200 shadow-md hover:opacity-80 w-96 rounded-xl bg-clip-border border border-fuchsia-800">
        <a href="/admin">
          <div class="p-6 flex">
            <div class="flex flex-col">

              <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                ADMINISTRATOR
              </h5>
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                Lorem ipsum dolor sit amet.
              </p>
            </div>
            <div class="translate-x-11">
              <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" fill="currentColor" class="bi bi-bookmark-dash" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5.5 6.5A.5.5 0 0 1 6 6h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5" />
                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
              </svg>
            </div>
          </div>
          <div class="">
            <div class="w-full select-none rounded-b-lg bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-fuchsi-500/20 transition-all  focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" data-ripple-light="true">

            </div>
          </div>
        </a>
      </div>

    </div>


  </div>
</div>
@endsection