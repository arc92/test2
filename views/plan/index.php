
<main class="product-list">

   <section class="list">

       <div class="container p-0">

          <div class="row d-flex justify-content-between">

          <?php foreach ($plans as $plan) {  ?>

              <!--with New Badge-->

              <div class="item">

                <div class="details-item">

                      <ul class="nav">

                          <li class="nav-item shopping">

                              <i class="icon-046-crop-button"></i>

                          </li>

                          <li class="nav-item">

                              <i class="icon-003-buy"></i>

                          </li>

                          <li class="nav-item icon-like">

                              <i class="icon-012-like"></i>

                          </li>

                      </ul> 

                      <a href="/collections/<?=str_replace(' ', '-',$plan->name)?>/" target="_blank" >

                      <img src="/uploads/<?=$plan->img ?>" alt="">

                      </a>

                      <div class="text">

                          <h3 class="title">

                            <?=$plan->name?>

                          </h3>

                       </div>

                  </div>

              </div>

        <?php } ?>

            

          </div>

         

       </div>

   </section>

   

</main>