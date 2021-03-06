<div class="topbar topbar-hide">
    <div class="topbar-content bootstrap-wrapper" style="height: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-5 about">
                  <h3><a href="http://globalbalkan.mk/">GLOBAL BALKAN</a></h3>
                  <p><?php _e('Global Ballkan is a company that brings you quality and correctness. Spread across several sectors, Global Balkan enables you to easily make your choice in construction, central heating and ceramic tiles.', 'global-balkan-top-header') ?></p>
                </div>
                <div class="col-12 col-sm-2 col-md-2">
                    <div class="choose-country">
                        <p><i class="icon-world-map"></i></p>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-5">
                    <div class="row activities">
                      <div class="col-4 text-center">
                        <a class="sector" href="http://estate.globalbalkan.mk/">
                          <i class="icon-activities-construction"></i>
                          <span class="industry second hidden-phone hidden-tablet"><?php _e('Construction', 'global-balkan-top-header') ?></span>
                        </a>
                        <a class="company" href="http://estate.globalbalkan.mk/">
                          <img src="<?php echo esc_url($instance->assets_url) . 'img/global_estate.png' ?>" alt="global_estate" title="global_estate">
                        </a>
                      </div>
                      <div class="col-4 text-center">
                        <a class="sector" href="http://ceramic.globalbalkan.mk/">
                          <i class="icon-activities-ceramic"></i>
                          <span class="industry second hidden-phone hidden-tablet"><?php _e('Ceramic', 'global-balkan-top-header') ?></span>
                        </a>
                        <a class="company" href="http://ceramic.globalbalkan.mk/">
                          <img src="<?php echo esc_url($instance->assets_url) . 'img/global_ceramic.png' ?>" alt="global_ceramic" title="global_ceramic">
                        </a>
                      </div>
                      <div class="col-4 text-center">
                        <a class="sector" href="http://term.globalbalkan.mk/">
                          <i class="icon-activities-hvac"></i>
                          <span class="industry second hidden-phone hidden-tablet"><?php _e('HVAC', 'global-balkan-top-header') ?></span>
                        </a>
                        <a class="company" href="http://term.globalbalkan.mk/">
                          <img src="<?php echo esc_url($instance->assets_url) . 'img/global_term.png' ?>" alt="global_term" title="global_term">
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="global-nav bootstrap-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-2 col-md-2">
                    <button class="btn-link" id="topbar-toggle" type="button">GLOBAL BALKAN&nbsp;<span class="caret"></span>
                    </button>
                </div>
                <div class="col-6 col-sm-10 col-md-10">
                    <ul class="global-menu-controls">
                        <li class="dropdown dropdown_header-search">
                            <a href="javascript:void(0);" class="dropdown-toggler dropdown-toggler_search-btn"><i class="gb gb-search"></i></a>
                            <ul class="search dropdown-menu">
                                <li class="input-group">
                									<form role="search" method="get" id="top-area-searchform" class="searchform" action="http://globalbalkan.mk/" onsubmit="return submitSearchForm(this)" novalidate="novalidate">
                                    <input type="text" value="" name="s" id="top-area-s" class="form-control inputSearchQuery" placeholder="Search">
                                    <input type="hidden" name="q" class="searchQuery">
                                    <span class="input-group-btn">
                											<button id="top-area-searchsubmit" class="btn btn-default" type="submit"><i class="gb gb-search"></i></button>
                										</span>
                                  </form>
                                </li>
                            </ul>
                        </li>
                        <li id="lang" class="dropdown dropdown_hover">
                          <a class="dropdown-toggler" href="javascript:void(0);" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo get_lang_code(); ?><span class="caret"></span></a>
                          <?php icl_other_languages(); ?>
                        </li>
                    </ul>
                    <ul class="global-menu hidden-phone">
                        <li class="choose-country">
                            <a href="http://globalbalkan.mk/"><i class="icon-world-map"></i></a>
                        </li>
                        <li>
                          <a href="http://globalbalkan.mk/sectors/"><?php _e('Sectors', 'global-balkan-top-header') ?></a>
                        </li>
                        <li>
                          <a href="http://globalbalkan.mk/careers/"><?php _e('Career', 'global-balkan-top-header') ?></a>
                        </li>
                        <li>
                          <a href="http://globalbalkan.mk/contact/"><?php _e('Contacts', 'global-balkan-top-header') ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row hidden-tablet hidden-desktop">
              <div class="col-12">
                <ul class="global-menu">
                    <li class="choose-country">
                        <a href="http://globalbalkan.mk/"><i class="icon-world-map"></i></a>
                    </li>
                    <li>
                      <a href="http://globalbalkan.mk/sectors/"><?php _e('Sectors', 'global-balkan-top-header') ?></a>
                    </li>
                    <li>
                      <a href="http://globalbalkan.mk/careers/"><?php _e('Career', 'global-balkan-top-header') ?></a>
                    </li>
                    <li>
                      <a href="http://globalbalkan.mk/contact/"><?php _e('Contacts', 'global-balkan-top-header') ?></a>
                    </li>
                </ul>
              </div>
            </div>
        </div>
    </div>
</div>
