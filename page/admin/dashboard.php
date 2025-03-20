<?php
require '../../_base.php';
$_title = 'Admin Dashboard';
include 'admin_header.php';

?>

<link rel="stylesheet" href="../../css/app.css">



<div class="main-content">
  <hr>


  <section class="dashboard-section">
    <div class="dashboard-card blue">
      <h3>💰 Today's Sales</h3>
      <p><strong>RM 1,200.00</strong></p>
    </div>
    <div class="dashboard-card green">
      <h3>📦 Total Orders</h3>
      <p><strong>85</strong></p>
    </div>
    <div class="dashboard-card orange">
      <h3>👤 Manage Users</h3>
      <p><strong>30</strong></p>
    </div>
  </section>

  


  <section style="margin-top: 30px;">
    <a href="members.php"><button>👥 Manage Members</button></a>
    <a href="stocks.php"><button>📦 Manage Stocks</button></a>
    <a href="sales.php"><button>📈 Sales Reports</button></a>
  </section>
</div>

<?php include '../../_foot.php'; ?>
