<!-- Sidebar -->
<ul class="sidebar navbar-nav">
<!--<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('user/products') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>PENILAIAN</span> 
        </a>
    </li>-->
    
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>PRODUK</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          
            <a class="dropdown-item" href="<?php echo site_url('user1/products') ?>">produk jual</a>




              
        </div>
    </li>   

     <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('login') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Login</span>
        </a>
    </li>
    
    <li class="nav-item">
</ul>