<?php
session_start();
session_unset();
session_destroy();
?>
<script type="text/javascript">
    alert('Anda berhasil logout.');
    location.href = "home.php";
</script>