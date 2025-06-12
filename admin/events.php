<?php
$title='Events';
include 'header.php';

// Handle new event submission
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['title'])){
    $title=trim($_POST['title']);
    $description=trim($_POST['description']);
    $date=$_POST['event_date'];
    $stmt=$mysqli->prepare('INSERT INTO events(title,description,event_date) VALUES(?,?,?)');
    $stmt->bind_param('sss',$title,$description,$date);
    $stmt->execute();
    $stmt->close();
}
$events=$mysqli->query('SELECT id,title,event_date FROM events ORDER BY event_date DESC');
?>
 <h2 class="mb-4">Events</h2>
 <table class="table table-striped">
  <thead><tr><th>ID</th><th>Title</th><th>Date</th></tr></thead>
  <tbody>
   <?php while($e=$events->fetch_assoc()): ?>
   <tr><td><?php echo e($e['id']); ?></td><td><?php echo e($e['title']); ?></td><td><?php echo e($e['event_date']); ?></td></tr>
   <?php endwhile; ?>
  </tbody>
 </table>
 <h3>Add Event</h3>
 <form method="post">
  <div class="mb-3"><input type="text" name="title" class="form-control" placeholder="Title" required></div>
  <div class="mb-3"><textarea name="description" class="form-control" placeholder="Description"></textarea></div>
  <div class="mb-3"><input type="date" name="event_date" class="form-control"></div>
  <button type="submit" class="btn btn-primary">Add</button>
 </form>
</div>
<?php include 'footer.php'; ?>
