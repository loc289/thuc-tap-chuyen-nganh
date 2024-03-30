var swiper = new Swiper(".swiper-container", {
    slidesPerView: 4,
    spaceBetween: 24,
    // Đặt loop thành false để tránh nhảy slide không mong muốn
    loop: false,
    // Cấu hình khoảng cách giữa các slide
    spaceBetween: 10,
    // Cài đặt chuyển slide sẽ set mặc định
    slidesPerGroup: 1,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    // Cấu hình phân trang, nếu bạn cần
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    // Cấu hình xử lý các sự kiện
    on: {
        init: function () {
            // Ẩn nút prev khi khởi tạo
            this.navigation.$prevEl.css("display", "none");
        },
        slideNextTransitionStart: function () {
            // Hiển thị nút prev sau khi click nút next
            this.navigation.$prevEl.css("display", "block");
        },
        reachBeginning: function () {
            // Ẩn nút prev khi ở slide đầu tiên
            this.navigation.$prevEl.css("display", "none");
        },
    },
});

// Initialize Swiper
swiper.init();
