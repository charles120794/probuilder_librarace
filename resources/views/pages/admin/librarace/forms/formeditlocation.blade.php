<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form method="post" action="{{ route('librarace.route',['path' => $path, 'action' => 'librarace-create-book-location' , 'id' => encrypt($Location->location_id) ]) }}"> {{ csrf_field() }}
            <table class="table table-bordered">
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        LOCATION CODE:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="location_code" class="form-control input-sm" style="text-transform: uppercase;" value="{{ $Location->location_code }}" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        LOCATION DESCRIPTION:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="location_description" class="form-control input-sm" style="text-transform: uppercase;" value="{{ $Location->location_description }}" required autocomplete="off" >
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="padding-right: 0px;">
                        <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-edit"></i> UPDATE </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>