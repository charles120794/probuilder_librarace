<div class="row">
    <div class="col-md-6 col-md-offset-3" style="overflow-x: auto;">
        <form method="post" action="{{ route('librarace.route',['path' => $path, 'action' => 'librarace-update-user-data' , 'id' => encrypt($Users->user_id) ]) }}"> {{ csrf_field() }}
            <table class="table table-bordered">
                <tr>
                    <td class="bg-gray-light text-center" style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;" colspan="2">
                        PERSONAL INFORMATION
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        STUDENT ID NUMBER:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="student_no" class="form-control input-sm" maxlength="10" style="text-transform: uppercase;" value="{{ $Users->user_code }}" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        USER EMAIL:
                    </td>
                    <td style="padding: 0px;">
                        <input type="email" name="email" class="form-control input-sm" value="{{ $Users->user_email }}" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        CONTACT NUMBER:
                    </td>
                    <td style="padding: 0px;">
                        <input type="number" name="contact" class="form-control input-sm" value="{{ $Users->user_contact }}" maxlength="11" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        FIRSTNAME:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="firstname" class="form-control input-sm" style="text-transform: uppercase;" value="{{ $Users->user_firstname }}" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        MIDDLENAME:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="middlename" class="form-control input-sm" style="text-transform: uppercase;" value="{{ $Users->user_middlename }}" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        LASTNAME:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="lastname" class="form-control input-sm" style="text-transform: uppercase;" value="{{ $Users->user_lastname }}" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td class="bg-gray-light text-center" style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;" colspan="2">
                        ACCOUNT SETUP
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        CHANGE USERNAME:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="username" class="form-control input-sm" autocomplete="off" value="{{ $Users->user_username }}" required>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        OLD PASSWORD:
                    </td>
                    <td style="padding: 0px;">
                        <input type="password" name="old_password" maxlength="10" class="form-control input-sm" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        NEW PASSWORD:
                    </td>
                    <td style="padding: 0px;">
                        <input type="password" name="password" maxlength="10" class="form-control input-sm" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        CONFIRM NEW PASSWORD:
                    </td>
                    <td style="padding: 0px;">
                        <input type="password" name="confirm_password" maxlength="10" class="form-control input-sm" autocomplete="off">
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