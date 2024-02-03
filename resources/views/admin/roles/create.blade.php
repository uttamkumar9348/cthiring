<x-admin-layout>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Setting</li>
                        <li class="breadcrumb-item">Roles</li>
                        <li class="breadcrumb-item">Add Roles</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <a href="{{route('admin.roles.index')}}">
                    <input class="btn btn-danger btn-glow px-2" type="button" data-target="#info" aria-haspopup="true" value="Back">
                </a>
            </div>
        </div>
    </div>


    <section id="pagination">
        <div class="row">
            <div class="col-3 pd_0">
                <div class="collapse show">
                    <form method="POST" action="{{route('admin.roles.store')}}" id="add_roles" novalidate="novalidate">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Roles <span class="clr_red">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter roles">
                        </div>
                        <button type="submit" class="btn btn-danger  round btn-glow px-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
            $(document).ready(function($) {
                $("#add_roles").validate({
                    rules: {
                        name: "required",
                    },
                    messages: {
                        name: "*Please enter Roles",
                    },
                });
            });
        </script>
</x-admin-layout>