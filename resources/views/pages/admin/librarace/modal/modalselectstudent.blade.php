<div class="modal fade" id="modalselectstudent">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="fa fa-list"></i> SELECT STUDENT </h4>
            </div>
            <div class="modal-body">
                <table id="datatable" class="table table-hover table-bordered table-condensed datatable">
                    <thead style="font-size: 12px;">
                        <tr>
                            <th> ID NO </th> 
                            <th> FULL NAME </th> 
                            <th> USER EMAIL </th> 
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                        @foreach(app('LibraraceUsersData')->get() as $key => $value)
                        <tr data-code="{{ encrypt($value->user_id) }}" data-fullname="{{ $value->user_firstname }} {{ $value->user_middlename }} {{ $value->user_lastname }}" ondblclick="return selectedStudent(this)" style="cursor: pointer;"> 
                            <td>{{ $value->user_code }}</td>
                            <td>{{ $value->user_firstname }} {{ $value->user_middlename }} {{ $value->user_lastname }}</td>
                            <td>{{ $value->user_email }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> CLOSE </button>
            </div>
        </div>
    </div>
</div>