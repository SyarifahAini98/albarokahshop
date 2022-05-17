<?php
$id_produk=$data["harga_produk"];
$query = "SELECT SUM(stok_produk) AS stok FROM produk WHERE id_produk=$id_produk;";
?>
<div class="container" style="max-width:175px;">
<div id="skill4" class="demo" data-width="75" data-background="#F44336" data-height="20"><!-- <?php echo $query;?> --></div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="assets/js/simple-skillbar.js"></script>
<script>
$('.demo').simpleSkillbar({});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>