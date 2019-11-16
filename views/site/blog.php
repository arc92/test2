
<main class="content-blog">

<section class="header-content">
    <div class="container p-0"  style="max-width:1230px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="d-flex justify-content-between align-items-center">
                <!-- <a href="#" class="icon rss">
                    <i class="icon-030-subscribe-rss-button"></i>
                </a> -->
                <a href=""  >  </a>
                <ul class="nav">
                <?php foreach($category as $cat){ ?>
                    <li class="nav-item">
                        <a class="nav-link " href="#<?=$cat->id?>">
                            <?=$cat->name ?>
                        </a>
                    </li>
                <?php } ?>
               
                </ul>
                <!-- <a href="#" class="icon calender" ><i class="icon-029-calendar"></i></a> -->
                <a href=""  >
                    <!-- <i class="icon-029-calendar"></i> -->
                </a>
            </div>
        </div>
    </div>
</section>
<section class="category">
    <div class="container p-0  d-flex justify-content-between flex-wrap"  style="max-width:1230px;">

    <?php foreach($blogs as $blog){ ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12" id="<?=$blog->cat->id ?>" >
        <a href="/site/blogsingle?id=<?=$blog->id ?>" >
            <div class="box">
                <div class="d-flex flex-wrap">
    <div class="right"  style="background-image: url('/uploads/<?=$blog->img?>')"  >
    
                <span class="badge badge-secondary">
               <?=$blog->cat->name ?>
            </span>
                    </div>
                    <div class="left">
                <span class="data">
                       <?=$blog->create_date?>
                </span>
                        <h4 class="title">
                        <?=$blog->name?>
                        </h4>
                        <p class="text">
                        <?=$blog->title ?>
                        </p>
                        <a href="/site/blogsingle?id=<?=$blog->id ?>" class="more">
                            ...
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    </div>
</section>
<!-- <a href="#" class="btn more-btn">
       <span>
            مشاهده ادامه
       </span>
</a> -->
</main>