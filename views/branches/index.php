<main class="store-list">

    <section class="main">

       <div class="container p-0">

           <div class="img-store">

               <img class="" src="/uploads/<?=$branchimg->img?>" alt="">

           </div>

           <div class="text">

               <h3 class="title">

                   <?=$branchone->name?>

               </h3>

               <span class="address">

               <?=$branchone->address?>

           </span>

               <span class="phone">

               تلفن :   <?=$branchone->tell?>

           </span>

               <a href=" <?=$branchone->map?>" class="map">

                  <span>

                       مشاهده روی نقشه

                  </span>

               </a>

           </div>

       </div>

    </section>

    <section class="list">
    <div class="container p-0 d-flex justify-content-between flex-wrap">

<?php foreach($branchtow as $branchs){ ?>

    <div class="col-lg-3 col-md-6 col-sm-12 col-12 ">

        <div class="box">

            <h3 class="title">

                <?=$branchs->name ?>

            </h3>

            <span class="address">

                <?=$branchs->address ?>

            </span>

            <span class="phone">

                 تلفن : <?=$branchs->tell?>

            </span>

            <a href="<?=$branchs->map?>" class="map">

              <span>

                   مشاهده روی نقشه

              </span>

            </a>

        </div>

     </div>

<?php } ?>

</div>
<div class="container p-0 d-flex justify-content-between flex-wrap">

    <?php foreach($branches as $branch){ ?>

        <div class="col-lg-3 col-md-6 col-sm-12 col-12 ">

            <div class="box">

                <h3 class="title">

                    <?=$branch->name ?>

                </h3>

                <span class="address">

                    <?=$branch->address ?>

                </span>

                <span class="phone">

                     تلفن : <?=$branch->tell?>

                </span>

                <a href="<?=$branch->map?>" class="map">

                  <span>

                       مشاهده روی نقشه

                  </span>

                </a>

            </div>

         </div>

    <?php } ?>

</div>

    </section>

</main>