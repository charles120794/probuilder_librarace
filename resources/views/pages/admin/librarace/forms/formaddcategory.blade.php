<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form method="post" action="{{ route('librarace.route',['path' => $path, 'action' => 'librarace-create-book-category' , 'id' => encrypt('') ]) }}"> {{ csrf_field() }}
            <table class="table table-bordered">
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        GROUP CODE:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="category_code" class="form-control input-sm" style="text-transform: uppercase;" autocomplete="off" required>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        GROUP DESCRIPTION:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="category_description" class="form-control input-sm" style="text-transform: uppercase;" autocomplete="off" required>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        GROUP LOCATION:
                    </td>
                    <td style="padding: 0px;">
                        <select type="text" name="category_location" class="form-contro input-sm" style="width: 100%; border-radius: 0px;" required>
                            <option value=""> </option>
                            @foreach(app('LibraraceBooksLocation')->get() as $key => $value)
                            <option value="{{ $value->location_id }}"> 
                                {{ $value->location_code }} - {{ $value->location_description }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        GROUP PENALTY AMOUNT:
                    </td>
                    <td style="padding: 0px;">
                        <input type="number" name="category_penalty" class="form-control input-sm" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="padding-right: 0px;">
                        <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-save"></i> SUBMIT </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>