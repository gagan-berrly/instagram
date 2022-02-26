<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/admin-dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-code'></i>
            <span class="logo_name">Laravel</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{route('admin.user')}}" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.user.list')}}">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Users</span>
                </a>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>            
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <!--<div class="box-topic">Total Users</div>-->
                        <i class='bx bx-user cart'></i>
                        <div class="number" style="margin-left:5px;">{{ count($users) }}</div>
                    </div>
                </div>
                <div class="box">
                    <div class="right-side">
                        <!--<div class="box-topic">Total Likes</div>-->
                        <i class="bx bx-heart cart four"></i>
                        <div class="number" style="margin-left:5px;">{{ count($likes) }}</div>
                    </div>
                </div>
                <div class="box">
                    <div class="right-side">
                        <!--<div class="box-topic">Total Images</div>-->
                        <i class='bx bxs-image cart two'></i>
                        <div class="number" style="margin-left:5px;">{{ count($images) }}</div>
                    </div>
                </div>
                <div class="box">
                    <div class="right-side">
                        <!--<div class="box-topic">Total Images</div>-->
                        <i class='bx bxs-comment-detail cart one'></i>
                        <div class="number" style="margin-left:5px;">{{ count($comments) }}</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="latest-users-container">
            <div id="text-title">
                <h3 class="ml-5">Ultimos usuarios que se han registrado</h3>
            </div>
            <div class="latest-users-join">
                @foreach($users->take(3) as $user)
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                    <h5 class="card-title">{{$user->name.' '.$user->surname}}</h5>
                    <p class="card-text">{{'@'.$user->nick}}</p>
                    <p>{{$user->email}}</p>
                    <p>{{'Se unió ' .\FormatTime::LongTimeFilter($user->created_at) }} </p>
                    </div>
                </div>
                @endforeach            
            </div>

        </div>

    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>

</body>

</html>
