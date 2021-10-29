<div id="category<?=$categoryId?>" class ="tab-pane <?=($active ? 'active':"")?>">
    <div class="row popup-gallery">
    <?php foreach ($gallery as $itemGallery):?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="sol">
                    <img class="img-responsive" src="<?=$itemGallery->getUrlPortfolio()?>" alt="<?=$itemGallery->getDescription()?>">
                    <div class="behind">
                        <div class="head text-center">
                        <ul class="list-inline">
                          <li>
                            <a class="gallery" href="<?=$itemGallery->getUrlGallery()?>" data-toggle="tooltip" data-original-title="Quick View">
                              <i class="fa fa-eye"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Click if you like it">
                              <i class="fa fa-heart"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Download">
                              <i class="fa fa-download"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#" data-toggle="tooltip" data-original-title="More information">
                              <i class="fa fa-info"></i>
                            </a>
                          </li>
                        </ul>
                        </div>
                        <div class="row box-content">
                        <ul class="list-inline text-center">
                          <li><i class="fa fa-eye"></i><?=$itemGallery->getNumVisualizations()?></li>
                          <li><i class="fa fa-heart"></i> <?=$itemGallery->getNumLikes()?></li>
                          <li><i class="fa fa-download"></i> <?=$itemGallery->getNumDownloads()?></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div> 
        <?php endforeach?>
        <nav class="text-center">
            <ul class="pagination">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#" aria-label="suivant">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>                
            </ul>
        </nav>    
    </div>
</div>
    