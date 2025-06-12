<?php
$title='Admin Dashboard';
include 'header.php';
?>
<h1>Welcome <?php echo e($user['name']); ?></h1>
<p>Use the menu to manage site content.</p>
<?php include 'footer.php'; ?>
