<!-- ======= Footer ======= -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= baseUrl(); ?>admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= baseUrl(); ?>admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= baseUrl(); ?>admin/assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?= baseUrl(); ?>admin/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= baseUrl(); ?>admin/assets/vendor/quill/quill.min.js"></script>
<script src="<?= baseUrl(); ?>admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= baseUrl(); ?>admin/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= baseUrl(); ?>admin/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= baseUrl(); ?>admin/assets/js/main.js"></script>
<script>
    function previewImage(e, target) {
        const [file] = e.files
        if (file) {
            const el = document.querySelector(target);
            el.src = URL.createObjectURL(file)
            if (el.classList.contains('d-none')) {
                el.classList.toggle('d-none')
            }
        }
    }

    function getAndSetvalue(parent, target) {
        let value = parent.value
        // Konversi nilai menjadi huruf kecil
        value = value.toLowerCase();

        // Ganti karakter yang tidak diinginkan dengan tanda hubung
        value = value.replace(/[^a-z0-9]+/g, '-');

        // Hapus tanda hubung di awal dan akhir
        value = value.replace(/^-+|-+$/g, '');
        console.log(value)


        document.querySelector(target).value = value

    }
</script>
</body>

</html>