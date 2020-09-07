<?php $__env->startSection('styles'); ?>
<title>TrueHelp | Dashboard</title>
<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>" />
<script defer src="<?php echo e(mix('js/app.js')); ?>"></script>
<style>
.Oval {
  width: 40px;
  height: 40px;
}
.nav-name {
  margin-top: 3px;
  font-family: Helvetica;
  font-size: 15.8px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.25;
  letter-spacing: normal;
  color: #121212;
}
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li>
        <div class="pl-4">
          <img src="dist/img/user1-128x128.jpg" alt="User Avatar"  class="Oval img-circle">
        </div>
      </li>
      <li class="pl-2 pt-2">
        <p class="nav-name"><?php echo e(Auth::user()->first_name); ?></p>
      </li>
      <li class="pl-2 pt-2">
        <i class="fa fa-caret-down"></i>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 side-bar">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="images/Logo-07.png" alt="TrueHelp Logo" class="brand-image">
      <span class="brand-text font-weight-light pl-5 ls-5"><img src="images/truehelp-01.png" alt="TrueHelp Logo" class="brand-image"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-header nav-menu-tag">MENU</li>
               <li class="nav-item">
                 <a href="/home" class="nav-link active">
                   <i class="nav-icon fas fa-th"></i>
                   <p class="nav-menu">
                     Dashboard
                     <span class="right"><i class="fa fa-exclamation-circle"></i></span>
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/employees" class="nav-link">
                   <i class="nav-icon fa fa-user"></i>
                   <p class="nav-menu">
                     My Employee
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/students" class="nav-link">
                   <i class="nav-icon fa fa-users"></i>
                   <p class="nav-menu">
                     Students
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="pages/widgets.html" class="nav-link">
                   <i class="nav-icon fa fa-user-circle-o"></i>
                   <p class="nav-menu">
                     Search Employee
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/order" class="nav-link">
                   <i class="nav-icon fa fa-list-alt"></i>
                   <p class="nav-menu">
                     Orders
                   </p>
                 </a>
               </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-bell-o"></i>
              <p class="nav-menu">
                Notifications
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-address-card-o"></i>
              <p class="nav-menu">
                Profile
              </p>
            </a>
          </li>
          <li class="nav-header nav-menu-tag">SUPPORT</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p class="nav-menu">
                Need help?
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p class="nav-menu">
                Contact us
              </p>
            </a>
          </li>
          <li class="nav-header nav-menu-tag">SETTINGS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p class="nav-menu">Account</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-moon-o"></i>
              <p class="nav-menu">Dark Mode</p>
            </a>
          </li>
          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
          <li class="nav-item">
            <a href="<?php echo e(route('logout')); ?>" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-sign-out"></i>
              <p class="nav-menu">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="border-radius: 12px;">
              <div class="inner">
                <h3><?php echo e($empcount); ?></h3>

                <p>Registered Employess</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-up"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" style="border-radius: 12px;">
              <div class="inner">
                <h3><?php echo e($count); ?><sup style="font-size: 20px"></sup></h3>

                <p>Pending Verification</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-up"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" style="border-radius: 12px;">
              <div class="inner">
                <h3>0</h3>

                <p>Verified Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-down"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" style="border-radius: 12px;">
              <div class="inner">
                <h3>0</h3>

                <p>Red Cases</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-down"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <div id="app">
  <order-form></order-form>
  </div>
  <div id="app">
    <example-component></example-component>
  </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dist/css/app.css')); ?>">
<?php if(app()->isLocal()): ?>
  <script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php else: ?>
  <script src="<?php echo e(mix('js/manifest.js')); ?>"></script>
  <script src="<?php echo e(mix('js/vendor.js')); ?>"></script>
  <script src="<?php echo e(mix('js/app.js')); ?>"></script>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>" />
<script defer src="<?php echo e(mix('js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Truehelp\resources\views/home.blade.php ENDPATH**/ ?>