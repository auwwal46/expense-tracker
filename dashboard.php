<?php include 'includes/header.php'; ?>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<div class="container mt-4">

  <h3 class="mb-4">Welcome back, <strong><?php echo $_SESSION['user_email']; ?></strong></h3>

  <div class="row mb-4">
    <!-- Income -->
    <div class="row mb-4">
  <div class="col-12 col-md-4 mb-3">
    <div class="card bg-success text-white h-100">
      <div class="card-body">
        <h5 class="card-title">Total Income</h5>
        <p class="card-text fs-4">N0.00</p>
      </div>
    </div>
  </div>
     <!-- Expenses -->
  <div class="row mb-4">
  <div class="col-12 col-md-4 mb-3">
    <div class="card bg-success text-white h-100">
      <div class="card-body">
        <h5 class="card-title">Total Expenses</h5>
        <p class="card-text fs-4">N0.00</p>
      </div>
    </div>
  </div>
    <!-- Balance -->
  <div class="row mb-4">
  <div class="col-12 col-md-4 mb-3">
    <div class="card bg-success text-white h-100">
      <div class="card-body">
        <h5 class="card-title">Total Balance</h5>
        <p class="card-text fs-4">N0.00</p>
      </div>
    </div>
  </div>
  <!-- Repeat for Expenses & Balance -->
</div>
  <!-- Chart Section -->
  <div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title">Expense Breakdown</h5>
      <canvas id="expenseChart" height="120"></canvas>
    </div>
  </div>
    <!-- Recent Transactions -->
  <div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title">Recent Transactions</h5>
      <ul class="list-group">
        <li class="list-group-item">Transaction 1 - N0.00</li>
        <li class="list-group-item">Transaction 2 - N0.00</li>
        <li class="list-group-item">Transaction 3 - N0.00</li>
      </ul>
    </div>
  </div>

</div>

<?php include 'includes/footer.php'; ?>
