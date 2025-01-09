<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
<x-admin-header-css></x-admin-header-css>
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <x-admin-side-bar></x-admin-side-bar>

        <!-- Layout container -->
        <div class="layout-page">

            <x-admin-nav></x-admin-nav>
            @if (session('successMessage') || session('errorMessage'))
                <div id="alertsContainer">
                    @if (session('successMessage'))
                        <div class="alert alert-success" id="successAlert">
                            <i class="bx bx-check-circle" style="margin-right: 8px;"></i>
                            <span>{{ session('successMessage') }}</span>
                        </div>
                    @endif
                    @if (session('errorMessage'))
                        <div class="alert alert-danger" id="errorAlert">
                            <i class="bx bx-error-circle" style="margin-right: 8px;"></i>
                            <span>{{ session('errorMessage') }}</span>
                        </div>
                    @endif
                </div>
            @endif
            <!-- Content wrapper -->
            <div class="content-wrapper">
                @yield('content')
                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with ❤️ by
                            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                        </div>
                        <div>
                            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                            <a
                                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                target="_blank"
                                class="footer-link me-4"
                            >Documentation</a
                            >

                            <a
                                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                target="_blank"
                                class="footer-link me-4"
                            >Support</a
                            >
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<div class="buy-now">
    <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
    >Upgrade to Pro</a
    >
</div>

<x-admin-footer-js></x-admin-footer-js>
</body>
</html>
