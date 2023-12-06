<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body>
    <div class="wrapper">
        @include('layout.navbar')

        <div class="main">
            @include('layout.navbarhorizontale')
            @include('layout.maindashboard')
        </div>
    </div>
    @include('layout.jsChart')
    @include('layout.jsnavbar')

</body>

</html>
