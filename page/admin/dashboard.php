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

  




<section class="stats-section">
  <div class="stat-table">
    <h3>Order Statistics</h3>
    <table>
      <tr><td>Pending Orders:</td><td class="red">0 ↑</td></tr>
      <tr><td>Orders to Ship:</td><td class="red">10 ↑</td></tr>
      <tr><td>Orders to Settle:</td><td class="red">13 ↑</td></tr>
      <tr><td>Completed Orders:</td><td class="red">26 ↑</td></tr>
      <tr><td>Failed Transactions:</td><td class="red">26 ↑</td></tr>
    </table>
  </div>

  <div class="stat-table">
    <h3>Product Statistics</h3>
    <table>
      <tr><td>Total Products:</td><td class="red">340 ↑</td></tr>
      <tr><td>Recycle Bin:</td><td class="red">10 ↑</td></tr>
      <tr><td>Available Products:</td><td class="red">13 ↑</td></tr>
      <tr><td>Unavailable Products:</td><td class="red">26 ↑</td></tr>
      <tr><td>Product Reviews:</td><td class="red">215 items</td></tr>
    </table>
  </div>

  <div class="stat-table">
    <h3>Member Login Statistics</h3>
    <table>
      <tr><td>Registered Logins:</td><td class="red">3240 times</td></tr>
      <tr><td>Sina Logins:</td><td class="red">1130 times</td></tr>
      <tr><td>Alipay Logins:</td><td class="red">1130 times</td></tr>
      <tr><td>QQ Logins:</td><td class="red">1130 times</td></tr>
    </table>
  </div>
</section>

<section style="margin-top: 30px;">
    <a href="members.php"><button>👥 Manage Members</button></a>
    <a href="stocks.php"><button>📦 Manage Stocks</button></a>
    <a href="sales.php"><button>📈 Sales Reports</button></a>
  </section>
</div>
<?php include '../../_foot.php'; ?>
