<footer class="footer">
    <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-600">
                <span class="d-none d-sm-inline-block">
                    <div class="copyright" align="center">
                        <script>
                        document.write('&copy;');
                        document.write(new Date().getFullYear());
                        document.write(' Fire Track - ALL RIGHTS RESERVED.');
                        </script>
                    </div>
                </span><br class="d-sm-none" />
            </p>
        </div>
        <div class="col-12 col-sm-auto text-center">

        </div>
    </div>
</footer>
</div>

</div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<script>
$(document).ready(function() {
    $("#inp").change(function() {
        console.log($("#inp").val());
        if ($("#inp").val() === "cheque") {
            $("#inpch").removeAttr('disabled');
        } else {
            $("#inpch").attr('disabled', 'disabled');
        }
    });
});
</script>


<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="vendors/popper/popper.min.js"></script>
<script src="vendors/bootstrap/bootstrap.min.js"></script>
<script src="vendors/anchorjs/anchor.min.js"></script>
<script src="vendors/is/is.min.js"></script>
<script src="vendors/echarts/echarts.min.js"></script>
<script src="vendors/fontawesome/all.min.js"></script>
<script src="vendors/lodash/lodash.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="vendors/list.js/list.min.js"></script>
<script src="assets/js/theme.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"
    integrity="sha512-4+OQqM/O4AkUlCzcn4hcNN7nFwYTYiuMQlhPjdi0Vcpn2ALkrIStJZkxCNauh9WiY6Fkc0FbelhU13feOuX5/A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="vendors/countup/countUp.umd.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<script src="assets/js/flatpickr.js"></script>
</body>

</html>