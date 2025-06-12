<?php
require_once '../dp.php';
if($_SERVER['REQUEST_METHOD']==='POST' && verify_csrf($_POST['csrf_token'] ?? '')){
    $email=trim($_POST['email']??'');
    $password=trim($_POST['password']??'');
    $stmt=$mysqli->prepare('SELECT id,password,role,name FROM users WHERE email=?');
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $user=$stmt->get_result()->fetch_assoc();
    $hashed=hash('sha256',$password);
    if($user && hash_equals($user['password'],$hashed)){
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_role']=$user['role'];
        $_SESSION['user_name']=$user['name'];
        header('Location: dashboard.php');
        exit;
    }
    $error='Invalid credentials';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="mb-4 text-center">Admin Login</h2>
            <?php if(!empty($error)): ?><div class="alert alert-danger"><?php echo e($error); ?></div><?php endif; ?>
            <form method="post">
                <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
