

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

<!-- ผ่านแบบยืนยัน  -->
<script>
    <?php if(isset($_SESSION['SuccessConfirm'])) { ?> 
        Swal.fire({
            icon: 'success',
            title: '<?php echo $_SESSION['SuccessConfirm'] ?>', 
            text: '<?php echo $_SESSION['dataConfirm'] ?>!',
            showConfirmButton: true,
            // timer: 2000
        }) 
    <?php } ?>
    <?php
    $_SESSION['SuccessConfirm'] = NULL;
    $_SESSION['dataConfirm'] = NULL;
    ?>

</script> 

<!-- ไม่ผ่าน  -->

<?php echo $_SESSION['Failed'] ?>

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

