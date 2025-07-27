<!-- register.php -->
<?php include 'includes/header.php'; ?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <h3 class="text-center">Register</h3>
      <?php if (isset($_SESSION['register_error'])): ?>
  <div class="alert alert-danger">
    <?php 
      echo $_SESSION['register_error']; 
      unset($_SESSION['register_error']); 
    ?>
  </div>
    <?php endif; ?>

      <form action="register_process.php" method="POST">
        <div class="form-group mb-3">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Register</button>
        <p class="mt-3 text-center"><a href="index.php">Already have an account?</a></p>
        <p class="mt-3 text-center"><a href="forgot_password.php">Forgot password?</a></p>

      </form>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
