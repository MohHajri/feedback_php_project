<?php include 'navbar.php'; ?>

<?php
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container my-5">
  <h2 class="text-center mb-4">Past Feedback</h2>

  <?php if (empty($feedback)): ?>
    <p class="lead text-center">There is no feedback</p>
  <?php endif; ?>

  <?php foreach ($feedback as $item): ?>
    <div class="card my-3 mx-auto" style="max-width: 500px;">
      <div class="card-body text-center">
        <p class="card-text"><?php echo $item['body']; ?></p>
        <div class="text-secondary mt-2">By <?php echo $item[
          'name'
        ]; ?> on <?php echo date_format(
          date_create($item['date']),
          'g:ia \o\n l jS F Y'
        ); ?></div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>

<style>
  .card {
    border: 1px solid #eee;
    box-shadow: 0px 2px 2px #ccc;
    transition: all 0.3s ease-in-out;
  }

  .card:hover {
    box-shadow: 0px 4px 4px #ccc;
    transform: translateY(-2px);
  }

  .card-text {
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 1rem;
  }

  .text-secondary {
    font-size: 14px;
  }
</style>
