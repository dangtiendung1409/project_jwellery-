<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('Admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('Admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('Admin/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('Admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('Admin/assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('Admin/assets/js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successAlert = document.getElementById('successAlert');
        var errorAlert = document.getElementById('errorAlert');

        // Hiện thông báo thành công
        if (successAlert) {
            setTimeout(function() {
                successAlert.classList.add('fade-out');
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 1000); // Thời gian hiệu ứng fade-out
            }, 3000); // Thời gian hiển thị thông báo
        }

        // Hiện thông báo lỗi
        if (errorAlert) {
            setTimeout(function() {
                errorAlert.classList.add('fade-out');
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 1000); // Thời gian hiệu ứng fade-out
            }, 3000); // Thời gian hiển thị thông báo
        }
    });

</script>
