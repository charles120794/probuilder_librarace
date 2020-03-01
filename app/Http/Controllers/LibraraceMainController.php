<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LibraraceMainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // USERS INFORMATION TRAITS
    use \App\Http\Traits\Settings\UsersInformationTrait;
    use \App\Http\Traits\Settings\UploaderTrait;
    
    use \App\Http\Traits\Librarace\LibraraceTraits;
    use \App\Http\Traits\Librarace\LibraraceApiTraits;
    use \App\Http\Traits\Librarace\LibraraceServiceTraits;
    
    use \App\Http\Traits\Librarace\LibraraceBooksTraits;
    use \App\Http\Traits\Librarace\LibraraceBooksCategoryTraits;
    use \App\Http\Traits\Librarace\LibraraceUsersTraits;
    use \App\Http\Traits\Librarace\LibraraceBooksLocationTraits;
    use \App\Http\Traits\Librarace\LibraraceBooksIssuanceTraits;
    use \App\Http\Traits\Librarace\LibraraceBooksRequestTraits;
    
}
