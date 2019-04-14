<?php
//  echo "<pre>";
//  print_r($products);
//  die("hello");
?>
<?php
	$path_prefix=base_url('asset/user/');
	$this->load->view('common/top_script');
	$this->load->view('common/header');
	$this->load->view('common/menu'); 
	//$this->load->view('common/banner');
?>
  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="<?=site_url('product/sort/')?>" method="POST" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="r_sort">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name a -> z</option>
                    <option value="3">Name z -> a</option>
                    <option value="4">Price low -> high</option>
                    <option value="5">Price high -> low</option>
                    <option value="6">Date new -> old</option>
                    <option value="7">Date old -> new</option>
                  </select>
                  <input type="submit" value="ok">
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <!-- <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div> -->
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg list">
              <!-- start single product item -->
              <?php foreach($products as $p){?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="<?=site_url('product/'.$p->product_id)?>"><img style="max-width:250px;max-height:300px;" src="<?=$path_prefix?>img/product/<?=$p->main_image?>" alt="polo shirt img"></a>

                    <?php
                      if($p->seller_id!=$this->ss->user_id)
                      {
?>
                        <a class="aa-add-card-btn" href="<?=base_url('product/toggle_wishlist/'.$p->product_id);?>"><?=$p->wishlist_user_id!=''?'- wishlist':'+ wishlist'?></a>
<?php
                      }
                      else
                      {
?>
                        <a class="aa-add-card-btn" href="<?=base_url('product/get_product_update/'.$p->product_id);?>"><span class="fa fa-edit"></span>Update Info.</a>

<?php                 }
?>
                    <a href="<?=site_url('product/'.$p->product_id)?>" class="btn" style="background-color:white">View Details</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="<?=site_url('product/'.$p->product_id)?>"><?=$p->name?></a></h4>
                      <span class="aa-product-price">Price : ₹ <?=$p->price?></span>
                      <p class="aa-product-descrip">Category : <?=$p->category?></p>
                      <p class="aa-product-descrip">Description : <?=$p->description?></p>
                    </figcaption>
                  </figure>                         
                  <!-- <div class="aa-product-hvr-content">
<?php
                      if($p->seller_id!=$this->ss->user_id)
                      {
?>
                        <a href="<?=base_url('product/toggle_wishlist/'.$p->product_id);?>" data-toggle="tooltip" data-placement="top" title="<?=$p->wishlist_user_id!=''?'Remove from wishlist':'Add to wishlist'?>"><span class="<?=$p->wishlist_user_id!=''?'fa fa-heart':'fa fa-heart-o'?>"></span></a>
<?php                 }
                      else
                      {
?>
                        <a href="<?=base_url('product/get_product_update/'.$p->product_id);?>" data-toggle="tooltip" data-placement="top" title="Update info."><span class="fa fa-edit"></span></a>                      
<?php                 }
?>

                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                  </div> -->
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">
<?php
$status="";
  switch($p->report_status)
  {
    case 1:
      $status="Reported | ";
    break;
  }
  switch($p->product_status)
  {
    case 0:
      $status.="Available";
    break;
    case 1:
    case 2:
      $status.="In-Transact";
    break;
    case 3:
      $status.="Sold";
    break;
  }
  echo $status;
?>

                  </span>
                </li>
              <?php } ?>
              </ul>
              <!-- quick view modal -->
              <!-- / quick view modal -->
            </div>


            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>

          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                {categories}
                  <li><a href="<?=site_url('product/category/')?>{category}">{category}</a></li>
                {/categories}

              </ul>
            </div>
            <!-- single sidebar -->
            <!-- <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <a href="#">Fashion</a>
                <a href="#">Ecommerce</a>
                <a href="#">Shop</a>
                <a href="#">Hand Bag</a>
                <a href="#">Laptop</a>
                <a href="#">Head Phone</a>
                <a href="#">Pen Drive</a>
              </div>
            </div> -->
            <!-- single sidebar -->
            <!-- <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="submit">Filter</button>
               </form>
              </div>              

            </div> -->
            <!-- single sidebar -->
            <!-- <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                <a class="aa-color-green" href="#"></a>
                <a class="aa-color-yellow" href="#"></a>
                <a class="aa-color-pink" href="#"></a>
                <a class="aa-color-purple" href="#"></a>
                <a class="aa-color-blue" href="#"></a>
                <a class="aa-color-orange" href="#"></a>
                <a class="aa-color-gray" href="#"></a>
                <a class="aa-color-black" href="#"></a>
                <a class="aa-color-white" href="#"></a>
                <a class="aa-color-cyan" href="#"></a>
                <a class="aa-color-olive" href="#"></a>
                <a class="aa-color-orchid" href="#"></a>
              </div>                            
            </div> -->
            <!-- single sidebar -->
            <!-- <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="<?=$path_prefix?>img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="<?=$path_prefix?>img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="<?=$path_prefix?>img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div> -->
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="<?=$path_prefix?>img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="<?=$path_prefix?>img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="<?=$path_prefix?>img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->

<?php
	$this->load->view('common/footer');  
	$this->load->view('common/bottom_script');
?>