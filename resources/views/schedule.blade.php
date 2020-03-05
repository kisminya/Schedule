<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TV műsor</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <style>
    body {
      background-color: #F7F7F2;
    }

    .table {
      margin-bottom: 0;
    }

    p {
      margin: 0;
    }
  </style>
</head>

<body>
  <div class="container">
    @if(count($programs))
  <div class="d-flex justify-content-center">
      <form action="/schedule" method="GET">
        <!-- CSATORNA VÁLASZTÁS -->
        <div class="form-group">
          <label for="channelSelect">Csatorna kiválasztása</label>
          <select name="channel" class="form-control" id="channelSelect">
            @foreach ($channels as $channel)
            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
            <!--választott csatorna "mentése" -->
            @isset($_GET['channel'])
            @if($_GET['channel'] == $channel->id)
            <option hidden selected value="{{$channel->id}}">{{ $channel->name }}</option>
            @endif
            @endisset
            @endforeach
          </select>
        </div>
        <!-- DÁTUM VÁLASZTÁS -->
        <div class="form-group">
        </div>
        <label for="dateSelect">Dátum kiválasztása</label>
        <select name="date" class="form-control" id="dateSelect">
          @foreach($dates as $date)
          <option value="{{ $date->id }}">{{ Carbon\Carbon::parse($date->date_from)->format('Y-m-d') }}</option>
          <!--választott dátum "mentése" -->
            @isset($_GET['date'])
            @if($_GET['date'] == $date->id)
            <option hidden selected value="{{$date->id}}">{{ Carbon\Carbon::parse($date->date_from)->format('Y-m-d') }}</option>
            @endif
            @endisset
          @endforeach
        </select>
        <!-- BTN-->
        <div class="text-center">
          <button class="btn btn-primary my-1 shadow-lg" type="submit">Szűrés</button>

        </div>
      </form>
    </div>

    <!-- TABLE -->
    <table class="table table-dark text-center">
      <thead>
        <tr>
          <th scope="col">{{ \Carbon\Carbon::parse($programs[0]->date->date_from)->format('Y-m-d') }}</th>
          <th scope="col">{{ $programs[0]->channel->name }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($programs as $program)
        <tr>
          <td style="width:50%">
            <p>{{ $program->start_time }}</p>
            <p>Korhatár: {{ empty($program->age_limit) ? "-" : $program->age_limit }}</p>
          </td>
          <td style="width:50">
            <p>{{ $program->title }}</p><small>{{ $program->description }}</small>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    Nincs adat az adatbázisban, kérlek futtasd a scriptet!
    @endif
  </div>
</body>

</html>