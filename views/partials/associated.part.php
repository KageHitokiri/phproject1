 <!-- Box within partners name and logo -->
 <div class="last-box row">
    <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
        <div class="partner-box text-center">
          <p>
          <i class="fa fa-map-marker fa-2x sr-icons"></i> 
          <span class="text-muted">Calle falsa 123, Aukland (NZ)</span>
          </p>
          <h4>Our Main Partners</h4>
          <hr>
          <div class="text-muted text-left">
          
            <?php foreach ($associateds as $associated):?>
                <ul class='list-inline'>
                    <li><img src="<?=$associated->getUrlAssociated()?>" alt="<?=$associated->getDescription()?>"></li>
                    <li><?=$associated->getName()?></li>
                </ul>    
            <?php endforeach;?>            
          </div>
        </div>
    </div>
</div>
    <!-- End of Box within partners name and logo -->
