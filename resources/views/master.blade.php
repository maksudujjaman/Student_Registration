<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}css/all.css">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light shadow">
    <div class="container">
        <a href="{{route('home')}}" class="navbar-brand">Student Reg</a>
        <ul class="navbar-nav">
            <li><a href="{{route('home')}}" class="nav-link">Home</a></li>
            <li><a href="{{route('student.add')}}" class="nav-link">Add Student</a></li>
            <li><a href="{{ route('student.manage')  }}" class="nav-link">Manage Student</a></li>

            <li class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Subject Wise</a>
                <ul class="dropdown-menu">
                    @foreach($subjects as $subject)
                        <li><a href="{{ route('subject-wise', ['id' => $subject['id']])  }}" class="dropdown-item"> {{ $subject->name }} </a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{route('subject.add')}}" class="nav-link">Add Subject</a></li>
            <li><a href="{{route('subject.manage')}}" class="nav-link">Manage Subject</a></li>
        </ul>
    </div>
</nav>

@yield('body')

<script src="{{asset('/')}}js/bootstrap.bundle.js"></script>
</body>
</html>
