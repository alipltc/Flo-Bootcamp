<?php 
if(!isset($_SESSION["Yetkili"])){
    echo "<script>
    window.top.location = 'http://localhost/crm/login.php';
    </script>";
}
?>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>CRM Panel</span></strong> <?php echo $cevir["haklar"]; ?>
      </div>
      <div class="credits">
        Designed by Ali Paltacı
      </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</script>

</body>

</html>
<?php
$baglan	=	null;
ob_end_flush();
?>