<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trainy Management</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Scripts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
   

    <main class="py-4" style="margin-top: 80px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                      <a href="{{ route('admin.dashboard') }}">
                      <button type="button" class="list-group-item list-group-item-action">
                          Dashboard
                      </button>
                      </a>
                      <a href="{{ route('admin.trainy') }}">
                      <button type="button" class="list-group-item list-group-item-action">
                          Trainy Management
                      </button>
                      </a>
                      <a href="{{ route('admin.division.index') }}">
                      <button type="button" class="list-group-item list-group-item-action">
                          Division
                      </button>
                      </a>
                      <a href="{{ route('admin.district.index') }}">
                      <button type="button" class="list-group-item list-group-item-action">
                          District
                      </button>
                      </a>
                      <a href="{{ route('admin.upazila.index') }}">
                      <button type="button" class="list-group-item list-group-item-action">
                          Upazila
                      </button>
                      </a>
                      <a href="{{ route('admin.exam.index') }}">
                      <button type="button" class="list-group-item list-group-item-action">
                          Exam
                      </button>
                      </a>
                      <a href="{{ route('admin.university.index') }}">
                      <button type="button" class="list-group-item list-group-item-action">
                          University
                      </button>
                      </a>
                      <a href="{{ route('admin.board.index') }}">
                      <button type="button" class="list-group-item list-group-item-action">
                          Board
                      </button>
                      </a>
                    </div>
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

@stack('js')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
