<x-admin-layout>
<style>
    .lis {
    list-style: disc;
}
</style>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item">Change Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div>
        <!-- @if(session()->has('error'))
        <div class="row">
            <div class="col-md-12 pd_0">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ session()->get('error') }}</strong>
                </div>
            </div>
        </div>
        @endif -->
        @if(session()->has('success'))
        <div class="row">
            <div class="col-md-12 pd_0">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ session()->get('success') }}</strong>
                </div>
            </div>
        </div>
        @endif
        @if(!session()->has('success'))
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-12 pd_0">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>CT Hiring let's you create your own Password and Manage the Logins Securely. Remember the New Password for all further Logins</strong>
                </div>
            </div>
        </div>
        
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-12 pd_0">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Password must contain minimum 8 characters with atleast one numeric, one uppercase, one lowercase and a special character.</strong>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="/change_password" id="form-valid">
                    @csrf
                    <div class="row match-height">
                        <div class="col-md-6 pd_0">
                            <table class="table wd_21">
                                <tr>
                                    <th>
                                        <label for="">Current Password*</label>
                                    </th>
                                    <td>
                                        <div class="col-md-6 pd_0">
                                            <input type="password" name="current_password" class="form-control" id="current_password">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="">New Password*</label>
                                    </th>
                                    <td>
                                        <div class="col-md-6 pd_0">
                                            <input type="password" name="password" class="form-control" id="new_password">
                                            <ul>
                                                <li class="maxLength lis hide">8 characters length</li>
                                                <li class="upCase lis hide">1 Upper case letter</li>
                                                <li class="oneNumber lis hide">1 Number</li>
                                                <li class="oneSpecial lis hide">1 Special character</li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="">Confirmation Password*</label>
                                    </th>
                                    <td>
                                        <div class="col-md-6 pd_0">
                                            <input type="text" name="password_confirmation" class="form-control" id="cnf_password">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="">Password Status</label>
                                    </th>
                                    <td>
                                        <span class="btn btn-success hide" id="match_password"></span>
                                        <span class="btn btn-danger hide" id="match_pass"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 pd_0">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        var uppercase = new RegExp('[A-Z]');
        var numbers = new RegExp('[0-9]');
        $('.maxLength').hide();
        $('.upCase').hide();
        $('.oneNumber').hide();
        $('.oneSpecial').hide();
        $('#new_password').keyup(function(){
            var password = $(this).val()
            
            if(password.length == 8){
                $('.maxLength').show();
                $('.maxLength').css("color","green");
            }else{
                $('.maxLength').show();
                $('.maxLength').css("color","red");
            }
            if(password.match(uppercase)){
                $('.upCase').show();
                $('.upCase').css("color","green");
            }else{
                $('.upCase').show();
                $('.upCase').css("color","red");
            }
            if(password.match(numbers)){
                $('.oneNumber').show();
                $('.oneNumber').css("color","green");
            }else{
                $('.oneNumber').show();
                $('.oneNumber').css("color","red");
            }
            if(/^[a-zA-Z0-9- ]*$/.test(password) == false){
                $('.oneSpecial').show();
                $('.oneSpecial').css("color","green");
            }else{
                $('.oneSpecial').show();
                $('.oneSpecial').css("color","red");
            }
        })
        // $('#new_password').focusout(function(){
        //     $('.maxLength').hide();
        //     $('.upCase').hide();
        //     $('.oneNumber').hide();
        //     $('.oneSpecial').hide();
        // })
    })
        $('form[id="form-valid"]').validate({
            rules: {
                current_password: 'required',
                password:'required',
                password_confirmation:{
                    required: true,
                    maxlength:8,
                },
            },
            messages: {
                password: '<span style="color:red;">*This field is required</span>',
                current_password: '<span style="color:red;">*This field is required</span>',
                password_confirmation: '*<span style="color:red;">This field is required</span>',
                },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>
<script>
$( document ).ready(function() {
    $('#match_password').hide();
    $('#match_pass').hide();
    $('#cnf_password').focusout(function(){
        var cnf_pswd = $(this).val();
        //alert(cnf_pswd);
        if($('#new_password').val() == cnf_pswd){
            $('#match_password').show();
            $('#match_pass').hide();
            $('#match_password').html('Password is match');
            $('#submit').enabled();
        }else{
            $('#match_pass').show();
            $('#match_password').hide();
            $('#match_pass').html('Password is not Match');
            $('#submit').disabled();
            
        }
    });
    
});    
</script>
</x-admin-layout>