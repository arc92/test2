
<main class="body-faq">
   <article>
       <div class="container p-0 d-flex justify-content-between flex-wrap">
           <div class="accordion" id="accordionExample" >
           <?php foreach($faqs as $faq){ ?>
               <div class="card">
                   <div class="card-header" id="headingOne">
                       <h5 class="mb-0">
                           <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#<?=$faq->id ?>" aria-expanded="true" aria-controls="collapseOne">
                               <i class="icon icon-031-help-bubble"></i>
                               <?=$faq->question?>
                               <i class="icon icon-add"></i>
                               <i class="icon icon-remove"></i>
                           </button>
                       </h5>
                   </div>
                   <div id="<?=$faq->id ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                       <div class="card-body">
                           <p class="text"><?=$faq->answer?> </p>
                       </div>
                   </div>
               </div>
           <?php } ?>
           </div>
       </div>
   </article>
</main>