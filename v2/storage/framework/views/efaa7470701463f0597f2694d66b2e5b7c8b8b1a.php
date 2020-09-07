


<?php $__env->startSection('styles'); ?>
<title>TrueHelp | Orders</title>
<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>" />
<script defer src="<?php echo e(mix('js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="images/Logo-07.png" alt="TrueHelp Logo" class="brand-image elevation-3">
      <span class="brand-text font-weight-light pl-4 ls-5" word-spacing: "30px">TRUEHELP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">MENU</li>
               <li class="nav-item">
                 <a href="/home" class="nav-link">
                   <i class="nav-icon fas fa-th"></i>
                   <p>
                     Dashboard
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="pages/widgets.html" class="nav-link">
                   <i class="nav-icon fa fa-user"></i>
                   <p>
                     My Employee
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="pages/widgets.html" class="nav-link">
                   <i class="nav-icon fa fa-user-circle-o"></i>
                   <p>
                     Search Employee
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/order" class="nav-link active">
                   <i class="nav-icon fa fa-list-alt"></i>
                   <p>
                     Orders
                     <span class="right"><i class="fa fa-exclamation-circle"></i></span>
                   </p>
                 </a>
               </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-bell-o"></i>
              <p>
                Notifications
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-address-card-o"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-header">SUPPORT</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Need help?
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
              <p>
                Contact us
              </p>
            </a>
          </li>
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>Account</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-moon-o"></i>
              <p>Dark Mode</p>
            </a>
          </li>
          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
          <li class="nav-item">
            <a href="<?php echo e(route('logout')); ?>" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Truehelp\resources\views/orders/index.blade.php ENDPATH**/ ?>