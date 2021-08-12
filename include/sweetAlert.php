

<!-- ผ่าน  -->
<script>
    <?php if(isset($_SESSION['Success'])) { ?> 
        Swal.fire({
            icon: 'success',
            title: '<?php echo $_SESSION['Success'] ?>', 
            showConfirmButton: false,
            timer: 2000
        }) 
    <?php } ?>
    <?php
    $_SESSION['Success'] = NULL;
    ?>

</script> 

<!-- ไม่ผ่าน  -->
<script>
    <?php if(isset($_SESSION['Failed'])) { ?>
        Swal.fire({
            icon: 'error',
            title: '<?php echo $_SESSION['Failed'] ?>',
            showConfirmButton: false,
            timer: 2000
        })
    <?php } ?>
    <?php
    $_SESSION['Failed'] = NULL;
?>
</script>

<!-- แจ้งเตือน  -->
<script>
    <?php if(isset($_SESSION['Warning'])) { ?>
        Swal.fire({
            icon: 'warning',
            title: '<?php echo $_SESSION['Warning'] ?>',
            showConfirmButton: false,
            timer: 2000
        })
    <?php } ?>
    <?php
    $_SESSION['Warning'] = NULL;
?>
</script>

