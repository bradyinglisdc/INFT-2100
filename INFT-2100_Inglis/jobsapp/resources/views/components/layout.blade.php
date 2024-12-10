<!doctype html>
<html class="h-full bg-gray-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$heading}}</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="h-full">

<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                            <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>

                        </div>
                    </div>
                </div>

                <div class="hidden md:block">
                    <div class="ml-4 flex items items-center md:ml:-6">

                        @guest()
                            <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                            <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                        @endguest

                        @auth()
                        <form method="post" action="/logout">
                            @csrf
                            <x-form-button>Log Out</x-form-button>
                        </form>
                        @endauth



                    </div>
                </div>


                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <div>
                                <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="data:image/jpeg;base64,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" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
                <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
                <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>

            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUQEhIWFRUVGBgXFhUYFxkYGBcYFxUWFxcXFxYYHSggGBomHxUVITEhJSkrLi4uFx8zODMsNygtLisBCgoKDg0OGxAQGzImICUtMi0tLS0tLy4uLS4tLy0tLS0rLy0tLS0tLS0tLi0tLS0tLS0tLS0tLS0tKy0tLy0vLf/AABEIAOEA4QMBIgACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAABQYBAwQCB//EAEgQAAEDAgMFBQUEBwYDCQAAAAEAAhEDIQQxQQUSUWFxBiKBkaETMkKxwSNSYvAzcoKSstHhFBVzotLxJGOjByU0Q1SDwsPi/8QAGgEBAAMBAQEAAAAAAAAAAAAAAAECAwQFBv/EADERAAIBAwIDBQcEAwAAAAAAAAABAgMRIQQxEkFRIjJxgaEFE2GRweHwFCNCsTPR8f/aAAwDAQACEQMRAD8A+GoiIAiIgCIiAIiIAsrdhKJcSYkNBeZ4DTxMDxWMTTDXkDKbdDcHyIQnhdrmpFkhYQgJCy1pOQlbP7O7WB1IHoShKi3saUXQ3COOUHo5p+qw7CVBmxw/ZKFvdy3saEWUQoYRFvwOHNSo1g+IgfzQGhF6qNgkREGIOduK8oAiIgCIiAIiIAiIgCIiAIiIAiIgCItmHp7z2t+8QPMwhKTbsiY2fht3CVqmrhA6Aj6n0UQ90gchHhNvn8laNptDcHAETBA4bzt+FFdmsCKtQ7wlrRJGhOgPLXwVFLDZ2VKLc4Uo9DmwGyatb3G21cbNHjr4SrBguyLc6ryTwbYeZufRWSkyAALAL3K55VpPY9vT+yqMFeeX6EfQ2Hh2CBTB/Wl3oSt4wtMZU2Do0D6La5y8Fyorvc6pKlDEYpeRz18BSeZdTYTxgfNcFXYFHNm9TPFrj9ZUoXLwXLRXRx1VTllpFdxWya7dWVhweO955+TlE1KFMndcHUX8HS5vn7zfJyuj3LixmHZUEOE8DqOhW8Wzy60Uts+OfXf1KjisG6nG8LH3XC7XDk4ZqU7L0PtC/wC6I8Tl9fRc1XeoEtB3mO+Fwlruo42ic7WUt2eewscG2O8SRwnK5zFlrDc8+twpXj8unmRXaagG1yRk8B3ibH1B81Eqy9qmSym/g57fW3yKrSSVmZxeAiIqlgiIgCIiAIiIAiIgCIiAIiIAuzZbCalswHEdd0x6wuNSOwv0oHEsH/UZPpKh7GtBXqR8Sx9p6U0D+EtPru/VZ7IUIpF333E+At9Ct+359mWgTvSOncc4erR5ro2MzdpU2/hHqJPzXO32D3YU1+r4ui/PQkVqe9bSoPbGN3YiYFzAnItOtsg7j0WNON2ejrK3u43Ot2NbaLz/AKS75NXkYsGOZA827yr39oggE5boN+DqlI6gagrVRx5G6BJj2eUZ7rmHM9F1KmeBPWssjcUCAeIaf3jAWfajQ/mYVaZjiAJkQ1lyJENqXNtF7/t+dxZtQ8DPtJbYq3AYvVNk+5y0Pqg93jbpMwfMQo+tjgN69x7Qwc7EOFvNR2IxpMwbST1ioXAc7O0KskYzq3PO1KweAdQZ/eaCRGve3lt7MVoqlv3h6i/ylRLnk3/PQcltwNfcqMfwcCemvorRdmc0sosW3BvYRrv+YT5moPqFVlcMVS/7u57rHebgfqVT1ae5WGxhFlYVC4REQBERAEREAREQBERAEREAUr2aH27Ovya4/RRSmeyzft28if4Hqsu6zfS/5o+KLXtNktkfCQ6OO6ZI8RIW6hAAAygR0TE5HoVD7IxZFJhme7F+LQ8nrkMp5lc6V4nvTmoVvEsDTII8Mv55qudodnvc01Gky3MSe8BM3J/E6wAGanMHUBbnqRnrJ5nhx8kxj4aTEmMuOkeZA8VWD4ZG+pgq1HJ82RbcXSDXuaLgEweI0PlBWldh8o1Z2MhxuJzz56rb7efeAN3HgZcInwIBWlEIOk4hsQAehNrsAJ/eutNSoXGT15T08AvCIAvVISQDxHzXlbsIyXN/WaPM/wBEB9AxlMf2aq0D/wAt0Do23yXzlfTi6KNQ59x/8JXzFa1eRnT2CIiyNDCLJCwgCIiAIiIAiIgCIiAIiIAp/sgz7Wfz7r1AKwdkT9p4/wDweqT7rOvQ2/UQv1LLtGputJt5x9M+ir+xan2JbqGuMakAE8yRc8BfUqQ29iIa8jgRMxmMgfWBfiRkuLYVI7pgfASBoSRrBidLyf1dc4rsnoaifFqLL4nXh8TLSZ942z+Ika6fbN0C14zHEjunOb8N7eLT4F9HyUDhseWiDoDH/TLfWmF5rYwfCOOeQGQtxhtPxGStwZOZ6zsWRq2gQXyDIIBFsgbgeAIC5lklYWp5zd3cIiIQERbqFOznRMADxcYH1QGldlLusY/8YPSPlr+QteJoFkMOcbxHCdPKPNdraM4cZ33nDPjwAPD8PUqyRDZcXYoGnVZN2sMj9ZhIPT+S+cqzbPrb1erzw4/gp/zKrJEWVpu5WCsERZWZcLCyUQHlERAEREAREQBERAEREAU72WkPn4Yc4m2TWkH1exQSuPZzCtNGoHTBa1ucRLfaEg6Hvj90KlR2id3s+k51lblk5dqNrVIYxo3HxBm8TrOQJE84nkJLA0fZg66Tb4bC8yG52v4ZLk2pinNb9mIJO4D92fyPMZ2KmaVNlOmA5wAAiSY9T+brOTsjupU1Ko2nkqVfYj3FxY4ONzGTjfTjnmo/E4GowS5tuV468Fdcbs4+9TduP0OYPIg6dFA08V3nUMQzd3zM8HERMn4THh0yvGdzi1GmVN2eP6IBrZsLngsKXbsOp7SMmj4voBqubFYXcqFpA70gRNjp4zGVrrQ4nFrc4VsLe6DxJ9I58+C68ThWgUozc2XcgTYk6Zx4LUW7z2sgkWAA8A4jqQbqbFLmhlJzsgTxtl14KTGIhvsqLchL3Z5CSZyiR0tzXh2Ke5ophtNlMmI6akzPius098Np4dw7wIqAAgWgbxmTBkjjlZSkQyPwG03UpgNO8ZJMz5qSGMFdrpaAW6Z2IzEgwc77vivGL2VAuI4cfPztfXkvPZ7BOLy4OZuwQQXCT+zfUDMeasr7EO251bGEO9ocjhnX/UcGn5BQu1qO5WqN/ESOhuPQhXlmF/4d1L3e64WA5k219FWe2FDdqsd95gnqLfKFMo2iIvJAoiLIuEREAWFkIUBhERAEREAREQBERAFZcDtD2dB8gmXUgAM702i37irSk8C4ncHGrS9JH1VZK6OnTVHCWOZYtrU6raFNjG9/3nxkN3vEX0mLcAqhiMS953nuJPE/TgvpVdshVyps1tMzRA37WdmBqWTbWOSypTuj0vaWlkp4eLIbL7TtI3a9j98CQeoGR6ei7No4KniGAgj8LxeOPhyVi2N2M2Zi2k+1risfea51Nj2EZkNazdePxCQufHf9mGKoEvwWIDxnuP7hPKbtd1O6r+7SzE53qZyjwVVdepVjQALW1X98WpkHhryJsCDbzXNtWiKmvfbmLX0GenyXRicQ9jzQxdL2bwZAIgZ2g/UGCuGs8e2a4kd5pBOnumD6jz8TdHHNp7G7cbv1WWJgOGsfeb5ko+puUw+G77We9qQ+Q2PFxP7JWrCVWB9RxF3Pe0GTkQT5W9Vtw7WVm973GHvfihoawDhk4+C0Wxyy3PGwtktcPaVBIPut+pVp2dhGMB3WgAmba/0XFsjZVfFfZ0KO+W2deKNMfCKjjmY+G5N+UXDBdgcRugVsY1giCKVIej3m37oV4tIrwykUntRimMbuBw3/ALuZ8Yy8eCr+BqYcUyajS582Fx0gj1lWrthsnZeCpupU3vxGJdME1QRTn4n7gF+DfPnSsJRBILyGsBuTqNQBmSqOV2X4bKxb+yr3+zlzpBJ3BmQMs+qj+3DpdSP4XfMLDNsg7zKY3Wtpvg6khtoGgUXtEn2GHng+OgfZWcuzYqlm5GoiLI0CIiAIURAEREBhERAEREAREQBdWFrbpY77r2u8jK5V6ahKdndH0rDVw9ocDIK0Y3DOcIY4NOjokg+NiqdgMe/DuLXTAN26g8vRWKjtEubvNcCOWmWfDMefUjndNxd0e/DXQrQ4ZrJy7Vo4jdgsZUj4hY+LT9FXKj3k7pJuY3chM5R9FM43bnehveg3OnhHz8rXPRRpgneDIcdC2HXPrlnlbS27qsLJ5lWMak+wyCGzKkb0AdSFup7IcQDIEmBcETwkTB4cVaaWBHxd7W+Q6BeMRggJLQBIAIizmiLEZZWTjWxEtK0rlbfs1rBvOqHWABd0aAzC5GYgtY5gOZGmg4HS/JS+1RFLICd1zoy3soaNMp8Oah8W64bo0CB1Ek9Tmro5JLJ4pYl7Lsc5p/C4j5L1WxlR4h9R7hwc4keRK0JKEGYRziY5ZLCICR2FR36pacixwPiI+q6u1DQw0qTcmst4uI+idlaBNRz4sGx4kiB6Fa+09QOqiDPcbfqSfqr/AMSn8iIREVC5kIjVkoDyiyVhAEREBhERAEREAREQBemjNeV6agLBtqgx1FleIe5rZjWwmea5N0VjRpUWgPc0NeRaTJB3hyDd7nK5KmKJpNp8CZ6afnkpzsfRDXGu7Id0dLTHmB+Sq7I6m1VqK3O1/qSGF7LOov8AaACsB7uQc3numxPOfBd4qgmLg6tcC137pv4qewx3rjIetv6jwg6rmx2yG4h7XvJ9mwSxgJG8THfcfQD1vC5nO77R7MKHBD9teX3/AOkRTqgkjhE9Tf5fNKhXY/Ym7JpuifhdcZR73vaC5nJRmJxIpu9nWHs3H3Z913Nr8j4weSurN4Majko2mQ3aI/ZD9eP4v5KuvdJJ4qf7QGKLRES+fR0nxmfFQdOgSN42b945dBxPRdCPFqd41LML2XNHu+Z+gyHqrJsfs7VAbXJDXgyGlu8Yg3Ikd7KAhRERW2c6mxtR9NxB42A4SBfxkL3icax1JlOlTDXmzyBcnIAHODn6K540MdTl8bjmkPnpoeIIsvnTHQZGn5CF3jYuWynU6QFCQam6XvjjEm/kqptId+OAaPJjV2bDt7Z/3aT46mI+q07bbFZ44EfwtV27xMluR6ysLKoWPQRywEJQAlYREARIRAYREQBERAEREAXtjbErwu2iJFNvFzj8mj+EoSjlV37L0t7Cza3tAfNrgSfAX08FVcfgNxrXggtcGmJu0ubIDh5weStXYV4NCow5CoN4cqjd35hZzfZujs0tNqtwy6Frw2GG60OExfvRcnNzhEb3oJsu5pMXEHhr4qvVdpufhqrqMuqEd0AEEb4lu7OZDL21HNUzA4DFPouxVKo4w4hwa93tLAEmNfOVze74t3Y9eWrVOyjG91fB9SK49oYFlZhp1Gy0+Y5g8eai8HgHFg3doVXyPeBYQdDuyCY8VuwdB1IEf2l7/wDFh0eNj6qFG2zNJVVJdqOH8UfNGMqQ5zWkspm8iQ2SQCQbaHRc9WqXGXGT+bAaL6fiMC9++HvoFj/fApFrnG0SRUzyuod3Z2lTJe1wBb7oDQQNcnb0uXVGomeJV0U47HB2c2KGEVqwgiC1p+Gfdc4c9OHXKx4nFhjTU95rfe3YJF8/59FSsftGqKha2rvyN2zW6/BYXz0XPVp4ndlxfuwbEmI/V0F1rc5C0dp64ZSLRqDGuZgxy73kqVUpwGnjJ8Mh8l2Y/He0pUmmd6mHAnkSN30C27YAfXaxmUMa0coEfNQJWJYYZrMNIbDntptdzktGXiVF9paX21R3Nnqz+isBaHvbSHusIc48I9xvUm/Qc1C9qbVnD7zG+YP9CtprBhB5IJERYmoWVhEARZRAYRZRAeUREAREQBERAF24Zw9rSHAsHqN71JXPhsO+o4NY0uJ0H5sFLVtkmh7Nznd4vb3RkBIzOpy9VDa2NadOT7SWFzOrHyKVEkW9kGuByymO73ge7Ym1tIXd2EqsbUqUsxUaC0njTM7pHEb0+ErO0MPNKm7VpLZBh9yRDSbHI9056c6rhcQ6k+Wkgg9CIm/I5+ouJWaXFFo7q8nRrRn8F/R9VpgMqOd9/dvpLWkZ9AFWtrCrg6762Hg0nw6owfCYNzq2ZJB5rbsbaIxDfeAe0glskZnMaxoTc3OkTK4nAUXPAcwPgbzZuATY93K4HDMHis0uF5OqT97TvDrdMqtftC+qN2nQLotlvAW4Afy1424oxrj3adUcg18Rwv8AmyvlOjFgIA4WW4BaXS2OR0pSfbkymUsDtEtB3iPwucARFxIIXDjaWOYZf7QxeR323k3iRxzV+Ll5LlKbK1Ka5SfzPnOH21VYcmEcNxotwG6BCkcVUxNSnJo7rX90GbkuMCxM3veNZVrq4Wm475pMLrXLRMjK6jsXUioBv71QnuDRkgzujPIZnnlMLQ5HB33KrVwbWuqiSWNG7vRkd63yHgVrwNXer7/MxOlobPHS2ZW/blRm97OmIAguPQWJPQrOxKUvGjRJvaQMzPUgRwnxmO5lPGCz4FgbAveSSdTrPNV/ti2KzDxpj0c4KZ2XX3yHWyOl4LiQCdLRZRnbZvfpHi0jyd/VbS7pjDcrSLZVZEHiAfofUFa1gbBERAEREAlERAYRZAXRSwTnbsRLzDQbSBm7k0cevBAlfCOZemMJIABJOQAknoFZx2ca1rRHtXuMOIfuNYM+BJ8vBSOGdSwzg0UQ2Rcg7z+Z4ub0uNQFm6nQ9CHs+V/3Hwrzf29Ss4jYVVsCznWljZc5s5bwAgDnMKU2Z2TcYdWduj7gz8TkPCVPU6u8RUgbwEd24fTJkObx4xpcarzisfu5Gfkb2jr7vIlp1WTnN4R6ENHpabc5Xa5L/Z1YXCU6Q3abQ0csz1OZ8VW+1khzCMpny/29PPpdt4DM8IJ1nI8tPJ/AKP2ztEVaIeARD4H7szM59FMINSuxrNVSqUXCGPgT5pb1J7Lm7rQDMuLgIdY2IsVRnMHtCLRJz7g9fdV+wZkTbvAH0A+gVLx1LdxDhYAHWXCItOsXHRWp7s5vaEbwhJeBx4V7w9u4YdMAgxc2z4K3bK2+Hlof3aje6eBvE8shI6aAqn1QWuOQMyIMgaiDwXgkzdatXPMhUlDY+risvL8RaSqRs/tM9g3ag3wMjk7x0K94ntEH/C4CcpGhtlEeGp5BVUDqepTRLN25vVxTa0xvbu9EicotpzHqBJmXOVXpdqmgR7LoBAC0HtORvEMO8REl9hzDIhWMlNc2WbF4v2YtnYxlaYJJNh1UFjtotpNz3qh+c8DcNABaOO8TCga+0qjyXOdc6+M24LjcZuhnKp0Mklx1JJ8yVI1nmnS3RYvtwlrc51u4nwGi4cLT3ntbxOZ0Gp8lsxtf2j5FmiGt0hosOnFWWxi9y0bABDQCbiBE5WygZZ9fQLu2xshuJDTvbpbMGJzjMeC5NgthnKbQIGXwzcjmc1OjJdEVdWZjfJ89x1B9GaNQTF2kaTqORjL8nkq0HNuRbiCCPMWV02zsNlaXju1LX0MCII+qqWKwVWiYc0gcfhPiLLGUWjVO5yIt5xRyAaMsmtvHgt1Hcqd0t3Xn3XAwCdAQbCeUKtiTiRbKtEtO64EHgV4CgkwiIgL5sXZDG0gXMBc4AkETAOTb+vNdP9iZTksptE6tEHzH/wCeq0P2tBg2PDW3I7rvRy0O2oDa4IzGcdREjxYOq5Wpt5Ppoz0tOCjHdEZtjCVd/fpEubnujNsRk3Vs3lshcdPHMqw3EC/w1W++Ov3h6qWqY63W4Ive/Mhxt8JLuiHHUqo3MQ0EZB33f2sx0PiStE2llHnzhCU24ytfk9vse9l4avTvLX082uabmfiaOPEHPmc+DbeJc0+7ZwmR7pNw6BmJFi05W4Bd1LDVcN3qJ9vQdctzMcWkWJ6Z8F1VG08RTJZ32/GzJ7TlI4OHrko4s3NXRcqfu1dSWbPPy6r1KXXqlx/P5/J4qZ2fVaaLqJbmN6eenjaRNjlqo3aGBNI5y0+64ajnwPELu2Q4CnUJ4NHmXjWx4Qc8tVq9jzKSanZlh2ZO7TLbiCCQZtBjO+YyzE8lE4yh/wATVcJndaRGcwLjie7lrKkOzdfeZ/UHMeYNsj8kx9Me0PNt/UfRZrEmelUSnp4v4/QqGNbDzERnb+R908tF6o4bfYXAjuzIJuQBIga/F5LbthsVLmTrYg/taE8xmuWhU3XB3D1Go8lsePJWbNaL1VZBI4eo0K8oVCLCIDKLC24anvODeJ6euiAxVbEAiDGojO/iveFbLh/KRPAg2jrZeKz5cT5CZgaCdVIbCo7z9PmRrlkNLnhYcJSuyG7ItWy6cNaMzEkzMk3mVWq228Qx72tqSA51iAcidTf1VppVN2XHQT5L5+50kk6mT4rWbtaxnDJP4btRUHvsa4cpafqFP4LaFGuIaROrDn5a+CoCy0kXVFUaLuCLftDs/Sddo3D+HLxH8oUHi9iVGXsRx089PGFvwPaOowbtT7RvE2cP2tfFdf8AeNR16FVrv+W9rWv6DR3grPhZVcSIEuqMG6QQODhbjkbLNBrHkg90n3SDDZi0g6E6yp2jtKm7uOmi/VrhNM6mWn3fTxWK+Aou99vsyfdqMM0z9PkeQCrwlrkP/dVb7n+Zv80Xf/cDP/U0/T/UspwC5vOOwtQGfaU+Xvt8GmR6LW7Cb36KoyoBkAYI/wDbfl+yQoqpiGnNjeot6Du+i8hzNWmOIMH1BHyWXCdbrKXeS8sfb0OivXeww5rmngZv53PiSFrOLB0jn/S3pA5LppYsxuitI+5VbLfO8ei81cKCJLCz8TD7RnWJlvn4KSjXR/n54HjCbQqUjNN0cRm09Wn/AHUzhdq0qrg8/YVvvj3Hcnjh181XjhzEthw4tv5jMeIWpQ4Jl6WpqUsbro/p08i5Yyj7WQ5oDzct+F8fGw8fydCoc0QylWIJIhrYNi0iQWuEQfeH+4XBg9ovp2Blv3Tl1GrTzCltoVXV6AdTBN+8NbD/ADaZeShRtg1nWjUvLmY7KYgAlhN9Bu3ifvcL5HipLaFYB4JgCYN/zqVWNmYo03ze9o4nT1+akto1g6m52d3ecNUOPauTTr/scPNHP2hpkFug4W/ynOOWh6hQymtod+hSfrkTz92TqMhlnrkFDK6OSr3rnt5kAxlYnjnE+FvBa1lYUmYhERAFsomJd3bDI3mbWGvitaIApnY1TcpvqnJuX6xyA4acfDIxFNkkAZn86qV2mGtLcO0wJDn8jugegBPirRxkq84JnaleMMXj42gD9rP0lU9WTtNXilSp5EgPI4CIA9T5KtqZvIgrIIvTHQQfmJ9CvdRzTeN08B7p6aj85KhY1krCIgNxxLiIcd4DKcx0OY6ZLOHxb6c7jrHNpu09WmxWhEuDu/vH/k0v3T/qRcKwpuRY2FYKyigkKa7M+85EUPY0pd9HLtD/AMR+0FyYz33fnQIikT5+JqCsvZj3H/rfQLCKHsWod8h8f+nd+v8AULpofo63R/8A9awiELdnk/oKX+KfkFH4r33/AKzvmURERPZeR4K8oikzCIiAL0ERAeqHvN6j5rqx/wCnqdX/AMJRFK2I5nX2q/St/wANv1UMiKZ7iOxkIVlFUk8hERAEREBhERAf/9k=" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">Sergio Santilli</div>
                        <div class="text-sm font-medium leading-none text-gray-400">sergio.santilli@durhamcollege.ca</div>
                    </div>
                    <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            <x-button href="/jobs/create">Create Job</x-button>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            {{ $slot }}
        </div>
    </main>
</div>




</body>
</html>
