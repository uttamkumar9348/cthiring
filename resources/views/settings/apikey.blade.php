<x-admin-layout>

    <style>
        .b_b {
            border-bottom: 1px solid #e1e4f1;
        }
    </style>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Setting</li>
                        <li class="breadcrumb-item">Api Keys</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Book Appointment -->
        <section id="book-appointment">
            <div class="">
                <div class="">
                    <h2 class="card-title">MSG91</h2>
                </div>
                <div class="">
                    @foreach($view as $views)
                    <form action="{{url('/msgupdate',$views->id)}}" method="POST" class="form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="authkey">Authkey <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="authkey" placeholder="Enter Auth Key" value="{{$views->authkey}}" id="authkey" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="flowid">Flow Id<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="flowid" placeholder="Enter Flow Id" value="{{$views->flowid}}" id="flowid" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="senderid">Sender Id<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="senderid" placeholder="Enter sender Id" value="{{$views->senderid}}" id="senderid" required>
                                </div>
                            </div>
                        </div>
                        <div class="ml-auto pd_0">
                            <button type="submit" class="btn btn-outline-success mr-1">update</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-admin-layout>