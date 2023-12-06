<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body>
    <div class="wrapper">
        @include('layout.navbar')

        <div class="main">
            @include('layout.mainNotation')
        </div>
    </div>
    @include('layout.jsnavbar')
    @include('layout.jsnotation')
</body>

</html>
