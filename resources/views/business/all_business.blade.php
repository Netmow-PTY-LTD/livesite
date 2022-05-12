
<!DOCTYPE html>
<html>
<head>
    <title>All Business Info</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br>
    <br>
  <h2>All Business Info.(Test only)</h2>
  <p>You can see all business information with live site data.</p>                                                                                      
  
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nick Name</th>
          <th>UID</th>
          <th>Business Name</th>
          <th>Location</th>
          <th>Live Site</th>
        </tr>
      </thead>
      <tbody>
            @php
            $id = 1;
            @endphp
            @foreach($all_business_data as $data)
                <tr>
                    <td>{{ $id++ }}</td>
                    <td>{{ $data->nickname }}</td>
                    <td>{{ $data->uid }}</td>
                    <td>{{ $data->bussiness_name }}</td>
                    <td>{{ $data->location }}</td>
                    <td><a href="{{config('app.live_url')}}/site/{{$data->uid}}" target="_blank">View Site</td>
                </tr>
            @endforeach
      </tbody>
    </table>
  </div>
</div>

</body>
</html>

