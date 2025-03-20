<!-- admin_header.php -->
<div class="admin-header">
  <div class="logo">
    <h2>⚙️ Admin Panel</h2>
  </div>

  <div class="admin-nav">
    <!-- Admin Manage Group -->
    <div class="nav-group">
      <div class="nav-toggle">👨‍💼 Admin Manage ▼</div>
      <div class="nav-menu hidden">
        <a href="admin_management.php?action=add">Add Admin</a>
        <a href="admin_management.php?action=delete">Delete Admin</a>

      </div>
    </div>



    <!-- My Profile Group -->
    <div class="nav-group">
      <div class="nav-toggle">🙍‍♂️ My Profile ▼</div>
      <div class="nav-menu hidden">
      <a href="profile.php?action=view">View Profile</a>
<a href="profile.php?action=change">Change Password</a>

      </div>
    </div>

    <!-- Logout Button -->
    <a class="logout-btn" href="../../index.php?logout=1">🚪 Logout</a>
  </div>
</div>

<!-- jQuery for dropdowns -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $('.nav-toggle').click(function () {
      $(this).next('.nav-menu').slideToggle(200);
    });

    $(document).click(function (e) {
      if (!$(e.target).closest('.nav-group').length) {
        $('.nav-menu').slideUp(200);
      }
    });
  });
</script>
