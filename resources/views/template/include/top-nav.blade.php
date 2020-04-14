<html>
<title>Library System</title>
<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #0288d1 !important;">
    <a class="navbar-brand" href="{{URL::to('')}}/" style="color: white">Library System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <span class="form-inline my-2 my-lg-0" id="logoutBtn">
            <button class="btn my-2 my-sm-0" type="submit" style="background: white !important;color: #0288d1" onclick="logout()">Logout</button>
        </span>
    </div>
</nav>
<script src="https://kit.fontawesome.com/ffe1193991.js" crossorigin="anonymous"></script>
</body>
<script>
    function logout() {
        localStorage.removeItem('role');
        window.location.href = `{{env('APP_URL')}}`
    }
    if(!localStorage.hasOwnProperty('role')){
        document.getElementById('logoutBtn').style.display = 'none';
    }
</script>
</html>
