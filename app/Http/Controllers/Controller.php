<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // SETTINGS FOLDER
    use \App\Http\Traits\Settings\SystemCompanyTrait;
    use \App\Http\Traits\Settings\SystemCompanyDetailsTrait;
    use \App\Http\Traits\Settings\SystemWindowTrait;
    use \App\Http\Traits\Settings\SystemWindowMethodTrait;
    use \App\Http\Traits\Settings\SystemModuleTrait;
    use \App\Http\Traits\Settings\SystemCompanyModuleAccessTrait;
    
    use \App\Http\Traits\Settings\UploaderTrait;
    use \App\Http\Traits\Settings\UsersInformationTrait;
    use \App\Http\Traits\Settings\UserSettingTrait;
    use \App\Http\Traits\Settings\UsersTrait;
    use \App\Http\Traits\Settings\UsersCompanyAccessTrait;
    use \App\Http\Traits\Settings\UsersModuleAccessTrait;
    use \App\Http\Traits\Settings\UsersWindowAccessTrait;
    use \App\Http\Traits\Settings\UsersWindowMethodAccessTrait;
    // ADMIN FOLDER
    // use \App\Http\Traits\Admin\UserPageSetupTrait;
    // WEBSITE FOLDER
    // use \App\Http\Traits\Website\CenterPanelTrait;
    // use \App\Http\Traits\Website\FooterTrait;
    // use \App\Http\Traits\Website\FrontlineTrait;
    // use \App\Http\Traits\Website\HeadCarouselTrait;
    // use \App\Http\Traits\Website\LayoutTrait;
    // use \App\Http\Traits\Website\MasterHeadTrait;
    // use \App\Http\Traits\Website\NavMenuTrait;
    // use \App\Http\Traits\Website\NavMethodTrait;
    // use \App\Http\Traits\Website\SidePanelTrait;
    // use \App\Http\Traits\Website\NavMenuGenerateTrait;
    // use \App\Http\Traits\Website\SpecialTrait;

}
