<!-- Slider main container -->
<link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
<style>
        body {
            margin: 0;
        }
        .swiper {
        width: 100%;
        height: 300px;
        }

        img {
            width: 100%;
            object-fit: cover;
        }
        label {
            color: black;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            padding: 10px;
            text-align: center;
            align-items: center;

        }
</style>
<div class="swiper">
    <div>
        <input type="text" name="" id="">
    </div>
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="slide-container">
                <img src='https://cdn.pixabay.com/photo/2016/05/24/16/48/mountains-1412683_1280.png' alt=''>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="slide-container">
                <img src="https://cdn.pixabay.com/photo/2018/05/30/00/24/thunderstorm-3440450_640.jpg" alt="">
            </div>
        </div>
        <div class="swiper-slide">
            <div class="slide-container">
                <img src="https://cdn.pixabay.com/photo/2018/02/02/17/29/nature-3125912_640.jpg" alt="">
            </div>
        </div>
    </div>
        <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
     const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        });
</script>