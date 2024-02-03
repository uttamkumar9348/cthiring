<x-admin-layout>
  <div class="content-header row head_bdr">
    <div class="content-header-left col-md-6 col-12 breadcrumb-new">
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
            <li class="breadcrumb-item active">User Tracking</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Form wizard with icon tabs section start -->
  <div class="row match-height">
    <div class="col-md-12 pd_0">
      <div class="collapse show table-responsive">
        <table class="table table-striped dataex-html5-selectors table-responsive">
          <thead>
            <tr>
              <th>User Id</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Access Time</th>
              <th>IP Address</th>
              <th>Browser</th>
              <th>Access Page</th>
              <th>Blacklist</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($trackrecords as $item)
            <tr>
              <th>{{$item['users_id'] }}</th>
              <td>{{$item['name'] }}</td>
              <td>{{$item['email'] }}</td>
              <td>{{$item['created_at'] }}</td>
              <td>{{$item['ip_addresh'] }}</td>
              <td>{{$item['device'] }}</td>
              <td></td>
              <td>
                @php
                  $user = App\Models\user::where('id', $item['users_id'])->get();
                @endphp
                @foreach ($user as $us)
                <a href="{{url('active_inactive/'. $item->users_id) }}">
                @if ($us->status == '1')  
                  <button type="button" class="btn btn-danger">Add To Blacklist</button>
                @elseif ($us->status == '0')
                <button type="button" class="btn btn-success">Remove From Blacklist</button>
                @endif  
                </a>
                @endforeach
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-admin-layout>