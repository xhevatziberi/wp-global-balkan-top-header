<div class="topbar topbar-hide">
    <div class="topbar-content bootstrap-wrapper" style="height: 0px;">
        <div class="container">
            <div class="row">
                <div class="vc_col-sm-12 vc_col-md-5">
                  <h3>GLOBAL BALKAN</h3>
                  <p>Global Ballkan is a company that brings you quality and correctness. Spread across several sectors, Global Balkan enables you to easily make your choice in construction, central heating and ceramic tiles.</p>
                </div>
                <div class="vc_col-xs-12 vc_col-sm-2 vc_col-md-2">
                    <div class="choose-country">
                        <p><i class="icon-world-map"></i></p>
                    </div>
                </div>
                <div class="vc_col-xs-12 vc_col-sm-10 vc_col-md-5">
                    <div class="activities">
                        <ul class="activities-icons">
                            <li class="dropdown open" style="width: 33%;">
                                <a class="dropdown-toggle" href="#industryId-1">
                                  <i class="icon-activities-marketing"></i>
                                  <span class="industry second hidden-phone">Construction</span>
                                </a>
                            </li>
                            <li class="dropdown" style="width: 33%;">
                                <a class="dropdown-toggle" href="#industryId-2">
                                  <i class="icon-activities-construction"></i>
                                  <span class="industry second hidden-phone">Ceramic</span>
                                </a>
                            </li>
              							<li class="dropdown" style="width: 33%;">
                              <a class="dropdown-toggle" href="#industryId-3">
                                <i class="icon-activities-logistics"></i>
              									<span class="industry second hidden-phone">HVAC</span>
              								</a>
                            </li>
                        </ul>
                        <div class="activities-list">
                          <div class="dropdown-menu  open" role="menu" id="industryId-1">
                            <ul class="vc_col-xs-6 vc_col-sm-4 vc_col-md-4">
                              <li class="vc_col-md-12">
                                <a href="http://screenmedia.mk/">
                                  <img src="<?php echo esc_url($instance->assets_url) . 'img/screenmedia-icon.png' ?>" alt="screenmedia" title="screenmedia">
                                </a>
                              </li>
                            </ul>
                            <ul class="vc_col-xs-6 vc_col-sm-4 vc_col-md-4">
            									<li class="vc_col-md-12">
            										<a href="http://talenta.mk/">
            											<img src="<?php echo esc_url($instance->assets_url) . 'img/talenta-icon.png' ?>" alt="talenta" title="talenta">
            										</a>
            									</li>
                            </ul>
                            <ul class="vc_col-xs-6 vc_col-sm-4 vc_col-md-4">
                              <li class="vc_col-md-12">
                                <a href="#">
                                  <img src="<?php echo esc_url($instance->assets_url) . 'img/balkan-icon.png' ?>" alt="balkan" title="balkan">
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="dropdown-menu " role="menu" id="industryId-2">
                              <ul class="vc_col-xs-6 vc_col-sm-4 vc_col-md-4">
                								<li class="vc_col-md-12">
                									<a href="http://eurovia.mk/">
                										<img src="<?php echo esc_url($instance->assets_url) . 'img/eurovia-icon.png' ?>" alt="eurovia" title="eurovia">
                									</a>
                								</li>
                              </ul>
                          </div>
            							<div class="dropdown-menu " role="menu" id="industryId-3">
                            <ul class="vc_col-xs-6 vc_col-sm-4 vc_col-md-4">
            									<li class="vc_col-md-12">
            										<a href="http://enea.mk/">
            											<img src="<?php echo esc_url($instance->assets_url) . 'img/enea-icon.png' ?>" alt="enea" title="enea">
            										</a>
            									</li>
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="global-nav bootstrap-wrapper">
        <div class="container">
            <div class="row">
                <div class="vc_vc_col-sm-2 vc_vc_col-md-2">
                    <button class="btn-link" id="topbar-toggle" type="button">GLOBAL BALKAN&nbsp;<span class="caret"></span>
                    </button>
                </div>
                <div class="vc_vc_col-sm-10 vc_vc_col-md-10">
                    <ul class="global-menu-controls">
                        <li class="dropdown dropdown_header-search">
                            <a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle_search-btn"><i class="fa fa-search"></i></a>
                            <ul class="search dropdown-menu">
                                <li class="input-group">
                									<form role="search" method="get" id="top-area-searchform" class="searchform" action="http://projects.talenta.mk/screen2/" onsubmit="return submitSearchForm(this)" novalidate="novalidate">
                                    <input type="text" value="" name="s" id="top-area-s" class="form-control inputSearchQuery" placeholder="Search">
                                    <input type="hidden" name="q" class="searchQuery">
                                    <span class="input-group-btn">
                											<button id="top-area-searchsubmit" class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                										</span>
                                  </form>
                                </li>
                            </ul>
                        </li>
                        <li id="lang" class="dropdown dropdown_hover">
                          <a class="dropdown-toggle" href="javascript:void(0);" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo get_lang_code(); ?><span class="caret"></span></a>
                          <?php icl_other_languagess(); ?>
                        </li>
                    </ul>
                    <ul class="global-menu hidden-phone">
                        <li class="choose-country">
                            <a href="#!"><i class="icon-world-map"></i></a>
                        </li>
                        <li><a href="#!">Sectors</a>
                        </li>
                        <li><a href="#!">Career</a>
                        </li>
                        <li><a href="#!">Contacts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
