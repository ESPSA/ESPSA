<?php
$title='Tasks';
include 'header.php';
require_role(['president','hr_head']);
// list tasks
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['description'])){
    $desc=trim($_POST['description']);
    $due=$_POST['due_date'];
    $uid=$_POST['assigned_user_id'];
    $stmt=$mysqli->prepare('INSERT INTO tasks(description,due_date,assigned_user_id) VALUES(?,?,?)');
    $stmt->bind_param('ssi',$desc,$due,$uid);
    $stmt->execute();
    $stmt->close();
}
$tasks=$mysqli->query('SELECT t.id,t.description,t.due_date,t.status,u.name FROM tasks t LEFT JOIN users u ON t.assigned_user_id=u.id');
$users=$mysqli->query('SELECT id,name FROM users');
?>
<h2 class="mb-4">Tasks</h2>
<table class="table table-bordered">
 <thead><tr><th>ID</th><th>Description</th><th>Due</th><th>Status</th><th>Assigned To</th></tr></thead>
 <tbody>
 <?php while($t=$tasks->fetch_assoc()): ?>
 <tr><td><?php echo e($t['id']); ?></td><td><?php echo e($t['description']); ?></td><td><?php echo e($t['due_date']); ?></td><td><?php echo e($t['status']); ?></td><td><?php echo e($t['name']); ?></td></tr>
 <?php endwhile; ?>
 </tbody>
</table>
<h3>Add Task</h3>
<form method="post">
 <div class="mb-3"><input type="text" name="description" class="form-control" placeholder="Task" required></div>
 <div class="mb-3"><input type="date" name="due_date" class="form-control"></div>
 <div class="mb-3"><select name="assigned_user_id" class="form-select">
   <?php while($u=$users->fetch_assoc()): ?>
   <option value="<?php echo e($u['id']); ?>"><?php echo e($u['name']); ?></option>
   <?php endwhile; ?>
 </select></div>
 <button type="submit" class="btn btn-primary">Add</button>
</form>
<?php include 'footer.php'; ?>
