


<main class="main-help-single">

    <div class="container p-0">
    <div class="row">
        <div class="col-md-3">
            <aside class="side-help-single">

                <section class="tab">

                    <?php $i=1; foreach($category as $cat){ ?>

                        <button class="tablinks" onclick="openCity(event, 'item<?=$cat->id?>')" <?=($i==1)?' id="defaultOpen"':''?> >

                            <?=$cat->name?>

                        </button>

                        <?php $i++; } ?>

                </section>

                <section class="info">

        <span class="title">

            پاسخگویی به سوالات شما و کسب اطلاعات

        </span>

                    <h3 class="phone">

                        ۶۶۹۶۲۹۵۷ - داخلی ۲۰۱
                    </h3>

                    <!-- <a href="#" class="more">

                        سایر اطلاعات تماس

                    </a> -->

                </section>

                <a href="/help/download" class="btn-download">

                    <i class="icon-034-pdf-file-format-symbol"></i>

                    <span class="title">

            دریافت بروشور راهنما

        </span>

                    <i class="icon-033-download"></i>

                </a>

            </aside>
        </div>
        <div class="col-md-9">
            <?php foreach($models as $model){ ?>

                <div id="item<?=$model->cathelpID?>" class="tabcontent">

                    <h3 class="title"> <?=$model->titr?> </h3>

                    <div >

                        <?=$model->text?>
                        <!-- <p class="text"></p> -->
                    </div>

                </div>

            <?php  }?>
        </div>
    </div>



        </div>

        <!--==========================================// accordion //===============-->

<div class="accordion" id="<?=$model->id?>" >
    <div class="container p-0"> 
    <?php foreach($questions as $question){ ?>
        <div class="card"> 
            <div class="card-header" id="item<?=$question->id?>"> 
                <h5 class="mb-0"> 
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?=$question->id?>" aria-expanded="true" aria-controls="collapse<?=$question->id?>">
                    <i class="icon icon-add"></i>
                    <i class="icon icon-remove"></i><?=$question->question?>
                </button>  
            </div>

    <div id="collapse<?=$question->id?>" class="collapse" aria-labelledby="item<?=$question->id?>" data-parent="#<?=$model->id?>"> 
        <div class="card-body"> 
            <p class="text"> <?=$question->answer?> </p> 
        </div> 
    </div>  
</div> 
<?php } ?>    
</div> 
</div> 
</div>

</div>
    <script>
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

</main>

